<?php
session_start();
session_destroy();
unset($_SESSION['id_penjual']);
header("location:login.php");
?>