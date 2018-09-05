<?php

/* @var $this \yii\web\View */
/* @var $content string */

/**
 * @var $user common\models\User
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\MyAsset;
use common\widgets\Alert;

MyAsset::register($this);
if(!Yii::$app->user->isGuest)
    $user=Yii::$app->user->getIdentity();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>
    <div class="row header">
        <div class="col-md-offset-1 col-md-2">
            <h1>My Minds</h1>
        </div>
        <div class="col-md-offset-6 col-md-3">
            <nav>
                <ul class="list-inline">
                    <li><a href="#">На главную</a></li>
                    <li><a href="#">О Нас</a></li>
                    <?php if(!Yii::$app->user->isGuest) { ?>
                    <li><a href="/minds/exit">Выход (<?= $user->username ?>)</a>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</header>
<?= $content ?>
<footer>
    <div class="row footer">
        <div class="col-md-2">
            Информация о нас :<br>
            <address>г.СПб, ул.Пушкина д.Колотушкина</address>
        </div>
        <div class="col-md-4">
            Здесь будет небольшое меню, потом придумаю какое
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
