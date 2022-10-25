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
.container{
	height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>

	<div id="main" style="min-height: 400px;text-align:center;margin-top:50px;padding-top:50px" >
	
		<div class="container">


		<div class="row">
				
				<div class="col-sm-12">
					<div class="card"> 
						<a href="tc.php">
							<h5 class="card-title">Take courses</h5>
						</a>
					</div>
					<div class="card"> 
						<a href="teacher_attendance.php">
							<h5 class="card-title">Show Attendance</h5>
						</a>
					</div>
					<div class="card"> 
						<a href="view_coursetaken.php">
							<h5 class="card-title">Show Course</h5>
						</a>
					</div>
				</div>	
		
		</div>

	</div>
</div>	

	
<?php
	include ('include/footer.php'); 
?>