<!DOCTYPE html>
<html>

<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="./css/sheet.css">
	<link rel="stylesheet" href="./css/signup.css">
	<script src="./js/index.js"></script>
</head>

<body>
	<div class="headercol">
		<div class="headercol1">
			<img class="logo" src="./Images/logo.png" alt="Image not found..." width="150px" height="150px">

			<h1> The Bookshelf</h1>
			<h3>The best online book store...</h3><br />
		</div>
		<div class="headercol3">
			<a href=""><img class=logo2 src="./Images/wish.png" width="70pt" height="70pt"></a>
			<a href=""><img class=logo2 src="./Images/cart.png" width="80pt" height="80pt"></a>
		</div>
		<div class="headercol2">
			<br />
			<a href="./userdetail.php"><img src="./Images/prof.png" alt="your profile..." width="200pt" height="170pt"></a> <br />
			<a href="./login.php"><button class="btn btn1"> Login</button></a>
			<a href="./register.php"><button class="btn btn2"> Signup</button></a>

		</div>
	</div>
	<hr>

	<ul class="menu">
        <li class="menu"><a href="./home.html">Home</a></li>
        <li class="menu"><a href="./Contact_Us.php">Contact us</a></li>
        <li class="menu"><a href="./userdetail.php">User Account</a></li>
        <li class="menu"><a href="./aboutUs.html">About us</a></li>
        <li class="menu"><a href="./explorer.php">Explore Books</a></li>
		<input type="text" placeholder="Search..">
	</ul>
	<!--(Header)-->


	<!--Registration form-->
	<center>
		<form name="signup" method="POST" target="_self" action="./registerValidation.php">
			<div class="formspace">

				<h2>Sign Up</h2>

				<p class="glow">Please fill in this form to create an account.</p>

				<hr class="line">

				<input type="text" id="firstname" name="firstname" placeholder="First Name" title="only alphabet letters" minlength="4">

				<input type="text" id="lastname" name="lastname" placeholder="Last Name" title="only alphabet letters" minlength="4">

				<input type="text" id="uname" name="username" placeholder="Username" minlength="6">

				<input type="email" name="email" pattern="[a-z0-9,_%+-]+@[a-z0-9,-]+\.[a-z]{2,3}" placeholder="Email">

				<input type="password" id="pwd" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain more than 8 characters including atleast 1 uppercase letter,1 lowercase letter and number ">

				<input type="password" id="rpwd" name="repassword" placeholder="Confirm Password">

				<input type="phone" id="mobile" name="mobile" placeholder="Moblie Number" pattern="[+][0-9]{11,15}" title="Between 12-15 numbers including +"><br><br>

				<input type="checkbox" name="checkbox1" value="Subscribed" required>&nbsp;
				<label><b><i>I Wish To Subscribe The BS </b></i></label><br><br>

				<input type="checkbox" name="checkbox2" value="Agreed" required>
				<label><b><i>I Agree The Terms & Conditions </b></i></label><br><br>

				<button type="submit" name="register" class="button button1" value="signin" onclick="return check()">Create Account</button>


				<hr class="line">
		</form>

		<!--To show the error message below the form-->
		<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "signup=username") == true) {
			echo "<p class='error'>Sorry..Username is already taken.<br>Try another name.</p>";
		} else if (strpos($fullUrl, "signup=error") == true) {
			echo "<p class='error'>Sorry.There is an error in server.<br>Try again in few minutes.</p>";
		}
		?>

		<p>If you already have an account <a href="./loginform.php">Log In </a></p>

		</div>
	</center>

	<!--(Footer)-->
	<div class="myFooter">
		<div class="foot">
			Follow us on:
			<br /><br />

			<a href="https://www.instagram.com/?hl=en"><img class="link" src="./Images/insta.webp" width="50px" height="50px"></a>
			<a href="https://twitter.com/?lang=en"><img class="link" src="./Images/twitter.png" width="50px" height="50px"></a>

		</div>
		<div class="foot">

			<br /><br /><a href="https://www.facebook.com/"><img src="./Images/fb.png" width="50px" height="50px"></a> <br /><br />
		</div>
		<div class="foot"></div>
		<div class="foot">
			<br /><br />
			<address>Our Warehouses:<br /><br />
				Bookshelf Books,<br />
				PO-613 / 53 Emerson road,<br />
				Kippford or Scaur -Breadhurst,<br />
				UK.<br /><br />
			</address>
		</div>
		<div class="foot">
			<br /><br /><br /><br />
			<address>
				No.126,<br />
				Bookshelf Books, <br />
				Warehouse complex,<br />
				Colombo 8,<br />
				Sri Lanka.<br /><br /><br />
			</address>
		</div>
	</div>

	<footer>
		<center>
			<p>Project for Sri Lanka Institute of information technology. Year 01 semester 02. Group project for module IT1090 - Internet and web technologies.Group 03.01Group 06 project.<br />all rights received.</p>
		</center>
	</footer>
</body>

</html>