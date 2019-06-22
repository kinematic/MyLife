<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\workout\Partsofbody;
use app\models\workout\Places;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Bodysizes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bodysizes-form">

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
			<?= $form->field($model, 'placeid')->dropDownList(ArrayHelper::map(Places::find()
				->orderBy('name')
				->all(), 'id', 'name'));
			?>
			<?= $form->field($model, 'partid')->dropDownList(ArrayHelper::map(Partsofbody::find()
				->orderBy('name')
				->all(), 'id', 'name'));
			?>

		    <?= $form->field($model, 'value')->textInput() ?>
		</div>
	</div>    

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
