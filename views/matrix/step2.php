<?php

$this->title = 'Тестовое №2';
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="site-index">
    <h1>Отметьте местоположения единицы в любом месте матрицы</h1>
    <?= Html::beginForm(Url::to(['matrix/step3']))?>
    <?= Html::hiddenInput('x', $x)?>
    <?= Html::hiddenInput('y', $y)?>
    <?php for($i = 1; $i < ($y + 1); $i++){?>
        <div class="row">
            <div class="col-md-12">
                <?php for($k = 1; $k < ($x + 1); $k++){?>
                    <?= Html::radio('matrix', false, ['value'=>$i.'_'.$k])?>
                <?php }?>
            </div>
        </div>
    <?php }?>
    <br>
    <?= Html::submitButton("Далее", ['class'=>'btn btn-default'])?>
    <?= Html::endForm()?>
</div>