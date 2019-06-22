<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Approaches */

$this->title = 'Редактирование: ' . $model->exercise->name;
$this->params['breadcrumbs'][] = ['label' => 'Подходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->exercise->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="approaches-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
