<?php 

	//include header file
	include ('include/header.php');
	$key2=$_SESSION['registration_no'];
			
	$sqls="SELECT course_code FROM `course taken` WHERE registration_no='$key2'";
	$results= mysqli_query($conn,$sqls);
	
	
?>
  
<div class="container" style="margin-top:100px;margin-bottom:130px">
	<div class="row">
		<div class="col-md-12">
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