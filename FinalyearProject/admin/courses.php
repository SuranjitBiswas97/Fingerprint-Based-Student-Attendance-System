<?Php 
//include header file
	include ('include/header.php');
?>

<?php
	$qu="SELECT dept_name from department";
	$resultf=mysqli_query($conn,$qu);
?>
<?php


if (isset($_POST["reg_user"])) {
    $na = $_POST['code'];
	$fi=$_POST['course'];
	$de=$_POST['Department'];
   
    
    // if (strlen($regi)<12) {
 if($pass1 ==$pass2){
      // $pass1 = md5($password_1);
    
    $query = "INSERT INTO `course`(`course_code`, `course_title`, `dept_name`) VALUES  ('$na','$fi','$de')";
  
    
  if($conn->query($query)==true)
  { 
    header('location: courses.php');
    echo "<script>alert('Record successfully inserted');</script>";
  }
  else{

    echo "<script>alert('Sorry ERROR are available...!');</script>";


    }

  }
  
    
}


?>
  <style>
      body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
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
.signupbtn {

  width: 100%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
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
.form-container{
    background-color: white;
    border: .5px solid #eee;
    border-radius: 5px;
    padding: 20px 10px 20px 30px;
    -webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
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


      
    </style>

<div class="conatiner size" style="margin-top: 50px;">
  <div class="row">
		<div class="col-md-6 offset-md-3 form-container" >
			<h3>Courses</h3>
			<hr class="red-bar">
			<form action="courses.php" method="POST" >
		
				
				<label for="id"><b>Course Code</b></label>
				<input type="text" placeholder="Enter Course Code" name="code" required>
		
				<label for="nm"><b>Course</b></label>
				<input type="text" placeholder="Enter Course Name" name="course" required>
		

				<label for="dept"><b>Department</b></label>
     
					<select name="Department" Style="margin-left:10px;" required>
						<option value="">Select Your Department</option>
						<?php while($r=mysqli_fetch_array($resultf))
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

		
				<button "type="submit" name="reg_user" class="signupbtn">Add Course</button>
			</form>
		</div>
 
	</div>
</div>


<?php
	include ('include/footer.php');
?>