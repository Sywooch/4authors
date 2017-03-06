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
use app\models\Login;


/**
 * Description of UserController
 *
 * @author Император
 */
class PersonController extends GrandController{
      
    public function actionLogin()
    {        
        if(!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }
        
        $model = new Login();
        
        if(Yii::$app->request->post('Login')) 
        {
            
            $model->attributes = Yii::$app->request->post('Login');
            
            if($model->validate())
            {
                Yii::$app->user->login($model->getUser());
                $this->layout = 'redirect';
                return $this->render('redirect-login',['status' => true]);
            }
            
        }
        
        return $this->render('login', [
            'model' => $model
        ]);
    }
    
    public function actionLogout()
    {
        if(!Yii::$app->user->isGuest)
        {
            Yii::$app->user->logout();
            return $this->goHome();
        }
        
        return $this->goHome();
    }
    
    public function actionRegister()
    {
        if(!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }
        
        $model = new SignUp();
        
        if(Yii::$app->request->post('SignUp')) 
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
    
    public function actionValidate()
    {
        $this->layout = 'redirect';
        
        $token = Yii::$app->request->get('token');
        
        if($token === null)
        {
            return $this->render('validate', ['status' => 'null']);
        }
        
        $model = new SignUp();
        
        $result = $model->validateToken($token);
        
        if($result === true)
        {
            return $this->render('validate', ['status' => true]);
        } elseif($result === 'not') {
            return $this->render('validate', ['status' => 'null']);
        } else {
            return $this->render('validate', ['status' => false]);
        }
    }
    
    public function actionCabinet()
    {
        if(Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }
        
        $this->layout = 'grayList';
        return $this->render('cabinet');
    }
    
}
