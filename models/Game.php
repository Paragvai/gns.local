<?php
/**
 * Created by PhpStorm.
 * User: MyComp
 * Date: 10.05.16
 * Time: 1:11
 */

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Game extends ActiveRecord
{
    public static function tableName()
    {
        return 'game';
    }

    public function attributeLabels()
    {
        return [
            'Day' => 'Дата',
            'AwayTeam' => 'Команда гостей',
            'HomeTeam' => 'Команда местных',
            'StadiumID' => 'ID стадиона',
        ];
    }
}
