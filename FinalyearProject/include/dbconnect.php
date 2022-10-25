   <?php
    //Creates new record as per request
    //Connect to database
    $hostname = "localhost";    //example = localhost or 192.168.0.0
    $username = "root";   //example = root
    $password = ""; 
    $dbname = "nodemcu_ldr";
    // Create connection
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed !!!");
    } 
  ?>