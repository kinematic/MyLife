<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\cars\ModelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Модели автомобилей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//             'id',
            'name',
//             'license',
            'tank',
            'division',
            'consumption',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions' =>['style' => 'white-space: nowrap']],
        ],
    ]); ?>
</div>
