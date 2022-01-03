<?php
require_once '../../config.php';

$userId = $_POST['id'];

$query = "DELETE FROM users WHERE id = :id";
$res = $pdo->prepare($query);
$res->execute([
    ':id' => $userId
    ]);
header('location: /pages/admin/users.php');

