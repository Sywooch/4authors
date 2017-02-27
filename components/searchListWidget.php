<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use \yii\base\Widget;
use Yii;

class searchListWidget extends Widget{
    
    public $posts;
    public $authors;
    public $handbook;
    
    public function init()
    {
        parent::init();
        
        $query = Yii::$app->request->get('cat');
        
        if($query != null) 
        {
            switch($query)
            {
                case 'posts':
                    $this->posts = 'selected';
                    break;
                case 'authors':
                    $this->authors = 'selected';
                    break;
                case 'handbook':
                    $this->handbook = 'selected';
                    break;
            }
        }
    }
    
    public function run()
    {
        return $this->render('searchList', [
            'posts'    => $this->posts,
            'authors'  => $this->authors,
            'handbook' => $this->handbook
        ]);
    }
    
}
