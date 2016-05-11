<?php

namespace app\controllers;

use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use linslin\yii2\curl;
use yii\data\ArrayDataProvider;
use app\controllers\GameController;
use app\models\Game;

class MatrixController extends Controller
{
    public function behaviors()
    {
        return [

        ];
    }


    public function actionStep1()
    {
        return $this->render('step1');
    }

    public function actionStep2()
    {
        $postData = Yii::$app->request->post();

        return $this->render('step2', [
            'x' => $postData['x'],
            'y' => $postData['y']
        ]);
    }
    public function actionStep3()
    {
        $postData = Yii::$app->request->post();

        $dataForm = explode('_', $postData['matrix']);

        $averageY = $postData['y'] / 2;
        $averageX = $postData['x'] / 2;

        if($dataForm[0] <= $averageY)
            $resY = $postData['y'] - $dataForm[0];
        else
            $resY = $dataForm[0] - 1;

        if($dataForm[1] <= $averageX)
            $resX = $postData['x'] - $dataForm[1];
        else
            $resX = $dataForm[1] - 1;

        if($resY <= $resX)
            $res = $resX;
        else
            $res = $resY;

        return $this->render('step3', ['res'=>$res]);
    }

}
