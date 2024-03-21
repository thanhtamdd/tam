<?php
include "connect.php";
include "header.php";

if(isset($_GET['act'])){
    $act = $_GET['act'];

switch($act){
    case 'logup':
        echo '<style>.line1{ display:none;}</style>;';
        include "logup.php";
        break;
    case 'login':
        echo '<style>.line1{ display:none;}</style>;';
        include "login.php";
        break;
    case 'brand':
        echo '<style>.line{ display:block;}.line1{ display:none;}</style>;';
        include "brand.php";
        break;
        case 'shop':
            echo '<style>.line2{ display:block;}.line1{ display:none;}</style>;';
        include "shop.php";
        break;
    case 'home':
        include "content.php";
        break; 
    case 'delete':
        include "delete.php";
        break;       

        default:
        include "content.php";
        break;
}
}else{
    include "content.php"; 
}
include "footer.php";
?>
