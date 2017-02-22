<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use app\components\leftSideWidget;

$this->title = 'Главная';

?>

<div class="main">
	<div class="container">
		<div class="main-col col-md-8">
			<div class="main-content">
			<h1>Произведения по жанрам</h1>
				<div class="row">
					<div class="col-md-12">
						<ul class="genre-list">
                                                    
                                                    <?php foreach ($posts as $value) {?>
							<li>
                                                                <div class="genre-img">
                                                                    <img src="<?=Yii::getAlias('@img')?>/<?=$value['img']?>" alt="<?=$value['name']?>" />
								</div>
								<h2><?=$value['name']?></h2>
								<ul class="product-list">
                                                                    
                                                                    <?php if(!empty($value['posts'])) {
                                                                        foreach ($value['posts'] as $cur) { 
                                                                            ?>
                                                                        
                                                                        <Li>
                                                                            <a href="<?= \yii\helpers\Url::to(['post', 'id' => $cur['id']])?>"><?=$cur['title']?></a>
                                                                            <span><?=$cur['form']?></span>
									</Li>
                                                                        
                                                                        <?php  } ?>
                                                                        
                                                                            <Li class="more">
										<a href="<?= \yii\helpers\Url::to(['genre', 'id' => $value['gen_id']])?>">Еще...</a>
                                                                            </Li>
                                                                        
                                                                        <?php } else { ?>
                                                                        
                                                                        <span>В категории произведений нет</span>
                                                                        
                                                                    <?php   } ?>
                                                                        
								</ul>
							</li>
                                                    <?php } ?>
                                                        
						</ul>
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
