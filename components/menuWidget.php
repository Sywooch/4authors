<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\base\Widget;
use Yii;

/**
 * Description of menuWidget
 *
 * @author Император
 */
class menuWidget extends Widget{
    
    public $index = null;
    public $users = null;
    
    public function init()
    {
        parent::init();
        $action = Yii::$app->controller->action->id;
        
        switch ($action) {
            case 'index':
                    $this->index = 'menu_active';
            break;
            
            case 'users':
                $this->users = 'menu_active';
                break;
        }
    }
    
    public function run()
    {
        return $this->render('menu', [
            'index' => $this->index,
            'users' => $this->users
        ]);
    }
    
}
