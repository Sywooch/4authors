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
                                                                            <a href=""><?=$cur['title']?></a>
                                                                            <span><?=$cur['form']?></span>
									</Li>
                                                                        
                                                                        <?php  } ?>
                                                                        
                                                                            <Li class="more">
										<a href="">Еще...</a>
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
	</div>	
</div>
