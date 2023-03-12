<?php
	include './Inc/connection.php';
	session_start();
	
	
?>

<!DOCTYPE html>
<html>

<head>
	<title>User Account</title>
	<link rel="stylesheet" href="./css/sheet.css">
	<link rel="stylesheet" href="./css/editdetail.css">
 </head>
 
 <body>
	<div class = "headercol">
	<div class = "headercol1">
	<img class = "logo" src = "./Images/logo.png" alt = "Image not found..." width= "150px" height= "150px">
	
<h1> The Bookshelf</h1>
	<h3>The best online book store...</h3><br/>
	</div>
	<div class = "headercol3">
	<a href = ""><img class = logo2 src = "./Images/wish.png" width = "70pt" height = "70pt"></a>
	<a href = ""><img class = logo2 src = "./Images/cart.png" width = "80pt" height = "80pt"></a>
	</div>
    <div class = "headercol2">
	<br/>
	<a href = "./userdetail.php"><img src = "./Images/prof.png" alt = "your profile..." width = "200pt" height = "170pt"></a> <br/>
		<a href="./login.php"><button class = "btn btn1"> Login</button></a>
		<a href="./register.php"><button class = "btn btn2"> Signup</button></a>
	
	</div>
	</div>
	<hr>

	<ul class = "menu">
        <li class="menu"><a href="./home.html">Home</a></li>
        <li class="menu"><a href="./Contact_Us.php">Contact us</a></li>
        <li class="menu"><a href="./userdetail.php">User Account</a></li>
        <li class="menu"><a href="./aboutUs.html">About us</a></li>
        <li class="menu"><a href="./explorer.php">Explore Books</a></li>
		<input type="text" class="search" placeholder="Search..">
		
	</ul>
	<!--(Header)-->	
	
	<!--Getting values from database-->	
	<?php
	if(isset($_SESSION['UserName'])){
		$user = $_SESSION['UserName'];
	
		$sql = "SELECT FirstName,LastName,Email,Mobile 
				from onlinebookstore 
				where Username = '$user'";
			
		$result = $connection->query($sql);

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$getfirstname = $row['FirstName'];
				$getlastname = $row['LastName'];
				$getemail = $row['Email'];
				$getcontact = $row['Mobile'];
				
			}
		}
	}

	?>
	
	<div class="editButton">
		<p class="user"><strong>Sorry!!!</strong><em>You can't change your UserName</em></p>

	
	<!--Displaying First name of the account holder-->	
	
	<div class="details">
		<?php
			echo "First Name : ";
			if(isset($_SESSION['UserName'])){
				echo "$getfirstname";
			}
		?>	
	</div>	
	
	
	
	<!---Changing first name--->
	
		<button name="btnFirstName" class="button button5" value="firstname" onclick="document.getElementById('form1').style.display='block'" > Change First Name</button><br>
	
	<div id="form1" class="modal">
		<span onclick="document.getElementById('form1').style.display='none'" class="close" title="Close Modal">&times;</span>
	
		<form class="modal-content" method="POST" action="./editdetail.php">
		<div class="container">
			<h2>Change First Name</h2>
     
			<hr>
	  
			<input type="text" placeholder="New First Name" name="newfirstname" title="only alphabet letters with 4 or more letters" pattern="[a-zA-Z]{4,}" required><br>

      
			<input type="password" placeholder="Password" name="cpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain more than 8 characters including atleast 1 uppercase letter,1 lowercase letter and number " required><br>

			<div class="clearfix">
				<input type="submit" name="fnamechange" class="fnamechange" value="Change" >
			</div>
		</div>
	 </div>
	 
	 <?php
		

		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					
		if(strpos($fullUrl,"edit=firstname1") == true){
			echo "<p class='error'>Invalid Password.</p>";			
			
		}
		elseif(strpos($fullUrl,"edit=firstname2") == true){
			echo "<p class='success'>Updated Successfully.</p>";
		}
		elseif(strpos($fullUrl,"edit=firstname3") == true){
			echo "<p class='error'>Error in update.</p>";
		}
		
			
		?>
		</form>
		
		
		<br>
	
	<!--Displaying Last name of the account holder-->
	<div class="details">
		<?php
			echo "Last Name : ";
			if(isset($_SESSION['UserName'])){
				echo "$getlastname";
			}
		?>	
	</div>	
	
	<!---Changing last name--->
	
		<button name="btnLastName" class="button button5" value="lastname" onclick="document.getElementById('form2').style.display='block'"> Change Last Name</button><br>
	
	<div id="form2" class="modal">
		<span onclick="document.getElementById('form2').style.display='none'" class="close" title="Close Modal">&times;</span>
		<form class="modal-content" method="POST" action="./editdetail.php">
		<div class="container">
			<h2>Change Last Name</h2>
     
			<hr>
	  
			<input type="text" placeholder="New Last Name" name="newlastname" title="only alphabet letters with 4 or more letters" pattern="[a-zA-Z]{4,}" required><br>

      
			<input type="password" placeholder="Password" name="cpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain more than 8 characters including atleast 1 uppercase letter,1 lowercase letter and number " required><br>
			<div class="clearfix">
				<input type="submit" name="lnamechange" class="lnamechange" value="Change">
			</div>
		</div>
	 </div>
		</form>
		
		<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					
		if(strpos($fullUrl,"edit=lastname1") == true){
			echo "<p class='error'>Invalid Password.</p>";				
		}
		elseif(strpos($fullUrl,"edit=lastname2") == true){
			echo "<p class='success'>Updated Successfully.</p>";
		}
		elseif(strpos($fullUrl,"edit=lastname3") == true){
			echo "<p class='error'>Error in update.</p>";
		}
			
		?>
		
		
		<br>	
	
	<!--Displaying Email of the account holder-->
	
	<div class="details">	
		<?php
			echo "Email : ";
			if(isset($_SESSION['UserName'])){
				echo "$getemail";
			}
		?>		
	 </div>
	 
	 <!---Changing email address--->
	
		<button name="btnEmail" class="button button5" value="email" onclick="document.getElementById('form3').style.display='block'"> Change Email Address</button><br>
	
	<div id="form3" class="modal">
		<span onclick="document.getElementById('form3').style.display='none'" class="close" title="Close Modal">&times;</span>
	
		<form class="modal-content" method="POST" action="./editdetail.php">
		<div class="container">
			<h2>Change Email Address</h2>
     
			<hr>
	  
			<input type="email" placeholder="New Email Address" name="newemail" pattern="[a-z0-9,_%+-]+@[a-z0-9,-]+\.[a-z]{2,3}" required><br>

      
			<input type="password" placeholder="Password" name="cpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain more than 8 characters including atleast 1 uppercase letter,1 lowercase letter and number " required><br>
			<div class="clearfix">
				<input type="submit" name="emailchange" class="emailchange" value="Change">
			</div>
		</div>
	 </div>
		</form>
		
		<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					
		if(strpos($fullUrl,"edit=email1") == true){
			echo "<p class='error'>Invalid Password.</p>";			
		}
		elseif(strpos($fullUrl,"edit=email2") == true){
			echo "<p class='success'>Updated Successfully.</p>";
		}
		elseif(strpos($fullUrl,"edit=email3") == true){
			echo "<p class='error'>Error in update.</p>";
		}
			
		?>
		
		
		<br>
		
	<!--Displaying Mobile number of the account holder-->	
		
	<div class="details">	
		<?php
			echo "Mobile Number : ";
			if(isset($_SESSION['UserName'])){
				echo "$getcontact";
			}
			
		?>	
	</div>
	
	<!---Changing mobile number--->
	
		<button name="btnMobile" class="button button5" value="mobile" onclick="document.getElementById('form4').style.display='block'"> Change Mobile Number</button><br>
	
	<div id="form4" class="modal">
		<span onclick="document.getElementById('form4').style.display='none'" class="close" title="Close Modal">&times;</span>
	
		<form class="modal-content" method="POST" action="./editdetail.php">
		<div class="container">
			<h2>Change Moblie Number</h2>
     
			<hr>
	  
			<input type="phone" placeholder="New Number" name="newmobile"  pattern="[+0-9]{11,15}" title="Between 12-15 numbers including +" required><br>

      
			<input type="password" placeholder="Password" name="cpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain more than 8 characters including atleast 1 uppercase letter,1 lowercase letter and number " required><br>
			<div class="clearfix">
				<input type="submit" name="numberchange" class="numberchange" value="Change">
			</div>
		</div>
	 </div>
		</form>
		
		<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					
		if(strpos($fullUrl,"edit=number1") == true){
			echo "<p class='error'>Invalid Password.</p>";			
		}
		elseif(strpos($fullUrl,"edit=number2") == true){
			echo "<p class='success'>Updated Successfully.</p>";
		}
		elseif(strpos($fullUrl,"edit=number3") == true){
			echo "<p class='error'>Error in update.</p>";
		}
			
		?>
		
		<br>
		
		<!---Changing password--->
	
		<button name="btnPassword" class="button button5" value="password" onclick="document.getElementById('form5').style.display='block'"> Change Password</button><br>
	
	<div id="form5" class="modal">
		<span onclick="document.getElementById('form5').style.display='none'" class="close" title="Close Modal">&times;</span>
	
		<form class="modal-content" method="POST" action="./editdetail.php">
		<div class="container">
			<h2>Change Password</h2>
     
			<hr>
	  
			<input type="password" placeholder="Old Password" name="cpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain more than 8 characters including atleast 1 uppercase letter,1 lowercase letter and number " required><br>

      
			<input type="password" placeholder="New Password" name="newpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain more than 8 characters including atleast 1 uppercase letter,1 lowercase letter and number " required><br>
	  
			<input type="password" placeholder="Confirm New Password" name="newrepassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain more than 8 characters including atleast 1 uppercase letter,1 lowercase letter and number " required><br>
			<div class="clearfix">
				<input type="submit" name="passwordchange" class="passwordchange" value="Change">
			</div>
		</div>
	</div>
		</form>
		
		<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					
		if(strpos($fullUrl,"edit=password1") == true){
			echo "<p class='error'>Invalid Old Password.</p>";			
		}
		elseif(strpos($fullUrl,"edit=password2") == true){
			echo "<p class='success'>Updated Successfully.</p>";
		}
		elseif(strpos($fullUrl,"edit=password3") == true){
			echo "<p class='error'>Error in update.</p>";
		}
		elseif(strpos($fullUrl,"edit=password4") == true){
			echo "<p class='error'>New Password not match.Please try again.</p>";
		}
			
		?>
		
	<!---Deleting Account--->
	
		<button name="btnDelete" class="button button6" value="deleteAccount" onclick="document.getElementById('form6').style.display='block'"> Delete Account</button><br>
	
	<div id="form6" class="modal">
		<span onclick="document.getElementById('form6').style.display='none'" class="close" title="Close Modal">&times;</span>
	
		<form class="modal-content" method="POST" action="./editdetail.php">
		<div class="container">
			<h2>Delete Account</h2>
     
			<hr>
				<input type="text" id="duname" name="dusername" placeholder="Username" minlength="6">
				
      			<input type="password" placeholder="Password" name="cpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain more than 8 characters including atleast 1 uppercase letter,1 lowercase letter and number " required><br>

			<div class="clearfix">
				<input type="submit" name="delete" class="delete" value="Delete">
			</div>
		</div>
	</div>
		</form>
		
		<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					
		if(strpos($fullUrl,"edit=delete1") == true){
			echo "<p class='error'>Invalid Password.</p>";			
		}
		elseif(strpos($fullUrl,"edit=delete2") == true){
			echo "<p class='error'>Error in update.</p>";
		}
		elseif(strpos($fullUrl,"edit=delete3") == true){
			echo "<p class='error'>Invalid Username.</p>";
		}
		
		$connection->close();	
		?>
		
			
	</div>

	
	

<!--(Footer)-->
<div class = "myFooter">
<div class = "foot">
	 Follow us on:
			<br/><br/>
			
			<a href = "https://www.instagram.com/?hl=en"><img class = "link" src = "./Images/insta.webp" width = "50px" height = "50px"></a>
			<a href = "https://twitter.com/?lang=en"><img class = "link"src = "./Images/twitter.png" width = "50px" height = "50px"></a>
			
</div>
<div class = "foot">
<br/><br/><a href = "https://www.facebook.com/"><img src = "./Images/fb.png" width = "50px" height = "50px"></a> <br/><br/></div>
<div class = "foot"></div>
<div class = "foot">	
<br/><br/>	
			<address>Our Warehouses:<br/><br/>
			Bookshelf Books,<br/>
			PO-613 / 53 Emerson road,<br/>
			Kippford or Scaur -Breadhurst,<br/>
			UK.<br/><br/>
			</address>
</div>
<div class = "foot">
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
	<p>Project for Sri Lanka Institute of information technology. Year 01 semester 02. Group project for module IT1090 - Internet and web technologies.Group 03.01Group 06 project.<br/>all rights received.</p>
	</center>
	</footer>
 </body>
</html>