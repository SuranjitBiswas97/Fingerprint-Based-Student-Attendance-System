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
	
	
	$output='';
	$sqlu="SELECT course_code FROM teacher_taken WHERE tname LIKE '%".$_POST["search"]."%'";
	$resultu=mysqli_query($conn,$sqlu);
	if(mysqli_num_rows($resultu)>0)
	{
		$output .='<marquee><h5>Course List</h5></marquee>';
		$output.='<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Course Name</th>
						</tr>';
		while($rowu=mysqli_fetch_array($resultu)){
			$output.='
				<tr>
					<td>'.$rowu["course_code"].'</td>
				</tr>
			';
		}
		echo $output;
	}
	else{
		echo '<br><br>Data Not Found';
	}
?>