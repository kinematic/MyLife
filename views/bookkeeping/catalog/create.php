<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\bookkeeping\Catalog */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Ценности', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
