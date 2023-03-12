<?php
session_start();

if(isset($_SESSION['login'])){
    if($_SESSION['login'][0]){
        header('Location: ./home.html?Warring=UserAlreadyLogin');
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Bookshelf</title>
    <link rel="stylesheet" href="./css/sheet_new.css">
    <link rel="stylesheet" href="./css/functions.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/table-style.css">
    <link rel="stylesheet" href="./css/cart.css">
    <style>
        .header-toggle-box{
            padding: 0px;
        }
    </style>
</head>

<body>
<!-- Header -->
<?php include './include/header.php'; ?>

<!--login page-->
<section style="margin-top: 350px">
    <div class="contentBx">
        <div class="form-container">
            <form action="./action/login_action.php" method="POST" style="box-sizing: border-box">
                <h3> Login now </h3>
                <div class="inputBx">
                    <span class="login-label-span">Username  </span>
                    <input class="field" name="username" placeholder="Enter username" required type="text"><br><br>
                    <span class="login-label-span"> Password </span>
                    <input class="field" name="password" placeholder="Enter password" required type="password"><br><br>
                </div>
                <div class="remember">
                    <label><input class="field" name="" type="checkbox"> remember me </label>
                </div>
                <?php
                if(isset($_GET['error'])){
                    echo "<span style='color: red;'>{$_GET['error']}</span>";
                }
                ?>
                <div class="inputBx">
                    <input name="login" type="submit" value="Login now">
                    <br><br>
                    <p>Do not have an account?<a href="register.html"> register now </a></p>
                </div>
            </form>
            <h4>------Login with social media------</h4>
            <br>
            <ul class="sci">
                <li><a href="https://www.instagram.com/?hl=en" target="_blank"><img height="30px"
                                                                                    src="Images/insta.webp"
                                                                                    width="30px"></a></li>
                <li><a href="https://twitter.com/?lang=en" target="_blank"><img height="30px" src="Images/twitter.png"
                                                                                width="30px"></a></li>
                <li><a href="https://www.facebook.com/" target="_blank"><img height="30px" src="Images/fb.png"
                                                                             width="30px"></a></li>
            </ul>
        </div>
    </div>
</section>


<!--(Footer)-->
<div class="myFooter">
    <div class="foot">
        Follow us on:
        <br/><br/>

        <a href="https://www.instagram.com/?hl=en"><img class="link" height="50px" src="Images/insta.webp" width="50px"></a>
        <a href="https://twitter.com/?lang=en"><img class="link" height="50px" src="Images/twitter.png"
                                                    width="50px"></a>

    </div>
    <div class="foot">
        <br/><br/><a href="https://www.facebook.com/"><img height="50px" src="Images/fb.png" width="50px"></a>
        <br/><br/></div>
    <div class="foot"></div>
    <div class="foot">
        <br/><br/>
        <address>Our Warehouses:<br/><br/>
            Bookshelf Books,<br/>
            PO-613 / 53 Emerson road,<br/>
            Kippford or Scaur -Breadhurst,<br/>
            UK.<br/><br/>
        </address>
    </div>
    <div class="foot">
        <br/><br/><br/><br/>
        <address>
            No.126,<br/>
            Bookshelf Books, <br/>
            Warehouse complex,<br/>
            Colombo 8,<br/>
            Sri Lanka.<br/><br/><br/>
        </address>
    </div>
</div>
<footer>
    <center>
        <p>Project for Sri Lanka Institute of information technology. Year 01 semester 02. Group project for module
            IT1090 - Internet and web technologies.Group 03.01Group 06 project.<br/>all rights received.</p>
    </center>
</footer>
</body>
</html>