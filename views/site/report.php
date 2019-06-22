<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;


$this->title = 'Отчет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-report">
    <h1><?= Html::encode($this->title) ?></h1>
	<p>Бег: <b><?= Html::encode($runing->duration) ?> мин</b></p>

	<div class='row'>
		<div class='col-md-6'>
			<?= GridView::widget([
		        'dataProvider' => $dataProvider,
		        'columns' => [
		            'name:text:название',
		            'approaches:text:повторы, раз',
		        ],
		    ]); ?>
		</div>
	</div>

	<div class='row'>
		<div class='col-md-6'>
		    <?= DetailView::widget([
		        'model' => $weight,
		        'attributes' => [
					[
						'label' => 'вес, кг',
						'value' => function ($data) {
							return round($data->value, 1);
						}
					],
		        ],
		    ]) ?>
		    <?= DetailView::widget([
		        'model' => $runing,
		        'attributes' => [
// 					[
// 						'label' => 'бег, мин',
// 						'value' => value, 
// 					],
// 'value',
'duration',
		        ],
		    ]) ?>
		</div>
	</div>

</div> 
