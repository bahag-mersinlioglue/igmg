<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Hutbe $model */
/** @var \app\models\HutbePage[] $pages */

$this->title = 'Update Hutbe: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hutbes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hutbe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pages' => $pages,
    ]) ?>

</div>
