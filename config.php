<?php

define('PRODUCTS_IMAGE_PATH', '/images/products/');
session_start();
$user = 'root';
$password = 'Rootadmin127';
$pdo = new Pdo('mysql:dbname=fullstack;host=127.0.0.1', $user, $password);
$document_root = $_SERVER['DOCUMENT_ROOT'];