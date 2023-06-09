<?php 

  session_start();

  require 'wallconnect.php';
  require 'functions.php';

  if(isset($_SESSION['name'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Profile - Student Information System</title>

  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

  <?php include 'wallheader.php'; ?>

  <section>

    <div class="container">
      <strong class="title">My Profile</strong>
    </div>
    
    
    <div class="profile-box box-left">

      <?php

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }


        $query = "SELECT * FROM students WHERE name = '".$_SESSION['name']."' AND password = '".$_SESSION['password']."'";

        ;

        if($result = mysqli_query($con, $query)) {

          $row = mysqli_fetch_assoc($result);

          echo "<div class='info'><strong>Name :</strong> <span>".$row['name']."</span></div>";
          echo "<div class='info'><strong>College :</strong> <span>".$row['college']."</span></div>";
          echo "<div class='info'><strong>Email :</strong> <span>".$row['email']."</span></div>";
          echo "<div class='info'><strong>Branch :</strong> <span>".$row['branch']."</span></div>";
          echo "<div class='info'><strong>Gender :</strong> <span>".$row['gender']."</span></div>";
          echo "<div class='info'><strong>Age :</strong> <span>".$row['age']."</span></div>";
          echo "<div class='info'><strong>Phone No :</strong> <span>".$row['phone']."</span></div>";
          
          echo "<div class='info'><strong>Technical skills :</strong> <span>".$row['technical']."</span></div>";

          // $query_date = "SELECT DATE_FORMAT(date_joined, '%m/%d/%Y') FROM students WHERE id = '".$_SESSION['userid']."'";
          // $result = mysqli_query($con, $query_date);

          // $row = mysqli_fetch_row($result);

          // echo "<div class='info'><strong>Date Joined:</strong> <span>".$row[0]."</span></div>";

        } 
        // else {

        //   die("Error with the query in the database");

        // }

      ?>
      
      <div class="options">
        <a class="btn btn-primary" href="editprofile.php">Edit Profile</a>
        <a class="btn btn-success" href="wallindex.php">Logout</a>
      </div>  
    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>

<?php


  } else {
    header("location:wallindex.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);

?>