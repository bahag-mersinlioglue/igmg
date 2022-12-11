<?php

namespace app\controllers;

use app\models\PrayerTime;
use app\models\PrayerTimeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrayerTimeController implements the CRUD actions for PrayerTime model.
 */
class PrayerTimeController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionImport()
    {
        $apiKey = \Yii::$app->params['IGMG_API_KEY'];

        $from = (new \DateTime())->format('d.m.Y');
        $to = (new \DateTime())->modify('+1year')->format('d.m.Y');
        $igmgApiUrl = "https://live.igmgapp.org:8091/api/Calendar/GetPrayerTimes?cityID=20038&from=$from&to=$to";
        $ch = curl_init($igmgApiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "X-API-Key: $apiKey",
        ));
        $response = curl_exec($ch);
        curl_close($ch);

        if (curl_error($ch) != null) {
            exit('Igmg api can not be called');
        }

        $data = json_decode($response, true);
        $data = $data['list'];

        foreach ($data as $item) {

            $date = \DateTime::createFromFormat('d.m.Y', $item['date']);

            $prayerTime = PrayerTime::find()->where(['date' => $date->format('Y-m-d')])->one();
            if (!$prayerTime)
                $prayerTime = new PrayerTime();

            $prayerTime->setAttributes([
                'date' => $date->format('Y-m-d'),
                'cityName' => $item['cityName'],
                'fajr' => $item['fajr'],
                'sunrise' => $item['sunrise'],
                'dhuhr' => $item['dhuhr'],
                'asr' => $item['asr'],
                'maghrib' => $item['maghrib'],
                'ishaa' => $item['ishaa'],
            ]);
            $prayerTime->save();

        }

        $cntData = count($data);
        echo "Imported {$cntData}";
    }

    /**
     * Lists all PrayerTime models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PrayerTimeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PrayerTime model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PrayerTime model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PrayerTime();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PrayerTime model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PrayerTime model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PrayerTime model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PrayerTime the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PrayerTime::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
