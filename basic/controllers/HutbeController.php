<?php

namespace app\controllers;

use app\models\Hutbe;
use app\models\HutbePage;
use app\models\HutbeSearch;
use Faker\Core\DateTime;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HutbeController implements the CRUD actions for Hutbe model.
 */
class HutbeController extends Controller
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

    public function actionStart($id) {
        $hutbe = $this->findModel($id);

        $this->redirect(Url::toRoute(['hutbe-page/view', 'id' => $hutbe->hutbePages[0]->id]));
    }

    public function actionStop($id) {
        //$hutbe = $this->findModel($id);

        HutbePage::updateAll(['active' => 0], ['active' => 1]);

        $this->redirect(Url::toRoute(['hutbe/index']));
    }

    /**
     * Lists all Hutbe models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new HutbeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hutbe model.
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
     * Creates a new Hutbe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Hutbe();

        if ($this->request->isPost) {

            if ($model->load($this->request->post()) && $model->save()) {

                $postedPages = $this->request->post('Pages', []);
                foreach ($postedPages as $key => $pageData) {
                    if (empty($pageData['de'] . $pageData['tr'] . $pageData['tr'])) {
                        continue;
                    }
                    $newPage = new HutbePage($pageData);
                    $newPage->hutbe_id = $model->id;
                    $newPage->page_number = $key;
                    $newPage->save();
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            // $model->loadDefaultValues();

            $pages = [];
            foreach (range(0, 5) as $value) {
                $pages[] = new HutbePage();
            }

            $now = new \DateTime();
            $dayOfWeek = $now->format('w');
            if ($dayOfWeek <= 5) {
                $now = $now->modify('+'.(5-$dayOfWeek).'day');
            } else {
                $now = $now->modify('+'.(7 + 5 - $dayOfWeek).'day');
            }

            $model->hafta = $now->format('W');
            $model->tarih = $now->format('Y-m-d');
        }

        return $this->render('create', [
            'model' => $model,
            'pages' => $pages,
        ]);
    }

    /**
     * Updates an existing Hutbe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            $postedPages = $this->request->post('Pages', []);
            HutbePage::deleteAll('hutbe_id = ' . $model->id);

            foreach ($postedPages as $pageData) {
                if (empty($pageData['de'] . $pageData['tr'] . $pageData['tr'])) {
                    continue;
                }
                $newPage = new HutbePage($pageData);
                $newPage->hutbe_id = $model->id;
                $newPage->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'pages' => $model->hutbePages,
        ]);
    }

    /**
     * Deletes an existing Hutbe model.
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
     * Finds the Hutbe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Hutbe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hutbe::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
