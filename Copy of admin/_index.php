<?php
	if(isset($_GET['error'])){
		$error=$_GET['error'];
	}
	else{
		$error='';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bagini Nivedita Balika Sadanam Admin</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script language="javascript" src="../javascripts/functions.js"></script>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

</head>

<body>

<div id="frame">
<div id="logo"></div>
<?php echo "<font color='#FF0000'>".$error."</font>";?>
<div id="top"></div>

<div id="mid">
<h1>BAGINI NIVEDITA BALIKA SADANAM ADMIN LOGIN </h1>

<div id="blank_10"></div>
<div id="blank_10"></div>
<form action="adminmain.php" method="post"  onsubmit="return login_validation()">
<div id="cleaner">
<label class="label">User Name </label> <div class="ssemi">:</div>
<input class="input-text" onblur="clearText(this)" onfocus="clearText(this)" type="text" title="searchfield" value="Enter User Name" id="login_username" name="login_username"  />
</div>

<div id="blank_10"></div>
<div id="cleaner">
<label class="label">Password </label> <div class="ssemi">:</div>
<input class="input-text" onblur="clearText(this)" onfocus="clearText(this)" type="password" id="login_password" title="searchfield" value="Enter password" name="login_password"  />
</div>
<div id="blank_10"></div>
<input type="submit" class="login" name="login" id="reset" value="" />
</form>
</div>


<div id="btm"></div>
</div>



</body>
</html>
