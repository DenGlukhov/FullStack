<?php
require_once '../../config.php';

$currentId = $_SESSION['user']['id'];
$userId = $_POST['id'];

if ($userId != $currentId) {
    $query = "DELETE FROM users WHERE id = :id";
    $res = $pdo->prepare($query);
    $res->execute([
    ':id' => $userId
    ]);
    header('location: /pages/admin/users.php');
} else {
    $_SESSION['delError'] = true;
    header('location: /pages/admin/users.php');
}


