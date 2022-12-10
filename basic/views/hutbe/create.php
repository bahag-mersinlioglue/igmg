<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Hutbe $model */
/** @var app\models\HutbePage[] $pages */

$this->title = 'Create Hutbe';
$this->params['breadcrumbs'][] = ['label' => 'Hutbes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hutbe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pages' => $pages,
    ]) ?>

</div>
