
	<?php
//Creates new record as per request
    //Connect to database
    $servername = "localhost";		//example = localhost or 192.168.0.0
    $username = "root";		//example = root
    $password = "";	
    $dbname = "nodemcu_ldr";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
   if (!$conn) {
			die("Connection failed !!!");
		} 

    //Get current date and time
    	date_default_timezone_set('Asia/Dhaka');
		$g = date("Y-m-d");
		$h = date("H:i");
		$s=date('l',strtotime($g));
		echo $s;
		
		echo $g;
		echo"<br/>";
	
     if(!empty($_POST['ldrvalue']))
    {
		$ldrvalue = $_POST['ldrvalue'];
		
			
		$sqlhh1 = "SELECT `registration_no` FROM student WHERE fingerid= '$ldrvalue'"; 
		$resulthh1     =   mysqli_query($conn,$sqlhh1);
		
		
			
		if (mysqli_num_rows($resulthh1)>0) {
			
			while($rowhh1=mysqli_fetch_array($resulthh1)){
				$registra=$rowhh1["registration_no"];
				
			}
			
				$sqlhh2 = "SELECT  `course_code` FROM `course taken` WHERE registration_no=(SELECT `registration_no` FROM student WHERE fingerid= '$ldrvalue')"; 
				$resulthh2     =   mysqli_query($conn,$sqlhh2);	
				
									 
				if (mysqli_num_rows($resulthh2)>0) {
						$sql = "SELECT `course_code`,`schedule` FROM routine WHERE  course_code IN (SELECT  `course_code` FROM `course taken` WHERE registration_no=(SELECT `registration_no` FROM student WHERE fingerid= '$ldrvalue')) AND day ='$s'"; 
						
						$result     =   mysqli_query($conn,$sql);
						
						if (mysqli_num_rows($result)>0) {
					  
							while($row=mysqli_fetch_array($result)){
									 
									 echo $row["course_code"];
									 echo "<br>";
									 $dat =$row["schedule"];
									 echo "<br>";
									
									list($m, $d) = preg_split('[-]', $dat);
									echo "<br>From: $m <br> To: $d<br />\n";
									
									
									$now = new Datetime($h);
									
									 echo "<br><br><br> this is: ";
									
									echo "<br>";
									
									$begintime = new DateTime($m);
									$endtime = new DateTime($d);
									
									if($now>= $begintime && $now <= $endtime){
										// between times
										$string = $now->format('H:i');
										$in=$row["course_code"];
										echo"<br> Your Result Is : ";
										echo $in." ".$registra." ".$s." ";
										
										
										$sqlu="SELECT * FROM `attendance` WHERE (registration_no='$registra' AND course_code='$in')and Date='$g'";
										
										$resultu=mysqli_query($conn,$sqlu);
										
										if(mysqli_num_rows($resultu)>0)
										{
											echo "Already Exist";
										}
										else{
										
										
										$sqllast = "INSERT INTO `attendance`(`course_code`, `registration_no`, `day`, `time`, `status`, `Date`) VALUES ('$in','$registra','$s','$string','present','$g')"; 
						
										$resultlast =   mysqli_query($conn,$sqllast);
										
								
										echo "<br>";
										}
										
									} else {
										// not between times
										echo "no";
									}
								
							}
		
		

						}
						else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}
		
				}
				else {
					echo "Error: " . $sqlhh2 . "<br>" . $conn->error;
				}
				
		}
		
	else {
		    
			
		//$ldrvalue = $_POST['ldrvalue'];
	    $sqlds = "INSERT INTO nodemcu_ldr_table (finger_id, Date, Time) VALUES ('".$ldrvalue."', '".$g."', '".$h."')"; //nodemcu_ldr_table = Youre_table_name
		$resultds =   mysqli_query($conn,$sqlds);			  
			
	}
	
	}


	$conn->close();
?>