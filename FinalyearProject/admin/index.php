<?php 

	//include header file
	include ('include/header.php');

?>
<style>
	
	.card a{text-decoration:none}
	#main{ background-color: red;
  -webkit-animation-name: ma; /* Safari 4.0 - 8.0 */
  -webkit-animation-duration: 12s; /* Safari 4.0 - 8.0 */
  animation-name: ma;
  animation-duration: 12s;
  animation-iteration-count: infinite;}
  
	.card {
	height:50px;
  background-color: black;
  -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
  -webkit-animation-duration: 8s; /* Safari 4.0 - 8.0 */
  animation-name: example;
  animation-duration: 8s;
  animation-iteration-count: infinite;
}
.card h5{color: white};

/* Safari 4.0 - 8.0 */
@-webkit-keyframes example {
  from {background-color: black;}
  to {background-color: blue;}
}

/* Standard syntax */
@keyframes example {
  from {background-color: blue;}
  to {background-color:red;}
}
@keyframes ma{
  from { background: url(../img/sunset-5120x2880-clouds-5k-19547.jpg) no-repeat center center fixed;
	 -webkit-background-size: cover;
  -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    height: auto;
    
    color: white;
    font-weight: 700;}
  to {
  
   background: url(../img/sunset-3840x2160-ocean-beach-sky-clouds-4k-16131.jpg) no-repeat center center fixed;
	 -webkit-background-size: cover;
  -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    height: auto;
    
    color: white;
    font-weight: 700;
  
  
  }
  
}
</style>

	<div id="main" style="min-height: 500px;text-align:center;margin-top:50px;padding-top:50px" >
	
		<div class="container"">
			<div class="row">
				
				<div class="col-md-4">
					<div class="card"> 
						<a href="signupstudent.php">
						
							<h5 class="card-title">ADD STUDENTS</h5>
						
						</a>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="card ">
						<a href="courses.php">
							
								<h5 class="card-title">ADD COURSES</h5>
							
						</a>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="card ">
						<a href="show_courses.php">
							
								<h5 class="card-title">VIEW COURSES</h5>
							
						</a>
					</div>
				</div>
			
			
			
			
		
		</div>


		<div class="row">
				
				<div class="col-md-4">
					<div class="card"> 
						<a href="admin_tc.php">
				
							<h5 class="card-title">TEACHER COURSE TAKEN</h5>
						
						</a>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="card " style="text-align:center">
					
						<a href="dept.php">
							
								<h5 class="card-title">ADD DEPARTMENT</h5>
						
						</a>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="card">
						<a href="show_dept.php">
							
								<h5 class="card-title">VIEW DEPARTMENT</h5>
						
						</a>
					</div>
				</div>
			
			
			
		
		</div>

		<div class="row">
			<div class="col-md-4">
					<div class="card">
						<a href="admin_student.php">
							
							<h5 class="card-title">STUDENT COURSE TAKEN</h5>
							
						</a>
					</div>
				</div>
				
			<div class="col-md-4">
					<div class="card">
						<a href="admin_routine.php">
							
							<h5 class="card-title">ROUTINE</h5>
							
						</a>
					</div>
				</div>	
			<div class="col-md-4">
				<div class="card">
					<a href="attendance.php">
						
						<h5 class="card-title">ATTENDANCE</h5>
						
					</a>
				</div>
			</div>	
		</div>

		
		
	</div>
</div>	

	
<?php
	include ('include/footer.php'); 
?>