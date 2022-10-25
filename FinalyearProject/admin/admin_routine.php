<?php 

	//include header file
	include ('include/header.php');

?>

<?php

$qu="SELECT dept_name from department";
	$result1=mysqli_query($conn,$qu);

	$dept = $_POST['Department'];
	
	$quday="SELECT * from day";
	$rday=mysqli_query($conn,$quday);


	$qutime="SELECT * from time1";
	$rtime=mysqli_query($conn,$qutime);
	
	
	
?>

	
<style>
	.size{
			min-height: 0px;
			padding: 60px 40px 40px 40px;
			
		}
	#m{
		
		margin-top: 50px;
	}
	td,th{

		width:50%;
		
	}
	tr:hover{
		background:limegreen;
	}
      body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */

select{
	width: 50%;
	
}
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


	#sub{
	height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
	

	
</style>



<div class="container" style="padding-top:80px;background:linear-gradient(60deg,blue,red);color:white">
	<div class="row" style="margin-bottom:100px" >
				
		<div class="col-md-6" style="padding-left:80px">
		
		
		 <label for="dept"><b>Department</b></label>
     
		<select id="d" name="Department" Style="margin-left:10px;" required>
			<option ><?php	 echo $dept?></option>
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
		
		
		
		<div id="m"></div>
		
		
		</div>
		
		
		<div class="col-md-6">
			
				
			<div class="side"  id="fid" style="display:none;">
			
				
					<label for="id"><b>Course Code </b></label>
					<label for="nm" style="float:right"><b>Teacher Name</b></label>
					<br>
					<input id="n1"  name="n1" type="text"  required style="width: 35%">
					<input id="n2" name="n2" type="text"   required style="width: 35%;float: right">
					<br>
					<div id="left" style="float:left;" >
		
					 <label for="day"><b>Day</b></label>
		 
						<select id="n3"  name="n3" required style="width: 100%">
							<option ></option>
							<?php while($rowday=mysqli_fetch_array($rday))
							{
							?>
							<option >
									<?php echo $rowday['day'];?>
							</option>
							<?php
							}
							?>
						</select>
					</div>
		
						<div id="left" style="float:right; >
										<label for="time"><b>Time</b></label>
							 
											<select id="n4" name="n4"  required style="width: 100%" >
												<option ></option>
												<?php while($rowtime=mysqli_fetch_array($rtime))
												{
												?>
												<option >
														<?php echo $rowtime['schedule'];?>
												</option>

												<?php
												}
												?>
											</select>
						</div>
									<br><br><br>
					<button type="submit" id="sub" name="submit">Make Routine</button>
					<h5 id="result" style="color:white;"></h5>
				
			
		</div>
 
						
						
			
			<br/>
			<div id="fol" style="background:transparent"></div>
			
			<script>
				$(document).ready(function(){
					$('#d').change(function(){
						
							
							$("#fid").css("display","block");
						
						
					var dat=$(this).val();	
					
					$.ajax({
						url:"show_teacher_taken.php",
						method:"POST",
						dataType:"text",
						data:{search:dat},
						success:function(data){
							$('#m').html(data);
							
							
						
								if(true){
							$("#sub").click(function(){
								
								var n1=$('#n1').val();
								var n2=$('#n2').val();
								var n3=$('#n3').val();
								var n4=$('#n4').val();
								var n5=$('#d').val();
								if(n1!='' && n2!='' && n3!='' && n4!='' && n5!=''){
									
									$.ajax({
										url: 'insert_routine.php',
										type:"POST",
										
										data:{nn1:n1,nn2:n2,nn3:n3,nn4:n4,nn5:n5},
										
										success:function(data){
											$('#result').html(data);
										}
										
									});
									
								}
								
							});
						}


						
							
							if(true){
						1
						setInterval(function(){
							refresh();
						},500);
						
						function refresh(){
							var dep=$('#d').val();
					
							if(dep!=''){
											
								$.ajax({
								url:"show_routine.php",
								method:"POST",
								dataType:"text",
								data:{dep1:dep},
								success:function(data){
									$('#fol').html(data);
									
									}
								});
						
							}
						}
						
						
						var table =document.getElementById('tab'),rIndex;
				
				for(var i=0;i<table.rows.length;i++){
					
					table.rows[i].onclick =function()
					{
						
						rIndex =this.rowIndex;
						document.getElementById("n1").value=this.cells[0].innerHTML;
						document.getElementById("n2").value=this.cells[1].innerHTML;
					
					};
					
				}
							
					}
									
						}
					});
					
				});
					
			});
				
			
			</script>
		
			
		</div>
		
		</div>
	</div>
	


  




<?php
	include ('include/footer.php'); 
?>
