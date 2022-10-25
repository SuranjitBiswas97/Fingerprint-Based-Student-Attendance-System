<?php
	
		//Creates new record as per request
		//Connect to database
		$hostname = "localhost";		//example = localhost or 192.168.0.0
		$username = "root";		//example = root
		$password = "";	
		$dbname = "nodemcu_ldr";
		// Create connection
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed !!!");
		} 
		
	
		if(isset($_POST['nn1']) && isset($_POST['nn2']) && isset($_POST['nn3']) &&isset($_POST['nn4']) &&isset($_POST['nn5'])){
			$re1=$_POST['nn1'];
			$re2=$_POST['nn2'];
			$re3=$_POST['nn3'];
			$re4=$_POST['nn4'];
			$re5=$_POST['nn5'];
			
			$sql2 = "SELECT course_code,tname,day,schedule,dept_name FROM `routine` WHERE (course_code='$re1' AND schedule='$re4') and day='$re3'";
				 
				 
				$querycheck= mysqli_query($conn,$sql2);
				
				if(mysqli_num_rows($querycheck)>0)
				{
					echo"Already Exist";
				}
			
			else{
				$sqlu="INSERT INTO routine (`course_code`, `tname`, `day`, `schedule`,`dept_name`) VALUES ('$re1','$re2','$re3','$re4','$re5')" ;
				$resultu=mysqli_query($conn,$sqlu);
				if($resultu){
					echo"<b>Inserted Successfully</b>";
					
					
				}
				else{
					echo"<b>Insertion Failed</b>";
				}
			}
			
		}
		
	
	
	

	
?>