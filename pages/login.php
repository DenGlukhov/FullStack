
<?php
$title = 'Авторизация'; //Наименование страницы, передается в "header.php".
require_once '../templates/header.php'
?>

<form method="POST" action="../actions/login.php">
    <input required class="form-control mb-2" placeholder="Введите логин" name='login'>
    <input class="form-control mb-2" type="password" placeholder="Введите пароль" name='password'>
    <button type="submit" class="btn btn-primary w-100">Войти</button>
</form>

<?php
require_once '../templates/footer.php';

