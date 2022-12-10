<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\HutbePage $model */

$pageNumber = $model->page_number+1;
$this->title = Yii::$app->formatter->asDate($model->hutbe->tarih, 'medium') . " (Seite: $pageNumber)";
//$this->params['breadcrumbs'][] = ['label' => 'Hutbe Pages', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hutbe-page-view">
    <style>
        .disable-me {
            pointer-events: none;
            opacity: 50%;
        }
    </style>

    <p><?= Html::encode($this->title) ?></p>

    <p>
        <?= Html::a('<< Vorherige',
            ['view', 'id' => $model->getPreviousPageId()],
            ['class' => 'btn btn-secondary ' . (is_null($model->getPreviousPageId()) ? 'disable-me' : '')])
        ?>
        <?= Html::a('Nächste >>',
            ['view', 'id' => $model->getNextPageId()],
            ['class' => 'btn btn-primary ' . (is_null($model->getNextPageId()) ? 'disable-me' : '')])
        ?>
    </p>

    <div class="row">
        <div class="col">
            <?= $model->tr ?>
        </div>
    </div>

    <br/>
    <p>
        <?= Html::a('Beenden', ['hutbe/stop', 'id' => $model->hutbe_id], ['class' => 'btn btn-danger']) ?>
    </p>

</div>
