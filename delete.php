<?php
include "./connect.php";
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = "DELETE FROM admins WHERE Ad_id = $id";
$query = mysqli_query($conn , $sql);
header('location:./Admin.php');
} 

if(isset($_GET['cid'])){
$cid = $_GET['cid'];
$sql ="DELETE FROM acount WHERE cus_id = $cid";
$query = mysqli_query($conn , $sql);
header('location:./Admin-user.php'); 
}
if(isset($_GET['pid'])){
$cid = $_GET['pid'];
$sql ="DELETE FROM products WHERE cus_id = pid";
$query = mysqli_query($conn , $sql);
header('location:./Admin-product.php'); 
}