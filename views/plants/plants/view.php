<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Carousel;

/* @var $this yii\web\View */
/* @var $model app\models\plants\Plants */

$this->title = $model->species->name . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Расстения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plants-view">

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
    
    <?php $carousel = [
        [
            'content' => '<img src="/uploads/Golden Selebration_1.jpg"/>, "style"=>"width: 30%"',
            'caption' => '<h1>Заголовок</h1><p>Какой-то дополнительный текст</p><p><a href="/article/link/1" class="btn btn-primary">Подробнее <span class="glyphicon glyphicon-chevron-right"></a></p>',
            'options' => ['style' => 'height:50%;']
        ],
    ] ?>

    <?= Carousel::widget([
        'items' => $carousel,
        'options' => ['class' => 'carousel slide', 'data-interval' => '12000', 'style' => 'height: 100px'],
        'controls' => [
        '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
        '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
        ]
    ]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//             'id',
//             'plantspeciesid',
            'species.name',
            'name',
            'description:ntext',
        ],
    ]) ?>

</div>
