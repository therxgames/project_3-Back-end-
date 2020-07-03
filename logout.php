<?php require "database/db.php";
unset($_SESSION['logged_user']);

//Перебрасываем после выхода
header('Location: /index.php');
?>