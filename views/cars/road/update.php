<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\fuel\Road */

$this->title = 'Путёвка до ' . $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Путёвки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Путёвка до ' . $model->date, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="road-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
