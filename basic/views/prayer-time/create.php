<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PrayerTime $model */

$this->title = 'Create Prayer Time';
$this->params['breadcrumbs'][] = ['label' => 'Prayer Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prayer-time-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
