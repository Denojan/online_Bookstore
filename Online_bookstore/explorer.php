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
    <title>Explorer</title>
</head>
<body>
<!-- Header -->
<?php include './include/header.php'; ?>

<!-- Explorer Navigation Bar -->
<div class="main-container" style="margin-top: 280px">
    <div class="sub-container-full" style="padding: 0;">
        <div class="row" style="align-items: flex-start">
            <div class="explorer-column-left">
                <!-- Navigation Side Bar -->
                <div class="navigation-menu-bar">
                    <div class="navigation-sub-menu-bar">
                        <!-- Navigation Side Bar Menu -->
                        <div class="navigation-sub-menu">
                            <div class="navigation-sub-menu-item dis-flex">
                                <div class="navigation-sub-menu-item-radio-box">
                                    <input class="navigation-sub-menu-item-radio" name="navigation_filter" type="radio">
                                </div>
                                <div class="navigation-sub-menu-item-text-box">
                                    <span class="navigation-sub-menu-item-text">Children Books</span>
                                </div>
                            </div>
                            <div class="navigation-sub-menu-item dis-flex">
                                <div class="navigation-sub-menu-item-radio-box">
                                    <input class="navigation-sub-menu-item-radio" name="navigation_filter" type="radio">
                                </div>
                                <div class="navigation-sub-menu-item-text-box">
                                    <span class="navigation-sub-menu-item-text">Belles Letter</span>
                                </div>
                            </div>
                            <div class="navigation-sub-menu-item dis-flex">
                                <div class="navigation-sub-menu-item-radio-box">
                                    <input class="navigation-sub-menu-item-radio" name="navigation_filter" type="radio">
                                </div>
                                <div class="navigation-sub-menu-item-text-box">
                                    <span class="navigation-sub-menu-item-text">Science Fiction</span>
                                </div>
                            </div>
                            <div class="navigation-sub-menu-item dis-flex">
                                <div class="navigation-sub-menu-item-radio-box">
                                    <input class="navigation-sub-menu-item-radio" name="navigation_filter" type="radio">
                                </div>
                                <div class="navigation-sub-menu-item-text-box">
                                    <span class="navigation-sub-menu-item-text">Detective Stories</span>
                                </div>
                            </div>
                            <div class="navigation-sub-menu-item dis-flex">
                                <div class="navigation-sub-menu-item-radio-box">
                                    <input class="navigation-sub-menu-item-radio" name="navigation_filter" type="radio">
                                </div>
                                <div class="navigation-sub-menu-item-text-box">
                                    <span class="navigation-sub-menu-item-text">Magazines</span>
                                </div>
                            </div>
                            <div class="navigation-sub-menu-item dis-flex">
                                <div class="navigation-sub-menu-item-radio-box">
                                    <input class="navigation-sub-menu-item-radio" name="navigation_filter" type="radio">
                                </div>
                                <div class="navigation-sub-menu-item-text-box">
                                    <span class="navigation-sub-menu-item-text">Romance</span>
                                </div>
                            </div>
                            <div class="navigation-sub-menu-item dis-flex">
                                <div class="navigation-sub-menu-item-radio-box">
                                    <input class="navigation-sub-menu-item-radio" name="navigation_filter" type="radio">
                                </div>
                                <div class="navigation-sub-menu-item-text-box">
                                    <span class="navigation-sub-menu-item-text">Antique</span>
                                </div>
                            </div>
                            <div class="navigation-sub-menu-item dis-flex">
                                <div class="navigation-sub-menu-item-radio-box">
                                    <input class="navigation-sub-menu-item-radio" name="navigation_filter" type="radio">
                                </div>
                                <div class="navigation-sub-menu-item-text-box">
                                    <span class="navigation-sub-menu-item-text">Academic Books</span>
                                </div>
                            </div>
                        </div>
                        <!-- Navigation Side Bar Bottom -->
                        <div class="navigation-menu-footer">
                            <div class="navigation-menu-footer-sub">
                                <div class="navigation-menu-footer-text-box">
                                    <span class="navigation-menu-footer-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</span>
                                </div>
                                <div class="navigation-menu-footer-button-box">
                                    <button class="btn-main btn-main-full">Accept Cookies</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="explorer-column-middle">
                <!-- Product Section Middle -->
                <div class="main-container" style="margin-top: 20px">
                    <div class="sub-container-full">
                        <div class="product-header-title-box">
                            <span class="product-header-title">New Arrivals</span>
                        </div>
                        <div class="row" style="align-items: flex-start">
                            <?php
                            // Load Middle Products
                            echo load_middle_products();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="explorer-column-right">
                <!-- Product Section One -->
                <div class="main-container" style="margin-top: 20px">
                    <div class="sub-container-full">
                        <div class="product-header-title-box">
                            <span class="product-header-title">Magazines Latest</span>
                        </div>
                        <div class="row" style="align-items: flex-start">
                            <!-- Latest Magazines -->
                            <?php echo loadSetProducts("magazine");?>
                        </div>
                    </div>
                </div>
                <!-- Product Section Two -->
                <div class="main-container" style="margin-top: 20px">
                    <div class="sub-container-full">
                        <div class="product-header-title-box">
                            <span class="product-header-title">Latest Books</span>
                        </div>
                        <div class="row" style="align-items: flex-start">
                            <!-- Latest Magazines -->
                            <?php echo loadSetProducts("book");?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="./js/include-html-file.js"></script>
</body>
</html>