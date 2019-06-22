<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Places */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Места', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="places-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
