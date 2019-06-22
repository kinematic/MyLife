<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Exercises */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exercises-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class='row'>
		<div class='col-md-4'>
		    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
		</div>
	</div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
