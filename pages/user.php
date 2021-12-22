<?php
session_start();
?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
    <body>
            <div class='container mt-5'> 

<?php

$user = 'root';
$password = 'Rootadmin127';
$pdo = new Pdo('mysql:dbname=fullstack;host=127.0.0.1', $user, $password);

$userId = $_GET['id'];

$query = "SELECT * FROM users WHERE id = :id";
$res = $pdo->prepare($query);
$res->execute([
    ':id' => $userId,
]);

$user = $res->fetch();

if ($user) {

$query = "SELECT * FROM cities";
$res = $pdo->query($query);
$cities = $res->fetchAll();

if (isset($_SESSION['error'])) {
    echo 
    "
    <div class='alert alert-danger' role='alert'>
    {$_SESSION['error']}
    </div>
    ";
    unset($_SESSION['error']);
}

?>
                <form method='post' action='../actions/update_user.php'>
                    <label>Имя</label>
                    <input name='id' hidden value='<?=$user['id']?>'>
                    <input class='form-control mb-2' name='name' value='<?=$user['name']?>'>
                    <label>Логин</label>
                    <input class='form-control mb-2' name='login' value='<?=$user['login']?>'>
                    <select class="form-control mb-2" name="city_id">
                        <?php
                            if (!$user['city_id']) {
                                echo '<option selected disabled>-- Укажите город --</option>';
                            } else {
                                    
                            }
                            foreach ($cities as $city) {
                                $selected = $city['id'] == $user['city_id'] ? 'selected' : '';
                                echo "<option $selected value='{$city['id']}'>{$city['name']}</option>";
                            }
                        ?>
                </select>
                <button type="submit" class="btn btn-success w-100">Сохранить</button>
                </form> 

                <?php
                } else {
                    echo 
                    '
                    <div class="alert alert-warning" role="alert">
                        Пользователь не найден
                    </div>
                    ';
                }

                ?>

            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>