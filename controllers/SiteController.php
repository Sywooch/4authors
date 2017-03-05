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
        /* Get Posts */
        $posts = Posts::getPostsByGenre();
        
        return $this->render('index', [
                'posts'         => $posts,
        ]);
    }
    
    public function actionPost()
    {   
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
                'genre'          => $genre_t,
                'genre_id'       => $genre_id,
                'form'           => $form,
                'user_name'      => $user_name,
                'user_real_name' => $user_real_name,
                'n_id'           => $name_id,
        ]);
    }
    
    public function actionGenre()
    {   
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
            'genre'    => $genre,
            'count'    => $count,
            'posts'    => $array
        ]);
    }
    
    public function actionUser()
    {
        $session = Yii::$app->session;
        $session->open();
        
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
            'user'           => $user,
            'posts_count'    => $posts_count
        ]);
    }
    
    public function actionPosts()
    {   
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
            'id'             => $id,
            'user'           => $user_info,
            'posts'          => $posts,
            'pages'          => $pages,
            'count'          => $count
        ]);
    }
    
    public function actionHandbook()
    {        
        $id = Yii::$app->request->get('id');
        
        if($id == null) {
            
            $query = Articles::find();
            $countQuery = clone $query;
            $count = $query->count();
            
            $pages = new Pagination(['totalCount' => $count, 'pageSize' => 10]);
            $pages->pageSizeParam = false;
            
            $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
            
            return $this->render('articles', [
                'count' => $count,
                'posts' => $posts,
                'pages' => $pages
            ]);
            
        }
        else {
        
            $article = Articles::find()->where(['id' => $id])->one();

            return $this->render('handbook', [
               'id'             => $id,
               'article'        => $article
            ]);
        
        }
    }
    
    public function actionUsers()
    {
        $query = Users::find()->where(['status' => 1])->orderBy('rating DESC');
        
        $countQuery = clone $query;
        $qcount = $countQuery->count();
        
        $pages = new Pagination(['totalCount' => $qcount, 'pageSize' => 10]);
        $pages->pageSizeParam = false;
        
        $count = $query->count();
        $array = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        foreach($array as $cur) {
            $posts = $cur->getPosts()->count();
            
            $users[] = [
                'posts'     => $posts,
                'name'      => $cur->name,
                'real_name' => $cur->real_name,
                'name_id'   => $cur->name_id,
                'avatar'    => $cur->avatar,
            ];
        }
        
        return $this->render('users', [
            'count' => $count,
            'users' => $users,
            'pages' => $pages
        ]);
    }
    
    public function actionSearch()
    {
        $q = Yii::$app->request->get('q');
        $cat = Yii::$app->request->get('cat');
        
        switch ($cat)
        {
            case 'posts':
                $query = Posts::find()->where(['like', 'title', $q]);
                $posts = $query->all();
                $count = $query->count();
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
                return $this->render('searchPosts', [
                    'posts' => $array,
                    'count' => $count
                ]);
                break;
            
            case 'authors':
                $query = Users::find()->where(['like', 'real_name', $q]);
                $users = $query->all();
                $count = $query->count();
                
                foreach($users as $cur) {
                    $posts = $cur->getPosts()->count();

                    $array[] = [
                        'posts'     => $posts,
                        'name'      => $cur->name,
                        'real_name' => $cur->real_name,
                        'name_id'   => $cur->name_id,
                        'avatar'    => $cur->avatar,
                    ];
                }
                return $this->render('searchUsers', [
                    'users' => $array,
                    'count' => $count
                ]);
                break;
                
            case 'handbook':
                $query = Articles::find()->where(['like', 'title', $q]);
                $count = $query->count();
                $posts = $query->all();
                
                return $this->render('searchHandbook', [
                    'posts' => $posts,
                    'count' => $count
                ]);
                break;
        }
        
    }
}
