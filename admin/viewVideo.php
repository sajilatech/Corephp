<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/common.php');
$class=new Common();
$sql="SELECT * FROM video";
$array=$class->getResultArray($sql);
$view='viewVideo.php';
if(isset($_REQUEST['mode'])){
	$mode=$_REQUEST['mode'];
	$id=$_GET['id'];
	
	switch($mode){
		case'delete':
			$c="gallery_ID='$id'";
			$r=$class->getRowByID('video','gallery_ID',$id,$condition='');
			$class->_delete_file('../uploads/video_thumb',$r['gallery_thumb']);
			$class->_delete_file('../video',$r['gallery_image']);
			$class->deleteQuery('video',$c);
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
<?php 
if(isset($_SESSION['username'])){
?>
<script language="javascript">
function popitup(url) {
	newwindow=window.open(url,'name','height=390,width=520');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>
<?php include('header.php');?>
<div id="main_content">
<div  id="blank_10"></div>
<div id="content">

<?php include('left_menu.php');?>

<div id="right"> <table width="95%"  class="gradient-style" border="0" cellspacing="0" cellpadding="0">
      <tr>
           <th width="5%">#</th>
            <th width="51%">Title </th>
            <th width="33%">Video<i>(Click to view video)</i> </th>
            <th width="11%">Delete </th>
       </tr>
       <?php 
	   		$count=1;
	   		foreach ($array as $row){?>
        <tr>
           <td><?php echo $count;?></td>
             <td><?php echo $row['gallery_title'];?></td>
            <td><a  onclick="return popitup('../video/<?php echo $row['gallery_image'];?>')"><img src="../uploads/video_thumb/<?php echo $row['gallery_thumb'];?>"  height="75" width="145" border="0" /></a> </td>
            

             
             <td align="center"><a  onclick="return confirmDelete();"href="<?php echo $view;?>?current_tab=<?php echo $current_tab;?>&mode=delete&id=<?php echo $row['gallery_ID'];?>">
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