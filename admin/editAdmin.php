<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/include.php');
$id='1';
 $row=$class->getRowByID('admin','admin_id',$id,$condition='');
  if(isset($_POST['Submit'])){
		$validator->addValidation("username","req","Please fill username");
		$validator->addValidation("email","req","Please fill email");
		if($_POST['admin_password']!=''){
			$validator->addValidation("c_password","req","Please confirm password");
		}
		$username=$_POST['username'];
		$admin_name=$_POST['admin_name'];
		$email=$_POST['email'];
	  if($validator->ValidateForm()){	
		if($_POST['admin_password']!='' && $_POST['c_password'] !=''){
			$password=$_POST['admin_password'];
			if($_POST['admin_password']!= $_POST['c_password']){
			$originatingpage='editAdmin.php?current_tab='.$current_tab; 
							echo '<script type="text/javascript"> 
							alert(\'Please check, New password mismatch with confirm password field\'); 
							window.location = "'.$originatingpage.'"; 
							</script>'; 
							exit;
			}
			$field_array=array(
					'admin_name'=>$admin_name,
					'admin_username'=>$username,
					'admin_password '=>md5($password),
					'admin_email'=>$email
			
					);
		}
		else{
		$field_array=array(
					'admin_name'=>$admin_name,
					'admin_username'=>$username,
					'admin_email'=>$email
			
					);
		}
			
			$condi="admin_id='$id'";
			$class->UpdateQuery('admin',$field_array,$condi); 
			$originatingpage='editAdmin.php?current_tab=news'; 
							echo '<script type="text/javascript"> 
							alert(\'Successfully created\'); 
							window.location = "'.$originatingpage.'"; 
							</script>'; 
							exit;
		}
		else{
			$error_hash = $validator->GetErrors();
			foreach($error_hash as $inpname => $inp_err){
				echo "<div class='validation_errors'><center><p><font color='red'>$inp_err</font></p>\n</center></div>";
			}         
		}
	}
	else{
		$username=$row['admin_username'];
		$admin_name=$row['admin_name'];
		$email=$row['admin_email'];
}
 if(isset($_SESSION['username'])){?>
<?php include('header.php');?>
<div id="main_content">
<div  id="blank_10"></div>
<div id="content"><form method="post" enctype="multipart/form-data" >
        <table width="99%" border="0" cellspacing="1" cellpadding="3" align="right">
         <tr>
                <td align="left" valign="top"> Admin name</td>
                <td align="left" valign="top" colspan="2">
                  <input class="inp-text" name="admin_name" id="admin_name" value="<?php echo $admin_name;?>" type="text" size="30" />													  </td>
            </tr>
            <tr>
                <td align="left" valign="top"> Username</td>
                <td align="left" valign="top" colspan="2">
                  <input class="inp-text" name="username" id="username" value="<?php echo $username;?>" type="text" size="30" />													  </td>
            </tr>
             <tr>
                <td align="left" valign="top"> New password</td>
                <td align="left" valign="top" colspan="2">
              <input  name="admin_password" size="30" />
             </td>
            </tr>
            <tr>
                <td align="left" valign="top"> Confirm  password</td>
                <td align="left" valign="top" colspan="2">
              <input class="inp-text" name="c_password" id="c_password"  type="password" size="30" />
             </td>
            </tr>
            <tr>
                <td align="left" valign="top">Email</td>
                <td align="left">  <input class="inp-text" name="email" id="email"   value="<?php echo $email;?>" /></td>
                
            </tr>
    <tr>
    <td align="centre"><input class="button" type="submit" alt="SUBMIT" name="Submit" value="SUBMIT" />
<input type="button" class="button" value="Cancel" onclick="cancelAction()" /></td>
    </tr>
    </table>
	</form></div>
 



</div>
<?php 
	}
	else{
	$originatingpage='login.php';
							echo '<script type="text/javascript"> 
							alert(\'Session expired, please login again\'); 
							window.location = "'.$originatingpage.'"; 
							</script>'; 
							exit;
	}
?>

<?php include('footer.php');?>
