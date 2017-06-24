<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\plants\Plants */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Расстения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
