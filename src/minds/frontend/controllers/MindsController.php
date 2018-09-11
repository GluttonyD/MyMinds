<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 23.08.2018
 * Time: 21:26
 */

namespace frontend\controllers;


use common\models\Card;
use common\models\Field;
use frontend\models\SigninForm;
use frontend\models\SignUpForm;
use yii\helpers\VarDumper;
use yii\web\Controller;

class MindsController extends Controller
{
    public $layout='minds';

    public function beforeAction($action)
    {
        $guest_access=array('sign-in','sign-up');
        $user_deny=array('sign-in','sign-up');
        if(\Yii::$app->user->isGuest &&!in_array($action->id,$guest_access)){
            return $this->redirect('sign-up');
        }
        else{
            if(!\Yii::$app->user->isGuest &&in_array($action->id,$user_deny))
                return $this->redirect('index');
            else {
                return true;
            }
        }
    }

    public function actionIndex(){
        $user=\Yii::$app->user->getId();
        $fields=Field::find()->where(['user_id'=>$user])->with('cards')->all();
        return $this->render('main',[
            'fields'=>$fields
        ]);
    }

    public function actionSignUp(){
        $signUp=new SignUpForm();
        if($signUp->load(\Yii::$app->request->post())&&$user=$signUp->registration()){
            \Yii::$app->user->login($user);
            return $this->redirect('index');
        }
        else{
            return $this->render('sign_up',[
                'model'=>$signUp
            ]);
        }
    }

    public function actionExit()
    {
        $user = \Yii::$app->user->getIdentity();
        \Yii::$app->user->logout($user);
        return $this->redirect('sign-up');
    }

    public function actionSignIn(){
        $model=new SigninForm();
        if($model->load(\Yii::$app->request->post())&&$model->signIn()){
            return $this->redirect('index');
        }
        else{
            return $this->render('sign_in',[
                'model'=>$model
            ]);
        }
    }

    public function actionAddField(){
        $user=\Yii::$app->user->getId();
        $field=new Field();
        $field->name='default';
        $field->user_id=$user;
        $field->save();
        return $field->id;
    }

    public function actionAddCard($field_id){
        $user=\Yii::$app->user->getId();
        $card=new Card();
        $card->field_id=$field_id;
        $card->xPos=325;
        $card->yPos=74;
        $card->text="";
        $card->save();
        return $card->id;
    }

    public function actionSetCardPos($id,$posX,$posY){
        /**
         * @var $card Card
         */
        $card=Card::find()->where(['id'=>$id])->one();
        if($card) {
            $card->xPos = $posX;
            $card->yPos = $posY;
            $card->save();
            return true;
        }
        else{
            return false;
        }

    }

    public function actionCardDelete($id){
        $card=Card::find()->where(['id'=>$id])->one();
        if($card){
            $card->delete();
            return true;
        }
        else{
            return false;
        }
    }

    public function actionCardTextchange($id,$text){
        /**
         * @var $card Card
         */
        $card=Card::find()->where(['id'=>$id])->one();
        if($card) {
            $card->text = $text;
            $card->save();
            return true;
        }
        else{
            return false;
        }
    }

    public function actionGetField($id){
        $field=Field::find()->where(['id'=>$id])->with('cards')->asArray()->one();
        if($field){
            return json_encode($field);
        }
        return false;
    }
}