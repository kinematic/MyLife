<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\plants\Pictures;
use app\models\plants\Species;

/* @var $this yii\web\View */
/* @var $searchModel app\models\plants\PlantsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расстения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plants-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [            
                'attribute' => 'file',
                'format' => 'raw',    
                'value' => function($data) {
                $image = Pictures::find()->select('name')
	                ->where(['plantid' => $data->id, 'main' => 1])->asArray()->one();
//                     return Html::img('/images/thumbs/' . $image['name']);
					return Html::a(Html::img('/images/thumbs/' . $image['name']), ['plants/plants/view', 'id' => $data->id]);
                },        
            ],
//             'species.name',
            [
                'attribute' => 'species.name',
                'value' => 'species.name',
                'filter' => Html::activeDropDownList(
                    $searchModel, 
                    'speciesID', 
                    ArrayHelper::map(Species::find()->select(['id', 'name'])->asArray()->orderBy(['name' => SORT_ASC])->all(), 
                    'id',
					'name'
					),
                    [
                        'class'=>'form-control',
                        'prompt' => '',
//                         'options' => ['RBS' => ['selected' => 'selected']]
                    ])
            ],
            'name',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions' =>['style' => 'white-space: nowrap']],
        ],
    ]); 
    ?>
</div>
