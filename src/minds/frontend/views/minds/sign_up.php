<?php
/* @var $this yii\web\View
 * @var $model frontend\models\SignUpForm
 */
$this->title = 'Регистрация';
?>

<div class="sign-in">
    <form action="/minds/sign-up" method="post">
        <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Введите имя пользователя" name="SignUpForm[username]">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Введите email" name="SignUpForm[email]">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" placeholder="Введите пароль" name="SignUpForm[password]">
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        <br>
        <a href="/minds/sign-in">Уже есть аккаунт? Войдите!</a>
    </form>

</div>