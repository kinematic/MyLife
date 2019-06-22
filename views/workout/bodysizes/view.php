<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Bodysizes */

$this->title = $model->partofbody->name;
$this->params['breadcrumbs'][] = ['label' => 'Замеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bodysizes-view">

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
		<div class='col-md-4'>
		    <?= DetailView::widget([
		        'model' => $model,
		        'attributes' => [
		//             'id',
					'date',
		            'partofbody.name',
		            'value',
		        ],
		    ]) ?>
		</div>
	</div>
</div>
