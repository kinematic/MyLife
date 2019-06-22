<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\workout\Exercises;
use app\models\workout\Places;

/* @var $this yii\web\View */
/* @var $searchModel app\models\workout\ApproachesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подходы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approaches-index">

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
                'attribute' => 'exercise.name',
                'value' => 'exercise.name',
                'filter' => Html::activeDropDownList(
                    $searchModel, 
                    'exerciseid', 
                    ArrayHelper::map(Exercises::find()->select(['id', 'name'])->asArray()->orderBy(['name' => SORT_ASC])->all(), 
                    'id',
                    'name'
                    ),
                    [
                        'class'=>'form-control',
                        'prompt' => '',
//                         'options' => ['RBS' => ['selected' => 'selected']]
                    ])
            ],
//             'approach1',
//             'approach2',
//             'approach3',
//             'approach4',
//             'approach5',
			'coefficient',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
