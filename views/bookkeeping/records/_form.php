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
		                ]
		        ]); 
        ?>
		<?= $form->field($model, 'catalogid')->dropDownList(ArrayHelper::map(Catalog::find()->addOrderBy('name')->all(), 'id', 'name'), ['prompt'=>'']) ?>
	    
		
	</div>

    <div class="col-sm-4">
		<?= $form->field($model, 'typeid')->dropDownList(array(1 => 'приход', 2 => 'расход')) ?>
	    <?= $form->field($model, 'quantity')->textInput() ?>
		
		
	</div>
	<div class="col-sm-4">
		<?= $form->field($model, 'accountid')->dropDownList(ArrayHelper::map(Accounts::find()->addOrderBy('name')->all(), 'id', 'name'), ['prompt'=>'']) ?>
		<?= $form->field($model, 'money')->textInput(['maxlength' => true]) ?>
	</div>
</div>
    
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
