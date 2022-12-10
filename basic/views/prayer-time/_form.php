<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PrayerTime $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prayer-time-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cityName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'fajr')->textInput() ?>

    <?= $form->field($model, 'sunrise')->textInput() ?>

    <?= $form->field($model, 'dhuhr')->textInput() ?>

    <?= $form->field($model, 'asr')->textInput() ?>

    <?= $form->field($model, 'maghrib')->textInput() ?>

    <?= $form->field($model, 'ishaa')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
