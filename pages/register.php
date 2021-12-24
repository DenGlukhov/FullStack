 <?php
    $title = 'Регистрация'; //Наименование страницы, передается в "header.php".
    
    require_once '../templates/header.php';

    // $query = "SELECT * FROM users";
    // $res = $pdo->query($query);
    // $users = $res->fetchAll();

    // $query = "SELECT * FROM cities";
    // $res = $pdo->query($query);
    // $cities = $res->fetchAll();
?> 
    <form method="POST" action="../form.php">
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

