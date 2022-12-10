<?php

use app\models\Hutbe;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\HutbeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Hutbes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hutbe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hutbe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'tarih',
                "format" => 'raw',
                'value' => function($model) {
                    return Html::a(
                        Yii::$app->formatter->asDate($model->tarih, 'medium'),
                        Url::toRoute(['start', 'id' => $model->id])
                    );
                }
            ],
            'hafta',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Hutbe $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
