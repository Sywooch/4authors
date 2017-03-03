<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\db\ActiveRecord;

class Users extends ActiveRecord {
    public $us_array;
    
    public function GetUsers() 
    {
        $us_array = Users::find()->orderBy('rating DESC')->limit('4')->all();
        return $us_array;
    }
    
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['user_id' => 'id']);
    }
    
    public function security($password)
    {
        return \Yii::$app->getSecurity()->generatePasswordHash($password);
    }
}