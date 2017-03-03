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
 * Description of singUp
 *
 * @author Император
 */
class SignUp extends Model 
{
    
    public $realName;
    public $login;
    public $email;
    public $password;
    public $rePassword;
    
    public function rules()
    {
    
        return [
            ['realName', 'string', 'min' => 2, 'max' => 255],
            ['login', 'string', 'min' => 2, 'max' => 255],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\Users'],
            ['password', 'string', 'min' => 2, 'max' => 30],
            ['rePassword', 'string', 'min' => 2, 'max' => 30]
        ];
        
    }
    
    public function SignUp()
    {
        
        if($this->password === $this->rePassword)
        {
            $user = new Users();
            
            $user->name      = $this->login;
            $user->email     = $this->email;
            $user->real_name = $this->realName;
            $user->password  = $user->security($this->password);
            
            return $user->save();
        }
        else 
        {
            return 'pswrd';
        }
    }
    
}
