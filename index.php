<?php
$title = 'Главная страница'; //Наименование страницы, передается в "header.php".

require_once 'templates/header.php';

$query = "SELECT * FROM categories";
$res = $pdo->query($query);
$categories = $res->fetchAll();

$cards = '';
foreach ($categories as $category) {
    $cards .= 
    "
    <div class='card mb-2' style='max-width: 100;'>
        <div class='row g-0'>
            <div class='col-md-2'>
                <img src='/images/categories/no_image.png' class='img-fluid rounded-start' alt='...'>
            </div>
            <div class='col-md-10'>
                <div class='card-body'>
                    <h5 class='card-title'>
                        {$category['name']}
                    </h5>
                    <p class='card-text'>
                        {$category['description']}
                    </p>
                    <a href='/pages/category.php?id={$category['id']}' class='btn btn-success w-100'>Перейти</a>
                </div>
            </div>
        </div>
    </div>
    ";
}
?>

<div>
    <?= $cards ?>
</div>

<?php

require_once 'templates/footer.php';

