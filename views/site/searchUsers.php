<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\components\leftSideWidget;
//use yii\widgets\LinkPager;

$this->title = 'Результаты поиска (авторы) - 4authors.ru';

?>

<div class="main">
	<div class="container">
		<div class="main-col col-md-8">
			<div class="main-content">
                        <div class="search_engine">
				<span>Расширенный поиск по параметрам (в разработке)</span>
			</div>
			<h1 class="post-title">Результаты поиска</h1>
                        <span class="post-genres">Найдено по запросу: <?=$count?></span>
				<div class="row">
					<div class="col-md-12">
						<ul class="user-list">
                                                    <?php if(!empty($users)) {?>
                                                        <?php foreach($users as $cur) {?>
							<li class="user-one">
								<div class="user-info">
                                                                    <span class="user-link"><a href="<?= yii\helpers\Url::to(['user', 'name' => $cur['name']])?>">@<?=$cur['name']?></a> <?=$cur['real_name']?></span>
									<span class="user-other">Публикаций: <?=$cur['posts']?></span><span class="user-other">Комментариев: 0</span>
								</div>
								<div class="user-avatar">
                                                                    <img src="<?=Yii::getAlias('@avatar')?>/<?=$cur['avatar']?>" alt="<?=$cur['name']?>" />
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
                <div class="left-col col-md-4">
                    <?php 
                    
                        leftSideWidget::begin();
           
                        leftSideWidget::end();
                        
                    ?>
		</div>
	</div>	
</div>




