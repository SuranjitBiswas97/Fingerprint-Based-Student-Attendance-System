<?php 
	
	
	//include header file
	include ('include/header.php');
	
	
	if(isset($_POST['SignIn'])){
		
		//Email input check
		
		if(isset($_POST['email']) && !empty($_POST['email'])){
		
			$email=$_POST['email'];
			
		}

		else{
			$emailError=' <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>please fill the email field</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
			
		}
		
		
		
		//Password input check
		
		if(isset($_POST['password']) && !empty($_POST['password'])){
		
			$password=$_POST['password'];
			
		}
		else{
			$passwordError=' <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>please fill the password field</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
			
		}
		
		//Login Query
		
		if(isset($email) && isset($password)){
			
		
			$sqlone="SELECT * FROM admin WHERE password='$password' AND email='$email'";
			
			$resultone= mysqli_query($conn,$sqlone);
			
			
			if(mysqli_num_rows($resultone)>0)
			{
				while($rowone=mysqli_fetch_assoc($resultone)){
					$_SESSION['username']=$rowone['username'];
					
					header('Location: admin/index.php');
				}
				
			}else{
				
				$submitError=' <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry ! No Record Found.Pleaseenter valid email and password.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
				
			}
		}
		
		
		
		if(isset($email) && isset($password)){
			
		
			$sqlthree="SELECT * FROM student WHERE registration_no='$password' AND email='$email'";
			
			$resultthree= mysqli_query($conn,$sqlthree);
			
			
			if(mysqli_num_rows($resultthree)>0)
			{
				while($rowthree=mysqli_fetch_assoc($resultthree)){
					$_SESSION['registration_no']=$rowthree['registration_no'];
					
					header('Location: student/index.php');
				}
				
			}else{
				
				$submitError=' <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry ! No Record Found.Pleaseenter valid email and password.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
				
			}
		}
		
		

		if(isset($email) && isset($password)){
			
		
			$sqltwo="SELECT * FROM teacher WHERE password='$password' AND email='$email'";
			
			$resulttwo= mysqli_query($conn,$sqltwo);
			
			
			if(mysqli_num_rows($resulttwo)>0)
			{
				while($rowtwo=mysqli_fetch_assoc($resulttwo)){
					$_SESSION['tname']=$rowtwo['tname'];
					
					header('Location: teacher/index.php');
				}
				
			}else{
				
				$submitError=' <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry ! No Record Found.Pleaseenter valid email and password.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
				
			}
		}
		
	}

?>

<style>
	.size{
		min-height: 0px;
		padding: 60px 0 60px 0;

	}
	h1{
		color: white;
	}
	.form-group{
		text-align: left;
	}
	h3{
		color: #e74c3c;
		text-align: center;
	}
	.red-bar{
		width: 25%;
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
</style>

 
<div class="conatiner size "style="margin-top:50px">
	<div class="row">
		<div class="col-md-6 offset-md-3 form-container">
		<h3>SignIn</h3>
		<hr class="red-bar">
		<?php if(isset($submitError)) echo $submitError;?>
		<!-- Erorr Messages -->

			<form action="" method="post" >
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email or Registration No" >
				</div><?php if(isset($emailError)) echo $emailError;?>
				
				<div class="form-group">
					<label for="password">Password/Registration No</label>
					<input type="password" name="password" placeholder="Password" class="form-control">
				</div><?php if(isset($passwordError)) echo $passwordError;?>
				<div class="form-group">
					<button class="btn btn-danger btn-lg center-aligned" type="submit" name="SignIn">SignIn</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include 'include/footer.php' ?>
