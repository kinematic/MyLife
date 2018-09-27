<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
    <?php 
// 		$this->balance = 10;
        $total = 0;
// Yii::warning(print_r($searchModel, true));

$models = $dataProvider->getModels();
// print_r($models);
        foreach ($models as $item) {
//             Yii::warning(print_r($item, true));
            $total += $item['money'] * $item['quantity'];
// 			$total += $item->money;
        }

    ?>

    <?= '<p>Дебет: ' . $sumDebit . ', Кредит: ' . $sumCredit . ', Баланс: ' . ($sumDebit - $sumCredit);?>

    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//         'filterModel' => $searchModel,
        'emptyCell' => '',
        'showFooter' => true,
        'columns' => [
//             ['class' => 'yii\grid\SerialColumn'],

//             'id',
            'date',
//             'typeid',
//             'operation',
//             'account.name',
            'catalog.name',
//             'money',
            [
                'attribute' => 'money',
                'footer' => $total,
            ],
            'description',
            'quantity',
            [
                'attribute' => 'дебет',
                'value' => function($data) {
                    if($data->typeid == 1) return round($data->money * $data->quantity, 2);
                    elseif($data->typeid == 2) return null;
                }
                
            ],
            [
                'attribute' => 'кредит',
                'value' => function($data) {
                    if($data->typeid == 2) return round($data->money * $data->quantity, 2);
                    elseif($data->typeid == 1) return null;
                }
                
            ],
//             [            
//                 'attribute' => 'balance',
//                 'format' => 'raw',    
//                 'value' => function($data){
//                 $data->balance = $data->balance + $data->money;
// 			return 	Yii::warning(print_r($data, true)); 
//                 },        
//             ],
//             [            
//                 'attribute' => 'balance',
// //                 'format' => 'raw',    
//                 'value' => function($data) {
// //                 $data->balance = $data->balance + $data->money;
// 			return $data->balance;
//                 },        
//             ],
//             [
//                 'label' => 'Balance',
//                 'value' => function ($model) {
//                     return $model->Balance();
//                 }
//             ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
//     Yii::warning(print_r($this->params, true));
    ?>
</div>
