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
			$sqly="SELECT * from routine WHERE dept_name LIKE '%".$_POST["dep1"]."%'";
			$resulty=mysqli_query($conn,$sqly);
						
			if(mysqli_num_rows($resulty)>0)
				{
					
					$output.='<div class="table-responsive" >
								<table class="table table bordered" style="background:linear-gradient(180deg,blue,red);">
									<tr>
										<th>Day</th>
										<th>Time</th>
										<th>Course Code</th>
										<th>Teacher Name</th>
										<th>Department</th>
									</tr>';
					while($rowy=mysqli_fetch_array($resulty)){
						$output.='
							<tr>
								<td>'.$rowy["day"].'</td>
								<td>'.$rowy["schedule"].'</td>
								<td>'.$rowy["course_code"].'</td>
								<td>'.$rowy["tname"].'</td>
								<td>'.$rowy["dept_name"].'</td>
							</tr>
						';
					}
					echo $output;
				}
				else{
					echo '<br><br>Data Not Found';
				}


	
?>