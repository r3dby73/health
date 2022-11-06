<?php

session_start();
require_once("../classes/LogUser.php");

if(isset($_SESSION['name']) || isset($_COOKIE['name']))
    header("Location: http://localhost:8080/health/php/main_page.php");


$phoneNumber = htmlspecialchars(trim($_POST['phoneNumber']));
$password = htmlspecialchars(trim($_POST['password']));

$user = new LogUser($phoneNumber, $password);

?>

<!doctype html>
<html>
    <head>
        <title>Health - Авторизация</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/login.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container-1">
            <div class="container-2">
                <div class="logo-block">
                    <a href="main_page.php">
                        <img src="../img/heart.png" width="110px">
                    </a>
                </div>
                <p class="form-title">Авторизация</p>
                
                <form class="container-3" action="loginCheck.php" method="post">
                    <?php
                        if(!$user->checkExistsUser())
                        {
                            echo "<p class=\"error\">Неверно введен номер телефона или пароль</p>";
                        }
                        else
                        {
                            echo "<script>window.location.replace(\"http://localhost:8080/health/php/main_page.php\");</script>";
                        }
                    ?>
                    <p class="input-label">Номер телефона</p>
                    <input name="phoneNumber" required>
                    <p class="input-label">Пароль</p>
                    <input name="password" type="password" required>
                    <div class="button-block">
                        <input class="button" type="submit" value="Войти">
                    </div>
                    <div class="cancel-block">
                        <a href="main_page.php">Отмена</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>