<?php

session_start();
require_once "db_con.php";
if(!isset($_SESSION['name']) && !isset($_COOKIE['name']))
    header("Location: http://localhost:8080/health/php/login.php");

$db_id = '';
    if(isset($_SESSION['id']))
        $db_id = $_SESSION['id'];
    else if(isset($_COOKIE['id']))
        $db_id = $_COOKIE['id'];

$command = "SELECT * FROM Users WHERE id = '$db_id'";
$currentUser = mysqli_fetch_row(mysqli_query($con, $command));

?>

<!doctype html>
<html>
    <head>
        <title>Health - Профиль</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/profile.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container-1">
            <div class="container-2">
                <header>
                    <div class="header-left-part">
                        <a href="main_page.php">
                            <img src="../img/heart.png" width="110px">
                        </a>
                        <div class="header-title">
                            <p class="header-title-part1">Health</p>
                            <p>Частная клинка</p>
                        </div>
                    </div>
                    <div class="header-right-part">
<?php

if(isset($_SESSION['name']))
{
    echo "<img src=\"../img/user.png\" width=\"50px\">
          <div class=\"profile-part\">
                <p class=\"profile-part-welcome\">".$_SESSION['name']." ".$_SESSION['surname']."</p>
                <a href=\"logout.php\"><p>Выйти из учетной записи</p></a>
          </div>";
}
else if(isset($_COOKIE['name']))
{
    echo "<img src=\"../img/user.png\" width=\"50px\">
          <div class=\"profile-part\">
                <p class=\"profile-part-welcome\">".$_COOKIE['name']." ".$_COOKIE['surname']."</p>
                <a href=\"logout.php\"><p>Выйти из учетной записи</p></a>
          </div>";
}

?>                      
                    </div>
                </header>
                <div class="profile-menu">
                    <p class="profile-menu-title">Личный кабинет</p>
                    <p><a class="profile-menu-a current-page" href="personal_page_profile.php">Профиль</a></p>
                    <p><a class="profile-menu-a" href="pp_myTickets.php">Талоны</a></p>
                    <p><a class="profile-menu-a" href="pp_ov.php">Осмотры врачей</a></p>
                    <p><a class="profile-menu-a" href="pp_lab.php">Лабораторные исследования</a></p>
                </div>
                <div class="container-3">
                    <form action="updateUser.php" method="post">
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Имя</p>
                                <?php
                                    echo "<input name=\"name\" value=\"".$currentUser[1]."\" required>";
                                ?>
                            </div>
                            <div>
                                <p class="input-label">Номер телефона</p>
                                <?php
                                    echo "<input name=\"phoneNumber\" value=\"".$currentUser[3]."\" required>";
                                ?>
                            </div>
                        </div>
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Фамилия</p>
                                <?php
                                    echo "<input name=\"surname\" value=\"".$currentUser[0]."\" required>";
                                ?>
                            </div>
                            <div>
                                <p class="input-label">Идентификационный номер</p>
                                <?php
                                    echo "<input name=\"id\" value=\"".$currentUser[4]."\" required>";
                                ?>
                            </div>
                        </div>
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Отчество</p>
                                <?php
                                    echo "<input name=\"patronymic\" value=\"".$currentUser[2]."\">";
                                ?>
                            </div>
                            <div>
                                <p class="input-label">Обслуживающая поликлиника</p>
                                <?php
                                    echo "<input name=\"clinic\" value=\"".$currentUser[5]."\" required>";
                                ?>
                            </div>
                        </div>
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Район</p>
                                <input name="district" placeholder="Центральный" required>
                            </div>
                            <div class="inputs-block-group">
                                <div>
                                    <p class="input-label">Улица</p>
                                    <input class="input-street" name="street" placeholder="Пушкина" required>
                                </div>
                                <div>
                                    <p class="input-label">Дом</p>
                                    <input class="input-numeric" name="house" placeholder="102" required>
                                </div>
                                <div>
                                    <p class="input-label">Корп.</p>
                                    <input class="input-numeric" name="build" placeholder="5">
                                </div>
                                <div>
                                    <p class="input-label">Кв.</p>
                                    <input class="input-numeric" name="apartment" placeholder="102">
                                </div>
                            </div>
                        </div>
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Пароль</p>
                                <input name="password" type="password" required>
                            </div>
                            <div>
                                <p class="input-label">Подтвердить пароль</p>
                                <input name="confirmedPassword" type="password" required>
                            </div>
                        </div>

                        <div class="button-block">
                            <input class="button" type="submit" value="Изменить">
                        </div>
                    </form>
                    <div class="cancel-block">
                        <a href="main_page.php">Отмена</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>