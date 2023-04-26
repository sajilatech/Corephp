<?php 
session_start();
	$current_tab=$_GET['current_tab']; 
	include('../include/include.php'); 
	if(isset($_POST['Submit'])){
	$month=$_POST['month'];
	$year=$_POST['year'];
		$fields=array(
		'month'=>$month."_".$year
	);
	$class->InsertQuery('csv',$fields);
	$condi=''; 
	$csv_condi="month='".$month."_".$year."'";
	$count=$class->getCount('newsletter',$condi);
	$fp = fopen("../csv/".$month."_".$year.".csv", "w");
	for ($c=0; $c < 1; $c++){
	$newsletter_array=$class->getResultArray('SELECT * FROM newsletter WHERE '.$csv_condi);
	foreach ($newsletter_array as $line) { 
	// fputcsv($fp, split(',', $line));
	 fputcsv($fp, $line);
	}
	
	} 
	fclose($fp);

	}
	$month='';
//CSV File Written Successfully!
?>
<?php 

if(isset($_SESSION['username'])){
include('header.php');?>
<div id="main_content">
<div  id="blank_10"></div>
<div id="content">

<?php include('left_menu.php');?>

<div id="right"> <form action="" method="post">
 <table width="99%" border="0" cellspacing="1" cellpadding="3" align="right">
 <tr>
 <td align="left" valign="top"> Select current year</td>
                <td align="left" valign="top" colspan="2"><select name="year">
                <?php
				$curr_year=date('o',time());
				?>
                <option value="<?php echo $curr_year;?>"><?php echo $curr_year;?></option>
                <?php 
					
					$i=1;
					while($i<=$curr_year){
						$increase_year=$curr_year+$i;
					?>
                <option value="<?php echo $increase_year;?>"><?php echo $increase_year;?></option>
                <?php
					$i++;
					}
					?>
                </select>
                </td>
                </tr>
         <tr>
                <td align="left" valign="top"> Current month </td>
                <td align="left" valign="top" colspan="2">
                <select name="month">
               <option value = "January">January</option>
<option value = "February">February</option>
<option value = "March">March</option>
<option value = "April">April</option>
<option value = "May">May</option>
<option value = "June">June</option>
<option value = "July">July</option>
<option value = "August">August</option>
<option value = "September">September</option>
<option value = "October">October</option>
<option value = "November">November</option>
<option value = "December">December</option> 
                </select>
                												  </td>
            </tr>
          
            <tr>
    <td align="centre"><input class="button" type="submit" alt="SUBMIT" name="Submit" value="SUBMIT" />
<input type="button" class="button" value="Cancel" onclick="cancelAction()" /></td>
    </tr>
            </table>
            </form>
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