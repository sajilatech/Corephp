<?php
include('include/home_include.php');
if(isset($_REQUEST["Submit"])){
	$name=$_POST["name"];
	$email=$_POST["email"];
	$message=$_POST["message"];
	$admin=$class->getRowByID('admin','admin_ID','1','');
	$mailto=$admin['admin_email']; 
	$mailfrom=$email; 
	$thesubject="Bagini Nivedita Balika Sadanam: Contact"; 
	
	$headers  = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	
	$mailbody= '<table width="100%" border="0" align="center" cellpadding="10" cellspacing="2">'; 
	$mailbody.='<tr><td colspan="2"><strong><font size="+1"><u>'.$thesubject.'</u></font></strong></td></tr>'; 
	$mailbody.='<tr><td width="15%" height="20">Name:</td><td width="100%">'.$name.'</td></tr>'; 
	$mailbody.='<tr><td width="15%" height="20">Email :</td><td width="100%">'.$email.'</td></tr>'; 
	$mailbody.='<tr><td width="15%" height="20">Message:</td><td width="100%">'.$message.'</td></tr>'; 
	$cc='';
	$bcc='';
	$replymessage="<p>Subject: $thesubject</p><br>
		<p>Hi customer,</p>
		
		<p>Thank you for your email.<br>
		
		We will endeavour to reply to you shortly.
		
		Please DO NOT reply to this email.</p><br>
		
		Below is a copy of the message you submitted:<br>
		--------------------------------------------------<br>
		
		
		<p>$mailbody</p><br>
		--------------------------------------------------<br>
		&nbsp;
		<p>Thank you</p>";
	$mailClass->sendMail($mailto,$email,$thesubject,$mailbody,$cc,$bcc);
	$mailClass->sendMail($email,$mailto,"Admin reply :".$thesubject,$replymessage,$cc,$bcc);
	$originatingpage='index.php'; 
	//echo $replymessage;
	echo '<script type="text/javascript"> 
	alert(\'Hello, Your Information Send To Administrator\'); 
	window.location = "'.$originatingpage.'"; 
	</script>'; 
	exit; 
}
?>