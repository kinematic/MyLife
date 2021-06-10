<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\workout\Approaches */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Подходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approaches-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php 
//     echo GridView::widget([
//         'dataProvider' => $dataProvider,
//         'columns' => [
//             ['class' => 'yii\grid\SerialColumn'],
//             'exercise.name',
//             'approach1:text:1',
//             'approach2:text:2',
//             'approach3:text:3',
//             'approach4:text:4',
//             'approach5:text:5',
//             'approach6:text:6',
// 			'coefficient:text:q',
// //             ['class' => 'yii\grid\ActionColumn'],
//         ],
//     ]); 
    ?>

</div>
