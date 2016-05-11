<?php

namespace app\controllers;

use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use linslin\yii2\curl;
use yii\data\ArrayDataProvider;
use app\controllers\GameController;
use app\models\Game;

class ShowController extends Controller
{
    public function behaviors()
    {
        return [

        ];
    }


    public function actionIndex()
    {
        $curl = new curl\Curl();
        $resJSON = $curl->get('http://gns.local/web/index.php/games');

        $resArray = json_decode($resJSON);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $resArray,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

}
