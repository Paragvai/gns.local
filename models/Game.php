<?php
/**
 * Created by PhpStorm.
 * User: MyComp
 * Date: 10.05.16
 * Time: 1:11
 */

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Game extends Model
{
    public $Day;
    public $AwayTeam;
    public $HomeTeam;
    public $StadiumID;

    public static function tableName()
    {
        return 'game';
    }
}
