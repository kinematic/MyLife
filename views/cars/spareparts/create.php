<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\cars\Spareparts */

$this->title = 'Добавление запчасти';
$this->params['breadcrumbs'][] = ['label' => 'Запчасти', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spareparts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
