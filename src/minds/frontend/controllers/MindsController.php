<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 23.08.2018
 * Time: 21:26
 */

namespace frontend\controllers;


use frontend\models\SignUpForm;
use yii\helpers\VarDumper;
use yii\web\Controller;

class MindsController extends Controller
{
    public $layout='minds';

    public function beforeAction($action)
    {
        $guest_access=array();
//        VarDumper::dump($action->id);
        if(\Yii::$app->user->isGuest && $action->id!='sign-up'){
            return $this->redirect('sign-up');
        }
        else{
            return true;
        }
    }

    public function actionIndex(){
        return $this->render('main');
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

    public function actionExit(){
        $user=\Yii::$app->user->getIdentity();
        \Yii::$app->user->logout($user);
        return $this->redirect('sign-up');
}