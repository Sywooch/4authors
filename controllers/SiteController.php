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
use app\models\Genres;
use yii\data\Pagination;

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
        parent::getLeftSidebar();
        
        /* Get Posts */
        $posts = Posts::getPostsByGenre();
        
        return $this->render('index', [
                'users'    => $this->users, 
                'ratPosts' => $this->ratPosts, 
                'viePosts' => $this->viePosts, 
                'articles' => $this->articles, 
                'posts'    => $posts
        ]);
    }
    
    public function actionPost()
    {
        parent::getLeftSidebar();
        
        $id = Yii::$app->request->get('id');
        $post = Posts::findOne($id);
        $genre = $post->genres;
        $genre_t = $genre->name;
        $genre_id = $genre->id;
        $form = $post->forms->name;
        
        $authors = $post->authors;
        $user_name = $authors->name;
        $user_real_name = $authors->real_name;
        $name_id = $authors->name_id;
        
        return $this->render('post' , [
                'post'           => $post, 
                'users'          => $this->users, 
                'ratPosts'       => $this->ratPosts, 
                'viePosts'       => $this->viePosts, 
                'articles'       => $this->articles, 
                'genre'          => $genre_t,
                'genre_id'       => $genre_id,
                'form'           => $form,
                'user_name'      => $user_name,
                'user_real_name' => $user_real_name,
                'n_id'           => $name_id
        ]);
    }
    
    public function actionGenre()
    {
        parent::getLeftSidebar();
        
        $id = Yii::$app->request->get('id');
        
        $genre = Genres::findOne($id);
        $count = $genre->getPosts()->count();
        $posts = $genre->posts;
        foreach ($posts as $cur) {
            $auth = $cur->authors;
            $name = $auth->name;
            $real = $auth->real_name;
            $n_id = $auth->name_id;
            $id_u = $auth->id;
            $array[] = [
                'title'  => $cur['title'],
                'id'     => $cur['id'],
                'img'    => $cur['img'],
                'rating' => $cur['rating'],
                'name'   => $name,
                'real'   => $real,
                'id_u'   => $id_u,
                'n_id'   => $n_id
            ];
        }
        
        return $this->render('genre' ,[
            'users'    => $this->users, 
            'ratPosts' => $this->ratPosts, 
            'viePosts' => $this->viePosts, 
            'articles' => $this->articles,
            'genre'    => $genre,
            'count'    => $count,
            'posts'    => $array
        ]);
    }
    
    public function actionUser()
    {
        $session = Yii::$app->session;
        $session->open();
        
        parent::getLeftSidebar();
        
        $name = Yii::$app->request->get('name');
      
        $user = Users::find()->where(['name_id' => $name])->one();
        
        $posts_count = $user->getPosts()->count();
        
        if($session->get('name') != $name) {
            /* Count */
            $count = $user->sees;
            $user->sees = ++$count;
            $user->save();   
            
            $session->set('name', $name);
        } 
        
        
        

        return $this->render('user', [
            'users'          => $this->users, 
            'ratPosts'       => $this->ratPosts, 
            'viePosts'       => $this->viePosts, 
            'articles'       => $this->articles, 
            'user'           => $user,
            'posts_count'    => $posts_count
        ]);
    }
    
    public function actionPosts()
    {
        parent::getLeftSidebar();
        
        $id = Yii::$app->request->get('name');
        
        $user_info = Users::find()->where(['name_id' => $id])->one();
        
        $query = Posts::find()->where(['user_id' => $user_info->id]);
         
        /* Pages */
        $countQuery = clone $query;
        $count = $countQuery->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize' => 10]);
        $pages->pageSizeParam = false;
        
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        return $this->render('posts', [
            'users'          => $this->users, 
            'ratPosts'       => $this->ratPosts, 
            'viePosts'       => $this->viePosts, 
            'articles'       => $this->articles, 
            'id'             => $id,
            'user'           => $user_info,
            'posts'          => $posts,
            'pages'          => $pages,
            'count'          => $count
        ]);
    }
}
