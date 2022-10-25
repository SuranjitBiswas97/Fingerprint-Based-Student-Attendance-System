<?php 

	//include header file
	include ('include/header.php');

?>



<style>
	.size{
			min-height: 0px;
			padding: 60px 40px 40px 40px;
			
		}
	#m{
		
		margin-top: 50px;
	}
	input{
		border-top-style: hidden;
		border-right-style: hidden;
		border-left-style: hidden;
		border-bottom-style: hidden;
		
	}
</style>



<div class="container" style="padding-top:100px">
	<div class="row">
				
		<div class="col-md-8">
		<?php
			
				$keyr=$_SESSION['registration_no'];
				$sql="SELECT teacher_taken.tname,teacher_taken.course_code FROM teacher INNER JOIN teacher_taken WHERE teacher.tname=teacher_taken.tname and teacher.dept_name=(SELECT dept_name FROM student WHERE registration_no='$keyr')"; 
				$result=mysqli_query($conn,$sql);

				
		?>
		
		<?php
		if(isset($_POST['TakeBtn'])){
			$key1=$_POST['ba'];
			$key=$_POST['ab'];
			
			$key2=$_SESSION['registration_no'];
		
			
			if(mysqli_num_rows($result)>0){
				 $sql2 = "SELECT tname,course_code,tname FROM `course taken` WHERE course_code='$key' AND registration_no='$key2'";
				 
				 
				$querycheck= mysqli_query($conn,$sql2);
				
				if(mysqli_num_rows($querycheck)>0)
				{
					echo"Already Exist";
				}
				else{
			   $sql3 = "INSERT INTO `course taken`(`tname`,`course_code`,`registration_no`) VALUES  ('$key1','$key','$key2')";
  
			
			
				$queryInsert= mysqli_query($conn,$sql3);?>
				
				<div class="alert alert-success">
					<p>Record Inserted</p>
				</div>
			<?php 
				header('Location:student_take.php');
				}
				
				
				}
			else{
				 ?>
				<div class="alert alert-warning">
						<p>Record does not exist</p>
				</div>
			
			<?php }
			 
		}
		?>
		<table class="table table-bordered" id="table">
			<tr>
				<th>Course Code</th>
				<th>Teacher Name</th>
				
				<th>Select</th>
				<th>Take Course</th>
			</tr>
		<?php
			
			while($row=mysqli_fetch_array($result)){?>
				<tr>
					<form action="" method="post" role="form">
						
						
						<td><input type="text" name="ab" value="<?php echo $row['course_code'];?>" readonly></td>
						
						<td><input type="text" name="ba" value="<?php echo $row['tname'];?>" readonly></td>
						
					
						<td style="text-align: center">
							<input type="checkbox" name="keyToTake"  required>
						</td>
						<td style="text-align: center">
							<input type="submit" name="TakeBtn" class="btn btn-info" value="Take">
						</td>
					</form>
				</tr>
			
			<?php }
		?>
		</table>
						
		
		

</div>
				
				
								
				
<div class="col-md-4">
					
	<?php
	
	
				$keyt=$_SESSION['registration_no'];
			
				$sql5="SELECT course_code,tname FROM `course taken` WHERE registration_no='$keyt'";
	

	$re5= mysqli_query($conn,$sql5);
	?>
		

	<h5 style="color:orange;"><?php echo $_SESSION['registration_no'];?> , Here Is Your Courses </h5>
		<table class="table table-bordered text-center">
			<tr>
				<th>Course Code</th>
				<th>Teacher Name</th>
			</tr>
		<?php 
			
			while($r5=mysqli_fetch_array($re5)){?>
				<tr>		
						
						<td><?php echo $r5['course_code'];?></td>
						<td><?php echo $r5['tname'];?></td>
						
				</tr>
			
			<?php }
		?>

		</table>
								
				</div>
		</div>
	</div>



<?php
	include ('include/footer.php'); 
?>