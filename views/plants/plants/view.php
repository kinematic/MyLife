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
	<?php 
    $items = [];
    foreach($pictures as $picture) {
        $items[] =  [
                'content' => Html::img('/images/' . $picture->name),
//                 'caption' => $picture->name,
//                 'options' => ['style' => 'height:100px;'],
            ];
    }

    ?>
    
    <?php $carousel = [
        [
//             'content' => '<img src="/images/Golden Selebration_1.jpg"/>, "style"=>"width: 30%"',
			'content' => '<img src="/images/Golden Selebration_1.jpg"/>',
//             'caption' => '<h1>Заголовок</h1><p>Какой-то дополнительный текст</p><p><a href="/article/link/1" class="btn btn-primary">Подробнее <span class="glyphicon glyphicon-chevron-right"></a></p>',
//             'options' => ['style' => 'height:50%;']
        ],
    ] ?>

    <?= Carousel::widget([
        'items' => $items,
//         'options' => ['class' => 'carousel slide', 'data-interval' => '12000', 'style' => 'height: 100px'],
		'options' => ['class' => 'carousel slide', 'data-interval' => '12000'],
        'controls' => [
        '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
        '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
        ]
    ]); ?>

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
    
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//             'id',
//             'plantspeciesid',
            'species.name',
            'name',
            'landing',
            'description:ntext',
        ],
    ]) ?>

</div>
