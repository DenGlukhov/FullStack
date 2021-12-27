<?php
session_start();

$user = 'root';
//$password = 'Rootadmin127';
$pdo = new Pdo('mysql:dbname=fullstack;host=127.0.0.1', $user);

// $query = "SELECT * FROM users";
// $res = $pdo->query($query);
// $users = $res->fetchAll();

// $query = "SELECT * FROM cities";
// $res = $pdo->query($query);
// $cities = $res->fetchAll();

