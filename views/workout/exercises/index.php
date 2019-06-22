<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\workout\ExercisesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Упражнения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercises-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<div class='row'>
		<div class='col-md-4'>
		    <?= GridView::widget([
		        'dataProvider' => $dataProvider,
		        'filterModel' => $searchModel,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],

		//             'id',
		            'name',

		            ['class' => 'yii\grid\ActionColumn'],
		        ],
		    ]); ?>
		</div>
	</div>
</div>
