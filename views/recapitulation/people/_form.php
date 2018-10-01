<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use sjaakp\taggable\TagEditor;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\models\recapitulation\Secondnames;
use app\models\recapitulation\Patronymicnames;

/* @var $this yii\web\View */
/* @var $model app\models\recapitulation\People */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="people-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-sm-4">
		    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-sm-4">
			<?php
				$model->secondname = $model->sname->name;
			?>
			<?= $form->field($model, 'secondname')->widget(
			    AutoComplete::className(), [            
			        'clientOptions' => [
			            'source' => Secondnames::find()
						    ->select(['name as value', 'name as label', 'id as id'])
						    ->asArray()
						    ->all(),
							'select' => new JsExpression("function( event, ui ) {
							        console.log(ui);
							        $('#people-secondnameid').val(ui.item.id);
							      }"),
			        ],
			        'options'=>[
			            'class'=>'form-control'
			        ]
			    ]);
			?>
			<?= $form->field($model, 'secondnameid')->hiddenInput()->label(false);?>
		</div>
		<div class="col-sm-4">
			<?php
				$model->patronymicname = $model->pname['name'];
			?>
			<?= $form->field($model, 'patronymicname')->widget(
			    AutoComplete::className(), [            
			        'clientOptions' => [
                        'placeholder' => 'выберете отчество',
			            'source' => Patronymicnames::find()
						    ->select(['name as value', 'name as label', 'id as id'])
						    ->asArray()
						    ->all(),
							'autoFill'=>true,
							'minLength'=>'0',
							'select' => new JsExpression("function( event, ui ) {
							        console.log(ui);
							        $('#people-patronymicnameid').val(ui.item.id);
							      }"),
			        ],
			        'options'=>[
			            'class'=>'form-control'
			        ]
			    ]);
			?>
			<?= $form->field($model, 'patronymicnameid')->textInput()->label(false);?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
		    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
		</div>
		<div class="col-sm-6">
		    <?= $form->field($model, 'editorTags')->widget(TagEditor::className(), [
		        'tagEditorOptions' => [
		            'autocomplete' => [
		                'source' => Url::toRoute(['recapitulation/tags/suggest'])
		            ],
		        ]
		    ]) ?>
    		</div>
	</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
