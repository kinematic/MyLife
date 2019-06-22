<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\workout\Exercises;
use app\models\workout\Places;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Approaches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approaches-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class='row'>
		<div class='col-md-3'>
			<?= $form->field($model, 'date')->widget(
		            DatePicker::className(), [
		                'clientOptions' => [
		                    'autoclose' => true,
		                    'format' => 'yyyy-mm-dd'
		                ]
		        ]); 
	        ?>
		</div>
        <div class='col-md-3'>
			<?= $form->field($model, 'placeid')->dropDownList(ArrayHelper::map(Places::find()
				->orderBy('name')
				->all(), 'id', 'name'));
			?>
		</div>
		<div class='col-md-3'>
			<?= $form->field($model, 'exerciseid')->dropDownList(ArrayHelper::map(Exercises::find()
				->orderBy('name')
				->all(), 'id', 'name'));
			?>
		</div>
	</div>
	<div class='row'>
			<div class='col-md-2'>
			    <?= $form->field($model, 'approach1')->textInput(['type' => 'number', 'min' => 0, 'max' => 50]) ?>
			</div>
			<div class='col-md-2'>
			    <?= $form->field($model, 'approach2')->textInput(['type' => 'number', 'min' => 0, 'max' => 50]) ?>
			</div>
			<div class='col-md-2'>
			    <?= $form->field($model, 'approach3')->textInput(['type' => 'number', 'min' => 0, 'max' => 50]) ?>
			</div>
			<div class='col-md-2'>
			    <?= $form->field($model, 'approach4')->textInput(['type' => 'number', 'min' => 0, 'max' => 50]) ?>
			</div>
			<div class='col-md-2'>
			    <?= $form->field($model, 'approach5')->textInput(['type' => 'number', 'min' => 0, 'max' => 50]) ?>
			</div>
		</div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
