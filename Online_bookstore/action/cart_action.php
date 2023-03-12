<?php

if(isset($_GET['product_id']) && isset($_GET['type'])){
    $product_id = $_GET['product_id'];
    $type = $_GET['type'];

    if (empty($product_id) || empty($type)) {
        header("Location: ../explorer.php?error=NoProductIdFound");
        exit();
    } else {
        include "../Inc/connection.php";
        // Prepare Session Object
        session_start();
        $state = true;
        $count = -1;
        $qty = 0;

        if(isset($_SESSION['product_id'])){
            // Check product already exists in cart session
            foreach ($_SESSION['product_id'] as $product){
                $count++;
                if($product[0] == $product_id && $product[1]  == $type){
                    $qty = $product[2] + 1;
                    echo $qty;
                    unset($_SESSION['product_id'][$count]);
                    array_push($_SESSION['product_id'],array($product_id,$type,$qty));
                    $_SESSION['product_id'] = array_values($_SESSION['product_id']);

                    $state = false;
                }
            }
        }

        if($state){
            if(isset($_SESSION['product_id'])){
                array_push($_SESSION['product_id'],array($product_id,$type,1));
            }else{
                $_SESSION['product_id'] = array(array($product_id,$type,1));
            }
        }

//        foreach ($_SESSION['product_id'] as $value){
//            echo $value[0];
//            echo $value[1];
//            echo $value[2];
//        }
        header("Location: ../cart.php?success=ProductAdded");
        exit();
    }
}else{
    header("Location: ../explorer.php");
    exit();
}