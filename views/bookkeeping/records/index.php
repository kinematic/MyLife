<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\components\Balance;

/* @var $this yii\web\View */
/* @var $searchModel app\models\bookkeeping\RecordsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Проводки';
$this->params['breadcrumbs'][] = $this->title;
$this->params['balance'] = 10;
?>
<div class="records-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= '<p><b>Дебет:</b> ' . $searchModel->totalDebet . ', <b>Кредит:</b> ' . $searchModel->totalCredit . ', <b>Баланс:</b> ' . ($searchModel->totalDebet - $searchModel->totalCredit);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//         'filterModel' => $searchModel,
        'emptyCell' => '',
        'showFooter' => true,
        'columns' => [
//             ['class' => 'yii\grid\SerialColumn'],
            'date',
            'catalog.name',

            'description',
			'money',
            'quantity',
//             [
//                 'attribute' => 'операция',
// // 				'footer' => $searchModel->totalDebet,
//                 'value' => function($data) {
//                     if($data->typeid == 1) return round($data->money * $data->quantity, 2);
//                     elseif($data->typeid == 2) return - round($data->money * $data->quantity, 2);
//                 }
//                 
//             ],
//             [
//                 'attribute' => 'дебет',
// 				'footer' => $searchModel->totalDebet,
//                 'value' => function($data) {
//                     if($data->typeid == 1) return round($data->money * $data->quantity, 2);
//                     elseif($data->typeid == 2) return null;
//                 }
//                 
//             ],
//             [
//                 'attribute' => 'кредит',
// 				'footer' => $searchModel->totalCredit,
//                 'value' => function($data) {
//                     if($data->typeid == 2) return round($data->money * $data->quantity, 2);
//                     elseif($data->typeid == 1) return null;
//                 }
//                 
//             ],
// 			[
// 				'attribute' => 'balance',
// 				'value' => function($data) {
//                     return round($data->balance, 0);
// 				}
// 			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
//     Yii::warning(print_r($this->params, true));
    ?>
</div>
