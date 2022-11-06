<!doctype html>
<html>
    <head>
        <title>Health - Эндокринолог</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/terapevtia.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container-1">
            <div class="container-2">
                <header>
                    <div class="header-left-part">
                        <a href="../php/main_page.php">
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
                
                <div class="main-info">
                    <img src="../img/andocrinolog_img.png">
                    <div class="ml-30">
                        <p class="main-info-title">КОНСУЛЬТАЦИЯ ЭНДОКРИНОЛОГА</p>
                        <p class="main-info-text">Эндокринолог — узкопрофильнй специалист, занимающийся профилактикой, диагностикой и лечением патологий эндокринной системы. Врач разбирается в особенностях работы эндокринных желез, гормональной регуляции различных процессов в организме. Специалист занимается лечением патологий щитовидной, паращитовидной, поджелудочной, половых желез, гипоталамуса, гипофиза, надпочечников.</p>
                        
                        <div class="input-more">
                            <a href="andocrinolog_more.php">
                                <input type="submit" value="Подробнее">
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                
                <div>
                    <p class="price-title">Цены:</p>
                    <div class="service-block">
                        <p>Первичная консультация врача-эндокринолога</p>
                        <p>39 руб. 00 коп.</p>
                    </div>
                    <div class="service-block">
                        <p>Повторная консультация врача-эндокринолога</p>
                        <p>30 руб. 00 коп.</p>
                    </div>
                    <div class="service-block">
                        <p>Определение уровня глюкозы в крови с помощью глюкометра</p>
                        <p>5 руб. 00 коп.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>