<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->title = $genre->name.' - 4authors.ru';

?>

<div class="main">
	<div class="container">
		<div class="left-col col-md-4">
		    <?php require_once 'left.php';?>
		</div>
		<div class="main-col col-md-8">
			<div class="main-content">
			<h1 class="post-title"><?=$genre->name?></h1>
                        <span class="post-genres">Произведений в разделе: <?=$count?></span>
				<div class="row">
					<div class="col-md-12">
						<ul class="post-list">
                                                    <?php if(!empty($posts)) {?>
                                                        <?php foreach($posts as $cur) {?>
							<li class="post-item">
								<div class="post-info">
									<span class="post-title-item"><a href="<?=\yii\helpers\Url::to(['post', 'id' => $cur['id']])?>"><?=$cur['title']?></a></span>
									<span class="post-author"><a class="post-real-name" href="<?=\yii\helpers\Url::to(['user', 'name' => $cur['name']])?>"><?=$cur['real']?></a>  <a class="post-name" href="<?=\yii\helpers\Url::to(['user', 'name' => $cur['name']])?>">@<?=$cur['name']?></a></span>
									<span class="rating">Рейтинг: <b><?=$cur['rating']?></b></span>
								</div>
								<div class="post-img">
									<img src="<?=Yii::getAlias('@img')?>/<?=$cur['img']?>" alt="<?=$cur['title']?>" />
								</div>
							</li>
                                                        <?php } ?>
                                                    <?php } ?>
						</ul>
					</div>
				</div>
			</div>
                    <!--
                        <div class="social-share">
				Тут будут кнопки поделиться в соц.сетях
			</div>
			<div class="post-comments">
				А тут каменты)00
			</div>
                    -->
		</div>
	</div>	
</div>
