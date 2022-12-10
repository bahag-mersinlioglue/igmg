<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PrayerTime $model */

$this->title = 'Update Prayer Time: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prayer Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prayer-time-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
