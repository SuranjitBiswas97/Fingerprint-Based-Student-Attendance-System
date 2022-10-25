<?php 

	//include header file
	include ('include/header.php');
	include('include/config.php');

?>
<style>
	.size{
			min-height: 0px;
			padding: 60px 40px 40px 40px;
			
		}
</style>
<div class="container-fluid red-background size header-img">
	<div class="row">
		<?php
			$sql="SELECT * FROM course";
			
			
			
			
			
			
			
		
		$result= mysqli_query($connection,$sql);
		?>
		
		<?php
		if(isset($_POST['TakeBtn'])){
			
			$key=$_POST['keyToTake'];
			
			$sql1="SELECT * FROM student WHERE registration_no='$key'";
		
			$check= mysqli_query($connection,$sql1);
			
			if(mysqli_num_rows($check)>0){
				
				$sql2="INSERT INTO course WHERE id= '$key'";
		
			$queryDelete= mysqli_query($connection,$sql2);?>
			
			<div class="alert alert-success">
				<p>Record Deleted</p>
			</div>
			<?php 
				header('Location:delete.php');
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
				<th>Take It</th>
			</tr>
		<?php
			$sr=1;
			while($row=mysqli_fetch_array($result)){?>
				<tr>
					<form action="" method="post" role="form">
						
						
						<td><?php echo $row['course_code'];?></td>
						<td><?php echo $row['course_title'];?></td>
						
						<td>
							<input type="checkbox" name="keyToTake" value="<?php echo $row['registration_no'];?>" required>
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
</div>
<?php 

	//include footer file
	include ('include/footer.php');

?>