<?php
include "./connect.php" ;
ob_start();

$err = [];
if(isset($_POST['add'])){
    $CID = $_POST['iduser'];
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $address = $_POST['address'];

    if(empty($CID)){
        $err['iduser'] = 'Bạn chưa nhập id';
    }

    if(empty($name)){
        $err['fullname'] = 'Bạn chưa nhập tên';
    }

    if(empty($email)){
        $err['email'] = 'Bạn chưa nhập email';
    }

    if(empty($address)){
        $err['address'] = 'Bạn chưa nhập địa chỉ';
    }
    if(empty($err)){
        $sql = "INSERT INTO acount (cus_id,full_name,email,date,month,year,address) VALUES('$CID','$name','$email','$date','$month','$year','$address')";
        $query = mysqli_query($conn,$sql);
        header('location:./Admin-user.php');
        exit;
    }
}
 function customer(){
    include "./connect.php";
    $sql = "SELECT * FROM acount";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($cus = mysqli_fetch_array($result)){
            echo ' <tr class="infor-content">
            <td style="color:red;"># '.$cus['cus_id'].'</td>
            <td>'.$cus['email'].'</td>
            <td>'.$cus['full_name'].'</td>
            <td>'.$cus['date'].'/'.$cus['month'].'/'.$cus['year'].'</td>
            <td>'.$cus['address'].'</td>
            <td><button type="submit" style="background-color: white;width:140px; height:30px;"><a href="./index.php?act=delete&cid='.$cus['cus_id'].'" style=" color:black; text-decoration:none;" > Reset Password</a></button></td>
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
                <i class="far fa-address-card" style="width:50px; height:30px;color:#899DC1;"></i>
                <p style="color:#899DC1">Administrator</p>
            </div>
            </a>
            <a href="./Admin-user.php">
            <div class="user">
                <i class="fas fa-user-alt" style="width:50px; height:30px; "></i>
                <p >Customer</p>
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
                <p style="color:#899DC1">Order</p>
            </div>
            </a>
        </div>
        </div>
        <div class="content">
            <div class="title">
                <p> Customer</p>
            </div>
            <div class="input">
            <form action="" method="post" role="form">
                <div class="id-user">
                    <p>Id User:</p>
                    <input name="iduser" type="text">
                </div>
                <div class="warning">
                    <span><?php echo (isset($err['iduser']))?$err['iduser']:''?></span>
                </div>
                <div class="full-name">
                    <p>Full Name:</p>
                    <input name="fullname" type="text">
                </div>
                <div class="warning">
                    <span><?php echo (isset($err['fullname']))?$err['fullname']:''?></span>
                </div>
                <div class="email">
                    <p>Email:</p>
                    <input name="email" type="text">
                </div>
                <div class="warning">
                    <span><?php echo (isset($err['email']))?$err['email']:''?></span>
                </div>
                <div class="birth">
                    <p>Birthday:</p>
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
                <div class="address">
                    <p>Address:</p>
                    <input name="address" type="text">
                </div>
                <div class="warning">
                    <span><?php echo (isset($err['address']))?$err['address']:''?></span>
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
                    <td width="10%">CID</td>
                    <td width="25%">Email</td>
                    <td width="20%" style="padding-left:40px;">Full Name</td>
                    <td width="10%">BirthDay</td>
                    <td width="15%">Address</td>
                    <td width="10%" style="padding-left:35px;">Action</td>
                </tr>
               <?php customer() ?>
               
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