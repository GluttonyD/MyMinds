<?php
/* @var $this yii\web\View
 * @var $model frontend\models\SigninForm
 */
$this->title = 'Вход';
?>

<div class="sign-in">
    <form action="/minds/sign-in" method="post">
        <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Введите email" name="SigninForm[email]">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" placeholder="Введите пароль" name="SigninForm[password]">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
        <br>
        <a href="/minds/sign-up">Нет аккаунта? Зарегистрируйтесь!</a>
    </form>
</div>