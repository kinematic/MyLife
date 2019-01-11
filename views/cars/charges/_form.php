<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\cars\Road;
//use app\models\fuel\ChargesSearch;

/* @var $this yii\web\View */
/* @var $model app\models\fuel\Charges */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="charges-form">

    <?php $form = ActiveForm::begin(); ?>
	<?php 
		if(!$model->road_id) $model->road_id = Road::find()->max('id');
		if(!$model->date) $model->date = date('Y-m-d');
		if(!$model->charge) $model->charge = 30;
	?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'road_id')->dropDownList(ArrayHelper::map(Road::find()->orderBy(['date' => SORT_DESC])->all(), 'id', 'roadname'), ['prompt'=>'']) ?>
        </div>
        <div class="col-md-4">
    
            <?= $form->field($model, 'date')->widget(
                    DatePicker::className(), [
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]); 
                ?>   
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'charge')->textInput() ?>
        </div>
        <div class="col-md-2">    
            <?= $form->field($model, 'odometer')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
