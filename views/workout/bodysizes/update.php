<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Bodysizes */

$this->title = 'Редактирование: ' . $model->partofbody->name;
$this->params['breadcrumbs'][] = ['label' => 'Замеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->partofbody->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="bodysizes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
