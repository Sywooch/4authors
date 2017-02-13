<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

/**
 * Description of Rating
 *
 * @author Freyyr
 */
class Posts extends ActiveRecord {
    
    public static function tableName() {
        return 'posts';
    }
    
    public function getForms()
    {
      return $this->hasOne(Forms::className(), ['id' => 'form_id']);  
    }
    
    public function getGenres()
    {
      return $this->hasOne(Genres::className(), ['id' => 'form_id']);  
    }
    
    public function getPostsByRating()
    {
        $posts = Posts::find()->orderBy('rating DESC')->limit(10)->all();
        
        foreach($posts as $value) {
            $form = $value->forms->name;
            $array[] = [
                'title' => $value['title'], 
                'form'  => $form
            ];
        }
        
        return $array;
    }
    
    public function getPostsByViews()
    {
        $posts = Posts::find()->orderBy('views DESC')->limit(10)->all();
        
        foreach($posts as $value) {
            $form = $value->forms->name;
            $array[] = [
                'title' => $value['title'], 
                'form'  => $form
            ];
        }
        
        return $array;
    }
    
    public function getPostsByGenre()
    {
        
        $data = Yii::$app->cache->get($postsByGenre);
        
        if($data === false) {
        
        $genres = Genres::getGenresByAlph();
        
        foreach ($genres as $key => $value) {
            if(($key % 2) == 0) {
                $posts = $value->getPosts()->limit(3)->all();
                foreach($posts as $cur) {
                    $form = $cur->forms->name;
                    $array[] = [
                        'title' => $cur['title'],
                        'form'  => $form 
                    ];
                }
                $arrayLeft[] = [
                    'name' => $value['name'], 
                    'posts' => $array
                ];
                $array = [];
            }
            else {
                $posts = $value->getPosts()->limit(3)->all();
                foreach($posts as $cur) {
                    $form = $cur->forms->name;
                    $array[] = [
                        'title' => $cur['title'],
                        'form'  => $form 
                    ];
                }
                $arrayRight[] = [
                    'name' => $value['name'], 
                    'posts' => $array
                ];
                $array = [];
            }
        }
        
        $data = [
            'arrayLeft'  => $arrayLeft, 
            'arrayRight' => $arrayRight
        ];
        
        Yii::$app->cache->set($postsByGenre, $data, 2000);
        
        return $data;
        
        } else {
            return $data;
        }
    }
    
}
