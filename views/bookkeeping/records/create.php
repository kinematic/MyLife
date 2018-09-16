<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\bookkeeping\Records */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Проводки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="records-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
	<?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
