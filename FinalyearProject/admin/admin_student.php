<?php 

	//include header file
	include ('include/header.php');

?>

<?php

$qu="SELECT dept_name from department";
	$result1=mysqli_query($conn,$qu);
	$dept = $_POST['Department'];
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


<div id="nh" style="background:linear-gradient(180deg,blue,red); margin-bottom:100px;margin-top:100px">

<div class="container" style="padding-top:100px;">
	<div class="row">
				
		<div class="col-md-6">
		
		
		<form action="" method="post">
		 <label for="dept" style="color:white"><b>Department</b></label>
     
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
		
		
			<?php

if (isset($_POST["Department"])) {
   
    $dept = $_POST['Department'];
   
    $query ="SELECT registration_no,Name from student where dept_name='$dept'";
	
	 $result2=mysqli_query($conn,$query);
	
?>

		
		<table class="table table-bordered" id="table">
			<tr>
				<th>Registration No</th>
				<th>Student Name</th>
			</tr>
			<?php 
		
		while($r2=mysqli_fetch_array($result2)){?>
			<tr>
				<td><?php echo $r2['registration_no'];?></td>
				<td><?php echo $r2['Name'];?></td>
			</tr>
		<?php }
	?>
		</table>
		<?php
		
	}
  
  ?> 	
		
		
		
		
		</div>
		
		
		<div class="col-md-6">
			
					<label type="text" name='ban' id='ban'></label>
					
			
			<br/>
			<div id="fol"></div>
			
			<script>
				$(document).ready(function(){
							
					var table =document.getElementById('table'),rIndex;
				
				for(var i=0;i<table.rows.length;i++){
					
					table.rows[i].onclick =function()
					{
						
						rIndex =this.rowIndex;
						document.getElementById("ban").value=this.cells[0].innerHTML;
						

						var txt=document.getElementById("ban").value;
						
						
						if(txt !='')
						{
							$.ajax({
								url:"show_student.php",
								method:"post",
								data:{search:txt},
								dataType:"text",
								success:function(data)
								{
									$('#fol').html(data);
								}
							});
						}
						else{
							$('#fol').html('');
							$.ajax({
								url:"show_student.php",
								method:"post",
								data:{search:txt},
								dataType:"text",
								success:function(data)
								{
									$('#fol').html(data);
								}
							});
						}
					
						
					};
					
				}
						
				});
				
			
			</script>
		
			
		</div>
		
		</div>
	</div>
	


  
</div>



<?php
	include ('include/footer.php'); 
?>
