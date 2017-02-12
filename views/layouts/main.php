<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="<?= Yii::$app->language ?>">
<!--<![endif]-->
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<title><?= Html::encode($this->title) ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?= Html::csrfMetaTags() ?>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
<![endif]-->

<header class="header">
	<div class="header high_header">
		<div class="wrapper high_header container">
			<div class="row">
				<div class="col-md-12">
					<div class="logo-container float-l">
						<a href="" class="logo">
							<span class="logo-span"></span>
							<span class="logo-text-span">Лучшие писатели рунета!</span>
						</a>
					</div>
					<div class="search-container float-l">
						<form class="search" action="" method="GET">
						<input type="text" name="q" placeholder="Автор или название" />
						<div class="select_wrap">
							<select name="cat_list" class="cat_list">
								<option name="locked" disabled selected>Все разделы</option>
							</select>
						</div>
						<input type="submit" name="go_search" value="" />
						</form>
					</div>
					<!--<div class="mini-search"></div>-->
						<div class="search-mini "></div>
					<div class="users-container float-r">
						<div class="users">
						<div class="users_one hidden-xs">
							<span class="users_hello">Здравствуйте, гость!</span><br/>
							<span class="users_entry">
								<a href="">Вход</a> || <a href="">Регистрация</a>
							</span>
						</div>
						<div class="users_two hidden-xs"></div>
						<div class="users-mini hidden-md hidden-lg"></div>

						<!--
							<div class="user_icon"></div>
							<div class="user_name">
								<span class="user_hello">Здравствуйте, гость!</span>
								<span class="user_entry">
									<a href="">Вход</a> || <a href="">Регистрация</a>
								</span>
							</div>
						-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header low_header">
		<div class="wrapper container">
			<div class="row">
				<div class="col-md-12">
					<div class="menu-container float-l">
						<nav class="">
							<div class="menu-mini"></div>
							<ul class="main_menu">
								<li><a class="menu_active" href="">Произведения</a></li>
								<li><a href="">Авторы</a></li>
								<li><a href="">Конкурсы</a></li>
								<li><a href="">Справочник</a></li>
								<!-- If mobile -->
								<li><a class="mini-support" href="">Поддержка</a></li>
								<li><a class="mini-search" href="">Поиск</a></li>
							</ul>
						</nav>
					</div>
					<div class="new-container float-r">
						<a href="" class="low_h support">Поддержка</a>
						<a href="" class="low_h new_post">Опубликовать</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main -->

	<?= $content ?>

<footer class="main_footer">
	<div class="high_footer">
		<div class="container">
			<div class="col-md-4">
				<span class="num">7000</span>
				<span class="desc">Зарегистрированных пользователей</span>
			</div>
			<div class="nums col-md-4">
				<span class="num">7000</span>
				<span class="desc">Опубликованных работ</span>
			</div>
			<div class="col-md-4">
				<ul class="social">
					<li><a href=""><i class="fa fa-vk" aria-hidden="true"></i></a></li>
					<li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="low_footer">
		<div class="container">
			<div class="col-md-12">
				<span>© 2017 4authors.ru. Все права защищены. Копирование любой иноформации без согласия валадельца и обратной ссылки запрещено.</span>
			</div>
		</div>
	</div>
</footer>
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="libs/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>