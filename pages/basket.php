<?php
$title = 'Корзина'; //Наименование страницы, передается в "header.php".

require_once '../templates/header.php';

$basketProducts = $_SESSION['products'];
$productsIds = array_keys($basketProducts);

$placeHolders = implode(',', array_fill(0, count($productsIds), '?'));
$query = "SELECT * FROM products WHERE id IN ($placeHolders)"; 

$res = $pdo->prepare($query);
$res->execute($productsIds);
$products = $res->fetchAll();
echo'<pre>';
print_r($_SESSION);
var_dump($productsIds);
var_dump($res);
?>

<table class="table table-bordered mt-2 w-100">
    <tbody>
        <?php
        if ($basketProducts) {
            $allSum = 0;
            foreach ($products as $product) {
                $sum = round($basketProducts[$product['id']] * $product['price'], 2);
                $allSum += $sum;
                echo
                "
                <tr>
                    <td width='40%'>{$product['name']}</td>
                    <td class='text-center' width='20%'>{$product['price']} руб.</td>
                    <td class='text-center' width='20%'>{$basketProducts[$product['id']]}</td>
                    <td class='text-center' >{$sum} руб.</td>
                </tr>
                ";
            }
            
            echo
                "
                <tr>
                    <th class='text-right' colspan='4'>Итого: {$allSum} руб.</th>
                </tr>
                ";
        } else {
            echo "<div disabled class='text-center w-100 mt-2'>
                    <h5>-- В корзине пока ничего нет --</h5>
                  </div>";
        }
        ?>    
    </tbody>
</table>

<?php
require_once '../templates/footer.php';