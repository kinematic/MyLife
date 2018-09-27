<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\recapitulation\Patronymicnames */

$this->title = 'Create Patronymicnames';
$this->params['breadcrumbs'][] = ['label' => 'Patronymicnames', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patronymicnames-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
