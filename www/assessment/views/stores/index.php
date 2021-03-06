<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stores-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Stores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'store_id',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) { return Html::a($model->name, ['/stores/view?id='.$model->store_id]);},
            ],
            'location',
            'owner',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
