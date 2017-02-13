<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\db\ActiveRecord;

/**
 * Description of Articles
 *
 * @author Император
 */
class Articles extends ActiveRecord{
    
    public static function tableName()
    {
        return 'articles';
    }
    
    public function GetArticlesByViews()
    {
        return Articles::find()->orderBy('views DESC')->limit(5)->all();
    }
    
}
