<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\components\leftSideWidget;
use yii\widgets\ActiveForm;

$this->title = 'Сброс пароля - '.Yii::getAlias('@sitename');

?>

<div class="main">
	<div class="container">
		<div class="main-col col-md-8">
			<div class="main-content">
                            <div class="login-title">
					<span>Новый пароль (не работает)</span>
				</div>
                            
				<div class="login-body">
                                    <?php $form = ActiveForm::begin(['class' => 'restore-form']) ?>
                                        <ul class="form-list">
                                            <li>
                                                <?= $form->field($model, 'password')->passwordInput(['disabled' => true])->label('Новый пароль')?>
                                            </li>
                                            <li>
                                                <?= $form->field($model, 'rePassword')->passwordInput(['disabled' => true])->label('Повторите пароль')?>
                                            </li>
                                            <li class="login-button">
                                                <?= \yii\helpers\Html::submitButton('Далее')?>
                                                    <a href="<?= \yii\helpers\Url::to(['person/register'])?>">Зарегистрироваться</a>
                                            </li>
                                        </ul>
                                    <?php ActiveForm::end() ?>
                                </div>
                            
			</div>
		</div>
                <div class="left-col col-md-4">
                    <?php 
                    
                        leftSideWidget::begin();
           
                        leftSideWidget::end();
                        
                    ?>
		</div>
	</div>	
</div>


