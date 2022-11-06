<!doctype html>
<html>
    <head>
        <title>Health - Терапевтия подробнее</title>
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
                    <img src="../img/terapevtia_img.png">
                    <div class="ml-30">
                        <p class="main-info-text">Терапевт — врач общей практики, занимающийся профилактикой, диагностикой и лечением заболеваний внутренних органов у взрослых. Специализация терапевта подразумевает обширные знания в сфере физиологии и анатомии. Врач разбирается в функционировании каждой органолептической системы, может поставить диагноз и назначить лечение. При подозрении на серьезное заболевание, специалист дает направление к профильному врачу.</p>
                        <p class="main-info-text">Получить услуги высококвалифицированного терапевта можно в многопрофильной частной поликлинике «Анатомия». Врач общей практики поможет объективно оценить состояние здоровья пациента, своевременно выявить имеющиеся проблемы.</p>
                    </div>
                </div>
                <p class="main-info-text">Терапевт составляет план обследования, назначает лабораторные анализы и инструментальные диагностические процедуры. Врач ставит диагноз и назначает лечение, выдает справки для учебных заведений, больничные листы и прочие медицинские документы.</p>
                <hr>
                
                <p class="main-info-title">Как проходит консультация?</p>
                <p class="main-info-text">Во время первой встречи, пациент знакомится с врачом. Терапевт выясняет жалобы человека на здоровье, задает уточняющие вопросы, собирает анамнез. Далее врач приступает к общему осмотру (измерение температуры тела, пульса, давления, оценка состояния слизистых, прослушивание тонов сердца и легких). Чтобы получить объективную информацию о состоянии здоровья пациента, врач назначает лабораторные анализы и инструментальные диагностические процедуры. Изучая результаты тестов, терапевт устанавливает патологи, делает предположения о причинах ее развития и подбирает оптимальную тактику лечения. Если врач подозревает серьезное заболевание, способное нарушить функционирование всего организма, привести к осложнениям или угрожающим жизни состояниям, пациент получает направление к другим специалистам.</p>
                <p class="main-info-text">Консультация врача-терапевта помогает человеку сохранить здоровье, выяснить причины возникновения нарушений в организме, а также в кратчайшие сроки избавиться от заболевания. Чтобы записаться на прием или получить дополнительные сведения, звоните нам по телефону.</p>
                <hr>
                
                <div>
                    <p class="price-title">Цены:</p>
                    <div class="service-block">
                        <p>Первичная консультация врача-терапевта с осмотром</p>
                        <p>39 руб. 00 коп.</p>
                    </div>
                    <div class="service-block">
                        <p>Повторная консультация врача-терапевта (после первичного обращения в течение одного эпизода заболевания)</p>
                        <p>30 руб. 00 коп.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>