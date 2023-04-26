<?php 
class Common{
	public function __construct(){
	require_once 'configuration.php';
		$cnt = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');
		if($cnt){
			$db_found=mysql_select_db($db_database);
		}
	}
	public function authenticate($username,$pass,$table){
		$loginName=$username;
		$password=trim(md5($pass));
		$login_sql="SELECT * FROM $table WHERE admin_username='$loginName' AND admin_password ='$password'"; 
		$query=mysql_query($login_sql);
		$row=mysql_num_rows($query);
			return $row;
	}
	
	public function ExecuteQuery($sql){	//To execute all type of queries
		$this->sql=$sql;
		$this->result  = mysql_query($this->sql) or die (mysql_error()."<br>Please check the following query-<br>".$this->sql);
		return $this->result;
	 }
	 
	 public function redirect($location){
			$this->redirectLocation=$location;
			header('location:'.$this->redirectLocation);
			exit;
	}
	
	public function InsertQuery($tableName,$dataArray){//Function to insert all the data in to the table 
		$this->tableName=$tableName;
		$this->dataArray=$dataArray;
		if(is_array($this->dataArray)){
			$this->query 	    = "INSERT INTO $this->tableName SET ";
			$arrayCount			= sizeof($this->dataArray);
			$count				= 1;
			while(list($key,$val)  = each($this->dataArray)){
				if ($count==$arrayCount)
				$this->query  .=" $key='".$this->cleanUserInput($val)."'";
				else
				$this->query  .="$key='".$this->cleanUserInput($val)."', ";
				$count ++;	
			}//End Of while loop	\
			//print_r($this->query);
			$this->result = $this->ExecuteQuery($this->query);//Calling the execute query
			$id=mysql_insert_id();
			return $id;
		}//end Of if loop
	}//End of insertquery Function..
	
	function UpdateQuery($tableName,$dataArray,$condition=""){//Function to Update a table	
		$this->tableName=$tableName;
		$this->dataArray=$dataArray;
		if(is_array($this->dataArray)){
			$this->query	    = "UPDATE  $this->tableName SET ";
			$arrayCount			= sizeof($this->dataArray);
			$count				= 1;
			while(list($key,$val)  = each($this->dataArray)){				
				if ($count==$arrayCount)
					$this->query .=" $key='".$this->cleanUserInput($val)."'";
				else
					$this->query .="$key='".$this->cleanUserInput($val)."', ";
					$count ++;	
			}//End Of while loop	
			if ($condition!=""){
				$this->query   .= " WHERE  $condition ";
			}
			//print_r($this->query);//end of if 
			$this->result = $this->ExecuteQuery($this->query);//Calling the execute query 
			return $this->result;
		}//end of if
	}//End of updatequery Function...
	
	function deleteQuery($tableName,$condition=""){	 
	//Delete function
	 	$this->tableName=$tableName;
		$this->query = "DELETE FROM $this->tableName ";
		if($condition!=""){

			$this->query  .= " WHERE $condition";
		}
		$this->result = $this->ExecuteQuery($this->query);//Calling the execute query 	
		return $this->result;
	}//End Of deletequery	
	
	function upload_file($path,$name){
	//$ss="<script languate='javascript'>alert($path/$name)
	//print_r($ss);
	
			if ($_FILES["file"]["error"] > 0){
				echo "Return Code: ".$_FILES["file"]["error"]."<br />";
			}
			else{
				 if (file_exists($path."/".$_FILES["file"]["name"])){
					echo $_FILES["file"]["name"]."already exists.";
				 }
				 else{
					  $move= move_uploaded_file($_FILES["file"]["tmp_name"],$path."/".$name);
				   }
			}
	}
	function _delete_file($upload_path,$file_name){
		$my_file = './'.$upload_path."/".$file_name;
		if(is_file($my_file))
		{
			unlink($my_file);
		} 
		return;
	} 
	
	public function cleanUserInput($insertValue){
	//Function for cleaning user inputs
		$this->insertValue=$insertValue;
		if (!get_magic_quotes_gpc()){
			$this->insertValue 	= addslashes($this->insertValue);
		}
		else{
			$this->insertValue 	= stripslashes($this->insertValue);
			$this->insertValue	= addslashes($this->insertValue);
		}
		return 	trim($this->insertValue);
	}
	
	function getRowByID($tableName,$idFieldName,$id,$condition){
		$this->tableName=$tableName;
		$this->query = "SELECT * FROM ".$this->tableName." WHERE ".$idFieldName."='".$id."'";
		if($condition!=""){
			$this->query  .= " AND ".$condition;
		}
		//print_r($this->query);
		$this->result = $this->ExecuteQuery($this->query);//Calling the execute query 
		$this->row = mysql_fetch_assoc($this->result);
		return $this->row;
	}
	
	public function getResultArray($sql){
		//To execute all type of queries
		$this->sql=$sql;
		$this->result  = mysql_query($this->sql) or die (mysql_error()."<br>Please check the following query-<br>".$this->sql);
		$this->resultArray=array();
		while($this->row=mysql_fetch_assoc($this->result)){
			$this->resultArray[]=$this->row;
		}
		//print_r($this->resultArray);
		return $this->resultArray;
	}
	
	function getCount($table,$condi){
		if($condi !=''){
			 	$sql="SELECT * FROM $table WHERE ".$condi;
		}
		else{
			 $sql="SELECT * FROM $table";
		}
		$result =mysql_query($sql);
		$this->row = mysql_num_rows($result);
		//print_r($this->row);
		return $this->row;
	}
	
	function change_imagename($image){
		$token = (rand()%99999999);
		$newname="$token"."_"."$image";
		return $newname;
	
	}
	function datetime_to_int($year,$month,$day,$time_type='',$time_array=array()){
		$datetime_int = 0;
		if($time_type == 'from'){
			$datetime_int=mktime(0, 0, 0, $month, $day, $year);
		}
		elseif($time_type == 'to'){
			$datetime_int=mktime(23, 59, 59, $month, $day, $year);
		}
		else{
			$time_hrs = $time_array[0];
			$time_mins = $time_array[1];
			$time_secs = $time_array[2];
		
			$datetime_int=mktime($time_hrs, $time_mins, $time_secs, $month, $day, $year);
		}
		
		return $datetime_int;
	}
	 function checkUnique($field,$value,$table){
		$sql="SELECT * FROM $table WHERE ".$field."='$value'";
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result); //print_r($num_rows);
			return $num_rows;
	}
}
?>