<?php

use yii\helpers\Html;
use yii\helpers\Url;
use sjaakp\taggable\TagEditor;

/* @var $this yii\web\View */
/* @var $model app\models\recapitulation\People */

$this->title = 'Update People: ' . $model->people_id;
$this->params['breadcrumbs'][] = ['label' => 'Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->people_id, 'url' => ['view', 'id' => $model->people_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="people-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
