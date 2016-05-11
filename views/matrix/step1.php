<?php

$this->title = 'Тестовое №2';
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="site-index">
    <h1>Укажите размер матрицы</h1>
    <?= Html::beginForm(Url::to(['matrix/step2']))?>
    <div class="row">
        <div class="col-md-1">x: </div>
        <div class="col-md-1"> <?= Html::input('text','x', 5, ['class'=>'form-control'])?></div>
    </div>
    <div class="row">
        <div class="col-md-1">y: </div>
        <div class="col-md-1"> <?= Html::input('text','y', 5, ['class'=>'form-control'])?></div>
    </div>
    <br>
    <?= Html::submitButton("Далее", ['class'=>'btn btn-default'])?>
    <?= Html::endForm()?>
</div>