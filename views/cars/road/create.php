<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\cars\Road */

$this->title = 'Создание путёвки';
$this->params['breadcrumbs'][] = ['label' => 'Путёвки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
