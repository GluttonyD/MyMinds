<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 05.09.2018
 * Time: 22:15
 */

namespace frontend\models;


use common\models\User;
use yii\base\Model;

class SigninForm extends Model
{
    public $password;
    public $email;

    public function rules(){
        return[
           [['email'],'email'],
           [['email','password'],'required'],
            [['password'],'validatePassword']
        ];
    }

    public function validatePassword($attribute, $params){
        /**
         * @var $user User
         */
        $user=User::find()->where(['email'=>$this->email])->one();
        $hash=$this->password.$user->password_salt;
        if(\Yii::$app->security->validatePassword($hash,$user->password_hash)){
            return true;
        }
        $this->addError($attribute,'Введен неверный пароль или email');
    }

    public function signIn(){
        if($this->validate()){
            $user=User::find()->where(['email'=>$this->email])->one();
            \Yii::$app->user->login($user);
            return true;
        }
        return false;
    }
}