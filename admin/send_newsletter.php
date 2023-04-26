<?php
	session_start();
	$current_tab=$_GET['current_tab']; 
	include('../include/include.php');
	require('../include/mail.php');
		$admin=$class->getRowByID('admin','admin_ID','1','');
	 $admin_mail=$admin['admin_email']; 
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/s-compressed');  
	$mailClass=new Mail();
	$users=$class->getResultArray("SELECT * FROM newsletter");
	$sql="SELECT * FROM newsletters";
	$newsletters=$class->getResultArray($sql);
	$view='send_newsletter.php';
	if(isset($_REQUEST['error'])){
		$error=$_REQUEST['error'];
	}
	else{
		$error='';
	}
	
	if(isset($_POST["input_add"])){
	$validator->addValidation("title","req","Give a name to newsletter");

		$title=$_POST['title'];
		 $row=$class->checkUnique('title',$title,'newsletters');
		if($row >0){
			$originatingpage=$view.'?current_tab='.$current_tab; 
								echo '<script type="text/javascript"> 
								alert(\'Please give another name, this title already exists\'); 
								window.location = "'.$originatingpage.'"; 
								</script>'; 
								exit;
		}
		$error=''; 
		
		 $news_letter_name=$_POST['user_email'];
		 $type=$_FILES['file2']['type'];
		 if($validator->ValidateForm()){
			foreach($accepted_types as $mime_type) {  
				if($mime_type == $type) {  
					$okay = true;  
					break;  
				}  
				else{
					$okay=false;
					break;
				}
			}  
			if($okay==false){
			$originatingpage=$view.'?current_tab='.$current_tab; 
								echo '<script type="text/javascript"> 
								alert(\'Upload ZIP files only\'); 
								window.location = "'.$originatingpage.'"; 
								</script>'; 
								exit;
			}
			$temp=$_FILES['file']['tmp_name'];
			mkdir('../uploads//newsletter/'.$title,0777);
			$path = '../uploads/newsletter/'.$title.'/';
			$thumb= $_FILES['file']['name'];
			//$token = (rand()%99999999);
			//$thumb="$token"."_"."$photo";
			 move_uploaded_file($temp,$path.$thumb);
			 
			$temp2=$_FILES['file2']['tmp_name'];
		  $thumb2= $_FILES['file2']['name'];
		//	$token2 = (rand()%99999999);
			//$thumb2="$token2"."_"."$photo2";
			// move_uploaded_file($temp2,$path2.$thumb2);
			$field=array(
				'title'=>$title,
				'zip'=>$thumb,
				'folder'=>$title
			);	
			 $download_folder = '../newsletter_img';
			 move_uploaded_file($temp2,$download_folder.'/'.$thumb2);
		 $image=$thumb2;
		$zip = new ZipArchive;
		//$fileconpress = $download_folder.'/'.$image.".zip";

	//$conpress = $zip->open($fileconpress, ZIPARCHIVE::CREATE);
		if ($zip->open($download_folder.'/'.$image) === TRUE) {
			$zip->extractTo($download_folder);
			$zip->close();
			//echo 'ok';
		} else {
			//echo 'failed';
		}	
		$insert_id=$class->InsertQuery('newsletters',$field);
		$class->_delete_file($download_folder,$image);
		$newsletters_row =$class->getRowByID("newsletters",'id',$insert_id,$c='');
		 $folder=$newsletters_row['folder'];
		 $name=$newsletters_row['zip'];
		 $without_ext = substr($name, 0, strrpos($name, '.'));
		
		if(file_exists('../uploads/newsletter/'.$folder.'/'.$without_ext.'.html')){
			 $ext='.html';
		}
		else if(file_exists('../uploads/newsletter/'.$folder.'/'.$without_ext.'.htm')){
			 $ext='.htm';
		}
		else if(file_exists('../uploads/newsletter/'.$folder.'/'.$without_ext.'.shtml')){
		$ext='.shtml';
		}
		else if(file_exists('../uploads/newsletter/'.$folder.'/'.$without_ext.'.shtm')){
		$ext='.shtm';
		}
		else if(file_exists('../uploads/newsletter/'.$folder.'/'.$without_ext.'.hta')){
		$ext='.hta';
		}
		else if(file_exists('../uploads/newsletter/'.$folder.'/'.$without_ext.'.htc')){
		$ext='.htc';
		}
		 $new_name=$without_ext.$ext;
		 $path='http://www.cyberlegendz.com/works/baalika/uploads/newsletter/'.$folder.'/'.$without_ext.$ext;
		$homepage = file_get_contents($path);
		/* $file = fopen($path, 'r'); 
		while(!feof($file)){
			$r= fgetc($file);
		}
		fclose($file);
		echo $r;*/
			$thesubject='Bagini Niveditha Baalika Sadanam : Send mail';
			$headers  = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: Newsletter charset=iso-8859-1\r\n";
			$headers .= 'Content-Type: image/jpg';
			$mailbody='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="image/jpg; charset=utf-8" />
<title>Untitled Document</title>
</head>'.$homepage.'<body>
</body>
</html>';
			//foreach ($name as $email){
		//	for($i=0; $i<=count($news_letter_name); $i++){
		foreach($news_letter_name as $row){
				$cc='';
				$bcc='';
				//  $n_id=$news_letter_name[$i];
				$n =$class->getRowByID("newsletter",'newsletter_id',$row,$c='');
				$mailto =$n['newsletter_emails'];
				$mailClass->sendMail($mailto,$admin_mail,$thesubject,$mailbody,$cc,$bcc);
				
			}
			
			$error='Successfully send';
			$originatingpage=$view.'?current_tab='.$current_tab.'&error='.$error; 
								echo '<script type="text/javascript"> 
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
		
		$name='';
		$title='';
	}
?>
<?php include('header.php');?>
<div id="main_content">
<div  id="blank_10"></div>
<div id="content">

<?php include('left_menu.php');?>
<script  type="text/javascript" src="../js/jquery.js"></script>

  <script type="text/javascript">

  function SelectDeselect()
  {
        if(document.getElementById('chkSelectDeselectAll').checked)  $("INPUT[type='checkbox']").attr('checked',true); 

        else  $("INPUT[type='checkbox']").attr('checked',false); 
  }
/*function newsletter_validation(){
	if($('#user_email').attr('checked')) {

		
		return true;
	}
	else{
		alert("Select atleast one email address");
		return false;
	}
}*/
  </script>

<div id="right"> <form action="" method="post" enctype="multipart/form-data" onsubmit="return newsletter_validation()">
        <table width="108%" align="center" border="0" cellspacing="0" cellpadding="1" >
        <tr> <td align="left" colspan="2"><h2 id="pageName"><strong>Send newsletter</strong></h2></td>
            <tr>
            
            	<td colspan="2" align="center">
				<font color="#FF0000"><?php 
                echo $error;?></font>
              
       		 </td>
        </tr>
        <tr>
        <td align="left" colspan="2"> <?php function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }
	$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/");
				 $url= $protocol."://".$_SERVER['SERVER_NAME'].'/works/baalika/newsletter_img/';
				 ?>
                 <font color="#DA6209">
                 <?php
				 echo 'Call image path ` ' .$url.' ` in created newsletter html';
				 ?></font></td>
        
        <tr>
             <td align="left" valign="top" colspan="2">
             <table width="49%">
              <tr>
          <td align="left" valign="top">Newsletter name</td>
          <td align="left" valign="top"  ><input class="inp-text" name="title" id="title" value="<?php echo $title;?>" type="text"  />
          </td>
        </tr>
             <tr>
          <td align="left" valign="top">Upload newsletter</td>
          <td align="left" valign="top" colspan="3"><font color="#412410"  size="-2"><i>(Upload  only html file )</font><br /><input class="inp-text" name="file" id="file"  type="file" />
          </td>
        </tr>
         <tr>
          <td align="left" valign="top">Upload newsletter's images</td>
          <td align="left" valign="top" colspan="3"><font color="#412410"  size="-2"><i>(Upload   ZIP images files only )</font><br /><input class="inp-text" name="file2" id="file2"  type="file" />
          </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
             <tr>
             <td width="44%"  align="right"><font color="#FF6600">SelectAll</font></td> 
             <td width="56%"  align="left" > <input type="checkbox" id="chkSelectDeselectAll" onClick="SelectDeselect()"></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
              <?php
				$count=1;
				foreach($users as $user){
				if($count ==1){
				echo '<tr>';
				}
			?>
            
              <td align="right"><table><tr><td width="34"><?php echo ucfirst($user['newsletter_name']).'<b>-</b>';?></td>
              <td width="36"><?php echo $user['newsletter_emails'];?></td>
              <td width="20"><input  type="checkbox" name="user_email[]"  id="user_email"  value="<?php echo $user['newsletter_id'];?>" /></td></tr></table></td>
              <td  align="left" valign="top"></td>
          
             <?php
			 	if($count >=2){
					echo '</tr><tr>';
					$count=1;
				}
			 	$count++;
		   	}
			?>

         </table>
        										  													
          </td>
        </tr>
         
      
        
     </table>
  
      <table align="left">
        <tr><td>&nbsp;</td></tr>
        <tr>
        <td align="left" valign="top" ><input name="input_add"  class="button" type="submit" value="SEND" ></td>
        </tr>
        </table>
       </form></div>



</div>
<div id="blank_10"></div>



</div>


<?php include('footer.php');?>