<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\cars\Cars;

/* @var $this yii\web\View */
/* @var $model app\models\fuel\Road */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="road-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php if (!$model->date) $model->date = date('Y-m-t'); ?>
    
    <?= $form->field($model, 'date')->widget(
            DatePicker::className(), [
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); Yii::warning(print_r($model, true));?>
        
    <?php if (!$model->carid) $model->carid = 1; ?>
        
    <?= $form->field($model, 'carid')->dropDownList(ArrayHelper::map(Cars::find()->all(), 'id', 'carname'), ['prompt'=>'']) ?>
    
    <?php if (!$model->odometer) $model->odometer = $model->prevval['odometer']; ?>

    <?= $form->field($model, 'odometer')->textInput() ?>
    
    <?php if (!$model->tank) $model->tank = $model->prevval['tank']; ?>

    <div class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'tank')->textInput() ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'scaleTank')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
