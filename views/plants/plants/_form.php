<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\plants\Species;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\plants\Plants */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plants-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
	    <div class="col-sm-6">
		<?= $form->field($model, 'plantspeciesid')
		->dropDownList(ArrayHelper::map(Species::find()
		->orderBy('name')
		->all(), 'id', 'name'), ['prompt'=>''])->label('вид расстения ' . Html::a('<span class="glyphicon glyphicon-plus"></span>', ['plants/species/create', 'Charges[road_id]' => $model->id], ['title' => Yii::t('yii', 'добавить')])); ?>
		<?= $form->field($model, 'name')->textInput() ?>
		<?= $form->field($model, 'landing')->widget(
            DatePicker::className(), [
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);  ?>
		</div>
	    <div class="col-sm-6">
		<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
		</div>
	</div>

    
    
    
    

    

	<?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?php $dataProvider = new ArrayDataProvider([
        'allModels' => $model->pictures,
        'key' => 'id',
//         'sort' => [
//             'attributes' => ['date'],
//             'defaultOrder' => [
//                 'date' => SORT_DESC,
//             ],
//         ],
    ]);

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'caption' => '<h3 style="display:inline">фотографии</h3>' . ' ' . Html::a('<span class="glyphicon glyphicon-plus"></span>', ['cars/charges/create', 'Charges[road_id]' => $model->id], ['title' => Yii::t('yii', 'добавить')]),
        'showOnEmpty' => false,
        'emptyText' => '',
        'layout' => "{items}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'header' => 'удалить',
                'name' => 'Plants[delImg]',
            ],
            [
                'class' => 'yii\grid\RadioButtonColumn',
                'header' => 'главная',
                'name' => 'Plants[pictureid]',
                'radioOptions' => function ($data) {
                    return [
	                    'value' => $data->id,
						'checked' => $data->id == $data->mainimage['pictureid'],
                    ];
                }
            ],
            [            
                'attribute'=>'name',
                'format' => 'raw',    
                'value' => function($data) {
                    return Html::img('/images/thumbs/' . $data->name);
                },        
            ],
            'name',
        ]

    ]) ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php
//     if(isset($model->image) && file_exists(Yii::getAlias('@webroot', $model->image)))
//     { 
//         echo Html::img($model->image, ['class'=>'img-responsive']);
//         echo $form->field($model,'del_img')->checkBox(['class'=>'span-1']);
//     }
    ?>
    

    <?php ActiveForm::end(); ?>

</div>
