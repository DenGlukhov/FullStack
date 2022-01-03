            <?php
            $title = 'Личный кабинет';
            require_once '../templates/header.php';
            

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
                <div align='center' class='alert alert-danger' role='alert'>
                {$_SESSION['error']}
                </div>
                ";
                unset($_SESSION['error']);
            } elseif (isset($_SESSION['success'])) {
                echo 
                "
                <div id='alertSuccess' align='center' class='alert alert-success' role='alert'>
                {$_SESSION['success']}
                </div>
                ";
                unset($_SESSION['success']);
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
                    <div class="alert alert-warning text-center" role="alert">
                        Пользователь не найден
                    </div>
                    ';
                }

                ?>

        </div>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('#alertSuccess').fadeOut()
                }, 3000)
                
            })
        </script>
<?php
require_once '../templates/footer.php';