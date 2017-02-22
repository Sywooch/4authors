<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<nav class="">
    <div class="menu-mini"></div>
        <ul class="main_menu">
                <li><a class="<?=$index?>" href="<?= \yii\helpers\Url::to(['/'])?>">Произведения</a></li>
                <li><a class="<?=$users?>" href="<?= \yii\helpers\Url::to(['users'])?>">Авторы</a></li>
                <li><a href="">Конкурсы</a></li>
                <li><a href="">Справочник</a></li>
                <!-- If mobile -->
                <li><a class="mini-support" href="">Поддержка</a></li>
                <li><a class="mini-search" href="">Поиск</a></li>
        </ul>
</nav>