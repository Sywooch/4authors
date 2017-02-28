<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;
use app\models\Posts;
use app\models\Articles;
use app\models\Genres;


/**
 * Description of UserController
 *
 * @author Император
 */
class PersonController extends GrandController{
      
    public function actionLogin()
    {        
        return $this->render('login', []);
    }
    
}
