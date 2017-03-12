<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\fuel\ChargesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заправки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="charges-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить заправку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'roadname',
            'date',
            'charge',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
