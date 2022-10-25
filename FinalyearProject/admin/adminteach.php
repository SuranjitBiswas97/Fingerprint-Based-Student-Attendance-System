<?php 

	//include header file
	include ('include/header.php');

?>

<?php

$qu="SELECT dept_name from department";
	$result1=mysqli_query($conn,$qu);
?>

		<?php

if (isset($_POST["Department"])) {
   
    $dept = $_POST['Department'];
   
    $query ="SELECT tname from teacher where dept_name='$dept'";
	
	 $result2=mysqli_query($conn,$query);
	
}
  else{
	  $dept="";
	  $query ="SELECT tname from teacher";
	
     $result2=mysqli_query($conn,$query);
	

  }
  ?> 

<style>
	.size{
			min-height: 0px;
			padding: 60px 40px 40px 40px;
			
		}
	#m{
		
		margin-top: 50px;
	}
	table td:hover{

		color:red;
		
	}
</style>



<div class="container" style="padding-top:100px">
	<div class="row">
				
		<div class="col-md-6">
		
		
		<form action="" method="post">
		 <label for="dept"><b>Department</b></label>
     
		<select name="Department" Style="margin-left:10px;" required>
			<option ><?php echo $dept?></option>
			<?php while($r=mysqli_fetch_array($result1))
			{
			?>
			<option >
					<?php echo $r['dept_name'];?>
			</option>
			<?php
			}
			?>
		</select>
		<br>
		
		
		
		
		 <div class="clearfix">
        
        <button type="submit" name="reg_user" class="signupbtn">Search</button>
      </div>
		</form>
		
		
		<table class="table table-bordered" id="table">
			<tr>
				<th>Teacher Name</th>
			</tr>
			<?php 
		
		while($r2=mysqli_fetch_array($result2)){?>
			<tr>
				<td><?php echo $r2['tname'];?></td>
			</tr>
		<?php }
	?>
		</table>
		
		
		
		<script>
				var table =document.getElementById('table'),rIndex;
				
				for(var i=0;i<table.rows.length;i++){
					
					table.rows[i].onclick =function()
					{
						
						rIndex =this.rowIndex;
						document.getElementById("ban").value=this.cells[0].innerHTML;
						
					};
				}
				
			</script>
		
		
		
		</div>
		
		
		<div class="col-md-6">
			
			<marquee><h1>Course List Are Here</h1></marquee>
		
			
			<?php echo"<input name='ban' id='ban'>"?>
			
			

			
			
			
			
			
			
		</div>
		
		</div>
	</div>
	


  




<?php
	include ('include/footer.php'); 
?>
