<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HutbePage $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="hutbe-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'de')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hutbe_id')->textInput() ?>

    <?= $form->field($model, 'ar')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
