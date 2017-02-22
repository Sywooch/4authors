<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Posts;
use app\models\Users;
use app\models\Articles;

/**
 * Description of leftSideWidget
 *
 * @author Император
 */
class leftSideWidget extends Widget{
    
    public $users;
    public $ratPosts;
    public $viePosts;
    public $articles;
    
    public function init()
    {
        parent::init();
        
        /* Get Users */
        $this->users = Users::GetUsers();
        
        /* Get Top Posts */
        $this->ratPosts = Posts::getPostsByRating(); 
        
        /* Get Most Viewed Posts */
        $this->viePosts = Posts::getPostsByViews(); 
        
        /* Get Most Viewed Articles */
        $this->articles = Articles::getArticlesByViews();
    }
    
    public function run()
    {
        
        return $this->render('left', [
           'users'          => $this->users, 
           'ratPosts'       => $this->ratPosts, 
           'viePosts'       => $this->viePosts, 
           'articles'       => $this->articles 
        ]);
        
    }
    
}
