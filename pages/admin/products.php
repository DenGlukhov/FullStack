<?php
$title = 'Список продуктов'; //Наименование страницы, передается в "header.php".
require_once '../../templates/header.php';

$query = "SELECT p.id, p.name, p.price, p.description, p.picture, c.name as category FROM products as p JOIN categories as c ON p.category_id = c.id";
$res = $pdo->query($query);
$products = $res->fetchAll();

$query = "SELECT * FROM categories";
$res = $pdo->query($query);
$categories = $res->fetchAll();

if (isset($_SESSION['createProductsErrors'])) {
    $errors = implode('<br>', $_SESSION['createProductsErrors']);
    echo 
    "
    <div align='center' class='alert alert-warning' role='alert'>
        $errors
    </div>
    ";
    unset($_SESSION['createProductsErrors']);
}
?>

<form method="POST" enctype="multipart/form-data" action="/actions/admin/createProduct.php">
    <input value="<?= $_SESSION['lastProductsCreate']['name'] ?? '' ?>" class="form-control mb-2" name='name' placeholder="Наименование продукта">
    <textarea class="form-control mb-2" name='description' placeholder="Описание"><?= $_SESSION['lastProductsCreate']['description'] ?? '' ?></textarea>
    <input value="<?= $_SESSION['lastProductsCreate']['price'] ?? '' ?>" class="form-control mb-2" name='price' placeholder="Цена">
    <input type="file" name='file' class="form-control mb-2">
    <select class="form-control mb-2" name="category_id">
        <?php 
        $lastCategory_id = $_SESSION['lastProductsCreate']['category_id'];
        if (!$lastCategory_id) {
            echo '<option disabled selected>-- Выберите категорию --</option>';
        }
        foreach($categories as $category) {
            $selected = $lastCategory_id == $category['id'] ? 'selected' : '';

            echo "<option $selected value='{$category['id']}'>{$category['name']}</option>";
        }
        ?>
    </select>
    <button class="btn btn-primary w-100" type="submit">Сохранить</button>
    </input>
</form>

<table class="table table-bordered mt-5">
    <thead class="text-center">
        <tr>
            <th>#</th>
            <th>Наименование</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Изображение</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
        if (!$products) {
            echo 
            "
            <tr>
                <td class='text-center' colspan='6'>
                    <em>Продукты отсутствуют</em>
                </td>
            </tr>
            ";
        }

        $path = PRODUCTS_IMAGE_PATH;

        foreach ($products as $product) {
            echo 
            "
            <tr class='text-center'>
                <td >{$product['id']}</td>
                <td>{$product['name']}</td>
                <td>{$product['description']}</td>
                <td>{$product['price']}</td>
                <td>{$product['category']}</td>
                <td> 
                    <img height='100' src='{$path}{$product['picture']}'> 
                </td>
            </tr>
            ";
        }

        ?>
        
    </tbody>
</table>

<?php
require_once '../../templates/footer.php';