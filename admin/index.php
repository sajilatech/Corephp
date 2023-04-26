<?php
	if(isset($_GET['error'])){
		$error=$_GET['error'];
	}
	else{
		$error='';
	}
	if(isset($_REQUEST['id'])){
	 	$value=$_REQUEST['id'];
	}
	else{
	 $value='';
	}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BHAGINI NIVEDITHA BAALIKA SADANAM - Admin</title>
<script language="javascript" src="../javascripts/functions.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css"/>


</head>

<body>


<div id="frame">


<div id="left">
<div id="pic"></div>
</div>



<div id="right">
<div id="logo"></div>
<div id="clear"></div>
<div id="log_l"></div>


<div id="log_bg">
<h1>WELCOME TO BHAGINI NIVEDITHA BAALIKA SADANAM</h1>

<div id="blank_10"></div>
<div id="blank_10"></div>
<?php echo "<font color='#FF0000'>".$error."</font>";?>
<form action="adminmain.php" method="post"  onsubmit="return login_validation()">
<div id="cleaner">
<label class="label">User Name </label> <div class="ssemi">:</div>
<input class="input-text" type="text" title="searchfield"  id="login_username" name="login_username" value="<?php echo $value;?>"  />
</div>


<div id="blank_10"></div>


<div id="cleaner">
<label class="label">Password </label> <div class="ssemi">:</div>
<input class="input-text" type="password" id="login_password" title="searchfield" value="" name="login_password"  />
</div>
<div id="blank_10"></div>
<input type="hidden" name="page" value="admin">
<input type="submit" class="login" name="login" id="reset" value="LOG IN" />



</form>



</div>


<div id="log_r"></div>


</div>


</div>



</body>
</html>
