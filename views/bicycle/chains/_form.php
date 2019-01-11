<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\bicycle\Chains */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chains-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-md-4">
		    <?= $form->field($model, 'chainid')->textInput() ?>

		    <?= $form->field($model, 'bikeid')->textInput() ?>

				<?= $form->field($model, 'date')->widget(
		            DatePicker::className(), [
		                'clientOptions' => [
		                    'autoclose' => true,
		                    'format' => 'yyyy-mm-dd'
		                ]
			        ]); 
		        ?>
		    <?= $form->field($model, 'size')->textInput() ?>
	    </div>
	</div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
