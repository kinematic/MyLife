<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\communal\Electro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="electro-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class='row'>
		<div class='col-md-3'>
			<?php if (!$model->date) $model->date = date('Y-m-t'); ?>
		    <?= $form->field($model, 'date')->widget(
	            DatePicker::className(), [
	                'clientOptions' => [
	                    'autoclose' => true,
	                    'format' => 'yyyy-mm-dd'
	                ]
	            ]); ?>
		</div>
	    <div class='col-md-3'>
			<?= $form->field($model, 'indications')->textInput() ?>
		</div>
	</div>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
