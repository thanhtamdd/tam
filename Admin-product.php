<?php
include "./connect.php";
ob_start();

$err = [];
if(isset($_POST['add'])){
    $pid = $_POST['idpro'];
    $image = $_POST['image'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    if(empty($pid)){
        $err['idpro'] = 'Bạn chưa nhập id';
    }
    if(empty($image)){
        $err['image'] = 'Bạn chưa chọn hình';
    }
    if(empty($name)){
        $err['name'] = 'Bạn chưa nhập tên sản phẩm';
    }
    if(empty($price)){
        $err['price'] = 'Bạn chưa nhập giá tiền ';
    }
    if(empty($quantity)){
        $err['quantity'] = 'Bạn chưa nhập số lượng';
    }
    if(empty($date)){
        $err['date'] = 'Bạn chưa nhập ngày thêm';
    }

    if(empty($err)){
        $sql = "INSERT INTO products (pro_id,image,name,price,quantity,date,month,year) VALUES ('$pid','$image','$name','$price','$quantity','$date','$month','$year')";
        $query = mysqli_query($conn,$sql);
        header('location:./Admin-product.php');
        exit;
    }

}
function Product(){
    include "./connect.php";
     $sql = "SELECT * FROM products ";
     $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result) > 0){
        while($pro = mysqli_fetch_array($result)){
            $price = $pro['price'] / 1000;
            echo '
            <tr class="infor-content">
        <td style="color:red;">#'.$pro['pro_id'].'</td>
        <td><img style="width:45px; height:40px;" src="./picture/'.$pro['image'].'" alt="image"></td>
        <td style="padding-left:40px;">'.$pro['name'].'</td>
        <td>'.$price.'.000 VNĐ</td>
        <td style="padding-left:20px;">'.$pro['quantity'].'</td>
        <td>'.$pro['date'].'/'.$pro['month'].'/'.$pro['year'].'</td>
        <td><button type="submit" style="background-color: white;width:140px; height:30px;"><a href="./index.php?act=delete&pid='.$pro['pro_id'].'" style=" color:black; text-decoration:none;" > Reset Password</a></button></td>
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
                <i class="far fa-address-card" style="width:50px; height:30px; color:#899DC1; "></i>
                <p style="color:#899DC1">Administrator</p>
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
                <i class="fas fa-receipt" style="width:50px; height:30px; "></i>
                <p >Product</p>
            </div>
            </a>
            <a href="./Admin-order.php">
            <div class="order">
                <i class="fas fa-cart-plus" style="width:50px; height:30px; color:#899DC1;"></i>
                <p style="color:#899DC1">Order</p>
            </div>
            </a>
        </div>
        </div>
        <div class="content">
            <div class="title">
                <p>Product</p>
            </div>
            <div class="input">
            <form action="" method="post" role="form">
                <div class="id-pro">
                    <p>Id:</p>
                    <input name="idpro" type="text">
                </div>
                <div class="warning">
                    <span><?php echo (isset($err['idpro']))?$err['idpro']:''?></span>
                </div>
                <div class="img-pro">
                    <p>Product's image:</p>
                    <input name="image" type="file">
                </div>
                <div class="warning">
                    <span><?php echo (isset($err['image']))?$err['image']:''?></span>
                </div>
                <div class="name-pro">
                    <p>Product Name:</p>
                    <input name="name" type="text">
                </div>
                <div class="warning">
                    <span><?php echo (isset($err['name']))?$err['name']:''?></span>
                </div>
                <div class="price">
                    <p>Price:</p>
                    <input name="price" type="text">
                </div>
                <div class="warning">
                    <span><?php echo (isset($err['price']))?$err['price']:''?></span>
                </div>
                <div class="quantity">
                    <p>Quantity:</p>
                    <input name="quantity" type="text">
                </div>
                <div class="warning">
                    <span><?php echo (isset($err['quantity']))?$err['quantity']:''?></span>
                </div>
                <div class="date-add">
                    <p>Date Add:</p>
                    <select name="date">
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                    <select name="month">
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                    <select name="year">
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2020</option>
                        <option>2019</option>
                        <option>2018</option>
                        <option>2017</option>
                        <option>2016</option>
                        <option>2015</option>
                        <option>2014</option>
                        <option>2013</option>
                        <option>2012</option>
                        <option>2011</option>
                        <option>2010</option>
                        <option>2009</option>
                        <option>2008</option>
                        <option>2007</option>
                        <option>2006</option>
                        <option>2005</option>
                        <option>2004</option>
                        <option>2003</option>
                        <option>2002</option>
                        <option>2001</option>
                    </select>
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
                    <td width="10%">PID</td>
                    <td width="10%">image</td>
                    <td width="25%" style="padding-left:40px;">Product Name</td>
                    <td width="15%" style="padding-left:20px;">Price</td>
                    <td width="10%">Quantity</td>
                    <td width="15%">Day add</td>
                    <td width="10%" style="padding-left:35px;">Action</td>
                </tr>
                <?php Product();?>
            </table>
        </div>
        </div>
    </main>
</body>
<style>
    .warning{
        margin-left:150px;
        color:red;
    }
</style>
</html>