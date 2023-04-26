<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/include.php');
$view='viewVideo.php';
?>
<?php 
	$title='';
 	 if(isset($_POST['Submit'])){
     	$validator->addValidation("title","req","Enter  title");

		$title=$_POST['title'];
  		$name=$_FILES['file']['name'];
		$image=$_FILES['file2']['name'];
	  	if($validator->ValidateForm()){
		$add_view='createGallery.php';
			$temp=$_FILES['file']['tmp_name'];
			$temp2=$_FILES['file2']['tmp_name'];
			$D = @getimagesize($temp);
			if($D['0'] > 252 || $D['1'] > 126 ){
			$originatingpage=$add_view.'?current_tab='.$current_tab; 
							echo '<script type="text/javascript"> 
							alert(\'Home image  exceeds maximum size limit, upload in size 81 widht 89 height\'); 
							window.location = "'.$originatingpage.'"; 
							</script>'; 
							exit;
			}
			
			$path='../uploads/video_thumb/';
			$photo= $_FILES['file']['name'];
			$token = (rand()%99999999);
			$thumb="$token"."_"."$photo";
			$class->upload_file($path,$thumb);
			$path2='../video/';
			$photo2= $_FILES['file2']['name'];
			$token2 = (rand()%99999999);
			$image="$token2"."_"."$photo2";
			move_uploaded_file($temp2,$path2.$image);
			$field=array(
				'gallery_title'=>$title,
				'gallery_thumb'=>$thumb,
				'gallery_image'=>$image,
			);	
				
		$insert_id=$class->InsertQuery('video',$field);
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
if(isset($_SESSION['username'])){
?>

<?php include('header.php');?>
<div id="main_content">
<div  id="blank_10"></div>
<div id="content">

<?php include('left_menu.php');?>

<div id="right"> <form method="post" enctype="multipart/form-data" action="" >
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr>
          <td align="left" valign="top">Title</td>
          <td align="left" valign="top" colspan="2"><input class="inp-text" name="title" id="title" value="<?php echo $title;?>" type="text" size="30" />
          </td>
        </tr>
         <tr>
          <td align="left" valign="top">Thumb image</td>
          <td align="left" valign="top" colspan="2"><font color="#412410"  size="-2"><i>(Upload  files with these</i> width 252px height 126px &nbsp; )</font><br /><input class="inp-text" name="file" id="file"  type="file" />
          </td>
        </tr>
 <tr>
          <td align="left" valign="top">Big image</td>
          <td align="left" valign="top" colspan="2"><input class="inp-text" name="file2" id="file2"  type="file" />
          </td>
        </tr>
   
        <tr>
          <td align="center" colspan="2"><input class="button" type="submit" alt="SUBMIT" name="Submit" value="SUBMIT" />
            <!--<input type="button" class="button" value="Cancel" onclick="cancelAction()" />--></td>
        </tr>
      </table>
    </form></div>



</div>
<div id="blank_10"></div>



</div>
<?php }
		else{
		$originatingpage='index.php';
								echo '<script type="text/javascript"> 
								alert(\'Session expired, please login again\'); 
								window.location = "'.$originatingpage.'"; 
								</script>'; 
								exit;
		}
?>

<?php include('footer.php');?>