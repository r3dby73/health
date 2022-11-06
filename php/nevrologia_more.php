<!doctype html>
<html>
    <head>
        <title>Health - Неврология подробнее</title>
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
                    <img src="../img/nevrologia_img.png">
                    <div class="ml-30">
                        <p class="main-info-text">Врач-невролог занимается диагностикой и лечением неврологических заболеваний. И выражение «все болезни от нервов» имеет под собой основание, ведь работа организма напрямую зависит от качества и скорости передачи нервных импульсов. Нарушение функций центральной (головной и спинной мозг) и периферической (нервные окончания) нервной системы приводит к значимому нарушению качества жизни человека. Своевременное выявление проблем — залог активной физической и социальной активности человека.</p>
                        <p class="main-info-text">Записаться на прием к неврологу в Минске можно в частной поликлинике «Анатомия». Наши специалисты используют в своей практике только передовые практики, являются приверженцами доказательной медицины и постоянно повышают свой уровень знаний.  Узнать свободную запись к неврологу можно онлайн или по телефону.</p>
                    </div>
                </div>
                <hr>
                
                <p class="main-info-title">Как проходит прием врача-невролога</p>
                <p class="main-info-text">Платные услуги невролога имеют явные преимущества — отсутствие формальности в лечебном подходе и продолжительный по времени прием, который позволяет уточнить все нюансы и выбрать оптимальную тактику лечения.</p>
                <p class="main-info-text">Специалист может порекомендовать консультации у смежных специалистов, например, у ортопеда, офтальмолога, рефлексотерапевта и пр.</p>
                <p class="main-info-text">Консультация невролога в Минске доступна в МЦ «Анатомия». Наши специалисты приятно удивят вас своим уровнем знаний, доброжелательным отношением и эффективностью применяемых методик. Узнать стоимость консультации невролога, а также все интересующие подробности можно на сайте клиники или по телефону у администратора.</p>
                <hr>
                
                <p class="main-info-title">Варианты лечения</p>
                <p class="main-info-text">Подход к лечению всегда индивидуальный. В ряде случаев достаточно приема лекарств, в других же необходимо использование различных техник, в том числе «блокад» при болях, сеансов мануальной терапии, физиотерапевтическое воздействие и пр.  </p>
                <p class="main-info-text">Реабилитация после перенесенных травм и заболеваний подразумевает длительное и комплексное воздействие на работу центральной и периферической системы. Цены на лечение варьируют, финансовые возможности пациентов учитываются при составлении планов ведения.</p>
                <hr>
                
                <div>
                    <p class="price-title">Цены:</p>
                    <div class="service-block">
                        <p>Первичная консультация врача-невролога</p>
                        <p>39 руб. 00 коп.</p>
                    </div>
                    <div class="service-block">
                        <p>Повторная консультация врача-невролога (в течение 1 месяца после первичного приёма)</p>
                        <p>30 руб. 00 коп.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>