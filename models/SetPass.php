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
    
}
