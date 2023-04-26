<?php 
session_start();
$current_tab=$_GET['current_tab'];
$id=$_GET['id'];
include('../include/common.php');
include('../include/formvalidator.php');
$class= new Common();
$validator = new FormValidator();
$row=$class->getRowByID('gallery','gallery_ID',$id,$condition='');
$view='viewGallery.php';
$edit='editGallery.php';
  if(isset($_POST['Submit'])){
	  $validator->addValidation("title","req","Enter  title");
		$validator->addValidation("description","req","Enter description");
		$id=$_POST['pri_key'];
  		$name=$_FILES['file']['name'];
		$image=$_FILES['file2']['name'];
		$title=$_POST['title'];
		$desc=$_POST['description'];
		$path='../uploads/gallery_thumb';
		$path2='../uploads/gallery_image';
	  	if($validator->ValidateForm()){
			$add_view='editGallery.php';
				$temp=$_FILES['file']['tmp_name'];
				$temp2=$_FILES['file2']['tmp_name'];
				$D = @getimagesize($temp);
				if($D['0'] > 72 || $D['1'] > 72 ){
				$originatingpage=$add_view.'?current_tab='.$current_tab; 
								echo '<script type="text/javascript"> 
								alert(\'Home image  exceeds maximum size limit, upload in size 81 widht 89 height\'); 
								window.location = "'.$originatingpage.'"; 
								</script>'; 
								exit;
			}
			$D2 = @getimagesize($temp2);
				if($D2['0'] > 520 || $D2['1'] > 390 ){
				$originatingpage=$add_view.'?current_tab='.$current_tab; 
								echo '<script type="text/javascript"> 
								alert(\'Home image  exceeds maximum size limit, upload in size 81 widht 89 height\'); 
								window.location = "'.$originatingpage.'"; 
								</script>'; 
								exit;
			}
			if(!$_FILES["file"]["name"]){
					if($row['gallery_thumb']==''){
						$originatingpage=$edit.'?current_tab='.$current_tab.'&id='.$id; 
									echo '<script type="text/javascript"> 
									alert(\'Select a image to upload\'); 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit;
						
					}
					else{
							$name=$row['gallery_thumb'];
							$old_name='';
					}
		}
		else{
			$class->_delete_file($path,$row['gallery_thumb']);
			$photo= $_FILES['file']['name'];
			$token = (rand()%99999999);
			$name="$token"."_"."$photo";
			move_uploaded_file($temp,$path.'/'.$name);				
		}
		if(!$_FILES["file2"]["name"]){
					if($row['gallery_image']==''){
						$originatingpage=$edit.'?current_tab='.$current_tab.'&id='.$id; 
									echo '<script type="text/javascript"> 
									alert(\'Select a image to upload\'); 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit;
						
					}
					else{
							$name2=$row['gallery_image'];
							$old_name='';
					}
		}
		else{
			$class->_delete_file($path2,$row['gallery_image']);
			$photo2= $_FILES['file2']['name'];
			$temp2= $_FILES['file2']['tmp_name'];
			$token2 = (rand()%99999999);
					$name2="$token2"."_"."$photo2";
	
					move_uploaded_file($temp2,$path2.'/'.$name2);			
		}	
			
			$field=array(
					'gallery_title'=>$title,
					'gallery_thumb'=>$name,
					'gallery_image'=>$name2,
					'gallery_desc'=>$desc
				
			);	
			$condi="gallery_ID='$id'";
			$class->UpdateQuery('gallery',$field,$condi); 
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
	else{
		$title=$row['gallery_title'];
		$image=$row['gallery_thumb'];
		$image2=$row['gallery_image'];
		$desc=$row['gallery_desc'];
		//$image3=$row['gallery_image3'];
}
 include('header.php'); 
?>
<?php if(isset($_SESSION['username'])){?>
<div id="content">
	<div id="breadCrumb"></div>
	<h2 id="pageName"><strong>EDIT PHOTO </strong></h2>
	<div class="feature"></div>
	<div class="story" style="width:90%; margin:1px auto;">
	<form method="post" enctype="multipart/form-data" >
        <table width="99%" border="0" cellspacing="1" cellpadding="3">
            <tr>
          <td align="left" valign="top">Title</td>
          <td align="left" valign="top" colspan="2"><input class="inp-text" name="title" id="title" value="<?php echo $title;?>" type="text" size="30" />
          </td>
        </tr>
         <tr>
          <td align="left" valign="top">Thumb image</td>
          <td align="left" valign="top" colspan="2"><input class="inp-text" name="file" id="file"  type="file" /><img src="../uploads/gallery_thumb/<?php echo $image;?>"  height="50" width="50"/>
          </td>
        </tr>
 <tr>
          <td align="left" valign="top">Big image</td>
          <td align="left" valign="top" colspan="2"><input class="inp-text" name="file2" id="file2"  type="file" /><img src="../uploads/gallery_image/<?php echo $image2;?>"  height="50" width="50"/>
          </td>
        </tr>

        <tr>
          <td align="left" valign="top">News desc</td>
          <td align="left" valign="top" colspan="2"><textarea name="description" id="description"  size="30" />
            <?php echo $desc;?>
            </textarea>
          </td>
    </tr>
            
    <tr>
    <td align="centre">
        <input class="button" type="submit" alt="SUBMIT" name="Submit" value="SUBMIT" />
        <input  type="hidden"  name="pri_key" value="<?php echo $row['gallery_ID'];?>" />
        <input type="button" class="button" value="Cancel" onclick="cancelAction()" />
</td>
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