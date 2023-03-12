<?php

session_start();
if(isset($_GET['product_id']) && isset($_GET['type'])){
    $product_id = $_GET['product_id'];
    $type = $_GET['type'];
    $count = -1;

    foreach ($_SESSION['wishlist'] as $value) {
        $count++;
        if($value[0] == $product_id && $value[1] == $type){
            unset($_SESSION['wishlist'][$count]);
            $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
        }
    }
    header("Location: ../wishlist.php");
    exit();
}else{
    header("Location: ../explorer.php");
    exit();
}