<?php
ob_start();
session_start();
unset($_SESSION['email']);
header("location:../index.php");
?>