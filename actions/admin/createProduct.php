<?php
require $_SERVER['DOCUMENT_ROOT'] . '/config.php';

$errors = [];
$file = $_FILES['file'];

if (!$file['name']) {
    $errors [] = 'Необходимо загрузить изображение';
} else {
    $types = $file['type'];
    $type = explode('/', $types);
    if ($type[0] != 'image') {
        $errors [] = 'Загруженный файл должен быть изображением';
    }
}

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];

if (!$name) {
    $errors [] = 'Необходимо указать наименование продукта';
}
if (!$description) {
    $errors [] = 'Необходимо указать описание продукта';
}
if (!$price) {
    $errors [] = 'Укажите цену продукта';
}
if (!$category_id) {
    $errors [] = 'Необходимо выбрать категорию продукта';
}

if (count($errors)) {
    $_SESSION['lastProductsCreate'] = [
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'category_id' => $category_id,
    ];
    
    $_SESSION['createProductsErrors'] = $errors;
    header('location: /pages/admin/products.php');
    exit();
}

$temp = explode('.', $file['name']);
$ext = $temp[count($temp) - 1];
$fileName = time() . rand(10000, 99999) . '.' . $ext; 

move_uploaded_file($file['tmp_name'], "$document_root/images/products/$fileName");

$query = 'INSERT INTO products (name, description, price, category_id, picture) VALUES (:name, :description, :price, :category_id, :picture)';
$res = $pdo->prepare($query);
$res->execute([
    ':name' => $name,
    ':description' => $description,
    ':price' => $price,
    ':category_id' => $category_id,
    ':picture' => $fileName,
]);

// echo '<pre>';
// print_r($res->errorInfo());

unset ($_SESSION['lastProductsCreate']);
header("location: /pages/admin/products.php");