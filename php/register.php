<?php

session_start();
if(isset($_SESSION['name']) || isset($_COOKIE['name']))
    header("Location: http://localhost:8080/health/php/main_page.php");

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
                                <input name="name" placeholder="Иван" required>
                            </div>
                            <div>
                                <p class="input-label">Номер телефона</p>
                                <input name="phoneNumber" placeholder="+375XXXXXXXXX" required>
                            </div>
                        </div>
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Фамилия</p>
                                <input name="surname" placeholder="Иванов" required>
                            </div>
                            <div>
                                <p class="input-label">Идентификационный номер</p>
                                <input name="id" placeholder="XXXXXXXXXXXXXX" required>
                            </div>
                        </div>
                        <div class="inputs-block">
                            <div>
                                <p class="input-label">Отчество</p>
                                <input name="patronymic" placeholder="Иванович">
                            </div>
                            <div>
                                <p class="input-label">Обслуживающая поликлиника</p>
                                <input name="clinic" placeholder="25" required>
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