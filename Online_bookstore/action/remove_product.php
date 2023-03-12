<?php
session_start();
if(isset($_GET['product_id']) && isset($_GET['type'])){
    $product_id = $_GET['product_id'];
    $type = $_GET['type'];
    $count = -1;

    foreach ($_SESSION['product_id'] as $value) {
        $count++;
        if($value[0] == $product_id && $value[1] == $type){
            unset($_SESSION['product_id'][$count]);
            $_SESSION['product_id'] = array_values($_SESSION['product_id']);
        }
    }
    header("Location: ../cart.php");
    exit();
}else{
    header("Location: ../explorer.php");
    exit();
}