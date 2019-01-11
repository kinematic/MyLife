<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\bicycle\Chains */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Цепи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chains-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
