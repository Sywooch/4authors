<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Users extends ActiveRecord implements IdentityInterface {
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
    
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
    
    //Interface
    
    public static function findIdentity($id) 
    {
        return self::findOne($id);
    }
    
    public function getId() 
    {
        return $this->id;
    }
    
    public function validateAuthKey($authKey) 
    {
        
    }
    
    public static function findIdentityByAccessToken($token, $type = null) 
    {
       
    }
    
    public function getAuthKey() 
    {
        
    }
    
}