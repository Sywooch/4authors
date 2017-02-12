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
					<li>
						<a href="">Автобоевой отряд ВЦИКа</a>
						<span>Повесть</span>
					</li>
					<li>
						<a href="">Ваня</a>
						<span>Повесть</span>
					</li>
					<li>
						<a href="">Перекрёсток</a>
						<span>Рассказ</span>
					</li>
					<li>
						<a href="">Брошенный</a>
						<span>Рассказ</span>
					</li>
					<li>
						<a href="">Мстислав</a>
						<span>Повесть</span>
					</li>
					<li>
						<a href="">Самолёт</a>
						<span>Рассказ</span>
					</li>
					<li>
						<a href="">Апланта</a>
						<span>Роман</span>
					</li>
					<li>
						<a href="">Часы</a>
						<span>Повесть</span>
					</li>
					<li>
						<a href="">Отец Владимир</a>
						<span>Рассказ</span>
					</li>
					<li>
						<a href="">Ботинок</a>
						<span>Повесть</span>
					</li>
				</ol>
			</aside>
			<aside class="left-sidebar3">
				<h3><span>Самые</span> читаемые</h3>
				<ol class="side-list rating">
					<li>
						<a href="">Автобоевой отряд ВЦИКа</a>
						<span>Повесть</span>
					</li>
					<li>
						<a href="">Ваня</a>
						<span>Повесть</span>
					</li>
					<li>
						<a href="">Перекрёсток</a>
						<span>Рассказ</span>
					</li>
					<li>
						<a href="">Брошенный</a>
						<span>Рассказ</span>
					</li>
					<li>
						<a href="">Мстислав</a>
						<span>Повесть</span>
					</li>
					<li>
						<a href="">Самолёт</a>
						<span>Рассказ</span>
					</li>
					<li>
						<a href="">Апланта</a>
						<span>Роман</span>
					</li>
					<li>
						<a href="">Часы</a>
						<span>Повесть</span>
					</li>
					<li>
						<a href="">Отец Владимир</a>
						<span>Рассказ</span>
					</li>
					<li>
						<a href="">Ботинок</a>
						<span>Повесть</span>
					</li>
				</ol>
			</aside>
			<aside class="left-sidebar4">
				<h3><span>Справочник</span> писателя</h3>
				<ul class="art-list">
					<li><a href="">Книггеры - кто они?</a></li>
					<li><a href="">Количество авторских страниц в книге</a></li>
					<li><a href="">Авторский стиль Толстого</a></li>
					<li><a href="">Сектеры интересного произведения</a></li>
					<li><a href="">Десять способов сделать свой текст лучше</a></li>
				</ul>
			</aside>
		</div>
		<div class="main-col col-md-8">
			<div class="main-content">
			<h1>Произведения по жанрам</h1>
				<div class="row">
					<div class="col-md-6">
						<ul class="genre-list">
							<li>
								<h2>Боевик</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
							<li>
								<h2>Антиутопия</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
							<li>
								<h2>Антиутопия</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
							<li>
								<h2>Антиутопия</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
							<li>
								<h2>Антиутопия</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
							<li>
								<h2>Антиутопия</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="genre-list">
							<li>
								<h2>Антиутопия</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
							<li>
								<h2>Антиутопия</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
							<li>
								<h2>Антиутопия</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
							<li>
								<h2>Антиутопия</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
							<li>
								<h2>Антиутопия</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
							<li>
								<h2>Антиутопия</h2>
								<ul class="product-list">
									<Li>
										<a href="">Сказки</a>
										<span>Стихотворение</span>
									</Li>
									<Li>
										<a href="">Пить или не пить - вот в чем вопрос?</a>
										<span>Очерк</span>
									</Li>
									<Li>
										<a href="">Птицы</a>
										<span>Стихотворение</span>
									</Li>
									<Li class="more">
										<a href="">Еще...</a>
									</Li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
