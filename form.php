<?php
require_once 'config.php';

$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
$city_id = $_POST['city_id'];

$query = "INSERT INTO users (name, login, password, city_id) VALUES (:name, :login, :password, :city_id)";
$res = $pdo->prepare($query);
$res->execute([
    ':name' => $name,
    ':login' => $login,
    ':password' => $password,
    ':city_id' => $city_id
]);

header("Location: index.php");
