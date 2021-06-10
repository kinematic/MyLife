<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\workout\RuningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пробежки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="runing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<div class='row'>
		<div class='col-md-6'>
		    <?= GridView::widget([
		        'dataProvider' => $dataProvider,
		        'filterModel' => $searchModel,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],

// 		            'id',
		            'date',
		            'distance',
		            'duration',
		            'temp',
		            'speed',

		            ['class' => 'yii\grid\ActionColumn', 'contentOptions' =>['style' => 'white-space: nowrap']],
		        ],
		    ]); ?>
		</div>
		<div class='col-md-6'>
            <p>расход калорий в час: вес х скорость
            <p>Если цель сохранить здоровье, то достаточно аэробным нагрузкам уделять 75-150 минут в неделю.

            <p>Если цель приумножить здоровье, то 150-300 минут.

            <p>Для сохранения здоровья достаточно 75 минут аэробных нагрузок высокой интенсивности или 150 минут средней.

            <p>Для приумножения - 150 и 300 минут соответственно.

            <p>Занятой и успешный человек, конечно выберет 150 минут в неделю аэробных нагрузок высокой интенсивности, чтобы и времени потратить поменьше и здоровье приумножить побольше.

            <p>Для выражения интенсивности аэробных нагрузок ВОЗ использует метаболический эквивалент - МЕТ.
            
            <p>Чтобы мне набрать 3 МЕТ, моё тело должно идти со скоростью 3 км в час. Вот такая аэробная нагрузка средней интенсивности.

            <p>Всё, что быстрее 6 км/час для моего тела - это уже аэробная нагрузка высокой интенсивности.

            <p>Для того, чтобы приобретать здоровье по нормам ВОЗ моё тело должно набирать 2,5 часа в неделю со скоростью более 6 км в час ходьбы или джоггинга.
		</div>
	</div>

</div>
