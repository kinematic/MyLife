<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\fuel\RoadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Путёвки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date',
            [
                'attribute'=> 'carname', 
                'contentOptions' =>['style' => 'white-space: nowrap']
            ],
            'fuelConsumption',
            ['class' => 'yii\grid\ActionColumn', 'contentOptions' =>['style' => 'white-space: nowrap']],
        ],
    ]); ?>
</div>
