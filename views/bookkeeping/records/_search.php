<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
// use kartik\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\models\bookkeeping\Accounts;
use app\models\bookkeeping\Catalog;

/* @var $this yii\web\View */
/* @var $model app\models\bookkeeping\RecordsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="records-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
//         'type' => ActiveForm::TYPE_INLINE,
    ]); ?>
    
	<div class="row">
		<div class="col-md-2">
		    <?= $form->field($model, 'typeid')->dropDownList(array('1' => 'приход', '2' => 'расход'), ['prompt' => ''])->label(false) ?>
		</div>
		<div class="col-md-3">
		    <?= $form->field($model, 'catalogName')->widget(
				AutoComplete::className(), [            
						'clientOptions' => [
							'source' => Catalog::find()->select(['name as value', 'name as label'])->asArray()->all(),
						],
						'options'=>[
							'class'=>'form-control'
						]
					])->label(false); ?>
		</div>
		<div class="col-md-3">
			<?= $form->field($model, 'dateBegin')->widget(
		        DatePicker::className(), [
		            'clientOptions' => [
		                'autoclose' => true,
		                'format' => 'yyyy-mm-dd'
		            ]
		    ])->label(false); 
		    ?>
		</div>
		<div class="col-md-4">
		    <div class="form-group">
		        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
		        <?= Html::resetButton('Очистить', ['class' => 'btn btn-default']) ?>
				<?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
				
		    </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
		    <?= $form->field($model, 'accountid')->dropDownList(ArrayHelper::map(Accounts::find()->addOrderBy('name')->all(), 'id', 'name'), ['prompt' => ''])->label(false) ?>    
		</div>   
		<div class="col-md-3">
		    <?= $form->field($model, 'description')->label(false); ?>
		</div>
	    <div class="col-md-3">
		    <?= $form->field($model, 'dateEnd')->widget(
		        DatePicker::className(), [
		            'clientOptions' => [
		                'autoclose' => true,
		                'format' => 'yyyy-mm-dd'
		            ]
		    ])->label(false); 
		    ?>
		</div>
		<div class="col-md-4">
			
		</div>
	</div>
    <?php ActiveForm::end(); ?>

</div>
