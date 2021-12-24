<?php
$title = 'Главная страница'; //Наименование страницы, передается в "header.php".

require_once 'templates/header.php';
echo '<pre>';
print_r($_SESSION);

require_once 'templates/footer.php';

