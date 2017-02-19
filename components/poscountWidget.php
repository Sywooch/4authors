<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Posts;

/**
 * Description of poscountWidget
 *
 * @author Император
 */
class poscountWidget extends Widget{
    
    public $count;
    
    public function init()
    {
        parent::init();
        
        $this->count = Posts::find()->count();
    }
    
    public function run()
    {
        return Html::encode($this->count);
    }
    
}
