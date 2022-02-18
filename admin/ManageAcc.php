<?php

session_start();
define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
define('DB_USERNAME','cpe7520');
define('DB_PASSWORD','P@ssw0rd!');
define('DB_NAME','cpe7520');
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
if(!$conn){
  die("Connection Unsuccessful:".mysqli_connect_error());
}
  ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="#">
    <title>Manage Accounts</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">
      <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.0-9/40110097_1874047352649556_2771589700878598144_o.png?_nc_cat=101&_nc_sid=09cbfe&_nc_ohc=5rDo0p99rwMAX8fEgW4&_nc_ht=scontent.fceb2-1.fna&oh=7d294589575470d9bb7658fd2966e075&oe=5F387968" width="30" height="30" class="d-inline-block align-top" alt="">
    Computer Engineering Laboratory Admin
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="editlab.php" >Manage Laboratories<span class="sr-only"></span></a>
      <a class="nav-item nav-link" href="ManageAcc.php" active>Manage Accounts</a>
      <a class="nav-item nav-link active" href="admin.php">View attendance</a>
      <a class="nav-item nav-link" href="search.php">Search Attendance</a>
        <a class="nav-item nav-link" href="editattendance.php">Update records</a>
        <a class="nav-item nav-link" href="../login.php">Log Out</a>
    </div>
  </div>
</nav>
<br/><br/><br/><br/>
<div class="container">
  <!-------GREETINGS AND BUTTONS FOR CHECKIN/CHECKOUT----->
  <h1>Welcome <?php $user=$_SESSION['username'];
  echo"$user";?>!</h1>

<div>
      <form action="ManageAcc.php" method="post">
        <h3>Create New Officer</h3>
        <button type="submit" class="btn btn-primary" name="createnew">Create New Officer</button>
        <h3>Update Officer Password</h3> 
        <button type="submit" class="btn btn-primary" name="up_pass">Update Password</button>
        <h3>Delete Officer Account</h3>
        <button type="submit" class="btn btn-primary" name="delete">Delete</button>
        <h3>Change Room Assignment</h3> 
        <button type="submit" class="btn btn-primary" name="change">Change Room</button>
        </form>
    </div>
    <div>

    </div>
  </div>
  <?php
    if(isset($_POST['createnew'])){
      header("Location:createofficer.php");
    }
    elseif(isset($_POST['up_pass'])){
      header("Location:changepassofficer.php");
    }
    elseif(isset($_POST['delete'])){
      header("Location:delofficer.php");      
    }
    elseif(isset($_POST['change'])){
       header("Location:changeroom.php");     
    }
  ?>      
    </body>
</html>