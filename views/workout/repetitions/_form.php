<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Repetitions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repetitions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'placeid')->textInput() ?>

    <?= $form->field($model, 'exerciseid')->textInput() ?>

    <?= $form->field($model, 'repetitions')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
