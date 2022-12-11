<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Hadis $model */

$this->title = 'Create Hadis';
$this->params['breadcrumbs'][] = ['label' => 'Hadis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hadis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
