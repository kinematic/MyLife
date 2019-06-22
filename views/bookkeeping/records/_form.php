<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use app\models\bookkeeping\Accounts;
use app\models\bookkeeping\Catalog;

/* @var $this yii\web\View */
/* @var $model app\models\bookkeeping\Records */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="records-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-sm-4">
	    <?= $form->field($model, 'date')->widget(
		            DatePicker::className(), [
		                'clientOptions' => [
		                    'autoclose' => true,
		                    'format' => 'yyyy-mm-dd'
		                ],
						'options'=>[
							'autofocus' => 'autofocus',
							'class'=>'form-control',
							'tabindex' => '1'
						]
		        ]); 
        ?>
		<?= $form->field($model, 'catalogid', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '4']])->dropDownList(ArrayHelper::map(Catalog::find()->addOrderBy('name')->all(), 'id', 'name'), ['prompt'=>'']) ?>
	    
		
	</div>

    <div class="col-sm-4">
		<?= $form->field($model, 'typeid', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])->dropDownList(array(1 => 'приход', 2 => 'расход')) ?>
	    <?= $form->field($model, 'quantity', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '5']])->textInput() ?>
		
		
	</div>
	<div class="col-sm-4">
		<?= $form->field($model, 'accountid', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '3']])->dropDownList(ArrayHelper::map(Accounts::find()->addOrderBy('name')->all(), 'id', 'name'), ['prompt'=>'']) ?>
		<?= $form->field($model, 'money', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '6']])->textInput(['maxlength' => true]) ?>
	</div>
</div>
    
    <?= $form->field($model, 'description', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '7']])->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'tabindex' => '8']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
