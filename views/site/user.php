<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\components\leftSideWidget;

$this->title = $user->name.' - 4authors.ru';

?>

<div class="main">
	<div class="container">
		<div class="main-col col-md-8">	
                <div class="main-content">
			<h1 class="post-title"><?=$user->name?></h1>
				<div class="row account">
					<div class="account-main col-md-6 col-sm-6 col-xs-7">
						<div class="account-avatar">
							<img src="<?=Yii::getAlias('@avatar')?>/<?=$user->avatar?>" alt="<?=$user->name?>" />
						</div>
						<div class="account-name">
							<span>Имя:</span>
							<span class="accent"><?=$user->real_name?></span>
						</div>
						<div class="account-type">
							<span>Тип аккаунта:</span>
							<span class="accent"><?=$user->position?></span>
						</div>
						<div class="account-gender">
							<span>Пол:</span>
							<span class="accent"><?=$user->gender?></span>
						</div>
						<div class="account-info">
							<span>Информация:</span>
                                                        <?php if(!empty($name->info)) {?>
                                                        <?= $name->info ?>
                                                        <?php } else {?>
							<span class="account-info-span">Пока не поделился информацией о себе.</span>
                                                        <?php } ?>
						</div>
					</div>
					<div class="account-other col-md-6 col-sm-6 col-xs-5">
						<div class="account-date">
							<span>Дата регистрации:</span>
							<span class="accent"><?=Yii::$app->formatter->asDatetime($user->regdate, "php:d.m.Y")?></span>
						</div>
						<div class="account-date">
							<span>Последний раз был на сайте:</span>
							<span class="accent"><?=Yii::$app->formatter->asDatetime($user->last_seen, "php:d.m.Y")?></span>
						</div>
						<div class="account-date">
							<span>Просмотров профиля:</span>
							<span class="accent"><?=$user->sees?></span>
						</div>
						<div class="account-activ">
							<span>Активность:</span>
							<a href="">Комментарии (0)</a>
							<a href="<?=\yii\helpers\Url::to(['posts', 'name' => $user->name_id])?>">Публикации (<?=$posts_count?>)</a>
						</div>
						<div class="account-sub">
							<span>Действия:</span>
							<a class="button" href="">Написать сообщение</a>
						</div>
					</div>
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
