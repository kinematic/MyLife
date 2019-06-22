<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\workout\Partsofbody */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Части тела', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partsofbody-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
