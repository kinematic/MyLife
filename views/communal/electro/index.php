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
	<div class='row'>
		<div class='col-md-4'>
		    <?= GridView::widget([
		        'dataProvider' => $dataProvider,
		        'filterModel' => $searchModel,
		        'columns' => [
		            'date',
		            'indications',
					'consumption',

		            [
						'class' => 'yii\grid\ActionColumn', 
						'contentOptions' => ['style' => 'white-space: nowrap']],
			        ],
		    ]); 
			?>
		</div>
	</div>
</div>
