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
 * Description of Restore
 *
 * @author Император
 */
class Restore extends Model {
    
    public $email;
    
    public function rules()
    {
        return [
            ['email', 'required', 'message' => 'Поле не может быть пустым'],
            ['email', 'email', 'message' => 'E-Mail введён неверно'],
            ['email', 'isExist']
        ];
    }
    
    public function isExist($attribute, $params)
    {
        $email = strtolower($this->email);
        
        $user = Users::findOne(['email' => $email]);
        
        if(!$user)
        {
            $this->addError($attribute, 'Пользователя с таким E-Mail не существует');
        }
    }
    
    public function Restore()
    {
        $user = Users::findOne(['email' => strtolower($this->email)]);
        
        $token = sha1($this->email).sha1(uniqid(rand(),20));
        
        $user->token = $token;
        $user->status = 0;
        $user->save();
        
        return $this->MailTo($token, $this->email, $user->real_name);
    }
    
    public function MailTo($token, $email, $name)
    {
        if($token !== null AND $email !== null)
        {
            $body = '<h3>Восстановление пароля на сайте '.Yii::getAlias('@sitename').'</h3>'
                    . '<p>Здравствуйте, '.$name.'! Для восстановления пароля перейдите по <a href="http://'.Yii::getAlias('@sitename').\yii\helpers\Url::to(['restore', 'token' => $token]).'">ссылке</a></p>';
            
            Yii::$app->mailer->compose()
            ->setFrom(Yii::getAlias('@emailfrom'))
            ->setTo($email)
            ->setSubject('Восстановление пароля на сайте '.Yii::getAlias('@sitename'))
            ->setHtmlBody($body)
            ->send();
        
            return true;
        }
        
        return false;
    }
    
    public function validateToken($token)
    {
        $user = Users::findOne(['token' => $token]);
        if($user)
        {
            return true;
        }
    }
    
}
