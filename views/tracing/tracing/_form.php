<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\tracing\Tags;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\tracing\Tracing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tracing-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class='row'>
        <div class='col-md-4'>
            <?= $form->field($model, 'model_id')->hiddenInput()->label(false) ?>

			<?= $form->field($model, 'tag_name')->widget(
				AutoComplete::className(), [            
					'clientOptions' => [
						'placeholder' => 'движение',
						'source' => Tags::find()
							->select(['name as value', 'name as label'])
							->orderBy('name')
							->asArray()
							->all(),
					],
					'options'=>[
						'autofocus' => 'autofocus',
						'class'=>'form-control',
						'tabindex' => '1'
					]
				]);
			?>
			<?php
			$rows = $model->Tagsorderlist;
			$array = array('ord' => $model->ord,
			               'name' => $model->ord);
			array_unshift($rows, $array);
			?>
			<?= $form->field($model, 'ord', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])
				->dropDownList(ArrayHelper::map(
				$rows, 'ord', 'name')) ?>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
