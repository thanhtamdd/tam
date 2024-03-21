<?php
include "connect.php";
$err = [];
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if(empty($name)){
        $err['name'] ='Bạn chưa nhập tên';
    }
    if(empty($email)){
        $err['email'] ='Bạn chưa nhập email';
    }
    if(empty($password)){
        $err['password'] ='Bạn chưa nhập password';
    }
    if(empty($repassword)){
        $err['repassword'] ='Bạn chưa nhập lại password';
    }
    if($repassword != $password){
        $err['repassword'] = 'Bạn nhập lại mật khẩu chưa đúng';
    }
    if(empty($err)){
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO acc (name,email,password) VALUES('$name','$email','$pass')";
        $query = mysqli_query($conn,$sql);
        if($query){
            header('location:index.php?act=login');
        }  
    }   
}
if(isset($_POST['login'])){
    header('location:index.php?act=login');
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="icon" type="image/x-webp" href="picture/width1960 (5).webp">
    <script src="./vendor/fontawesome/js/all.min.js"></script>
</head>
<style>
    .has-error{
        color:red;
        height:5px;
        margin-left:90px;
    }
</style>
<div class="form-signin logup ">
            <form action="index.php?act=logup" method="post" role="form">
            <div class="form-tittle">
                Đăng Kí
            </div>
            <div class="form-input">
                <input class="username-login" name="name" type="text" placeholder="     Tên đăng nhập">
                <div class="has-error">
                    <span><?php echo (isset($err['name']))?$err['name']:''?></span>
                </div>
            </div>
            <div class="form-input">
                <input class="email-login" name="email" type="email" placeholder="     Email">
                <div class="has-error">
                    <span><?php echo (isset($err['email']))?$err['email']:''?></span>
                </div>
            </div>
            <div class="form-input">
                <input class="password-login" name="password" type="password" placeholder="     Mật khẩu">
                <div class="has-error">
                    <span><?php echo (isset($err['password']))?$err['password']:''?></span>
                </div>
            </div>
            <div class="form-input">
                <input class="repassword-login" name="repassword" type="password" placeholder="     Nhập lại mật khẩu">
                <div class="has-error">
                    <span><?php echo (isset($err['repassword']))?$err['repassword']:''?></span>
                </div>
            </div>
            <div class="submit-button">
                <button class="signup" type="submit" name="signup">Đăng Kí</button>
                <button class="signin" name="login">Đăng Nhập</button>
            </div>
            </form>
            <script src="./main.js"></script>
        </div>  
        