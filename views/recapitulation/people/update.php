<?php

use yii\helpers\Html;
use yii\helpers\Url;
use sjaakp\taggable\TagEditor;

/* @var $this yii\web\View */
/* @var $model app\models\recapitulation\People */

// $this->title = 'Редактирование: ' . $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="people-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
