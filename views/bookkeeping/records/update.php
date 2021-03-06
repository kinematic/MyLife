<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\bookkeeping\Records */

$this->title = 'Редактирование: ' . $model->recordname;
$this->params['breadcrumbs'][] = ['label' => 'Проводки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recordname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="records-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
