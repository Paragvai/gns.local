<?php

/* @var $this yii\web\View */
use yii\grid\GridView;
$this->title = 'Тестовое №1';
?>
<div class="site-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'Day',
            'AwayTeam',
            'HomeTeam',
            'StadiumID',
        ],
    ]); ?>
</div>
