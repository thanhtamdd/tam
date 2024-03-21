<?php
include "connect.php";

function products(){
    include "./connect.php";

    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($pro = mysqli_fetch_array($result)){
            $price = $pro['price'] / 1000;
            echo '
            <div class="shop-product">
                <img src="./picture/'.$pro['image'].'" alt="image">
                <div class="name-product">'.$pro['name'].'</div>
                <div class="flex">
                <div class="cost">'.$price.'.000VNĐ</div>
                <form action="./index.php?act=shop" method="post">
                <button type="submit" name="shop"><i class="fas fa-cart-plus" style="color:green;width:20px;height:20px"></i></button>
                <input type="hidden" name="hinh" value="./picture/'.$pro['image'].'">
                <input type="hidden" name="tensp" value="'.$pro['name'].'">
                <input type="hidden" name="gia" value="'.$pro['price'].'">
                </form>
                </div>
                </div>
            ';
        }
    }
}
?>
<style>
        .shop-product button{
    height:25px;
    width:30px;
    margin-left:40px;
}
.flex{
    display:flex;
    margin-left:30px;
}
    </style>
<div class="container">
            <div class="list-shop">
                <?php products(); ?>
               
            </div>
            <ul class="listPage">
                
            </ul>
        </div>
        <script src="./remain.js"></script>