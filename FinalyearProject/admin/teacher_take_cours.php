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
			$sql="SELECT * FROM course";			
			$result= mysqli_query($conn,$sql);
		?>
		
		<?php
		if(isset($_POST['TakeBtn'])){
			
			$key=$_POST['keyToTake'];
			$key2=$_SESSION['tname'];
			//$sql1="SELECT * FROM course WHERE course_code='$key'";
		
			//$check= mysqli_query($conn,$sql1);
			
			if(mysqli_num_rows($result)>0){
				
		
			   $sql2 = "INSERT INTO `teacher_taken`(`tname`,`course_code`) VALUES  ('$key2','$key')";
  
			
			
			$queryInsert= mysqli_query($conn,$sql2);?>
			
			<div class="alert alert-success">
				<p>Record Inserted</p>
			</div>
			<?php 
				header('Location:teacher_take_cours.php');
			}
			else{
				 ?>
				<div class="alert alert-warning">
						<p>Record does not exist</p>
				</div>
			
			<?php }
			 
		}
		?>
		<table class="table table-bordered text-center">
			<tr>
				<th>Course Code</th>
				<th>Course Title</th>
				
				<th>Select</th>
				<th>Take Course</th>
			</tr>
		<?php
			$sr=1;
			while($row=mysqli_fetch_array($result)){?>
				<tr>
					<form action="" method="post" role="form">
						
						
						<td><?php echo $row['course_code'];?></td>
						<td><?php echo $row['course_title'];?></td>
						
						<td>
							<input type="checkbox" name="keyToTake" value="<?php echo $row['course_code'];?>" required>
						</td>
						<td>
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