<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\vw\Regulations */

$this->title = 'Редактирование регламента: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Регламент работ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="regulations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
