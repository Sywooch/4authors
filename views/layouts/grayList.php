<?php 
    use yii\helpers\Html;
    use app\assets\AppAsset;
    AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <title><?= Html::encode($this->title) ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php $this->head() ?>
    </head>
    <?php $this->beginBody()?>
    <body>
        <?= $content ?>
    </body>
    <?php $this->endBody()?>
</html>
<?php $this->endPage()?>

