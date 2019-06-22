<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Runing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="runing-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class='row'>
		<div class='col-md-4'>
		    <?= $form->field($model, 'date')->widget(
		            DatePicker::className(), [
		                'clientOptions' => [
		                    'autoclose' => true,
		                    'format' => 'yyyy-mm-dd'
		                ]
		        ]); 
	        ?>
		</div>
		<div class='col-md-4'>
		    <?= $form->field($model, 'distance')->textInput(['maxlength' => true]) ?>
		</div>
		<div class='col-md-4'>
		    <?= $form->field($model, 'duration')->textInput(['maxlength' => true]) ?>
	   </div>
   </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
