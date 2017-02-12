<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\db\ActiveRecord;

/**
 * Description of Rating
 *
 * @author Freyyr
 */
class Posts extends ActiveRecord {
    
    public function getForms()
    {
      return $this->hasOne(Forms::className(), ['id' => 'form_id']);  
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
    
}
