<body>
<nav id="mainNav" class="navbar fixed-top navbar-default navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../index.php">Student Attendance System</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
    </ul>
    
    <ul class="navbar-nav form-inline my-2 my-lg-0">

      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../">Students</a>
      </li>

      
	   <li class="nav-item" style="color: blue">
        <?php 

          if(isset($_SESSION['username'])) echo $_SESSION['username']; 
          else if(isset($_SESSION['tname'])) echo $_SESSION['tname'];
        ?>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
	   


    </ul>
  </div>
</nav>