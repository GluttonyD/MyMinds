<?php
/**
 * Created by PhpStorm.
 * User: Aritomo
 * Date: 23.08.2018
 * Time: 21:26
 */

namespace frontend\controllers;


use yii\web\Controller;

class MindsController extends Controller
{
    public $layout='minds';
    public function actionIndex(){
        return $this->render('main');
    }
}