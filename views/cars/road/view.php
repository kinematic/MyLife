<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\fuel\Road */

$this->title = 'Путёвка до ' . $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Путёвки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            //'id',
            //'date',
            [
                'attribute' => 'carname',
                'value' => $model->carname,
            ],
            'odometer',
            'tank',
            //'charges',
            'fullCharge',
            'mileage',
            //'diffVol',
            'fuelConsumption',
            'surplus',
            
        ],
    ]) ?>
    
    <?php

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->charges3,
        'key' => 'id',
        'sort' => [
            'attributes' => ['date'],
            'defaultOrder' => [
                'date' => SORT_DESC,
            ],
        ],
    ]);

    echo GridView::widget([
        'dataProvider' => $dataProvider,
		'caption' => '<h3 style="display:inline">Заправки</h3>' . ' ' . 
		Html::a(
		'<span class="glyphicon glyphicon-plus"></span>', 
		['cars/charges/create', 'Charges[road_id]' => $model->id], 
		['title' => Yii::t('yii', 'добавить'), 'name' => 'charges']),
        'showOnEmpty' => true,
        'emptyText' => '',
        'layout' => "{items}",
        'columns' => [
//             'date:date',
            [
                'attribute' => 'date',
                'value' => function ($data) {
                    return Html::a(Html::encode($data->date), Url::to(['cars/charges/view', 'id' => $data->id, 'road_id' => $data->road_id]));
                },
                'format' => 'raw',
                'label' => 'дата',
            ],
            [
                'attribute' => 'charge',
                'label' => 'заправлено, л',
            ],
			'odometer',
			'nextcharge',
        ]

    ]) ?>

</div>
