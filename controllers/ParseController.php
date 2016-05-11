<?php

namespace app\controllers;

use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use linslin\yii2\curl;
use app\models\Game;

class ParseController extends Controller
{
    public function behaviors()
    {
        return [

        ];
    }


    public function actionIndex()
    {
        Game::deleteAll();

        //Init curl
        $curl = new curl\Curl();

        //get https://api.fantasydata.net/mlb/v2/JSON/Games/2016
        $curl->setOption(
            CURLOPT_HTTPHEADER,
            array('Ocp-Apim-Subscription-Key: 2abb5fd635754eb5bb9dc4edeb304db5'));

        $resJSON = $curl->setOption(
            CURLOPT_TIMEOUT ,
            50000)
            ->get('https://api.fantasydata.net/mlb/v2/JSON/Games/2016');

        $resArray = json_decode($resJSON);

        $insertArray = array();

        foreach($resArray as $item){
            $insertArray[] = array(
                'Day'=>$item->Day,
                'AwayTeam'=>$item->AwayTeam,
                'HomeTeam'=>$item->HomeTeam,
                'StadiumID'=>$item->StadiumID
            );
        }

        $arrayChunk = array_chunk($insertArray, 10000);

        foreach($arrayChunk as $item){
            Yii::$app->db->createCommand()->batchInsert(Game::tableName(), ['Day', 'AwayTeam', 'HomeTeam', 'StadiumID'], $item)->execute();
        }

        return $this->render('index');
    }

}
