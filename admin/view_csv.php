<?php 
session_start();
	$current_tab=$_GET['current_tab']; 
	$id=$_GET['id']; 
if(isset($_SESSION['username'])){
?>

<?php include('header.php');?>
<div id="main_content">
<div  id="blank_10"></div>
<div id="content">

<?php include('left_menu.php');?>

<div id="right">  <table width="50%"  class="gradient-style" border="0" cellspacing="0" cellpadding="0">
     <tr><td><?php
$row = 1;
if (($handle = fopen("../csv/".$id.".csv", "r")) !== FALSE) {
?>
<table width="337" border='0' cellpadding="4" cellspacing="1">
<tr>
	<td align="center" colspan="2"><?php 
				 $string = $id;
	
			$display_month = preg_replace('/_*/','',$string);

echo $display_month;?>
<?php
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);              
        ?>
        <tr <?php if($row==1){echo "style='font-weight:bold; background-color:#CCCCCC'";} else {echo "style='background-color:#DDDDDD'";} ?> style="background-color:#DDDDDD">
        <?php
        //for ($c=1; $c < $num; $c++) {           
            ?>
            <td width="46"><?php echo $data[1]; ?></td>
            <td width="46"><?php echo ucfirst($data[2]); ?></td>
          
            <?php           
       // }      
        ?>
        </tr>
        <?php
         $row++;
    }
    fclose($handle);
    ?>
</table>
    <?php
}
?></td></tr>
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