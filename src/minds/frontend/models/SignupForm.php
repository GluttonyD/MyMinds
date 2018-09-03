<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 03.09.2018
 * Time: 22:55
 */

namespace frontend\models;


use yii\base\Model;
use common\models\User;
use yii\base\Security;

class SignUpForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'string'],
            [['email'], 'email'],
            [['username', 'email', 'password'], 'required'],
            [['username'], 'validateUsername'],
            [['email'], 'validateEmail']

        ];
    }

    public function validateUsername($attribute, $params)
    {
        $user = User::find()->where(['username' => $this->username])->one();
        if ($user) {
            $this->addError($attribute, 'Такое имя уже занято');
        }
    }

    public function validateEmail($attribute, $params)
    {
        $user = User::find()->where(['email' => $this->email])->one();
        if ($user) {
            $this->addError($attribute, 'Пользователь с такой почтой уже существует');
        }
    }

    public function registration(){
        if($this->validate()){
            $user=new User();
            $user->username=$this->username;
            $user->email=$this->email;
            $salt=\Yii::$app->getSecurity()->generateRandomString();
            $user->password_salt=$salt;
            $tmp=$this->password.$salt;
            $user->password_hash=\Yii::$app->getSecurity()->generatePasswordHash($tmp);
            $user->save();
            return true;
        }
        return false;
    }
}