<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/common.php');
$class=new Common();
$sql="SELECT * FROM newsletters";
$array=$class->getResultArray($sql);
$view='viewNewsletter.php';
if(isset($_REQUEST['mode'])){
	$mode=$_REQUEST['mode'];
	$id=$_GET['id'];
	
	switch($mode){
		case'delete':
			$c="id='$id'";
			$r=$class->getRowByID('newsletters','id',$id,$condition='');
			$class->_delete_file('../uploads/newsletter/'.$r['title'].'/',$r['zip']);
			rmdir('../uploads/newsletter/'.$r['title']);
			$class->deleteQuery('newsletters',$c);
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

<?php include('header.php');?>
<div id="main_content">
<div  id="blank_10"></div>
<div id="content">

<?php include('left_menu.php');?>

<div id="right">  <table width="95%"  class="gradient-style" border="0" cellspacing="0" cellpadding="0">
      <tr>
           <th>#</th>
            <th>Title </th>
             <th>Delete </th>
       </tr>
       <?php 
	   		$count=1;
	   		foreach ($array as $row){?>
        <tr>
           <td><?php echo $count;?></td>
             <td><?php echo $row['title'];?></td>
            
  
             <td><a  onclick="confirmDelete();"href="<?php echo $view;?>?current_tab=<?php echo $current_tab;?>&mode=delete&id=<?php echo $row['id'];?>">
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