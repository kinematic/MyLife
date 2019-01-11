<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\bookkeeping\Catalog */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ценности', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	<div class="row">
		<div class="col-md-5">
		    <?= DetailView::widget([
		        'model' => $model,
		        'attributes' => [
		//             'id',
		            'name',
		            'description:ntext',
		        ],
		    ]) ?>
		</div>
	</div>

<?php
	$dataProvider = new ArrayDataProvider([
        'allModels' => $model->record,
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
		'caption' => '<h3 style="display:inline">Проводки</h3>',
        'showOnEmpty' => true,
        'emptyText' => '',
//         'layout' => "{items}",
        'columns' => [
            'date',
//             'catalog.name',

            'description',
			'money',
            'quantity',
	        [
				'class' => 'yii\grid\ActionColumn',
				'header' => 'Действия',
				'headerOptions' => ['style' => 'color:#337ab7'],
				'template' => '{view} {update} {delete}',
				'buttons' => [
				'view' => function ($url, $model) {
					return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
						'title' => Yii::t('app', 'посмотреть'),
						'target' => '_blank',
					]);
				},

				'update' => function ($url, $model) {
					return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
						'title' => Yii::t('app', 'редактировать'),
						'target' => '_blank',
					]);
				},
				'delete' => function ($url, $model) {
					return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
						'title' => Yii::t('app', 'удалить'),
						'target' => '_blank',
					]);
				}

				],
				'urlCreator' => function ($action, $model, $key, $index) {
					if ($action === 'view') {
						$url ='index.php?r=bookkeeping/records/view&id=' . $model['id'];
						return $url;
					}

					if ($action === 'update') {
						$url ='index.php?r=bookkeeping/records/update&id=' . $model['id'];
						return $url;
					}
					if ($action === 'delete') {
						$url ='index.php?r=bookkeeping/records/delete&id=' . $model['id'];
						return $url;
					}

				}
			],
		],
		

    ]) ?>
	
</div>
