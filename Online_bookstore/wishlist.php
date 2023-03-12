<?php
session_start();
// Include Product Load Function
include_once './action/load_products.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/functions.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/explorer.css">
    <link rel="stylesheet" href="./css/table-style.css">
    <link rel="stylesheet" href="./css/cart.css">
    <title>Wishlist</title>
</head>
<body>
<!-- Header -->
<?php include './include/header.php'; ?>

<!-- Explorer Navigation Bar -->
<div class="main-container" style="margin-top: 330px">
    <div class="sub-container" style="padding: 0;">
        <div class="product-header-title-box" style="text-align: center;">
            <span class="product-header-title" style="font-size: 40px">Wishlist</span>
        </div>
        <div class="row" style="align-items: flex-start">
            <div class="coloumn" style="padding-top: 0px;">
                <table class="cart-table">
                    <tr>
                        <th>IMAGE</th>
                        <th>PRODUCT NAME</th>
                        <th>TYPE</th>
                        <th>QUANTITY</th>
                        <th>UNIT PRICE</th>
                        <th>ACTION</th>
                    </tr>
                    <?php echo loadWishlist();?>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="./js/include-html-file.js"></script>
</body>
</html>