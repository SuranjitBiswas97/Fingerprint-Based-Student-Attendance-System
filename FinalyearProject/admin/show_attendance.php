
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
	$sqlu="SELECT attendance.course_code,course.course_title,attendance.registration_no,attendance.Date,attendance.day,attendance.time,attendance.status FROM attendance  INNER JOIN course  where course.course_code = attendance.course_code AND  course.course_code LIKE '%".$_POST["khuj"]."%'";
	$resultu=mysqli_query($conn,$sqlu);
	if(mysqli_num_rows($resultu)>0)
	{
		
		$output.='<div class="table-responsive">
					<table class="table table-bordered" id="tab" style="background:linear-gradient(60deg,blue,red);color: white">
						<tr>
							<th>Course Code</th>
							<th>Course Title</th>
							<th>Registration No</th>
							<th>Date</th>
							<th>Day</th>
							<th>Time</th>
							<th>Status</th>
						</tr>';
		while($rowu=mysqli_fetch_array($resultu)){
			$output.='
				<tr>
					<td>'.$rowu["course_code"].'</td>
					<td>'.$rowu["course_title"].'</td>
					<td>'.$rowu["registration_no"].'</td>
					<td>'.$rowu["Date"].'</td>
					<td>'.$rowu["day"].'</td>
					<td>'.$rowu["time"].'</td>
					<td>'.$rowu["status"].'</td>
					
				</tr>
			';
		}
		echo $output;
	}
	else{
		echo '<br><br>Data Not Found';
	}
?>