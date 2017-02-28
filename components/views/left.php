<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<aside class="left-sidebar">
        <h3><span>Доска</span> почёта</h3>
        <ul class="side-list user_list">

        <?php 
        foreach ($users as $user) { ?>
            <li>
                <a href="<?=\yii\helpers\Url::to(['site/user', 'name' => $user['name_id']])?>"><?=$user['name']?></a>
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
                        <a href="<?= \yii\helpers\Url::to(['site/post', 'id' => $cur['id']])?>"><?=$cur['title']?></a>
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
                        <a href="<?= \yii\helpers\Url::to(['site/post', 'id' => $cur['id']])?>"><?=$cur['title']?></a>
                        <span><?=$cur['form']?></span>
                </li>
            <?php } ?>

        </ol>
</aside>
<aside class="left-sidebar4">
        <h3><span>Справочник</span> писателя</h3>
        <ul class="art-list">

            <?php foreach ($articles as $cur) {?>
            <li><a href="<?= \yii\helpers\Url::to(['site/handbook', 'id' => $cur['id']])?>"><?=$cur['title']?></a></li>
            <?php } ?>

        </ul>
</aside>