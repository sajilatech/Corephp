<?php
session_start();
require('../include/common.php');
require('../include/formvalidator.php');
 $class=new Common();
 $validator = new FormValidator();
if(isset($_REQUEST["login"])){
	$page=$_POST['page'];
	$un=$_POST["login_username"];
	$pwd=$_POST["login_password"];
	$validator->addValidation("login_username","req","Please fill in Username");
	$validator->addValidation("login_password","req","Please fill in Password");
	if($validator->ValidateForm()){
		$row=$class->authenticate($un,$pwd,'admin');
		if($row>0){
			$_SESSION['username'] = $un;
			$_SESSION['usertype']='admin';
			//$class->redirect('login_success.php');
			 $originatingpage='login_success.php?msg= Successfully login'; 
									echo '<script type="text/javascript"> 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit; 
		}
		else{
			if($page=='admin'){
			 $originatingpage='index.php?error= Invalid username and password'; 
									echo '<script type="text/javascript"> 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit; 
			}
			else if($page=='home'){
			 $originatingpage='index.php?id='.$un.'&error=Invalid  password'; 
									echo '<script type="text/javascript"> 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit; 
			}
		}
	}
	else{
		if($page=='admin'){
			 $originatingpage='index.php.php?error=Please fill username and password'; 
									echo '<script type="text/javascript"> 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit; 
		}
		else if($page=='home'){
		 $originatingpage='../index.php.php?error=Please fill username and password'; 
									echo '<script type="text/javascript"> 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit; 
		}
	}
}
?>

