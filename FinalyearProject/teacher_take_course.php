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
</style>



<div class="container" style="padding-top:100px">
	<div class="row">
				
		<div class="col-md-8">
		<?php
			$keyr=$_SESSION['tname'];
			
				$sql="SELECT dept_name FROM teacher WHERE tname='$keyr'";
			$resultt= mysqli_query($conn,$sql);
			
		?>
		<form action="" method="POST" role="form">
				
				<label for="dept"><b>Department</b></label>
     
					<select name="Department" Style="margin-left:10px;" required>
						
						<?php while($rowt=mysqli_fetch_array($resultt))
						{
						?>
						<option >
								<?php echo $rowt['dept_name'];?>
						</option>
						<?php
						}
						?>
					</select>
				
		<br>
		<br>
	
		
		
		 <input type="submit" name="search" value="Filter"><br><br>
		</form>
		
		
		
		
		
		
		
		
		
		
		
		<?php
		
			if(isset($_POST['search']))
			{
		
				$dep=$_POST['Department'];
				$sqlhal="SELECT course_code,course_title FROM course WHERE dept_name='$dep'";
				$resultd=mysqli_query($conn,$sqlhal);
			
			if(isset($_POST['TakeBtn'])){
			
			$key=$_POST['keyToTake'];
			$key2=$_SESSION['tname'];
			
			
			if(mysqli_num_rows($resultd)>0){
				
		
			   $sql2 = "INSERT INTO `teacher_taken`(`tname`,`course_code`) VALUES  ('$key2','$key')";
  
			
			
			$queryInsert= mysqli_query($conn,$sql2);?>
			
			<div class="alert alert-success">
				<p>Record Inserted</p>
			</div>
			<?php 
				header('Location:teacher_take_course.php');
			}
			else{
				 ?>
				<div class="alert alert-warning">
						<p>Record does not exist</p>
				</div>
			
			<?php }
			 
		
					
		?>
		<form action="" method="POST" role="form">
		<table class="table table-bordered text-center">
			<tr>
				<th>Course Code</th>
				<th>Course Title</th>
				
				<th>Select</th>
				<th>Take Course</th>
			</tr>
		<?php	
			    
		while($r=mysqli_fetch_array($resultd)){
			?>
				<tr>			
						<td><?php echo $r['course_code'];?></td>
						<td><?php echo $r['course_title'];?></td>
						
						<td>
							<input type="checkbox" name="keyToTake" value="<?php echo $r['course_code'];?>" required>
						</td>
						<td>
							<input type="submit" name="TakeBtn" class="btn btn-info" value="Take">
						</td>
					
				</tr>
			
		<?php }
		 
		?>
		</table>
		
		</form>
			
		<?php
		
		
		
		
		
		
		
		
			}
		
		
		
			}
		?>	
		
			
			
		
		
			
			
			
			
			
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
</div>
				
				
				
				
				
				
<div class="col-md-4">
					
	<?php
	$sqls="SELECT * FROM teacher_taken";
	$results= mysqli_query($conn,$sqls);
	?>
		

	<h5 style="color:orange;"><?php echo $_SESSION['tname'];?> Sir, Here Is Your Courses </h5>
	<table class="table table-bordered text-center">
		<tr>
			<th>Course Code</th>
			
		</tr>
	<?php
		
		while($rowa=mysqli_fetch_array($results)){?>
			<tr>
				
					

				
					
					<td><?php echo $rowa['course_code'];?></td>
					

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