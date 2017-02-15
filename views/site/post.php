<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->title = $post->title.' - 4authors.ru';

?>

<div class="main">
	<div class="container">
		<div class="left-col col-md-4">
		    <?php require_once 'left.php';?>
		</div>
		<div class="main-col col-md-8">
			<div class="main-content">
			<h1 class="post-title"><?=$post->title?></h1>
                        <span class="post-genres"><?=$form?> в жанре: <a href="<?= \yii\helpers\Url::to(['genre', 'id' => $genre_id])?>"><?=$genre?></a></span>
				<div class="row">
					<div class="col-md-12">
						<div class="post-img">
							<img src="<?=Yii::getAlias('@img')?>/<?=$post['img']?>" alt="<?=$post->title?>" />
						</div>
						<div class="text-body">
                                                    <?=$post->text?>
						</div>
						<div class="date-author">
							<span class="big-span"><a href="">@<?=$user_name?> /</a> <?=$user_real_name?>, <span class="date"><?=Yii::$app->formatter->asDatetime($post['date'], "php:Y")?> год</span></span>
						</div>
						<div class="rating-date clearfix">
							<div class="rating">
								Рейтинг: <span><?=$post->rating?></span>
							</div>
							<div class="date">
								Опубликовано: <span><?=Yii::$app->formatter->asDatetime($post['date'], "php:d.m.Y")?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
                        <div class="social-share">
				Тут будут кнопки поделиться в соц.сетях
			</div>
			<div class="post-comments">
				А тут каменты)00
			</div>
		</div>
	</div>	
</div>
