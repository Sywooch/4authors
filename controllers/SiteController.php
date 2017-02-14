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
        
        return $this->render('index', compact(
                'users', 
                'ratPosts', 
                'viePosts', 
                'articles', 
                'posts'
        ));
    }
    
    public function actionPost()
    {
        /* Get Users */
        $users = Users::GetUsers();
        
        /* Get Top Posts */
        $ratPosts = Posts::getPostsByRating(); 
        
        /* Get Most Viewed Posts */
        $viePosts = Posts::getPostsByViews(); 
        
        /* Get Most Viewed Articles */
        $articles = Articles::getArticlesByViews();
        
        $id = Yii::$app->request->get('id');
        $post = Posts::findOne($id);
        $genre = $post->genres->name;
        $form = $post->forms->name;
        
        $authors = $post->authors;
        $user_name = $authors->name;
        $user_real_name = $authors->real_name;
        
        return $this->render('post' , compact(
                'post', 
                'users', 
                'ratPosts', 
                'viePosts', 
                'articles',
                'genre',
                'form',
                'user_name',
                'user_real_name'
        ));
    }
}
