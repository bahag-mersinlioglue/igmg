<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HutbePage $model */

$this->title = 'Create Hutbe Page';
$this->params['breadcrumbs'][] = ['label' => 'Hutbe Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hutbe-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
