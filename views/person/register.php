<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\components\leftSideWidget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Регистрация - 4authors.ru';

?>

<div class="main">
	<div class="container">
		<div class="main-col col-md-8">
			<div class="main-content">
                            <div class="login-title">
					<span>Регистрация</span>
				</div>
                                <?php if ($completed) { ?>
                                    <div class="success">Регистрация прошла успешно. Проверьте почтовый ящик</div>
                                <?php } else {?>
				<div class="registration-body">
					<?php $form = ActiveForm::begin(['class' => 'registration-form']);?>
                                            <?php if($status === 'pswrd') {?>
                                                <div class="error">Пароли не совпадают</div>
                                            <?php } elseif ($status === false) { ?>
                                                <div class="error">Произошла неизвестная ошибка. Попробуйте еще раз.</div>
                                            <?php }?>
                                                
						<ul class="form-list">
                                                   
							<li>
                                                            <?= $form->field($model, 'realName')->textInput()->label('Настоящее имя')?>
							</li>
							<li>
                                                            <?= $form->field($model, 'name')->textInput()->label('Логин')?>
							</li>
                                                        <li>
                                                            <?= $form->field($model, 'email')->textInput()->label('Электронная почта')?>
							</li>
							<li>
                                                            <?= $form->field($model, 'password')->passwordInput()->label('Пароль')?>
							</li>
							<li>
                                                            <?= $form->field($model, 'rePassword')->passwordInput()->label('Повторите пароль')?>
							</li>
							<li class="login-button">
                                                            <?=Html::submitButton('Регистрация')?>
                                                            <a href="<?= yii\helpers\Url::to(['person/login'])?>">Войти</a>
							</li>
                                    
						</ul>
					<?php ActiveForm::end();?>
				</div>
				<div class="login-social">
					<span>Войти через социальные сети</span>
				</div>
                                <?php } ?>
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




