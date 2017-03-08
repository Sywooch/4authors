<?php $this->title = 'Личный кабинет - '.Yii::getAlias('@sitename')?>
<span>Здесь будет твой личный кабинет, <?=Yii::$app->user->identity->real_name?>. Но пока тут ничего нет, так что остается только <a href="<?= \yii\helpers\Url::to(['person/logout'])?>">выйти</a></span>
