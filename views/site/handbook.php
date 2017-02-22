<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\components\leftSideWidget;

$this->title = $article->title.' - 4authors.ru';

?>

<div class="main">
	<div class="container">
		<div class="main-col col-md-8">
			<div class="main-content">
                            <h1 class="post-title"><?=$article->title?></h1>
				<div class="row">
					<div class="col-md-12">
						<div class="post-img">
							<img src="<?=Yii::getAlias('@img')?>/<?=$article->img?>" alt="<?=$article->title?>" />
						</div>
						<div class="text-body">
                                                    <?=$article->text?>
						</div>
						<div class="rating-date clearfix">
							<div class="rating">
							</div>
							<div class="date">
								Опубликовано: <span><?=Yii::$app->formatter->asDatetime($article->date, "php:d.m.Y")?></span>
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
                <div class="left-col col-md-4">
                    <?php 
                    
                        leftSideWidget::begin();
           
                        leftSideWidget::end();
                        
                    ?>
		</div>
	</div>	
</div>
