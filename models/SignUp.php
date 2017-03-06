<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\base\Model;
use app\models\Users;
use Yii;

/**
 * Description of singUp
 *
 * @author Император
 */
class SignUp extends Model 
{
    
    public $realName;
    public $name;
    public $email;
    public $password;
    public $rePassword;
    
    public function rules()
    {
    
        return [
            [['realName', 'name', 'email', 'password', 'rePassword'], 'required', 'message' => 'Все поля должны быть заполнены.'],
            ['realName', 'string', 'min' => 2, 'max' => 255],
            ['name', 'unique', 'targetClass' => 'app\models\Users', 'message' => 'Такой логин уже существует.'],
            ['name', 'string', 'min' => 2, 'max' => 32],
            ['name', 'loginValidator'],
            ['email', 'unique', 'targetClass' => 'app\models\Users', 'message' => 'Такой E-Mail уже существует.'],
            ['email', 'email', 'message' => 'E-Mail введён неверно.'],
            ['password', 'string', 'min' => 2, 'max' => 30],
            ['rePassword', 'string', 'min' => 2, 'max' => 30]
        ];
        
    }
    
    public function loginValidator($attribute, $params)
    {
        $trimmed = str_replace(' ', '', $this->name);
        if($trimmed !== $this->name)
        {
            $this->addError($attribute, 'Логин не должен содержать пробелов');
        }
        if(!ctype_alnum($this->name)) 
        {
            $this->addError($attribute, 'Логин должен состоять из латинских букв и цифр');
        }
    }
    
    public function SignUp()
    {
        
        if($this->password === $this->rePassword)
        {
            $user = new Users();
            
            $token = sha1($this->email).sha1(uniqid(rand(),20));
            
            $user->name      = $this->name;
            $user->name_id   = str_replace(' ', '', $this->name);
            $user->email     = $this->email;
            $user->real_name = $this->realName;
            $user->password  = $user->security($this->password);
            $user->token     = $token;
            
            $result = $user->save();
            
            if($result === true)
            {
                return $this->MailTo($token, $this->email, $this->realName);
            }
        }
        else 
        {
            return 'pswrd';
        }
    }
    
    public function MailTo($token, $email, $name)
    {
        if($token !== null AND $email !== null)
        {
            $body = '<h3>Добро пожаловать на сайт 4authors.ru!</h3>'
                    . '<p>Здравствуйте, '.$name.'! Для продолжения регистрации перейдите по <a href="http://4authors.loc'.\yii\helpers\Url::to(['validate', 'token' => $token]).'">ссылке</a></p>';
            
            Yii::$app->mailer->compose()
            ->setFrom('from@domain.com')
            ->setTo($email)
            ->setSubject('Добро пожаловать на 4authors.ru')
            ->setHtmlBody($body)
            ->send();
        
            return true;
        }
        
        return false;
    }
    
    public function validateToken($token)
    {
        $user = Users::find()->where(['token' => $token])->one();
        
        if(!$user)
        {
            return 'not';
        }
        
        if($user->status === 0) 
        {
            $user->status = 1;
            return $user->save();
        }
        
        return false;
    }
    
}
