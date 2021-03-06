<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use sjaakp\taggable\TagEditor;

/* @var $this yii\web\View */
/* @var $model app\models\tracing\Groups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groups-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="row">
		<div class="col-md-6">

		    <?= $form->field($model, 'date')->textInput() ?>

		    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		 </div>
		 <div class="col-md-6">  
 
		    <?= $form->field($model, 'editorTags')->widget(TagEditor::className(), [
		        'tagEditorOptions' => [
		            'autocomplete' => [
		                'source' => Url::toRoute(['tracing/tags/suggest'])
		            ],
		        ]
		    ]) ?>

		</div>
	</div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
