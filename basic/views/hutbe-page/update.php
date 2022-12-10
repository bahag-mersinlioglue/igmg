<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HutbePage $model */

$this->title = 'Update Hutbe Page: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hutbe Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hutbe-page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
