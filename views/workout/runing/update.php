<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Runing */

$this->title = 'Редактировать: ' . $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Пробежки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->date, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="runing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
