<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\components\leftSideWidget;
use yii\widgets\ActiveForm;

$this->title = 'Вход - 4authors.ru';

?>

<div class="main">
	<div class="container">
		<div class="main-col col-md-8">
			<div class="main-content">
                            <div class="login-title">
					<span>Войти в аккаунт</span>
				</div>
				<div class="login-body">
                                    <?php $form = ActiveForm::begin(['class' => 'login-form']) ?>
                                        <ul class="form-list">
                                            <li>
                                                <?= $form->field($model, 'email')->textInput()->label('Электронная почта')?>
                                            </li>
                                            <li>
                                                <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
                                                    <a class="login-password-forgot" href="">Забыли пароль?</a>
                                            </li>
                                            <li class="login-cookie">
                                                    <input id="cookie-login" type="checkbox" value="" />
                                                    <label for="cookie-login">Оставаться в сети (x)</label>
                                            </li>
                                            <li class="login-button">
                                                <?= \yii\helpers\Html::submitButton('Войти')?>
                                                    <a href="<?= \yii\helpers\Url::to(['person/register'])?>">Зарегистрироваться</a>
                                            </li>
                                        </ul>
                                    <?php ActiveForm::end() ?>
				</div>
				<div class="login-social">
					<span>Войти через социальные сети</span>
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


