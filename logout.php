<?php 
include "connect.php";
unset($_SESSION['name']);
header('location:index.php?act=home');
?>