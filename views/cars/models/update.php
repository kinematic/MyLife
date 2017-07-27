<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\cars\Models */

$this->title = 'Редактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Модели автомобилей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="models-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
