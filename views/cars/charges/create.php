<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\cars\Charges */

$this->title = 'Заправить';
if($model->road_id) $this->params['breadcrumbs'][] = ['label' => $model->roadname, 'url' => ['cars/road/view', 'id' => $model->road_id, '#' => 'charges']];
else $this->params['breadcrumbs'][] = ['label' => 'Заправки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="charges-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
