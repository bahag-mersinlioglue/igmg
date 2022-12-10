<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NotificationSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="notification-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_de') ?>

    <?= $form->field($model, 'content_de') ?>

    <?= $form->field($model, 'title_tr') ?>

    <?= $form->field($model, 'content_tr') ?>

    <?php // echo $form->field($model, 'title_ar') ?>

    <?php // echo $form->field($model, 'content_ar') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
