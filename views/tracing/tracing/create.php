<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\tracing\Tracing */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Движения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tracing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
