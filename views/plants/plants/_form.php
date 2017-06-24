<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\plants\Species;

/* @var $this yii\web\View */
/* @var $model app\models\plants\Plants */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plants-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plantspeciesid')->dropDownList(ArrayHelper::map(Species::find()->all(), 'id', 'name'), ['prompt'=>'']) ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php
    if(isset($model->image) && file_exists(Yii::getAlias('@webroot', $model->image)))
    { 
        echo Html::img($model->image, ['class'=>'img-responsive']);
        echo $form->field($model,'del_img')->checkBox(['class'=>'span-1']);
    }
    ?>
    <?//= $form->field($model, 'file')->fileInput() ?>

    <?php ActiveForm::end(); ?>

</div>
