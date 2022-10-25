<?php 

	//include header file
	include ('include/header.php');

?>
<?php

$qu="SELECT dept_name from department";
	$result1=mysqli_query($conn,$qu);
	$dept = $_POST['Department'];
	
	
	$quday="SELECT * from course";
	$rday=mysqli_query($conn,$quday);


	
	
	
?>
<style>
	.size{
			min-height: 0px;
			padding: 60px 40px 40px 40px;
			
		}
	#m{
		
		margin-top: 50px;
	}
	
	tr:hover{
		background:limegreen;
	}
      body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */


/* Set a style for all buttons */
button{
	width: 30%;
	background:#008CBA;
	color:white;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* signup buttons and add an equal width */

/* Add padding to container elements */
.container {
  padding: 16px;
}



/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}
.size{
    min-height: 0px;
    padding: 60px 0 60px 0;

}

h1{
    color: white;
}
h3{
    color: #e74c3c;
    text-align: center;
}
.red-bar{
    width: 25%;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}
#fm{
	display: inline-block;
}
#match{
	display: inline-block;
}
	
</style>


	
					

	<div class="container" style="padding-top:100px;margin-bottom:100px;background:linear-gradient(45deg,limegreen,white);">
	<marquee><h5>Attendance</h5></marquee>

		<div class="row" style="margin-bottom:100px" >
						
				<div id="fm" class="col-md-6" style="padding-left:80px">
				
				
					 <label for="dept"><b>Department</b></label>
				 
					<select id="d" name="Department" Style="margin-left:10px;" required>
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
					<br>
				
				</div>
				
			<div class="col-md-6 " id="match">
			
			</div>
			<div class="col-md-12 " id="dekhao">
			
			</div>
		</div>


			
	</div>

<script>
      $(document).ready(function() {
       $('#d').change(function(){
						
					var da=$(this).val();	
					
					$.ajax({
						url:"show_courselist.php",
						method:"POST",
						dataType:"text",
						data:{search:da},
						success:function(data){
							$('#match').html(data);
							
							
							
							
							
							if (true){
						
								 $('#c').change(function(){
						
					var ca=$(this).val();	
					
					$.ajax({
						url:"show_attendance.php",
						method:"POST",
						dataType:"text",
						data:{khuj:ca},
						success:function(data){
							$('#dekhao').html(data);
						}
					});
					});			
						
						
						
					}
							
							
							
							
							
						}
					});
					
					
					
					
					
					
					
					
					
					
					
					
					});
					
					

					
					
      });
    </script>

<?php
	include ('include/footer.php'); 
?>