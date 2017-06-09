<?php
session_start();
session_destroy();
unset($_SESSION['id_pembeli']);
header("location:login.php");
?>