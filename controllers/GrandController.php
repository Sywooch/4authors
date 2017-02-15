<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Posts;
use app\models\Users;
use app\models\Articles;

/**
 * Description of GrandController
 *
 * @author Freyyr
 */
class GrandController extends Controller{
    
    public $users;
    public $ratPosts;
    public $viePosts;
    public $articles;
    
    public function getLeftSidebar()
    {
        /* Get Users */
        $this->users = Users::GetUsers();
        
        /* Get Top Posts */
        $this->ratPosts = Posts::getPostsByRating(); 
        
        /* Get Most Viewed Posts */
        $this->viePosts = Posts::getPostsByViews(); 
        
        /* Get Most Viewed Articles */
        $this->articles = Articles::getArticlesByViews();
    }
    
}
