<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Approaches */
// var_dump($model->exercise);die();
$this->title = $model->exercise->name;
$this->params['breadcrumbs'][] = ['label' => 'Подходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="approaches-view">

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
		<?= Html::a('Добавить еще', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<div class='row'>
		<div class='col-md-6'>
		    <?= DetailView::widget([
		        'model' => $model,
		        'attributes' => [
// 		            'id',
		            'date',
		            'place.name',
		            'exercise.name',
		            'approach1',
		            'approach2',
		            'approach3',
		            'approach4',
		            'approach5',
		            'approach6',
					'coefficient',
		        ],
		    ]) ?>
		</div>
	</div>
</div>
