<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\notes\Categories;

/* @var $this yii\web\View */
/* @var $searchModel app\models\notes\NotesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заметки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notes-index">

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

//             'id',
//             'category.name',
            [
                'attribute' => 'category.name',
                'value' => 'category.name',
                'filter' => Html::activeDropDownList(
                    $searchModel, 
                    'categoryID', 
                    ArrayHelper::map(Categories::find()->select(['id', 'name'])->asArray()->orderBy(['name' => SORT_ASC])->all(), 
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
            'description:html',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
