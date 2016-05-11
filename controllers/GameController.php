<?php
/**
 * Created by PhpStorm.
 * User: MyComp
 * Date: 10.05.16
 * Time: 21:38
 */
namespace app\controllers;

//use yii\rest\ActiveController;
use yii\rest\Controller;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use app\models\Game;

class GameController extends Controller
{
//    public $modelClass = 'app\models\Game';
    public function actionIndex()
    {

        return new ArrayDataProvider([
            'allModels' => Game::find()->all(),
            'pagination' => [
                'pageSize' => -1,
            ],
        ]);
    }

//    public function actionIndex()
//    {
//        die;
//        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        $items = ['some', 'array', 'of', 'data' => ['associative', 'array']];
//        return $items;
//    }
}