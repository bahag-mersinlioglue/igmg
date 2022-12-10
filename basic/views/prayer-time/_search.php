<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PrayerTimeSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prayer-time-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cityName') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'fajr') ?>

    <?= $form->field($model, 'sunrise') ?>

    <?php // echo $form->field($model, 'dhuhr') ?>

    <?php // echo $form->field($model, 'asr') ?>

    <?php // echo $form->field($model, 'maghrib') ?>

    <?php // echo $form->field($model, 'ishaa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
