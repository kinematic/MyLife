<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\workout\Partsofbody;
use app\models\workout\Places;

/* @var $this yii\web\View */
/* @var $searchModel app\models\workout\BodysizesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Размеры тела';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bodysizes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<div class='row'>
		<div class='col-md-7'>
		    <?= GridView::widget([
		        'dataProvider' => $dataProvider,
		        'filterModel' => $searchModel,
		        'columns' => [
// 		            ['class' => 'yii\grid\SerialColumn'],

		//             'id',
					'date',
					[
		                'attribute' => 'place.name',
		                'value' => 'place.name',
		                'filter' => Html::activeDropDownList(
		                    $searchModel, 
		                    'placeid', 
		                    ArrayHelper::map(Places::find()->select(['id', 'name'])->asArray()->orderBy(['name' => SORT_ASC])->all(), 
		                    'id',
		                    'name'
		                    ),
		                    [
		                        'class'=>'form-control',
		                        'prompt' => '',
		//                         'options' => ['RBS' => ['selected' => 'selected']]
		                    ])
		            ],
					[
		                'attribute' => 'partofbody.name',
		                'value' => 'partofbody.name',
		                'filter' => Html::activeDropDownList(
		                    $searchModel, 
		                    'partid', 
		                    ArrayHelper::map(Partsofbody::find()->select(['id', 'name'])->asArray()->orderBy(['name' => SORT_ASC])->all(), 
		                    'id',
		                    'name'
		                    ),
		                    [
		                        'class'=>'form-control',
		                        'prompt' => '',
		//                         'options' => ['RBS' => ['selected' => 'selected']]
		                    ])
		            ],
		            'value',

		            ['class' => 'yii\grid\ActionColumn'],
		        ],
		    ]); ?>
		</div>
	</div>
</div>
