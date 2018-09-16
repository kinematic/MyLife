<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\plants\Species */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="species-form">

    <?php $form = ActiveForm::begin(); ?>


<div class="row">
	    <div class="col-sm-6">
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
