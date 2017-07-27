<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\cars\Models */

$this->title = 'Добавление модели автомобиля';
$this->params['breadcrumbs'][] = ['label' => 'Модели автомобилей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
