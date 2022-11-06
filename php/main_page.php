<!doctype html>
<html>
    <head>
        <title>Health - Главная</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/main_page.css" rel="stylesheet">
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
    
session_start();
if(isset($_SESSION['name']))
{
    echo "<img src=\"../img/user.png\" width=\"50px\">
          <div class=\"profile-part\">
                <p class=\"profile-part-welcome\">".$_SESSION['name']." ".$_SESSION['surname']."</p>
                <a href=\"personal_page_profile.php\"><p>Личный кабинет</p></a>
                <a href=\"logout.php\"><p>Выйти из учетной записи</p></a>
          </div>";
}
else if(isset($_COOKIE['name']))
{
    echo "<img src=\"../img/user.png\" width=\"50px\">
          <div class=\"profile-part\">
                <p class=\"profile-part-welcome\">".$_COOKIE['name']." ".$_COOKIE['surname']."</p>
                <a href=\"personal_page_profile.php\"><p>Личный кабинет</p></a>
                <a href=\"logout.php\"><p>Выйти из учетной записи</p></a>
          </div>";
}
else
{
    echo "<a href=\"login.php\">
                <input type=\"submit\" value=\"Войти\">
          </a>
          <a href=\"register.php\">
                <input type=\"submit\" value=\"Зарегистрироваться\">
          </a>";
}

?>
                        
                    </div>
                </header>
                
                <div class="categories">
                    <a class="terapevtia" href="terapevtia.php">
                        <div class="categoies-img-block">
                            <img src="../img/terapevtia.png">
                        </div>
                        <p class="categoies-title">ТЕРАПЕВТИЯ</p>
                        <p class="categoies-body">Консультация терапевта</p>
                    </a>
                    
                    <a class="ortopedia" href="ortopedia.php">
                        <div class="categoies-img-block">
                            <img src="../img/ortopedia.png">
                        </div>
                        <p class="categoies-title">ОРТОПЕДИЯ</p>
                        <p class="categoies-body">Консультация травмотолога-ортопеда</p>
                    </a>
                    
                    <a class="nevrologia" href="nevrologia.php">
                        <div class="categoies-img-block">
                            <img src="../img/nevrologia.png">
                        </div>
                        <p class="categoies-title">НЕВРОЛОГИЯ</p>
                        <p class="categoies-body">Консультация невролога</p>
                    </a>
                    
                    <a class="andocrinolog" href="andocrinolog.php">
                        <div class="categoies-img-block">
                            <img src="../img/andocrinolog.png">
                        </div>
                        <p class="categoies-title">ЭНДОКРИНОЛОГ</p>
                        <p class="categoies-body">Консультация эндокринолога</p>
                    </a>
                </div>
                
                <div class="main-info">
                    <div>
                        <p class="main-info-title">МЕДИЦИНСКИЙ ЦЕНТР «HEALTH»</p>
                        <p class="main-info-text">Мы придерживаемся простого и ясного взгляда: медицинские услуги должны быть доступными и безупречно профессиональными. Точное обследование организма, эффективное лечение и бережная реабилитация - надёжный путь к выздоровлению.</p>
                        <ul>
                            <li>Разумные цены — стоимость медицинских услуг доступна каждому, кто проявляет заботу о своем здоровье.</li>
                            <li>Комплексный подход — согласно стандартов разработанных в нашей клинике, любой пациент может рассчитывать на всестороннее обследование специалистами и качественную лабораторную диагностику ежедневно и в кратчайшие сроки. </li>
                            <li>Персональное внимание и забота - каждый пациент получает индивидуальное обслуживание сотрудниками службы сервиса и медиками.</li>
                        </ul>
                    </div>
                    <img src="../img/doctor.png" height="350px">
                </div>
            </div>
        </div>
    </body>
</html>