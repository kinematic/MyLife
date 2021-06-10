<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\workout\RepetitionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Repetitions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repetitions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Repetitions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'placeid',
            'exerciseid',
            'repetitions',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
