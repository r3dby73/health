<?php

session_start();
require_once "../classes/RegUser.php";
require_once "db_con.php";

if(!isset($_SESSION['name']) && !isset($_COOKIE['name']))
    header("Location: http://localhost:8080/health/php/login.php");

$name = htmlspecialchars(trim($_POST['name']));
$surname = htmlspecialchars(trim($_POST['surname']));
$patronymic = htmlspecialchars(trim($_POST['patronymic']));
$phoneNumber = htmlspecialchars(trim($_POST['phoneNumber']));
$id = mb_strtoupper(htmlspecialchars(trim($_POST['id'])));
$clinic = htmlspecialchars(trim($_POST['clinic']));
$district = htmlspecialchars(trim($_POST['district']));
$street = htmlspecialchars(trim($_POST['street']));
$build = htmlspecialchars(trim($_POST['build']));
$house = htmlspecialchars(trim($_POST['house']));
$apartment = htmlspecialchars(trim($_POST['apartment']));
$password = htmlspecialchars(trim($_POST['password']));
$confirmedPassword = htmlspecialchars(trim($_POST['confirmedPassword']));

$user = new RegUser($name, $surname, $patronymic, $phoneNumber, $id, $clinic, $district, $street, $build, $house, $apartment, $password, $confirmedPassword);

$error = false;

$db_id = '';
if(isset($_SESSION['id']))
    $db_id = $_SESSION['id'];
else if(isset($_COOKIE['id']))
    $db_id = $_COOKIE['id'];

$command = "SELECT * FROM Users WHERE id = '$db_id'";
$currentUser = mysqli_fetch_row(mysqli_query($con, $command));

setcookie('surname', $surname, 0);
setcookie('name', $name, 0);
setcookie('id', $id, 0);

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
        <script src="https://unpkg.com/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>
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
                                    if(!$user->lenCheck($name))
                                    {
                                        echo "<input class=\"error-input\" name=\"name\" value=\"".$currentUser[1]."\" required><p class=\"error\">* Не более 100 символов</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"name\" value=\"".$currentUser[1]."\" required>";
                                ?>
                            </div>
                            <div>
                                <p class="input-label">Номер телефона</p>
                                <?php
                                    if(!$user->phoneNumberCheck())
                                    {
                                        echo "<input class=\"error-input\" name=\"phoneNumber\" value=\"".$currentUser[3]."\" required><p class=\"error\">* Неверный формат</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"phoneNumber\" value=\"".$currentUser[3]."\" required>";
                                ?>
                            </div>
                        </div>
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Фамилия</p>
                                <?php
                                    if(!$user->lenCheck($surname))
                                    {
                                        echo "<input class=\"error-input\" name=\"surname\" value=\"".$currentUser[0]."\" required><p class=\"error\">* Не более 100 символов</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"surname\" value=\"".$currentUser[0]."\" required>";
                                ?>
                            </div>
                            <div>
                                <p class="input-label">Идентификационный номер</p>
                                <?php
                                    $existsId = "SELECT * FROM Users WHERE id = '$id'";
                                    if(!$user->idFormatCheck())
                                    {
                                        echo "<input class=\"error-input\" name=\"id\" value=\"".$currentUser[4]."\" required><p class=\"error\">* Только англ. буквы и цифры</p>";
                                        $error = true;
                                    }
                                    else if(!$user->idLenCheck())
                                    {
                                        echo "<input class=\"error-input\" name=\"id\" value=\"".$currentUser[4]."\" required><p class=\"error\">* Не менее 14 символов</p>";
                                        $error = true;
                                    }
                                    else if(!$user->lenCheck($id))
                                    {
                                        echo "<input class=\"error-input\" name=\"id\" value=\"".$currentUser[4]."\" required><p class=\"error\">* Не более 100 символов</p>";
                                        $error = true;
                                    }
                                    else if(mysqli_fetch_row(mysqli_query($con, $existsId)) && ($db_id != $id))
                                    {
                                        echo "<input class=\"error-input\" name=\"id\" value=\"".$currentUser[4]."\" required><p class=\"error\">* Уже зарегистрирован</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"id\" value=\"".$currentUser[4]."\" required>";
                                ?>
                            </div>
                        </div>
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Отчество</p>
                                <?php
                                    if(!$user->lenCheck($surname))
                                    {
                                        echo "<input class=\"error-input\" name=\"patronymic\" value=\"".$currentUser[2]."\"><p class=\"error\">* Не более 100 символов</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"patronymic\" value=\"".$currentUser[2]."\">";
                                ?>
                            </div>
                            <div>
                                <p class="input-label">Обслуживающая поликлиника</p>
                                <?php
                                    if(!ctype_digit($clinic))
                                    {
                                        echo "<input class=\"error-input\" name=\"clinic\" value=\"".$currentUser[5]."\"  required><p class=\"error\">* Поле должно содержать только цифры</p>";
                                        $error = true;
                                    }
                                    else if(strlen($clinic) > 3)
                                    {
                                        echo "<input class=\"error-input\" name=\"clinic\" value=\"".$currentUser[5]."\" required><p class=\"error\">* Неверный номер</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"clinic\" value=\"".$currentUser[5]."\" required>";
                                ?>
                            </div>
                        </div>
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Район</p>
                                <?php
                                    if(!$user->formatCheck($district))
                                    {
                                        echo "<input class=\"error-input\" name=\"district\" placeholder=\"Центральный\" required><p class=\"error\">* Поле должно содержать только буквы</p>";
                                        $error = true;
                                    }
                                    else if(!$user->lenCheck($district))
                                    {
                                        echo "<input class=\"error-input\" name=\"district\" placeholder=\"Центральный\" required><p class=\"error\">* Не более 100 символов</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"district\" placeholder=\"Центральный\" required>";
                                ?>
                            </div>
                            <div class="inputs-block-group">
                                <div>
                                    <p class="input-label">Улица</p>
                                    <?php
                                        if(!$user->lenCheck($street))
                                        {
                                            echo "<input  class=\"error-input input-street input-absolute\" name=\"street\" placeholder=\"Пушкина\" required><p class=\"error error-absolute\">* Не более 100 символов</p>";
                                            $error = true;
                                        }
                                        else
                                            echo "<input class=\"input-street\" name=\"street\" placeholder=\"Пушкина\" required>";
                                    ?>
                                </div>
                                <div>
                                    <p class="input-label">Дом</p>
                                    <?php
                                        if(!ctype_digit($clinic))
                                        {
                                            echo "<input class=\"error-input input-numeric input-absolute\" name=\"house\" placeholder=\"102\" required>";
                                            $error = true;
                                        }
                                        else if(strlen($clinic) > 3)
                                        {
                                            echo "<input class=\"error-input input-numeric input-absolute\" name=\"house\" placeholder=\"102\" required>";
                                            $error = true;
                                        }
                                        else
                                            echo "<input class=\"input-numeric\"  name=\"house\" placeholder=\"102\" required>";
                                    ?>
                                </div>
                                <div>
                                    <p class="input-label">Корп.</p>
                                    <?php
                                        if(!ctype_digit($clinic))
                                        {
                                            echo "<input class=\"error-input input-numeric input-absolute\" name=\"build\" placeholder=\"5\">";
                                            $error = true;
                                        }
                                        else if(strlen($clinic) > 3)
                                        {
                                            echo "<input class=\"error-input input-numeric input-absolute\" name=\"build\" placeholder=\"5\">";
                                            $error = true;
                                        }
                                        else
                                            echo "<input class=\"input-numeric\" name=\"build\" placeholder=\"5\" required>";
                                    ?>
                                </div>
                                <div>
                                    <p class="input-label">Кв.</p>
                                    <?php
                                        if(!ctype_digit($clinic))
                                        {
                                            echo "<input class=\"error-input input-numeric input-absolute\" name=\"apartment\" placeholder=\"102\">";
                                            $error = true;
                                        }
                                        else if(strlen($clinic) > 3)
                                        {
                                            echo "<input class=\"error-input input-numeric input-absolute\" name=\"apartment\" placeholder=\"102\">";
                                            $error = true;
                                        }
                                        else
                                            echo "<input class=\"input-numeric\"  name=\"apartment\" placeholder=\"102\" required>";
                                    ?>
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
                                <?php
                                    if(!$user->comparePasswords())
                                    {
                                        echo "<input class=\"error-input\" name=\"confirmedPassword\" required><p class=\"error\">* Несовпадение паролей</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"confirmedPassword\" required>";
                                ?>
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

<?php

if(!$error)
{        
    $name = mb_strtoupper(mb_substr($name, 0, 1)).mb_substr($name, 1);
    $surname = mb_strtoupper(mb_substr($surname, 0, 1)).mb_substr($surname, 1);
    $patronymic = mb_strtoupper(mb_substr($patronymic, 0, 1)).mb_substr($patronymic, 1);
    $district = mb_strtoupper(mb_substr($district, 0, 1)).mb_substr($district, 1);
    $street = mb_strtoupper(mb_substr($street, 0, 1)).mb_substr($street, 1);
    $password = base64_encode(md5($password));
    
    if(($build == "") && ($apartment == ""))
        $updateUser = "UPDATE Users SET surname = '$surname', name = '$name', patronymic = '$patronymic', phone_number = '$phoneNumber', id = '$id', clinic = '$clinic', address = '$district район, ул. $street $house', password = '$password' WHERE id = '$db_id'";
    else if($build == "")
        $updateUser = "UPDATE Users SET surname = '$surname', name = '$name', patronymic = '$patronymic', phone_number = '$phoneNumber', id = '$id', clinic = '$clinic', address = '$district район, ул. $street $house, кв. $apartment', password = '$password' WHERE id = '$db_id'";
    else
        $updateUser = "UPDATE Users SET surname = '$surname', name = '$name', patronymic = '$patronymic', phone_number = '$phoneNumber', id = '$id', clinic = '$clinic', address = '$district район, ул. $street $house, корп. $build, кв. $apartment', password = '$password' WHERE id = '$db_id'";
    
    mysqli_query($con, $updateUser);
    mysqli_close($con);
    
    $_SESSION['surname'] = $surname;
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $id;
    echo "<script>Swal.fire('Данные успешно изменены!', '', 'success');</script>";
}

?>