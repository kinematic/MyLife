<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Runing */

$this->title = $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Пробежки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="runing-view">

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
    </p>
	<div class='row'>
		<div class='col-md-6'>
		    <?= DetailView::widget([
		        'model' => $model,
		        'attributes' => [
		//             'id',
		            'date',
		            'distance',
		            'duration',
		        ],
		    ]) ?>
		</div>
	</div>
</div>
