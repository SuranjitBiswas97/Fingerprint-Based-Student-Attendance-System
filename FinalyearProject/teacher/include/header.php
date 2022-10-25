<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Student Attendance System</title>
		<meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Student Attendance System">
        <meta name="author" content="Exceptional Programmers">
        


		<!-- Bootstrap Link CSS Files -->
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

		 <script type="text/javascript" src="../jquery/jquery.js"></script>

        <!-- Custom Link CSS Files -->
		<link rel="stylesheet" href="../css/custom.css">

        <link rel="stylesheet" href="../css/styles.css">
		
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	</head>
<?php 
   
	session_start();
    include('../include/dbconnect.php'); 
    include('navigation.php'); 

?>