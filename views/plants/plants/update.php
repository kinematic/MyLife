<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\plants\Plants */

$this->title = $model->species->name . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Расстения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="plants-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
