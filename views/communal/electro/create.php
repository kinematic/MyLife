<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\communal\Electro */

$this->title = 'Добавить показания';
$this->params['breadcrumbs'][] = ['label' => 'Электросётчик', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
