<?php 

	//include header file
	include ('include/header.php');
	
	$keyr=$_SESSION['tname'];
			


	$qu="SELECT `course_code`  FROM `teacher_taken` WHERE `tname`='$keyr'";
	$result1=mysqli_query($conn,$qu);
	
	$cour = $_POST['Course'];



?>
<style>

#fh{
	
	 background: url(../img/xiaomi-mi-mix-3-2560x1440-abstract-colorful-20773.jpg) no-repeat center center fixed;
	 -webkit-background-size: cover;
  -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    min-height: 500px;
    
    font-weight: 700;
	
}
</style>
<div id="fh">

<div class="container" style="padding-top:100px;>
	<marquee><h5><?php echo $keyr;?></h5></marquee>

		<div class="row" style="margin-bottom:100px" >
						
				<div class="col-md-12" style="padding-left:80px">
				
					<form action="" method="post">
					 <label for="dept"><b style="color: white">Course</b></label>
				
					<select id="c" name="Course" Style="margin-left:10px;" required>
						 <option ><?php echo $cour?></option>
						<?php while($r=mysqli_fetch_array($result1))
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
					 <div class="clearfix">
        
        <button type="submit" name="reg_user" class="signupbtn">Search</button>
      </div>
		</form>
			
		
		<?php

if (isset($_POST["Course"])) {
   
    $cour = $_POST['Course'];
   
    $query ="SELECT * from attendance where course_code='$cour'";
	
	 $result2=mysqli_query($conn,$query);
	
?>

		
		<table class="table table-bordered" id="table">
			<tr>
				<th>Course Code</th>
				<th>Registration No</th>
				<th>Date</th>
				<th>Day</th>
				<th>Time</th>
				<th>Status</th>
			</tr>
			<?php 
		
		while($r2=mysqli_fetch_array($result2)){?>
			<tr>
				<td><?php echo $r2['course_code'];?></td>
				<td><?php echo $r2['registration_no'];?></td>
				<td><?php echo $r2['Date'];?></td>
				<td><?php echo $r2['day'];?></td>
				<td><?php echo $r2['time'];?></td>
				<td><?php echo $r2['status'];?></td>
			</tr>
		<?php }
	?>
		</table>
		<?php
		
	}
  
  ?> 			
				</div>
				
			<div class="col-md-12 " id="match">
			
			</div>
		</div>
	
	</div>
</div>
<?php
	include ('include/footer.php'); 
?>