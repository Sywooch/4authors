<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\base\Model;
use app\models\Users;

/**
 * Description of Login
 *
 * @author Император
 */
class Login extends Model {
    
    public $email;
    public $password;
    
    public function rules()
    {
        return [
            [['email', 'password'], 'required', 'message' => 'Все поля должны быть заполнены'],
            ['email', 'email', 'message' => 'E-Mail имеет неправильный формат'],
            ['password', 'passwordValidator']
        ];
    }
    
    public function passwordValidator($attribute, $params)
    {
        if(!$this->hasErrors())
        {
            $user = $this->getUser();
            
            if(!$user || !$user->validatePassword($this->password))
            {
                $this->addError($attribute, "E-Mail или пароль неверны");
            }
       
        }
    }
    
    public function getUser()
    {
        return Users::findOne(['email' => $this->email]);
    }
    
}
