<?php 
	session_start();
	include './Inc/connection.php';										
	
	if((isset($_SESSION['UserName'])) && (isset($_SESSION['Password']))){														// checking availability of sessions
	
		if((!empty($_SESSION['UserName'])) && (!empty($_SESSION['Password']))){													// checking availability of value of sessions 
			$username = $_SESSION['UserName'];
			$password = $_SESSION['Password'];
		
			$cpassword = $_POST['cpassword'];	
			$verify = password_verify($cpassword,$password);
				
			//changing fisrt name 	
			if(isset($_POST['fnamechange'])){
						
				if(!$verify) {																							// password not verified
					header("location:./userdetail.php?edit=firstname1");											//Redirected to user account page again
					exit();	
				}
				else{																									// password verified
					$firstname = $_POST['newfirstname'];
					
					// update the new value in database
					$sql = "UPDATE onlinebookstore
							SET FirstName = '$firstname'
							WHERE Username='$username'";
					
					if($connection->query($sql)){
						
						header("location:./userdetail.php?edit=firstname2");										//Redirected to user account page again
						exit();
						
					}else{
						header("location:./userdetail.php?edit=firstname3");										//Redirected to user account page again
						exit();	
					}	
				}
				
			}
			
			
			//changing last name
			if(isset($_POST['lnamechange'])){
				
							
				if(!$verify) {																							// password not verified
					header("location:./userdetail.php?edit=lastname1");											//Redirected to user account page again
					exit();			
				}
				else{																									// password verified
					$lastname = $_POST['newlastname'];
							
					// update the new value in database		
					$sql = "UPDATE onlinebookstore 
							SET LastName = '$lastname'
							WHERE Username='$username'";
					
					if($connection->query($sql)){
						header("location:./userdetail.php?edit=lastname2");										//Redirected to user account page again
						exit();
					}else{
						header("location:./userdetail.php?edit=lastname3");										//Redirected to user account page again
						exit();
					}	
				}
			}
			
			
			//changing email
			if(isset($_POST['emailchange'])){
				if(!$verify) {																							// password not verified
					header("location:./userdetail.php?edit=email1");												//Redirected to user account page again
					exit();		
				}
				else{																									// password verified
					$email = $_POST['newemail'];
					
					// update the new value in database
					$sql = "UPDATE onlinebookstore
							SET Email = '$email'
							WHERE Username='$username'";
					
					if($connection->query($sql)){
						header("location:./userdetail.php?edit=email2");											//Redirected to user account page again
						exit();
					}else{
						header("location:./userdetail.php?edit=email3");											//Redirected to user account page again
						exit();
					}	
				}
			}
			
					
			//changing email
			if(isset($_POST['numberchange'])){
				if(!$verify) {																							// password not verified
					header("location:./userdetail.php?edit=number1");												//Redirected to user account page again
					exit();	
				}
				else{																									// password verified
					$mobile = $_POST['newmobile'];
							
					// update the new value in database		
					$sql = "UPDATE onlinebookstore
							SET Mobile = '$mobile'
							WHERE Username='$username'";
					
					if($connection->query($sql)){
						header("location:./userdetail.php?edit=number2");											//Redirected to user account page again
						exit();
					}else{
						header("location:./userdetail.php?edit=number3");											//Redirected to user account page again
						exit();
					}	
				}
			}
			
			//changing password
			if(isset($_POST['passwordchange'])){
				if(!$verify) {																							// password not verified
					header("location:./userdetail.php?edit=password1");											//Redirected to user account page again
					exit();			
				}
				else{
					if($_POST['newrepassword'] == $_POST['newpassword']){												//cheching whether the newly entered password is match with it's confirm password
							
						$currentpassword = $_POST['newpassword'];
						$currentencrypted = password_hash($currentpassword,PASSWORD_DEFAULT);							// Encrypting the new password
						$_SESSION['Password'] = $currentencrypted;
						
						// update the new value in database	
						$sql = "UPDATE onlinebookstore
								SET Password = '$currentencrypted'
								WHERE Username='$username'";
					
						if($connection->query($sql)){
							header("location:./userdetail.php?edit=password2");									//Redirected to user account page again
							exit();
						}else{
							header("location:./userdetail.php?edit=password3");									//Redirected to user account page again
							exit();
						}
					}else{
						header("location:./userdetail.php?edit=password4");										//Redirected to user account page again
						exit();
					}					
				}
			}
			
			//Deleting Account
			if(isset($_POST['delete'])){
				$dusername = $_POST['dusername'];
				
				if(!$verify) {																							// password not verified
					header("location:./userdetail.php?edit=delete1");												//Redirected to user account page again
					exit();			
				}
				else{
					if($username == $dusername){																		//checking whether the inputed username and account holder username is same
						
						//delete the record from the databse	
						$sql = "delete from onlinebookstore
								where Username='$dusername'";		
					
						if($connection->query($sql)){
						
							setcookie("USERNAME","",time()-86400,"/");													//delete the cookie 
						
							session_destroy();																			//destroy the sessions
							
							header("location:./home.html");																//Redirected to home page
							exit();
						
						}else{
							header("location:./userdetail.php?edit=delete2");										//Redirected to user account page
							exit();
						}
						
					}else{
							header("location:./userdetail.php?edit=delete3");										//Redirected to user account page
							exit();
						}
			
				}
			}
			
		}
		
		
	}else{
		
		header("location:./login.php");																					//Redirected to login page
	}
	
	$connection->close();
