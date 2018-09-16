<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\tracing\Groups */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Группы движений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
