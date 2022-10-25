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
	
	
	
	$sqlu="SELECT * FROM `course` WHERE dept_name LIKE '%".$_POST["search"]."%'";
	$resultu=mysqli_query($conn,$sqlu);
	
	if(mysqli_num_rows($resultu)>0)
	{
		
		?>
		 <label for="Course"><b>Course</b></label>
				 
					<select id="c" name="Course" Style="margin-left:10px;" required>
						<option value="" selected disabled>
							Select Course
						</option>
						<?php while($r=mysqli_fetch_array($resultu))
						{
						?>
						<option >
								<?php echo $r['course_code'];?>
						</option>
						<?php
						}
						?>
					</select>
					<br>
					<br>
		
		<?php
		
		
	}
	else{
		echo '<br><br><b style="color:white">Data Not Found</b>';
	}
?>