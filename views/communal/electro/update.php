<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\communal\Electro */

$this->title = 'Редактирование показаний: ' . $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Электросчётчик', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->date, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="electro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
