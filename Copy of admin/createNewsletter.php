<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/include.php');
$view='viewNewsletter.php';
$add_view='createNewsletter.php';
$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/s-compressed');  
?>
<?php 
	$title='';
 	 if(isset($_POST['Submit'])){
     	$validator->addValidation("title","req","Give a name to newsletter");

		$title=$_POST['title'];
		 $row=$class->checkUnique('title',$title,'newsletters');
		if($row >0){
			$originatingpage=$add_view.'?current_tab='.$current_tab; 
								echo '<script type="text/javascript"> 
								alert(\'Please give another name, this title already exists\'); 
								window.location = "'.$originatingpage.'"; 
								</script>'; 
								exit;
		}
  		$name=$_FILES['file']['name'];
	  	if($validator->ValidateForm()){
      		 $type=$_FILES['file2']['type'];
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
			$originatingpage=$add_view.'?current_tab='.$current_tab; 
								echo '<script type="text/javascript"> 
								alert(\'Upload ZIP files only\'); 
								window.location = "'.$originatingpage.'"; 
								</script>'; 
								exit;
			}
			$temp=$_FILES['file']['tmp_name'];
			mkdir('../uploads//newsletter/'.$title,0777);
			$path = '../uploads/newsletter/'.$title.'/';
			$photo= $_FILES['file']['name'];
			$token = (rand()%99999999);
			$thumb="$token"."_"."$photo";
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
		$originatingpage=$view.'?current_tab='.$current_tab; 
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
	?>
 <?php 
  include('header.php');
	if(isset($_SESSION['username'])){

?>

<div id="content">
  <div id="breadCrumb"></div>
  <h2 id="pageName"><strong>ADD NEWSLETTER </strong></h2>
  <div class="feature"></div>
  <div class="story" style="width:60%; margin:1px auto;">
    <form method="post" enctype="multipart/form-data" >
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr>
          <td align="left" valign="top">Name</td>
          <td align="left" valign="top" colspan="2"><input class="inp-text" name="title" id="title" value="<?php echo $title;?>" type="text" size="30" />
          </td>
        </tr>
         <tr>
          <td align="left" valign="top">Upload newsletter</td>
          <td align="left" valign="top" colspan="2"><font color="#412410"  size="-2"><i>(Upload  only html file )</font><br /><input class="inp-text" name="file" id="file"  type="file" />
          </td>
        </tr>
         <tr>
          <td align="left" valign="top">Upload newsletter's images</td>
          <td align="left" valign="top" colspan="2"><font color="#412410"  size="-2"><i>(Upload   ZIP images files only )</font><br /><input class="inp-text" name="file2" id="file2"  type="file" />
          </td>
        </tr>
        <tr>
          <td align="center" colspan="2"><input class="button" type="submit" alt="SUBMIT" name="Submit" value="SUBMIT" />
            <!--<input type="button" class="button" value="Cancel" onclick="cancelAction()" />--></td>
        </tr>
      </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
<?php 
	}
	else{
	$originatingpage='index.php';
							echo '<script type="text/javascript"> 
							alert(\'Session expired, please login again\'); 
							window.location = "'.$originatingpage.'"; 
							</script>'; 
							exit;
	}
?>
<!--end content -->
<?php include('leftMenu.php');?>
<?php include('footer.php');?>
