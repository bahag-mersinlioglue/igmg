<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Hadis $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="hadis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text_de')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_tr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_ar')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
