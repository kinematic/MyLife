<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Places */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Места', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="places-view">

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
                    'name',
                    'descrition:ntext',
                ],
            ]) ?>
        </div>
    </div>
</div>
