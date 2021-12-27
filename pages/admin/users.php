<?php
$title = 'Список пользователей'; //Наименование страницы, передается в "header.php".
require_once '../../templates/header.php';

$query = "SELECT * FROM users";
$res = $pdo->query($query);
$users = $res->fetchAll();

$query = "SELECT * FROM cities";
$res = $pdo->query($query);
$cities = $res->fetchAll();

echo "
    <table class='table table-bordered'>
        <thead class='text-center'>
            <tr>
                <th>id</th>
                <th>Логин</th>
                <th>Имя</th>
                <th>id города</th>
                <th>Удаление</th>
            </tr>
        <thead>
        <tbody>
";

foreach ($users as $user) {
    
    $city = $user['city_id'] ? $user['city_id'] : '-';

    echo "
    <tr>
        <td class='text-center'>{$user['id']}</td>
        <td class='text-center'> <a href='pages/user.php?id={$user['id']}'>
            {$user['login']}
                </a>
            </td>
        <td>{$user['name']}</td>
        <td class='text-center'>{$city}</td>
        <td class='text-center'>
            <form method='post' action='actions/del_user.php'> 
                <input hidden name='id' value={$user['id']}>
                <button type='submit'class='btn btn-danger'>X</button>
            </form>
        </td>
    </tr>
    ";
}

echo "
        </tbody>
        </table>
";

require_once '../../templates/footer.php';
