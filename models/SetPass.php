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
 * Description of SetPass
 *
 * @author Император
 */
class SetPass extends Model {
    
    public $password;
    public $rePassword;
    
    public function rules()
    {
        return [
            [['password', 'rePassword'], 'required', 'message' => 'Все поля должны быть заполнены.'],
            [['password', 'rePassword'], 'string', 'min' => 2, 'max' => 255],
            ['rePassword', 'identity']
        ];
    }
    
    public function identity($attribute, $params)
    {
        if($this->password !== $this->rePassword)
        {
            $this->addError($attribute, 'Пароли не совпадают');
        }
    }
    
    public function Restore($token)
    {
        $user = Users::findOne(['token' => $token]);
        
        $user->password = $user->security($this->password);
        $user->token = NULL;
        $user->status = 1;
        $result = $user->save();
        if($result)
        {
            return $this->MailTo($user->real_name, $user->email);
        }
    }
    
    public function MailTo($name, $email)
    {
        if($name !== null AND $email !== null)
        {
            $body = '<h3>Изменен пароль на сайте '.Yii::getAlias('@sitename').'</h3>'
                    . '<p>Здравствуйте, '.$name.'! Только что был изменен пароль. Если вы этого не делали - срочно обратитесь в поддержку.</p>';
            
            Yii::$app->mailer->compose()
            ->setFrom(Yii::getAlias('@emailfrom'))
            ->setTo($email)
            ->setSubject('Изменен пароль на сайте '.Yii::getAlias('@sitename'))
            ->setHtmlBody($body)
            ->send();
        
            return true;
        }
        
        return false;
    }
    
}
