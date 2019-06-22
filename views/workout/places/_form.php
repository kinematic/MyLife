<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Places */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="places-form">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <div class='row'>
        <div class='col-md-6'>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'descrition')->textarea(['rows' => 6]) ?>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
