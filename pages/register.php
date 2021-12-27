<?php
    $title = 'Регистрация'; //Наименование страницы, передается в "header.php".
    
    require_once '../templates/header.php';

    $query = "SELECT * FROM cities";
    $res = $pdo->query($query);
    $cities = $res->fetchAll();

    if (isset($_SESSION['registerError'])) {
        echo 
        "
        <div align='center' class='alert alert-warning' role='alert'>
        {$_SESSION['registerError']}
        </div>
        ";
        unset($_SESSION['registerError']);
    }

?> 
    <form method="POST" action="../actions/register.php">
        <label>Имя</label>
        <input required class="form-control mb-2" placeholder="Укажите имя" name='name'>
        <label>Логин</label>
        <input requaired class="form-control mb-2" placeholder="Укажите логин" name='login'>
        <label>Пароль</label>
        <input requaired class="form-control mb-2" type="password" placeholder="Задайте пароль" name='password'>
        <input requaired class="form-control mb-2" type="password" placeholder="Подтвердите пароль" name='repeatPassword'>
        <label>Город</label>
        <select class="form-control mb-2" name="city_id">
            <option value='<?=NULL?>' selected disabled>-- Укажите город --</option>
                
                <?php
                    foreach ($cities as $city) {
                        echo "<option value='{$city['id']}'>{$city['name']}</option>";
                    }
                ?>

        </select>
        <button type="submit" class="btn btn-success w-100">Регистрация</button>
    </form>

<?php
require_once '../templates/footer.php';


