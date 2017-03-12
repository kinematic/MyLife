<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\recapitulation\Meetings */

$this->title = 'Create Meetings';
$this->params['breadcrumbs'][] = ['label' => 'Meetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meetings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
