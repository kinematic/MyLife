<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\plants\Species */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Виды расстений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="species-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
