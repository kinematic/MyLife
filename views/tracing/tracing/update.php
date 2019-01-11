<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tracing\Tracing */

$this->title = 'Update Tracing: ' . $model->trace_id;
$this->params['breadcrumbs'][] = ['label' => 'Tracings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->trace_id, 'url' => ['view', 'id' => $model->trace_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tracing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
