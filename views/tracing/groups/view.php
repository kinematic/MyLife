<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\tracing\Groups */

$this->title = $model->date . ' - ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Группы движений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groups-view">

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
    <div class='row'>
        <div class='col-md-5'>
            <?php
            $dataProvider = new ArrayDataProvider([
                'allModels' => $model->tags,
                'key' => 'id',
            ]);

            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'caption' => '<h3 style="display:inline">Действия</h3>' . ' ' . 
                Html::a(
                '<span class="glyphicon glyphicon-plus"></span>', 
                ['tracing/tracing/create', 'Tracing[model_id]' => $model->id, 'Tracing[ord]' => $model->maxord + 1], 
                ['title' => Yii::t('yii', 'добавить'), 'name' => 'Действия', 'accesskey' => 'a']),
                'showOnEmpty' => true,
                'emptyText' => '',
//                 'layout' => "{items}",
                'columns' => [
//                     ['class' => 'yii\grid\SerialColumn'],
					'ord:text:#',
                    'name:text:название',
                    [
                        'class' => 'yii\grid\ActionColumn',
//                         'header' => 'Действия',
//                         'headerOptions' => ['style' => 'color:#337ab7'],
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => Yii::t('app', 'посмотреть'),
//                                 'target' => '_blank',
                            ]);
                        },

                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('app', 'редактировать'),
//                                 'target' => '_blank',
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'удалить'),
//                                 'target' => '_blank',
                                'data-method' => 'post',
                            ]);
                        }

                        ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'view') {
                                $url ='index.php?r=tracing/tracing/view&id=' . $model['id'];
                                return $url;
                            }

                            if ($action === 'update') {
                                $url ='index.php?r=tracing/tracing/update&id=' . $model['id'];
                                return $url;
                            }
                            if ($action === 'delete') {
                                $url ='index.php?r=tracing/tracing/delete&id=' . $model['id'];
                                return $url;
                            }

                        }
                    ],
                ]

            ]) ?>
        </div>
    </div>    

</div>
