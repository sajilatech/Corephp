<?php
include('include/home_include.php');
 $row=$class->getRowByID('admin','admin_ID','1',$condition='');
if(isset($_POST["Submit"])){
$email=$_POST["nemail"];
$title=$_POST['title'];
$month=date('F',time());
$year=date('Y',time());

$fields=array(
'newsletter_name'=>$title,
'newsletter_emails'=>$email,
'month'=>$month.'_'.$year
);
$class->InsertQuery('newsletter',$fields);
$condi='';
 

$thesubject="News letter sign up Details";
$mailfrom=$email; 
$headers  = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$mailbody= '<table width="100%" border="0" align="center" cellpadding="10" cellspacing="2">'; 
$mailbody.='<tr><td colspan="2"><strong><font size="+1"><u>'.$thesubject.'</u></font></strong></td></tr>'; 
$mailbody.='<tr><td width="15%" height="20">Name:</td><td width="100%">'.$title.'</td></tr>'; 
$mailbody.='<tr><td width="15%" height="20">Email address:</td><td width="100%">'.$email.'</td></tr>'; 

$replymessage="<p>Subject: $thesubject</p><br>
	<p>Hi $email,<br>
	
	Thank you for your email.<br>
	
	We will endeavour to reply to you shortly.
	
	Please DO NOT reply to this email .</p><br>
	
	Below is a copy of the message you submitted:<br>
	--------------------------------------------------<br>
	
	
	$mailbody<br>
	--------------------------------------------------<br>
	&nbsp;
	<p>Thank you</p>";
$mailto=$row['admin_email'];//-admin email----
$cc='';
$bcc='';
$mailClass->sendMail($mailto,$email,$thesubject,$mailbody,$cc,$bcc);
$mailClass->sendMail($email,$mailto,"Admin reply :".$thesubject,$replymessage,$cc,$bcc);
$originatingpage='index.php'; 
echo '<script type="text/javascript"> 
alert(\'Hello  ' . $title . ' Your Information Send To Administrator\'); 
window.location = "'.$originatingpage.'"; 
</script>'; 
exit; 
}
?>