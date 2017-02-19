<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Users;

/**
 * Description of uscountWidget
 *
 * @author Император
 */
class uscountWidget extends Widget{
    
    public $count;
    
    public function init()
    {
        parent::init();
        
        $this->count = Users::find()->count();
    }
    
    public function run()
    {
        return Html::encode($this->count);
    }
    
}
