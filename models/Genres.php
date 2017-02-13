<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\db\ActiveRecord;

/**
 * Description of Genres
 *
 * @author Император
 */
class Genres extends ActiveRecord {
    
    public static function tableName()
    {
        return 'genres';
    }
    
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['genre_id' => 'id']);
    }
    
    public function getGenresByAlph()
    {
        return Genres::find()->orderBy('name')->all();
    }
    
}
