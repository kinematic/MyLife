<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\communal\ElectroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Электросчётчик';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить показания', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date',
            'indications',
			'consumption',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
// print_r($this);

?>
</div>
