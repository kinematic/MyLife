<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\workout\ApproachesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approaches-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'exerciseid') ?>

    <?= $form->field($model, 'approache1') ?>

    <?= $form->field($model, 'approache2') ?>

    <?php // echo $form->field($model, 'approach3') ?>

    <?php // echo $form->field($model, 'approach4') ?>

    <?php // echo $form->field($model, 'approach5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
