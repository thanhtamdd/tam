<?php
include "connect.php";
ob_start();
if(isset($_GET['delid']) && $_GET['delid'] >= 0){
    array_splice($_SESSION['staff'],$_GET['delid'],1);
}
$err =[];
if(isset($_POST['add'])){
    $name = $_POST['Username'];
    $email = $_POST['email'];
    
    
    if(empty($name)){
        $err['name'] = 'Bạn chưa nhập username';
    }
    if(empty($email)){
        $err['email'] = 'Bạn chưa nhập email';
    }
    if(empty($err)){
        $sql = "INSERT INTO admins (Username,Email) VALUES('$name','$email')";
        $query = mysqli_query($conn,$sql);
        header('location:./Admin.php');
        exit;
    }
}

function Staff(){
    include "connect.php";
    $sql = "SELECT * FROM admins";
    $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result) > 0){
        while($user = mysqli_fetch_array($result)){
            echo ' <tr class="infor-content">
            <td style="color:red;">'.$user['Email'].'</td>
            <td>'.$user['Username'].'</td>
            <td><select style="height:30px;">
                <option value="1">Customer management</option>
                <option value="2">Product management</option>
                <option value="3">Order management</option>
            </select></td>
            <td>Normal</td>
            <td><button type="submit" style="background-color: white;width:140px; height:30px;"><a href="./index.php?act=delete&id='.$user['Ad_id'].'" style=" color:black; text-decoration:none;" > Reset Password</a></button></td>
        </tr>';
        
        }
     }

}

         



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin.css">
    <script src="./vendor/fontawesome/js/all.min.js"></script>
    <title>Admin</title>
</head>
<body>
    <header>
        <div class="tools">
            <div class="letter"><i class="fas fa-envelope-square" style="width:25px; height:25px;"></i></div>
            <div class="bell"><i class="far fa-bell" style="width:25px; height:25px;" ></i></div>
            <div class="logout" ><p>Log Out</p></div>
        </div>
    </header>
    <main>
        <div class="bar">
            <img class="white-coca" src="./picture/logo-white-large.svg" alt="image">
            <a href="./Admin.php">
            <div class="admin">
                <i class="far fa-address-card" style="width:50px; height:30px;"></i>
                <p>Administrator</p>
            </div>
            </a>
            <a href="./Admin-user.php">
            <div class="user">
                <i class="fas fa-user-alt" style="width:50px; height:30px; color:#899DC1;"></i>
                <p style="color:#899DC1">Customer</p>
            </div>
            </a>
            <a href="./Admin-product.php">
            <div class="product">
                <i class="fas fa-receipt" style="width:50px; height:30px; color:#899DC1;"></i>
                <p style="color:#899DC1">Product</p>
            </div>
            </a>
            <a href="./Admin-order.php">
            <div class="order">
                <i class="fas fa-cart-plus" style="width:50px; height:30px; color:#899DC1;"></i>
                <p style="color:#899DC1;">Order</p>
            </div>
            </a>
        </div>
        </div>
        <div class="content">
            <div class="title">
                <p> Administrator</p>
            </div>
            <div class="input">
                <form action="" method="post" role="form">
                <div class="username">
                    <p>Username:</p>
                    <input name="Username" type="text">
                </div>
                <div class="warning">
                    <span><?php echo (isset($err['name']))?$err['name']:''?></span>
                </div>
                <div class="email">
                    <p>Email:</p>
                    <input name="email" type="text">
                </div>
                <div class="warning">
                    <span><?php echo (isset($err['email']))?$err['email']:''?></span>
                </div>
                <div class="buttons">
                    <div class="add">
                        <input type="submit" name="add" value="ADD+">
                    </div>
                </div>
                <div class="search">
                    <input class="searchId" type="text" name="search" placeholder="Search">
                    <div class="entryId">
                        <p>Entries:</p>
                        <select>
                            <option value="1">Entry</option>
                        </select>
                    </div>
                </div>
                </form>
            </div>
            <div class="infor">
            <table border="0" width="100%;" cellpadding="0" cellspacioing="0">
                <tr>
                    <td width="30%">Email</td>
                    <td width="20%">Username</td>
                    <td width="20%" style="padding-left:40px;">Role</td>
                    <td width="15%">Status</td>
                    <td width="15%" style="padding-left:35px;">Action</td>
                </tr>
           <?php Staff() ?>
               
            </table>
            </div>
        </div>
    </main>         
</body>
<style>
    .warning{
        margin-left:100px;
        color:red;
    }
</style>
</html>