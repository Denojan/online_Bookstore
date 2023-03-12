<div class="header">
    <!-- Top Header -->
    <div class="sub-header dis-flex">
        <div class="header-left">
            <div class="header-logo-section dis-flex">
                <!-- Top Header Logo -->
                <div class="header-logo-box-first">
                    <img class="header-logo-first-img" src="./images/logo.png" alt="">
                </div>
                <div class="header-logo-box-second">
                    <div class="header-logo-box-second-title-box">
                        <span class="header-logo-box-second-title">The Bookshelf</span>
                    </div>
                    <div class="header-logo-box-second-sub-title-box">
                        <span class="header-logo-box-second-sub-title">The best online book store...</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-right">
            <div class="header-right-toggle-section dis-flex">
                <div class="header-toggle-section dis-flex dis-block">
                    <!-- Header Toggle Section -->
                    <a class="link" href="./wishlist.php">
                        <div class="header-toggle-box">
                            <img class="header-toggle-icon" src="./images/wish.png" alt="">
                        </div>
                    </a>
                    <a class="link" href="./cart.php">
                        <div class="header-toggle-box">
                            <img class="header-toggle-icon" src="./images/cart.png" alt="">
                        </div>
                    </a>
                </div>
                <div class="header-right-account-data">
                    <div class="header-right-account-img-box">
                        <img class="header-right-account-img" src="./images/prof.png" alt="">
                    </div>
                    <div class="header-right-account-btn-group dis-flex">
                        <?php
                        if(isset($_SESSION['login'][0])){
                        ?>
                            <a class="link" href="./action/logout.php" style="margin-right: 0px">
                                <div class="header-right-account-btn-box" style="padding: 0px">
                                    <button class="btn-main header-right-account-btn">Logout</button>
                                </div>
                            </a>
                        <?php
                        }else{
                        ?>
                            <a class="link" href="./login.php" style="margin-right: 0px">
                                <div class="header-right-account-btn-box" style="padding: 0px">
                                    <button class="btn-main header-right-account-btn">Login</button>
                                </div>
                            </a>
                        <a class="link" href="./register.php" style="margin-right: 0px">
                            <div class="header-right-account-btn-box" style="padding: 0px">
                                <button class="btn-main header-right-account-btn">Sign Up</button>
                            </div>
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-second">
        <div class="header-second-sub dis-flex">
            <div class="header-second-left left">
                <!-- Second Header Menu -->
                <div role="menu" class="header-second-menu dis-flex">
                    <a class="link" href="./home.html"><div role="menuitem" class="header-second-menu-item">Home</div></a>
                    <a class="link" href="./Contact_Us.php"><div role="menuitem" class="header-second-menu-item">Contact Us</div></a>
                    <a class="link" href="./userdetail.php"><div role="menuitem" class="header-second-menu-item">User Account</div></a>
                    <a class="link" href="./aboutUs.html"><div role="menuitem" class="header-second-menu-item">About Us</div></a>
                    <a class="link" href="./explorer.php"><div role="menuitem" class="header-second-menu-item">Explore Books</div></a>
                </div>
            </div>
            <div class="header-second-right right">
                <div class="field-box">
                    <input class="field" type="text" placeholder="search...">
                </div>
            </div>
        </div>
    </div>
</div>