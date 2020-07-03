<?php require "../database/dbADmin.php";
unset($_SESSION['logged_admin']);

//Перебрасываем после выхода
header('Location: /admin/admin_autorization.php');
?>