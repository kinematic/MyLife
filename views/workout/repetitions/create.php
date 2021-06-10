<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Repetitions */

$this->title = 'Create Repetitions';
$this->params['breadcrumbs'][] = ['label' => 'Repetitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repetitions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
