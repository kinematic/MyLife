<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\recapitulation\Tags */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	
	    <?php

        $dataProvider = new ArrayDataProvider([
            'allModels' => $model->people,
            'key' => 'people_id',
			'sort' => [
				//'attributes' => ['first_name', 'second_name'],
				'defaultOrder' => [
                    'fullname' => SORT_ASC,
                    //'second_name' => SORT_ASC,
                ],
				'attributes' => [
					'fullname' => [
                        'asc' => ['first_name' => SORT_ASC, 'second_name' => SORT_ASC],
                        'desc' => ['first_name' => SORT_DESC, 'second_name' => SORT_DESC],
                        'default' => SORT_DESC
                   ],
				],
			],
            'pagination' => [
                 'pageSize' => 30,
            ],
        ]);

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
            [
                'attribute' => 'fullname',
                'value' => function ($data) {
                    return Html::a(Html::encode($data->fullname), Url::to(['recapitulation/people/view', 'id' => $data->people_id]));
                },
                'format' => 'raw',
                'contentOptions' =>['style' => 'white-space: nowrap'],
            ],
            'description',
            ]

        ]) 
?>

</div>
