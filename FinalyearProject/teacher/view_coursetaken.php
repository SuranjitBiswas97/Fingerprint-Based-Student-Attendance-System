<?php 

	//include header file
	include ('include/header.php');
	$key2=$_SESSION['tname'];
	
	$sqls="SELECT * FROM teacher_taken WHERE tname='$key2'";
	$results= mysqli_query($conn,$sqls);
	
	
?>
 
<div class="container"style="margin-top:100px;margin-bottom:130px">
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
<?php
	include ('include/footer.php'); 
?>