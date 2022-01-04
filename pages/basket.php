<?php
$title = 'Корзина'; //Наименование страницы, передается в "header.php".

require_once '../templates/header.php';

$basketProducts = $_SESSION['products'];
$productsIds = array_keys($basketProducts);

$query = "SELECT * FROM products WHERE id IN (:ids)"; // Необходимо поправить запрос,т.к. некорректно отрабатывает. На след. занятии.
$res = $pdo->prepare($query);
$res->execute([
    ':ids' => implode(',', $productsIds),
]);
$products = $res->fetchAll();
?>

<table class="table table-bordered mt-2">
    <tbody>
        <?php
        foreach ($products as $product) {
            $sum = round($basketProducts[$product['id']] * $product['price'], 2);
            echo
            "
            <tr>
                <td>{$product['name']}</td>
                <td>{$product['price']}</td>
                <td>{$basketProducts[$product['id']]}</td>
                <td>{$sum}</td>
            </tr>
            ";
        }
        ?>    
    </tbody>
</table>

<?php
require_once '../templates/footer.php';