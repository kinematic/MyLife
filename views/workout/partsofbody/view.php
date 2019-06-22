<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Partsofbody */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Части тела', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partsofbody-view">

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
		<div class='col-md-4'>
		    <?= DetailView::widget([
		        'model' => $model,
		        'attributes' => [
		//             'id',
		            'name',
		            'measurement',
		        ],
		    ]) ?>
		</div>
	</div>
</div>
