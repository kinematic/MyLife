<?php

/* @var $this yii\web\View */

$this->title = 'Моя жизнь';
?>
<div class="site-index">

    <!---<div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>--->

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Автомобили</h2>

                <p><a class="btn btn-default" href="index.php?r=cars/road">Путёвки</a></p>
                <p><a class="btn btn-default" href="index.php?r=cars/models">Модели</a></p>
                <p><a class="btn btn-default" href="index.php?r=cars/cars">Автомобили</a></p>
                <p><a class="btn btn-default" href="index.php?r=cars/charges">Заправки</a></p>
                <p><a class="btn btn-default" href="index.php?r=cars/regulations">Регламент работ</a></p>
				<p><a class="btn btn-default" href="index.php?r=cars/spareparts">Запчасти</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Перепросмотр</h2>

                <p><a class="btn btn-default" href="index.php?r=recapitulation/people">Люди</a></p>
                <p><a class="btn btn-default" href="index.php?r=recapitulation/places">Места</a></p>
                <p><a class="btn btn-default" href="index.php?r=recapitulation/meetings">Встречи</a></p>
                <p><a class="btn btn-default" href="index.php?r=recapitulation/tags">Свойства</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Коммунальные расходы</h2>

                <p><a class="btn btn-default" href="index.php?r=communal/electro">Электросчётчик</a></p>

            </div>
           
        </div>

    </div>
</div>

