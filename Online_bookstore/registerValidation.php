<?php
	session_start();
	include './Inc/connection.php';
		
	if(isset($_POST['register'])){
		
		// Transfering all the inputed values to seperate variables
		
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$repassword=$_POST['repassword'];
		$contact=$_POST['mobile'];
			
			
		$passwordencrypted = password_hash($password,PASSWORD_DEFAULT);								//Encrypting the inputed password	
		
		$repasswordencrypted = password_hash($repassword,PASSWORD_DEFAULT);							//Encrypting the inputed confirm password	
			
		// checking username with database	
		$sql_username = "SELECT * FROM onlinebookstore WHERE Username='$username'";					
			
			
		$result_username = $connection->query($sql_username);
			
			
		if($result_username->num_rows == 1){															//if username exists
			header("location:./register.php?signup=username");
			exit();
		}else{
			$insert="INSERT INTO onlinebookstore (`FirstName`,`LastName`,`Username`,`Email`,`Password`,`Mobile`)
					 VALUES('{$firstname}','{$lastname}','{$username}','{$email}','{$passwordencrypted}','{$contact}')";					// input the values into database
				
			if(mysqli_query($connection,$insert)){
				setcookie("USERNAME","$username",time()+(86400 * 2),"/");																			// setting cookie
					if(isset($_COOKIE['USERNAME'])){
						$verify = password_verify($password,$passwordencrypted);																	// password verification
							if($verify) {
								$_SESSION['UserName'] = $username;																					// setting session variable with username
								$_SESSION['Password'] = $passwordencrypted;																			// setting session variable with password
							}
					}
					if((isset($_SESSION['UserName'])) && (isset($_SESSION['Password']))){															// checking availability of both created session
						header("Location:./home.html");																							// Redirected to home page
						exit();
					}
			}else{
				echo "Error: " . $insert . "<br>" . mysqli_error($connection);
			}
		}
		
		$connection->close();																																// connection close
	}
	?>


		
					