<?php

if(isset($_GET['product_id']) && isset($_GET['type'])){
    $product_id = $_GET['product_id'];
    $type = $_GET['type'];

    if (empty($product_id) || empty($type)) {
        header("Location: ../explorer.php?error=NoProductIdFound");
        exit();
    } else {
        // Prepare Session Object
        session_start();
        $state = true;
        $count = -1;
        $qty = 0;

        if(isset($_SESSION['wishlist'])){
            // Check product already exists in cart session
            foreach ($_SESSION['wishlist'] as $product){
                $count++;
                if($product[0] == $product_id && $product[1]  == $type){
                    $state = false;
                }
            }
        }

        if($state){
            if(isset($_SESSION['wishlist'])){
                array_push($_SESSION['wishlist'],array($product_id,$type,1));
            }else{
                $_SESSION['wishlist'] = array(array($product_id,$type,1));
            }
        }

        foreach ($_SESSION['wishlist'] as $value){
            echo $value[0];
            echo $value[1];
            echo $value[2];
        }
        header("Location: ../wishlist.php?success=ProductAdded");
        exit();
    }
}else{
    header("Location: ../explorer.php");
    exit();
}