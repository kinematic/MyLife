<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tracing\TracingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tracings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tracing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tracing', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'trace_id',
            'model_id',
            'tag_id',
            'ord',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
