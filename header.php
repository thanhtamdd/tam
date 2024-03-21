<?php
include "connect.php";
ob_start();
$user = [];
$user = (isset($_SESSION['name']) ? $user = $_SESSION['name']: []);
if(isset($_GET['delid']) && $_GET['delid'] >= 0){
    array_splice($_SESSION['giohang'],$_GET['delid'],1);
}
if(isset($_POST['shop'])){
    $hinh = $_POST['hinh'];
    $tensp =$_POST['tensp'];
    $gia = $_POST['gia'];
    $sp = [$hinh,$tensp,$gia];
    $_SESSION['giohang'][] = $sp;

} 
function showgiohang(){
    if(isset($_SESSION['giohang']) && sizeof($_SESSION['giohang']) > 0){
        $tong = 0.0;
        $count = 0;
        for($i=0; $i < sizeof($_SESSION['giohang']);$i++){
            $tong += $_SESSION['giohang'][$i][2];
            $count++;
        }
        echo ' <div class="Total">
        <div class="alert">
            <b> '.$count.' sản phẩm  </b>
        </div>
        <div class="sum">
            <b>Tổng tiền:</b>
            <b style="color:green;font-weight:bold;">'.$tong.' VNĐ</b>
        </div>
    </div>
    <button class="bill" type="submit" name="bill">Thanh toán</button> 
        <div class="lines"></div>';
        for($i=0;$i < sizeof($_SESSION['giohang']);$i++){   
            echo ' <div class="shop-products" style="position:relative;">
            <img src="'.$_SESSION['giohang'][$i][0].'" alt="image">
            <div class="name-product">'.$_SESSION['giohang'][$i][1].'</div>
            <div class="flex">
            <div class="cost">'.$_SESSION['giohang'][$i][2].'VNĐ</div>
            <a href="./shops.php?delid='.$i.'">
            <button style="margin-left:150px;background-color:white;border:white;" type="submit" name="garbage" method="post"><i class="fas fa-trash-alt" style="color:green;width:20px;height:20px"></i></button>
            </div>
            </a>
            </div>';
        }
    }
    else{
        echo '<p>Chưa có sản phẩm</p>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./remains.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="icon" type="image/x-webp" href="picture/width1960 (5).webp">
    <script src="./vendor/fontawesome/js/all.min.js"></script>
</head>
<body>
   
        <div class="main">
        <div class="header">
            <ul class="nav">
                <li><a href="./index.php?act=home"><img src="picture/Coke-company-logo-black.svg" alt="image"></a></li>
                <li> <a href="./index.php?act=home">Trang chủ</a>
                   
                    <div class="line1 block"></div>
                </li>
                <li><a href="./index.php?act=brand">Thương hiệu</a>
                    <div class="line"></div>
                </li>
                <li><a href="./index.php?act=shop">Cửa hàng</a>

                    <div class="line2"></div>
                </li>
                <li><img class="glass" src="./picture/th.jpg" alt="image"></li>
                <li class="cartIcon"><i class="fas fa-cart-plus"></i>
                    <div class="cartList unnone">
                        <?php showgiohang();?>
            </div>
            </li>
                <?php if(isset($user['email'])){?>
                <li class="acounts">
                <i class="fas fa-user-circle " style="width:25px;height: 25px;"></i>
                <div class="drop non">
                 <p> <i class="fas fa-user-circle " style="width:30px;height: 30px; margin-left:100px;"></i>
                <br class="inEmail"><?php echo $user['email'] ?></br></p>
                 <p>Sửa thông tin</p>
                  <p><a class="logout" href="./logout.php">Đăng xuất</a></p>
                </div>
                </li>
                <?php }else {?>
                    <li class="none-acounts">
                    <a href="./index.php?act=logup">
                <i class="far fa-user-circle " style="width:25px;height: 25px;color:black"></i>
                    </a>
                </li>
                <?php }?>
            </ul>
        </div>
        <div class="search">
            <p>Search</p>
            <input class="search-message" name="serach" type="text" placeholder="Search...">
            <span>X</span>
        </div>
        <style>
            .Total{
                display:flex;
            }
            .alert{
                margin-top:10px;
                margin-left:10px;
                width:160px;
                padding-top:15px;
                overflow: hidden;
            }
            .alert b{
                width:500px;
                font-weight:normal;
            }
            .cartList{
                border:1px black solid;
                width:350px;
                height:550px;
                background-color: white;
                position:absolute;
                right:-150px;
                top:46px;
                overflow:scroll;
                z-index: 1;
            }
            .sum{
                width:150px;
                height:60px;
                font-weight:normal;
                margin-top:10px;
                margin-left:50px;
            }
            .sum b{
                margin-left:10px;
                font-weight:normal;
                overflow:hidden;
            }
            .bill{
                width:200px;
                height:30px;
                margin-left:60px;
                margin-top:30px;
                background-color: black;
                color:white;
            }
            .lines{
                width:300px;
                height:1px;
                background-color:#D4D4D4;
                margin-top:10px;
            }
            
            .cartList p{
                font-weight:normal;
                margin-top:230px;
                margin-left:75px;
            }
            .acounts{
position:relative;
list-style-type: none;
margin-left:1420px;
top:2px;
z-index:3;
}
.none-acounts{
position:relative;
list-style-type: none;
margin-left:1420px;
top: 2px;
color:black;
z-index:3;
}
.nav>li{
display:inline-block;
margin:18px 15px;
font-size:18px;
position:relative;
}
.choiced-all--brand{
    width:12px;
    height:12px;
    border-radius: 15px;
    margin-left:2px;
    margin-top:3px;
}
.choiced-gas{
    width:12px;
    height:12px;
    border-radius: 15px;
    margin-left:2.5px;
    margin-top:3px;
}
.choiced-juice{
    width:12px;
    height:12px;
    border-radius: 15px;
    margin-left:3px;
    margin-top:3px;
}
.choiced-tea{
    width:12px;
    height:12px;
    border-radius: 15px;
    margin-left:2px;
    margin-top:3px;
}
.choiced-energy{
    width:12px;
    height:12px;
    border-radius: 15px;
    margin-left:3px;
    margin-top:3qpx;
}
        </style>
        <script>
            const acount = document.querySelector('.acounts');
            const drop = document.querySelector('.drop');
            acount.onclick = function(){
                drop.classList.toggle('non');
            }
            </script>
<script>
    const cart = document.querySelector('.cartIcon');
    const cartShop = document.querySelector('.cart');
    const cartShopList = document.querySelector('.cartList');
        cart.onclick = function(){
        cartShopList.classList.toggle('unnone');
        cartShop.classList.toggle('unnone');

    }
    </script>
