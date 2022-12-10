<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Hutbe $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hutbes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hutbe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tarih',
            'hafta',
        ],
    ]) ?>

    <h3>Seiten</h3>
    <table class="table table-bordered">
        <tr>
            <th>Seite</th>
            <th>DE</th>
            <th>TR</th>
            <th>AR</th>
        </tr>
        <?php foreach ($model->hutbePages as $key => $page): ?>
            <tr>
                <td><?= $page->page_number + 1 ?></td>
                <td><?= $page->de ?></td>
                <td><?= $page->tr ?></td>
                <td><?= $page->ar ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
