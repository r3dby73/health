<?php

session_start();
require_once "db_con.php";
if(!isset($_SESSION['name']) && !isset($_COOKIE['name']))
    header("Location: http://localhost:8080/health/php/login.php");

?>

<!doctype html>
<html>
    <head>
        <title>Health - Профиль</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
                    <p><a class="profile-menu-a" href="personal_page_profile.php">Профиль</a></p>
                    <p><a class="profile-menu-a current-page" href="pp_myTickets.php">Талоны</a></p>
                    <p><a class="profile-menu-a" href="pp_ov.php">Осмотры врачей</a></p>
                    <p><a class="profile-menu-a" href="pp_lab.php">Лабораторные исследования</a></p>
                </div>
                <div class="container-table">
                    <form action="" class="filter">
                        <input class="input-filter" placeholder="Нарпавление">
                        <input class="input-filter" placeholder="ФИО врача">
                        <input class="input-filter" placeholder="Дата">
                        <input class="input-filter" placeholder="Время">
                    </form>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Направление</th>
                                <th scope="col">ФИО врача</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Время</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                $command = "SELECT * FROM tickets WHERE user_id = '' ORDER BY date_ DESC";
                                $res = mysqli_query($con, $command);
                                $i = 1;
                                while($hckeck = mysqli_fetch_array($res))
                                {
                                    echo "
                                        <form action=\"orderTicket.php\" method=\"post\">
                                            <tr>
                                                <th scope=\"row\">".$i."</th>
                                                <td>$hckeck[2]</td>
                                                <input value=\"$hckeck[2]\" name=\"direction\" hidden>
                                                <td>$hckeck[3]</td>
                                                <input value=\"$hckeck[3]\" name=\"doctorName\" hidden>
                                                <td>".substr($hckeck[4], 0, 10)."</td>
                                                <input value=\"".substr($hckeck[4], 0, 10)."\" name=\"date\" hidden>
                                                <td name=\"time\">".substr($hckeck[5], 0, 5)."</td>
                                                <input value=\"".substr($hckeck[5], 0, 5)."\" name=\"time\" hidden>
                                                <td><input class=\"button-tickets\" type=\"submit\" value=\"Заказать\"></td>
                                            </tr>
                                        </form>";
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <script src="../js/tableFilter.js"></script>
    </body>
</html>