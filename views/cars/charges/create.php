<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\cars\Charges */

$this->title = 'Внести заправку';
$this->params['breadcrumbs'][] = ['label' => 'Заправки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="charges-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
