<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class TopuseWidget extends Widget {
    public $top_array;
    
    public function init() {
        parent::init();
        
        //I though that it's good idea to make top users as widget
        
    }
}