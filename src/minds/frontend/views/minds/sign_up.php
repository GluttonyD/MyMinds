<?php
/* @var $this yii\web\View
 * @var $model frontend\models\SignUpForm
 */
$this->title='Регистрация';
?>

<div>
    <form action="/minds/sign-up" method="post">
        <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
        <input type="text" placeholder="Введите имя пользователя" name="SignUpForm[username]">
        <input type="text" placeholder="Введите email" name="SignUpForm[email]">
        <input type="password" placeholder="Введите пароль" name="SignUpForm[password]">
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>