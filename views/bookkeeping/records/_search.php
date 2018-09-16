<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\models\bookkeeping\Accounts;

/* @var $this yii\web\View */
/* @var $model app\models\bookkeeping\RecordsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="records-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'type' => ActiveForm::TYPE_INLINE,
    ]); ?>
    
    <?= $form->field($model, 'typeid')->dropDownList(array('1' => 'приход', '2' => 'расход'), 
            [
                    'prompt' => '', 
// 			'options' => ['RBS' => ['selected' => 'selected']],
            ]) 
    ?>
    
    <?= $form->field($model, 'accountid')->dropDownList(ArrayHelper::map(Accounts::find()->addOrderBy('name')->all(), 'id', 'name'), 
            [
                    'prompt' => '', 
// 			'options' => ['RBS' => ['selected' => 'selected']],
            ]) 
    ?>    
    
    <?= $form->field($model, 'catalogName'); ?>
    
    <?= $form->field($model, 'dateBegin')->widget(
        DatePicker::className(), [
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]); 
    ?>
    
    <?= $form->field($model, 'dateEnd')->widget(
        DatePicker::className(), [
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]); 
    ?>
    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Очистить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
