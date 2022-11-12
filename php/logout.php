<?php

session_start();
session_unset();
setcookie('surname', null, -1);
setcookie('name', null, -1);
setcookie('id', null, -1);
header("Location: http://localhost:8080/health/php/main_page.php");

?>