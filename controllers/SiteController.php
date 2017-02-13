<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;
use app\models\Posts;
use app\models\Articles;

class SiteController extends GrandController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    
    public function actionIndex()
    {   
        /* Get Users */
        $users = Users::GetUsers();
        
        /* Get Top Posts */
        $ratPosts = Posts::getPostsByRating(); 
        
        /* Get Most Viewed Posts */
        $viePosts = Posts::getPostsByViews(); 
        
        /* Get Most Viewed Articles */
        $articles = Articles::getArticlesByViews();
        
        /* Get Posts */
        $posts = Posts::getPostsByGenre();
        
        $arrayLeft = $posts['arrayLeft'];
        $arrayRight = $posts['arrayRight'];
        
        return $this->render('index', compact(
                'users', 
                'ratPosts', 
                'viePosts', 
                'articles', 
                'arrayLeft', 
                'arrayRight'
        ));
    }
}
