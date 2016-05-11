<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Тестовое';
?>
<div class="site-index">
    <div class="row">
            <div class="col-md-12"><p class="bg-primary">Тестовое №1</p></div>
    </div>
    <div class="row">
            <div class="col-md-offset-1 col-md-11"><p class="bg-info"><?= Html::a('Загрузить и сохранить в базу расписания матчей', Url::to(['parse/index']))?></p></div>
    </div>
    <div class="row">
        <div class="col-md-offset-1 col-md-11"><p class="bg-info"><?= Html::a('Вывод расписания на экран', Url::to(['show/index']))?></p></div>
    </div>
    <div class="row">
            <div class="col-md-12"><p class="bg-primary">Тестовое №2</p></div>
    </div>
    <div class="row">
        <div class="col-md-offset-1 col-md-11"><p class="bg-info"><?= Html::a('Матрица, подсчет шагов за сколько единица "захватит мир"', Url::to(['matrix/step1']))?></p></div>
    </div>
</div>
