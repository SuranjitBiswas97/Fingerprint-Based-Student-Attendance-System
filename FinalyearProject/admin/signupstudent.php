<?Php 
include("include/header.php");
?>
<?php
	$qu="SELECT dept_name from department";
	$resultf=mysqli_query($conn,$qu);
?>
<?php
	

if (isset($_POST["reg_user"])) {
    $fi=$_POST['finger_id'];
    $na = $_POST['name'];
    $id = $_POST['id'];
    $dept = $_POST['Department'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $em = $_POST['email'];
    $pass1=$_POST['psw1'];
    $pass2=$_POST['psw2'];
    $city = $_POST['city'];
    // if (strlen($regi)<12) {
 if($pass1 ==$pass2){
      // $pass1 = md5($password_1);
    
	
	$sql2 = "SELECT * FROM `student` WHERE fingerid='$fi'";
				 
				 
				$querycheck= mysqli_query($conn,$sql2);
				
				if(mysqli_num_rows($querycheck)>0)
				{
					echo"Already Exist";
				}
				else{
	
					$query = "INSERT INTO `student`(`fingerid`,`Name`, `registration_no`, `dept_name`, `Gender`, `Contact_No`, `Email`, `Password`, `City`) VALUES  ('$fi','$na','$id','$dept','$gender','$number','$em','$pass1','$city')";
				  
					
				  if($conn->query($query)==true)
				  { 
					header('location: signupstudent.php');
					echo "<script>alert('Record successfully inserted');</script>";
				  }
				  else{

					echo "<script>alert('Sorry ERROR are available...!');</script>";

					}
				}

  }
  
    
}


?>




    <script>
      $(document).ready(function() {
        setInterval(function(){get_data()},500);
        function get_data()
        {
          jQuery.ajax({
            type:"GET",
            url: "read_db.php",
            data:"",
            beforeSend: function() {
            },
            complete: function() {
            },
            success:function(data) {
              $("#autodiv").html(data);
            }
          });
        }
      });
    </script>
  


  
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

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
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

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
      
    </style>
   

<div class="conatiner size" style="margin-top: 50px;">
  <div class="row">
    <div class="col-md-6 offset-md-3 form-container">
    <h3>SignUp</h3>
    <hr class="red-bar">
    <form action="signupstudent.php" method="POST" >

   <label  for="fi"> Finger Id : </label>
   
   <div id="autodiv">
		
   </div>
	
   
   
  
    <label for="nm"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" required>
    
    <label for="id"><b>Reg id</b></label>
		<input type="text" placeholder="Enter Id" name="id" required>

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

     <label for="gd"><b>Gender</b></label><br>
	    Male<input type="radio" name="gender" id="gender" checked="checked" value="Male" style="margin-left:10px; margin-right:10px;margin-top:10px;"><!--checked-->
		Fe-male<input type="radio" name="gender" id="gender" value="Fe-male" style="margin-left:10px;">
				 

		<br>
		<br>

      <label for="ph"><b>Contact No</b></label>
      <input type="text" placeholder="Enter phone  Number" name="number" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw1" required>

      <label for="psw"><b>Comfirm Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw2" required>

      <label for="adrs"><b>City</b></label>
      <input type="text" placeholder="Enter City" name="city" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="submit" name="reg_user" class="signupbtn">Sign Up</button>
      </div>
      </form>
    </div>
 
</div>

</div>
  <?php include('include/footer.php');?>