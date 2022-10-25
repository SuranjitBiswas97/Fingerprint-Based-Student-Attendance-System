
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
	$sqlu="SELECT dept_name,teacher_taken.tname,teacher_taken.course_code FROM teacher INNER JOIN teacher_taken WHERE teacher.tname=teacher_taken.tname and teacher.dept_name LIKE '%".$_POST["search"]."%'";
	$resultu=mysqli_query($conn,$sqlu);
	if(mysqli_num_rows($resultu)>0)
	{
		
		$output.='<div class="table-responsive">
					<table class="table table-bordered" id="tab" style="background:teal">
						<tr>
							<th>Course Code</th>
							<th>Teacher Name</th>
						</tr>';
		while($rowu=mysqli_fetch_array($resultu)){
			$output.='
				<tr>
					<td>'.$rowu["course_code"].'</td>
					<td>'.$rowu["tname"].'</td>
					
				</tr>
			';
		}
		echo $output;
	}
	else{
		echo '<br><br>Data Not Found';
	}
?>