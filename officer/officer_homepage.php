
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
    <title>Officer</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">
      <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.0-9/40110097_1874047352649556_2771589700878598144_o.png?_nc_cat=101&_nc_sid=09cbfe&_nc_ohc=5rDo0p99rwMAX8fEgW4&_nc_ht=scontent.fceb2-1.fna&oh=7d294589575470d9bb7658fd2966e075&oe=5F387968" width="30" height="30" class="d-inline-block align-top" alt="">
    Computer Engineering Laboratory
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="officer_homepage.php">Homepage<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="officereditattendance.php">Update Records</a>
      <a class="nav-item nav-link" href="updateofficerpass.php">Update Password</a>
      <a class="nav-item nav-link" href="notification.php">Notification</a>
      <a class="nav-item nav-link" href="../login.php">Logout</a>
    </div>
  </div>
</nav>
<br/><br/><br/><br/>
<div class="container">
  <!-------GREETINGS AND BUTTONS FOR CHECKIN/CHECKOUT----->
  <h1>Welcome <?php $user=$_SESSION['username'];
  echo"$user";?> assigned to <?php $labtype=$_SESSION['labtype'];
  echo"$labtype";?>!</h1>
        <?php
        if(isset($_POST['print'])){
          if($labtype == "dml"){
            header("Location:dml_printall.php"); 
          }
          elseif($labtype == "secn"){
            header("Location:secn_printall.php");   
          }
          elseif($labtype == "ceac-tc"){
            header("Location:ceac_printall.php"); 
          }
          elseif($labtype == "ncr"){
            header("Location:ncr_printall.php"); 
          }
          elseif($labtype == "pcb-cra"){
            header("Location:pcb_printall.php"); 
          }
        }
        elseif(isset($_POST['search'])){
          if($labtype=="ceac-tc"){
            header("Location:searchceac.php");
          }
          elseif($labtype=="dml"){
            header("Location:searchdml.php"); 
          }
          elseif($labtype=="ncr"){
            header("Location:searchncr.php"); 
          }
          elseif($labtype=="pcb-cra"){
            header("Location:searchpcb.php"); 
          }
          elseif($labtype=="secn"){
            header("Location:searchsecn.php"); 
          }
        }
        elseif(isset($_POST['add'])){
          header("Location:addaccounts.php");
        }
        elseif(isset($_POST['delete'])){
          header("Location:deleteaccounts.php");
        }
          ?>
  <br><br><br>
      <div>
    <br>
      <h1>Attendance</h1>
      <br>
      <h2>Lab: <?php $labtype=$_SESSION['labtype'];
  echo"<strong>$labtype</strong>";?></h2>
      <table class="table">
  <thead>
    <tr>
      <th scope="col" class="bg-primary">#</th>
      <th scope="col" class="bg-primary">User</th>
      <th scope="col"class="bg-primary">Role</th>
      <th scope="col"class="bg-primary">Date In</th>
      <th scope="col"class="bg-primary">Date Out</th>
      <th scope="col"class="bg-primary">Time In</th>
      <th scope="col"class="bg-primary">Time Out</th>
      <th scope="col"class="bg-primary">Duty Hours</th>
      <th scope="col"class="bg-primary">Sched Hours</th>
    </tr>
  </thead>

  <?php
  if($labtype == "dml"){
    $query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='dml' ORDER BY Date_In";
    $result = mysqli_query($conn, $query);
    table($result);
  }
  elseif($labtype == "secn"){
    $query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='secn' ORDER BY Date_In";
    $result = mysqli_query($conn, $query);
    table($result);  
  }
  elseif($labtype == "ceac-tc"){
    $query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='ceac-tc' ORDER BY Date_In";
    $result = mysqli_query($conn, $query);
    table($result);  
  }
  elseif($labtype == "ncr"){
    $query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='ncr' ORDER BY Date_In";
    $result = mysqli_query($conn, $query);
    table($result);  
  }
  elseif($labtype == "pcb-cra"){
    $query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='pcb-cra' ORDER BY Date_In";
    $result = mysqli_query($conn, $query);
    table($result);  
  }
  
  function table($result){
  if($result)
    {
      foreach($result as $row){
    ?>

            <tbody>
              <tr>
                <td><?php echo$row['No'];?></td>
                <td><?php echo$row['user'];?></td>
                <td><?php echo$row['role'];?></td>
                <td><?php echo$row['Date_In'];?></td>
                <td><?php echo$row['Date_Out'];?></td>
                <td><?php echo$row['timein'];?></td>
                <td><?php echo$row['timeout'];?></td>
                <td><?php echo$row['time_dur'];?></td>
                <td><?php
                  $day = date('l',intval($row['Date_Out']));
                  switch($day){
                    case "Monday":
                      echo$row['Monday'];
                      break;                      
                    case "Tuesday":
                      echo$row['Tuesday'];
                      break;
                    case "Wednesday":
                      echo$row['Wednesday'];
                      break;
                    case "Thursday":
                      echo$row['Thursday'];
                      break;
                    case "Friday":
                      echo$row['Friday'];
                      break;
                    default:
                      echo"No Time Set";
                } ?></td>

              </tr>
            </tbody>        
  <?php 
      }
    }
  }
     ?>
</table>
     <form action="officer_homepage.php" method="post">
        <input type="submit" name="print" value="PRINT">
        <input type="submit" name="search" value="SEARCH">
        <input type="submit" name="add" value="ADD ACCOUNT">
        <input type="submit" name="delete" value="DELETE ACCOUNT">

      </div>
    </form>

    </body>
</html>