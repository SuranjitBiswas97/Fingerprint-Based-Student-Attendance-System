<!DOCTYPE html>
<html>
	<head>
		
	</head>
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
	?>
	<body >
		
		
		
		
		<input type="text" name="finger_id" value="<?php $finger = mysqli_query($conn, "SELECT  finger_id FROM nodemcu_ldr_table ORDER BY NO DESC;");   
			$row = mysqli_fetch_array($finger);
			echo $row["finger_id"]; ?>" >
		
		
		
		
		
		
	</body>
</html>