<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
                                                                        
                                                                        <span>В катерогии произведений нет</span>
                                                                        
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
                    <?php require_once 'left.php';?>
		</div>
	</div>	
</div>
