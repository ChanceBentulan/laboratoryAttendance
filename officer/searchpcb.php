<?php

  session_start();
  define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
  define('DB_USERNAME','cpe7520');
  define('DB_PASSWORD','P@ssw0rd!');
  define('DB_NAME','cpe7520');
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
  if(!$conn)
  {
    die("Connection Unsuccessful:".mysqli_connect_error());
  }


  
//search filter
if(isset($_POST['filter'])){

  $search=$_POST['search'];

  $query = "SELECT*FROM `checkin` WHERE labassign='pcb' AND CONCAT(`No`,`user`,`role`,`labassign`,
    `Date_In`,`Date_Out`,`timein`,`timeout`) LIKE '%".$search."%'";  
  $run_query = mysqli_query($conn, $query);
}
else{
  $query = "SELECT*FROM `checkin` WHERE labassign='pcb-cra'";
  $run_query = mysqli_query($conn, $query);
}
    ?>




<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="#">
    <title>Search</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="admin.php">
      <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.0-9/40110097_1874047352649556_2771589700878598144_o.png?_nc_cat=101&_nc_sid=09cbfe&_nc_ohc=5rDo0p99rwMAX8fEgW4&_nc_ht=scontent.fceb2-1.fna&oh=7d294589575470d9bb7658fd2966e075&oe=5F387968" width="30" height="30" class="d-inline-block align-top" alt="">
    Computer Engineering Laboratory Officer PCB-CRA
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
       <a class="nav-item nav-link" href="officer_homepage.php" >Homepage<span class="sr-only"></span></a>
        <a class="nav-item nav-link" href="officereditattendance.php">Update records</a>
        <a class="nav-item nav-link" href="updateofficerpass.php">Update Password</a>
        <a class="nav-item nav-link" href="notification.php">Notification</a>
      <a class="nav-item nav-link" href="../login.php">Logout</a>
    </div>
  </div>
</nav>
<br>
<h1> PCB Filter</h1>  
<div class="search-container">
    <form action="searchpcb.php" method="POST">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="filter">Filter</button>
    </form>
  </div>
<table class = "table">
	<thead>
					    <tr>
					      <th scope='col'>No</th>
					      <th scope='col'>User</th>
					      <th scope='col'>Role</th>
                <th scope='col'>Laboratory Assigned</th>
					      <th scope='col'>Date In</th>
					      <th scope='col'>Date Out</th>
					      <th scope='col'>Time In</th>
					      <th scope='col'>Time Out</th>
					    </tr>
					  </thead>

					  <?php while($row = mysqli_fetch_array($run_query)):?>

					  	<tbody>
               <?php
                echo"<tr alight=center>
                  <td align=center>".$row['No']."</td>
                  <td align=center>".$row['user']."</td>
                  <td align=center>".$row['role']."</td>
                  <td align=center>".$row['Date_In']."</td>
                  <td align=center>".$row['Date_Out']."</td>
                  <td align=center>".$row['timein']."</td>
                  <td align=center>".$row['timeout']."</td>
                  <td align=center><a class='btn btn-primary' href=\"pcb_print.php?user=$row[user]\">Print Attendance</a></td>
                

              </tr>";
              ?>
					  </tbody>
					<?php 
				endwhile
					?>
</table> 
</body>
</html>