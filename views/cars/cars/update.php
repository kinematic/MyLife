<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\cars\Cars */

$this->title = 'Редактирование: ' . $model->model->name . ' ' . $model->license;
$this->params['breadcrumbs'][] = ['label' => 'Автомобили', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model->name . ' ' . $model->license, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="cars-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
