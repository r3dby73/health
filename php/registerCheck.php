<?php

session_start();
require_once "../classes/RegUser.php";
require_once "db_con.php";

if(isset($_SESSION['name']) || isset($_COOKIE['name']))
    header("Location: http://localhost:8080/health/php/main_page.php");


$name = htmlspecialchars(trim($_POST['name']));
$surname = htmlspecialchars(trim($_POST['surname']));
$patronymic = htmlspecialchars(trim($_POST['patronymic']));
$phoneNumber = htmlspecialchars(trim($_POST['phoneNumber']));
$id = htmlspecialchars(trim($_POST['id']));
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

?>

<!doctype html>
<html>
    <head>
        <title>Health - Регистрация</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/register.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet">
        <script src="https://unpkg.com/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>
    </head>
    <body>
        <div class="container-1">
            <div class="container-2">
                <div class="logo-block">
                    <a href="main_page.php">
                        <img src="../img/heart.png" width="110px">
                    </a>
                </div>
                <p class="form-title">Регистрация</p>
                
                <div class="container-3">
                    <form action="registerCheck.php" method="post">
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Имя</p>
                                <?php
                                    if(!$user->lenCheck($name))
                                    {
                                        echo "<input class=\"error-input\" name=\"name\" placeholder=\"Иван\" required><p class=\"error\">* Не более 100 символов</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"name\" placeholder=\"Иван\" required>";
                                ?>
                            </div>
                            <div>
                                <p class="input-label">Номер телефона</p>
                                <?php
                                    if(!$user->phoneNumberCheck())
                                    {
                                        echo "<input class=\"error-input\" name=\"phoneNumber\" placeholder=\"+375XXXXXXXXX\" required><p class=\"error\">* Неверный формат</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"phoneNumber\" placeholder=\"+375XXXXXXXXX\" required>";
                                ?>
                            </div>
                        </div>
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Фамилия</p>
                                <?php
                                    if(!$user->lenCheck($surname))
                                    {
                                        echo "<input class=\"error-input\" name=\"surname\" placeholder=\"Иванов\" required><p class=\"error\">* Не более 100 символов</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"surname\" placeholder=\"Иванов\" required>";
                                ?>
                            </div>
                            <div>
                                <p class="input-label">Идентификационный номер</p>
                                <?php
                                    $id = mb_strtoupper($id);
                                    $existsId = "SELECT * FROM Users WHERE id = '$id'";
                                    if(!$user->idFormatCheck())
                                    {
                                        echo "<input class=\"error-input\" name=\"id\" placeholder=\"XXXXXXXXXXXXXX\" required><p class=\"error\">* Только англ. буквы и цифры</p>";
                                        $error = true;
                                    }
                                    else if(!$user->idLenCheck())
                                    {
                                        echo "<input class=\"error-input\" name=\"id\" placeholder=\"XXXXXXXXXXXXXX\" required><p class=\"error\">* Не менее 14 символов</p>";
                                        $error = true;
                                    }
                                    else if(!$user->lenCheck($id))
                                    {
                                        echo "<input class=\"error-input\" name=\"id\" placeholder=\"XXXXXXXXXXXXXX\" required><p class=\"error\">* Не более 100 символов</p>";
                                        $error = true;
                                    }
                                    else if(mysqli_fetch_row(mysqli_query($con, $existsId)))
                                    {
                                        echo "<input class=\"error-input\" name=\"id\" placeholder=\"XXXXXXXXXXXXXX\" required><p class=\"error\">* Уже зарегистрирован</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"id\" placeholder=\"XXXXXXXXXXXXXX\" required>";
                                ?>
                            </div>
                        </div>
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Отчество</p>
                                <?php
                                    if(!$user->lenCheck($surname))
                                    {
                                        echo "<input class=\"error-input\" name=\"patronymic\" placeholder=\"Иванович\"><p class=\"error\">* Не более 100 символов</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"patronymic\" placeholder=\"Иванович\">";
                                ?>
                            </div>
                            <div>
                                <p class="input-label">Обслуживающая поликлиника</p>
                                <?php
                                    if(!ctype_digit($clinic))
                                    {
                                        echo "<input class=\"error-input\" name=\"clinic\" placeholder=\"25\" required><p class=\"error\">* Поле должно содержать только цифры</p>";
                                        $error = true;
                                    }
                                    else if(strlen($clinic) > 3)
                                    {
                                        echo "<input class=\"error-input\" name=\"clinic\" placeholder=\"25\" required><p class=\"error\">* Неверный номер</p>";
                                        $error = true;
                                    }
                                    else
                                        echo "<input name=\"clinic\" placeholder=\"25\" required>";
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
                            <input class="button" type="submit" value="Зарегистрироваться">
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
        $addNewUser = "INSERT INTO Users(surname, name, patronymic, phone_number, id, clinic, address, password) VALUES('$surname', '$name', '$patronymic', '$phoneNumber', '$id', '$clinic', '$district район, ул. $street $house', '$password')";
    else if($build == "")
        $addNewUser = "INSERT INTO Users(surname, name, patronymic, phone_number, id, clinic, address, password) VALUES('$surname', '$name', '$patronymic', '$phoneNumber', '$id', '$clinic', '$district район, ул. $street $house, кв. $apartment', '$password')";
    else
        $addNewUser = "INSERT INTO Users(surname, name, patronymic, phone_number, id, clinic, address, password) VALUES('$surname', '$name', '$patronymic', '$phoneNumber', '$id', '$clinic', '$district район, ул. $street $house, корп. $build, кв. $apartment', '$password')";
    
    mysqli_query($con, $addNewUser);
    mysqli_close($con);
    echo "<script>Swal.fire('Вы успешно зарегистрированы!', '', 'success');</script>
        <script>
            setTimeout(function(){ window.location.replace(\"http://localhost:8080/health/php/login.php\"); }, 3000);
        </script>";
}

?>