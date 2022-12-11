<?php

namespace app\controllers;

use app\models\Hadis;
use app\models\HutbePage;
use app\models\NotificationSearch;
use app\models\PrayerTime;
use Cassandra\Date;
use Faker\Core\DateTime;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use function PHPUnit\Framework\isEmpty;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /*
     * Checks if a hutbe page is active
     */
    public function actionPageId() {
        $page = HutbePage::find()->where(['active' => 1])->one();
        $pageId = $page ? $page->id : 0;
        return $this->asJson(['pageId' => $pageId]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'client';

        $lang = Yii::$app->request->get('lang', 'de');
        $langs = explode(',', $lang);
        $page = HutbePage::find()->where(['active' => 1])->one();


        if ($page) {
            return $this->render('index', [
                'languages' => $langs,
                'page' => $page,
            ]);
        } else {

            $tomorrow = new \DateTime();
            $tomorrow->modify('+1day');

            /** @var PrayerTime $prayerTime */
            $prayerTime = PrayerTime::find()->where([
                'date' => date('Y-m-d')
            ])->one();
            /** @var PrayerTime $prayerTimeTomorrow */
            $prayerTimeTomorrow = PrayerTime::find()->where([
                'date' => $tomorrow->format('Y-m-d')
            ])->one();

            $times = [
                'fajr' => $prayerTime->date . ' ' . $prayerTime->fajr,
                'sunrise' => $prayerTime->date . ' ' . $prayerTime->sunrise,
                'dhuhr' => $prayerTime->date . ' ' . $prayerTime->dhuhr,
                'asr' => $prayerTime->date . ' ' . $prayerTime->asr,
                'maghrib' => $prayerTime->date . ' ' . $prayerTime->maghrib,
                'ishaa' => $prayerTime->date . ' ' . $prayerTime->ishaa,
                'fajr-next' => $prayerTimeTomorrow->date . ' ' . $prayerTimeTomorrow->fajr,
            ];

            $dateObjects = [];
            foreach ($times as $key => $time) {
                $dateObjects[$key] = \DateTime::createFromFormat('Y-m-d H:i:s', $time);
            }

            $now = new \DateTime();

            $currentPrayerTimeName = '';
            $nextPrayerTimeName = '';
            $nextPrayerTime = null;
            foreach ($dateObjects as $key => $date) {
                if ($date < $now) {
                    $currentPrayerTimeName = $key;
                    continue;
                } else {
                    $nextPrayerTimeName = $key;
                    $nextPrayerTime = $date;
                    break;
                }
            }

            $nextPrayerTimeInSeconds = $nextPrayerTime->getTimestamp() - $now->getTimestamp();

            $notifications = NotificationSearch::find()->where(['active' => 1])->all();

            $hadisCnt = Hadis::find()->count();
            $hadisOffset = rand(0, $hadisCnt-1);
            $hadis = Hadis::find()
                ->offset($hadisOffset)
                ->limit(1)
                ->one();

            return $this->render('dashboard', [
                'langs' => ['de', 'tr', 'ar'],
                'hadis' => $hadis,
                'prayerTime' => $prayerTime,
                'prayerTimeTomorrow' => $prayerTimeTomorrow,
                'nextPrayerTimeInSeconds' => $nextPrayerTimeInSeconds,
                'currentPrayerTimeName' => $currentPrayerTimeName,
                'nextPrayerTimeName' => $nextPrayerTimeName,
                'notifications' => $notifications,
            ]);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
