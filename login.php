<?php
include "connect.php";
$err = [];
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    if(empty($name)){
        $err['name'] ='Bạn chưa nhập tên';
    }
    if(empty($password)){
        $err['password'] ='Bạn chưa nhập password';
    }
    if(empty($err)){
    $sql = "SELECT * FROM acc WHERE name ='$name' ";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($query);
    $checkName = mysqli_num_rows($query);
    
    if($checkName == 1){
        echo "USER CÓ TỒN TẠI ";
        $CheckPass = password_verify($password, $data['password']);
        if($CheckPass){
            $_SESSION['name'] = $data;
            header('location:index.php?act=shop');
        }else{
            $err['password'] = 'Sai mật khẩu';
        }
    }
    else{
        $err['name'] = 'Tên đăng nhập không tồn tại';
    }
}
}

?>
<style>
    .has-error{
        color:red;
        height:5px;
        margin-left:90px;
    }
</style>
<div class="form-signin change-signin">
            <form action="" method="post" role="form">
            <div class="form-tittle">
                Đăng Nhập
            </div>
            <div class="form-input">
                <input class="username-logup" name="name" type="text" placeholder="     Tên đăng nhập">
                <div class="has-error">
                    <span><?php echo (isset($err['name']))?$err['name']:''?></span>
                </div>
            </div>
            <div class="form-input">
                <input class="password-logup" name="password" type="password" placeholder="     Mật khẩu">
                <div class="has-error">
                    <span><?php echo (isset($err['password']))?$err['password']:''?></span>
                </div>
            </div>
            <div class="submit-button">
                <button class="signup" name="logup">Đăng Kí</button>
                <button class="signin" name="login" type="submit">Đăng Nhập</button>
            </div>
            </form>
            <script src="./main.js"></script>
        </div>  