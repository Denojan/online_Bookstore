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
    <link rel="stylesheet" href="./css/table-style.css">
    <link rel="stylesheet" href="./css/cart.css">
    <title>Explorer</title>
</head>
<body>
<!-- Header -->
<?php include './include/header.php'; ?>

<!-- Cart Section -->
<div class="main-container" style="margin-top: 320px">
    <div class="sub-container">
        <div class="row" style="align-items: flex-start">
            <div class="cart-column-left">
                <table class="cart-table">
                    <tr>
                        <th>IMAGE</th>
                        <th>PRODUCT NAME</th>
                        <th>UNIT PRICE</th>
                        <th>QUANTITY</th>
                        <th>TOTAL</th>
                    </tr>
                    <?php echo loadCart();?>
                </table>
            </div>
            <div class="cart-column-right">
                <div class="cart-total-cal-section">
                    <!-- Cart Calculation Section -->
                    <div class="cart-total-cal-table">
                        <div class="cart-total-cal-title-box">
                            <span class="cart-total-cal-title">CART TOTAL</span>
                        </div>
                        <div class="cart-total-cal-data-box dis-flex">
                            <div class="cart-total-cal-data-left left">
                                <span class="cart-total-cal-data-txt">Sub Total</span>
                            </div>
                            <div class="cart-total-cal-data-right right">
                                <span class="cart-total-cal-data-txt">LKR: <?php echo cartTotal()[0];?>.00</span>
                            </div>
                        </div>
                        <div class="cart-total-cal-data-box dis-flex">
                            <div class="cart-total-cal-data-left left">
                                <span class="cart-total-cal-data-txt">Delivery Fee</span>
                            </div>
                            <div class="cart-total-cal-data-right right">
                                <span class="cart-total-cal-data-txt">LKR: 500.00</span>
                            </div>
                        </div>
                        <div class="cart-total-cal-data-box dis-flex">
                            <div class="cart-total-cal-data-left left">
                                <span class="cart-total-cal-data-txt">Discount</span>
                            </div>
                            <div class="cart-total-cal-data-right right">
                                <span class="cart-total-cal-data-txt">LKR: 0.00</span>
                            </div>
                        </div>
                        <div class="cart-total-cal-data-box-main dis-flex">
                            <div class="cart-total-cal-data-left-main left">
                                <span class="cart-total-cal-data-txt-main">TOTAL</span>
                            </div>
                            <div class="cart-total-cal-data-right-main right">
                                <span class="cart-total-cal-data-txt-main">LKR: <?php echo cartTotal()[1];?>.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Button -->
                    <div class="navigation-menu-footer-button-box" style="margin-top: 25px;">
                        <button class="btn-main btn-main-full" onclick="window.location.href = './Payment.php';" style="font-size: 20px;">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="./js/include-html-file.js"></script>
</body>
</html>