<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use linslin\yii2\curl;
use app\models\Game;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {


        die;
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

        $arrayChunk = array_chunk($input_array, 5000);

        foreach($arrayChunk as $item){
            Yii::$app->db->createCommand()->batchInsert(Game::tableName(), ['Day', 'AwayTeam', 'HomeTeam', 'StadiumID'], $item)->execute();
        }

        die;
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
