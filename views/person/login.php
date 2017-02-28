<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\components\leftSideWidget;

$this->title = 'Вход - 4authors.ru';

?>

<div class="main">
	<div class="container">
		<div class="main-col col-md-8">
			<div class="main-content">
                            <div class="login-title">
					<span>Войти в аккаунт (не работает)</span>
				</div>
				<div class="login-body">
					<form method="POST" class="login-form">
						<ul class="form-list">
							<li>
								<label for="login-text">Электронная почта</label>
								<input id="login-text" type="text" name="login" />
							</li>
							<li>
								<label for="login-password">Пароль</label>
								<input id="login-password" type="text" name="password" />
								<a class="login-password-forgot" href="">Забыли пароль?</a>
							</li>
							<li>
								<input id="cookie-login" type="checkbox" value="" />
								<label for="cookie-login">Оставаться в сети</label>
							</li>
							<li class="login-button">
								<input type="submit" value="Войти" />
								<a href="">Зарегистрироваться</a>
							</li>
						</ul>
					</form>
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


