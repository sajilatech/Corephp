<?php 
 session_start();
	  $current_tab=$_GET['current_tab']; 
	include('../include/include.php'); 
$csv_array=$class->getResultArray('SELECT * FROM csv');
$view='list_csv.php';
$preview='view_csv.php';
if(isset($_REQUEST['mode'])){
	$mode=$_REQUEST['mode'];
	$id=$_GET['id'];
	switch($mode){
		case'delete':
			$c="month='$id'";
			$class->deleteQuery('csv',$c);
			$originatingpage=$view.'?current_tab='.$current_tab; 
								echo '<script type="text/javascript"> 
								alert(\'Successfully deleted\'); 
								window.location = "'.$originatingpage.'"; 
								</script>'; 
								exit;
	}
}
if(isset($_SESSION['username'])){
?>

<?php include('header.php');?>
<div id="main_content">
<div  id="blank_10"></div>
<div id="content">

<?php include('left_menu.php');?>

<div id="right">  <table width="95%"  class="gradient-style" border="0" cellspacing="0" cellpadding="0">
      <tr>
           <th width="5%">#</th>
            <th width="51%">Month </th>
            <th width="11%">View </th>
            <th width="11%">Delete </th>
       </tr>
       <?php 
	   		$count=1;
	   		foreach ($csv_array as $row){?>
        <tr>
           <td><?php echo $count;?></td>
             <td>
			 <?php 
				 $string = $row['month'];
	
			$display_month = preg_replace('/_*/','',$string);

echo $display_month;?></td>
           <td>
						<a href="<?php echo $preview;?>?current_tab=<?php echo $current_tab;?>&id=<?php echo $row['month'];?>">
							<img src="../images/admin/preview.png" border="0" />
						</a>
					</td>

             
             <td align="center"><a  onclick="return confirmDelete();"href="<?php echo $view;?>?current_tab=<?php echo $current_tab;?>&mode=delete&id=<?php echo $row['month'];?>">
             <img src="../images/admin/delete.gif" /></a></td>
       </tr>
       <?php
	   		$count++; 
	   		}
		?>
    </table>
  </div>



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