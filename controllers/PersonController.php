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
use app\models\SignUp;


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
    
    public function actionRegister()
    {
        $model = new SignUp();
        
        if(isset($_POST['SignUp'])) 
        {
            $model->attributes = \Yii::$app->request->post('SignUp');
            
            if($model->validate())
            {
                $result = $model->SignUp();
                if($result === true) 
                {
                    return $this->render('register', [
                        'completed' => true,
                        'model'     => $model
                    ]);
                }
                elseif($result === 'pswrd')
                {
                    return $this->render('register', [
                        'status' => 'pswrd',
                        'model'  => $model
                    ]);
                }
                return $this->render('register', [
                    'status' => false,
                    'model'  => $model
                ]);
            }
        }
        
        return $this->render('register', [
            'model' => $model
        ]);
    }
    
}
