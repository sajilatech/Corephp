<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/common.php');
$class=new Common();
$sql="SELECT * FROM gallery";
$array=$class->getResultArray($sql);
$view='viewGallery.php';
$edit='editGallery.php';
if(isset($_REQUEST['mode'])){
	$mode=$_REQUEST['mode'];
	$id=$_GET['id'];
	
	switch($mode){
		case'delete':
			$c="gallery_ID='$id'";
			$r=$class->getRowByID('gallery','gallery_ID',$id,$condition='');
			$class->_delete_file('../uploads/gallery_thumb',$r['gallery_thumb']);
			$class->_delete_file('../uploads/gallery_image',$r['gallery_image']);
			$class->deleteQuery('gallery',$c);
			$originatingpage=$view.'?current_tab='.$current_tab; 
									echo '<script type="text/javascript"> 
									alert(\'Successfully deleted\'); 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit;
		break;
	}
}
?>
<script language="javascript">
function popitup(url) {
	newwindow=window.open(url,'name','height=390,width=520');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>
<?php 
if(isset($_SESSION['username'])){
?>

<?php include('header.php');?>
<div id="main_content">
<div id="content">

<?php include('left_menu.php');?>

<div id="right"><table width="95%"  class="gradient-style" border="0" cellspacing="0" cellpadding="0">
      <tr>
           <th>#</th>
            <th>Title </th>
            <th>Image </th>
             <th>Delete </th>
       </tr>
       <?php 
	   		$count=1;
	   		foreach ($array as $row){?>
        <tr>
           <td><?php echo $count;?></td>
             <td><?php echo $row['gallery_title'];?></td>
            <td><a href="popupex.html" onclick="return popitup('../uploads/gallery_image/<?php echo $row['gallery_image'];?>')"
	><img src="../uploads/gallery_thumb/<?php echo $row['gallery_thumb'];?>"  height="75" width="145" border="0" /></a> </td>
            
  
             <td><a  onclick="confirmDelete();"href="<?php echo $view;?>?current_tab=<?php echo $current_tab;?>&mode=delete&id=<?php echo $row['gallery_ID'];?>">
             <img src="../images/admin/delete.gif" /></a></td>
          
            
       </tr>
       <?php
	   		$count++; 
	   		}
		?>
    </table></div>



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