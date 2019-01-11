<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\notes\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\notes\Notes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notes-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'categoryid')->dropDownList(ArrayHelper::map(Categories::find()->OrderBy('name')->all(),
                'id', 'name'))->label('категория ' . 
                Html::a(
                '<span class="glyphicon glyphicon-plus"></span>', 
                ['notes/categories/create', 'Notes[id]' => $model->id], 
                ['title' => Yii::t('yii', 'добавить'), 'name' => 'notes']),['class'=>'label-class']) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
