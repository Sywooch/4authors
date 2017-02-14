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
			<aside class="left-sidebar">
				<h3><span>Доска</span> почёта</h3>
				<ul class="side-list user_list">
                                    
                                <?php 
                                foreach ($users as $user) { ?>
                                    <li>
                                        <a href=""><?=$user['name']?></a>
                                        <span><?=$user['position']?></span>
                                    </li>
                               <?php  } ?>
                              
				</ul>
			</aside>
			<aside class="left-sidebar2">
				<h3><span>Самые</span> рейтинговые</h3>
				<ol class="side-list rating">
                                    
                                    <?php foreach($ratPosts as $cur) { ?>
					<li>
						<a href=""><?=$cur['title']?></a>
						<span><?=$cur['form']?></span>
					</li>
                                    <?php } ?>
                                        
				</ol>
			</aside>
			<aside class="left-sidebar3">
				<h3><span>Самые</span> читаемые</h3>
				<ol class="side-list rating">
                                    
                                    <?php foreach($viePosts as $cur) { ?>
					<li>
						<a href=""><?=$cur['title']?></a>
						<span><?=$cur['form']?></span>
					</li>
                                    <?php } ?>
                                        
				</ol>
			</aside>
			<aside class="left-sidebar4">
				<h3><span>Справочник</span> писателя</h3>
				<ul class="art-list">
                                    
                                    <?php foreach ($articles as $cur) {?>
                                        <li><a href=""><?=$cur['title']?></a></li>
                                    <?php } ?>
                                        
				</ul>
			</aside>
		</div>
		<div class="main-col col-md-8">
			<div class="main-content">
			<h1 class="post-title"><?=$post->title?></h1>
                        <span class="post-genres"><?=$form?> в жанре: <a href=""><?=$genre?></a></span>
				<div class="row">
					<div class="col-md-12">
						<div class="post-img">
							<img src="<?=Yii::getAlias('@img')?>/<?=$post['img']?>" alt="Ваня" />
						</div>
						<div class="text-body">
                                                    <?=$post->text?>
						</div>
						<div class="date-author">
							<span class="big-span"><a href="">@<?=$user_name?> /</a> <?=$user_real_name?>, <span class="date">2013 год</span></span>
						</div>
						<div class="rating-date clearfix">
							<div class="rating">
								Рейтинг: <span><?=$post->rating?></span>
							</div>
							<div class="date">
								Опубликовано: <span><?=$post['date']?></span>
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
