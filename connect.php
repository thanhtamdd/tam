<?php
$server = 'localhost';
$user = 'root';
$pass ='';
$database = 'webbannuoc';

$conn = new mysqli($server,$user,$pass,$database);

if($conn){
    mysqli_query($conn,"SET NAMES 'utf8' ");
}
else{
    echo "Kết nối thất bại";
}
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>