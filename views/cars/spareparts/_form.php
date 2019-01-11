<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\cars\Models;

/* @var $this yii\web\View */
/* @var $model app\models\cars\Spareparts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spareparts-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-sm-6">

			<?= $form->field($model, 'modelid')->dropDownList(ArrayHelper::map(Models::find()->all(), 'id', 'name')) ?>

		    <?= $form->field($model, 'partcode')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-sm-6">

			<?= $form->field($model, 'information')->textarea(['rows' => 6]) ?>
		</div>
	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
