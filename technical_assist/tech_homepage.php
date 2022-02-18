<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="#">
    <title>Technical Assist Homepage</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">
      <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.0-9/40110097_1874047352649556_2771589700878598144_o.png?_nc_cat=101&_nc_sid=09cbfe&_nc_ohc=5rDo0p99rwMAX8fEgW4&_nc_ht=scontent.fceb2-1.fna&oh=7d294589575470d9bb7658fd2966e075&oe=5F387968" width="30" height="30" class="d-inline-block align-top" alt="">
    Computer Engineering Laboratory
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="tech_homepage.php">Homepage <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="request.php">Request</a>
      <a class="nav-item nav-link" href="attendance.php">Attendance</a>
      <a class="nav-item nav-link" href="updatetechnicalassistant.php">Edit Account</a>
      <a class="nav-item nav-link" href="inputsched.php">Edit Schedule</a>
      <a class="nav-item nav-link" href="showsched.php">Show Schedule</a>
        <a class="nav-item nav-link" href="checkinfoTA.php">Check Account Information</a>
        <a class="nav-item nav-link" href="technotif.php">Notification</a>
        <a class="nav-item nav-link" href="../login.php">Log Out</a>
    </div>
  </div>
</nav>
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
<br/><br/><br/><br/>
<div class="container">
    <!-------GREETINGS AND BUTTONS FOR CHECKIN/CHECKOUT----->
  <h1>Welcome <?php $user=$_SESSION['username'];
  echo"$user";?>!</h1>
  <br><br><br>
  <form action="tech_homepage.php" method="post">
      <button href="" type="submit" class="btn btn-primary" name="submit_check_in">
              Clock In
          </button>
      <button  href=""  type="submit" class="btn btn-primary" name="submit_check_out">
              Clock out
          </button>
          <br>
  </form>
  <?php
$timetoday = date("H:i:s", time());
$datetoday = date("Y-m-d"); 
$time_start=0;
$time_end=0;
$query = "SELECT * FROM signup";
//CHECKS IF ACCEPTED BA SA OFFICER
  if(isset($_POST['submit_check_in'])) {
      //CHECK IN PARA ATTENDANCE
    $query = "SELECT labassign,typeofaccount FROM signup WHERE username = '$user'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);
    $labtype = $row['labassign'];
    $role = $row['typeofaccount'];
    $time_start = microtime(true);
    $sql=mysqli_query($conn, "INSERT INTO checkin(user,role,labassign, Date_In, timein,micro_in) VALUES ('$user' ,'$role','$labtype', '$datetoday', '$timetoday','$time_start') ");
      echo"Successfully Timed In!";
  }
    //Check Out/ LOG OUT
  elseif(isset($_POST['submit_check_out'])) {
    $query = "SELECT No FROM checkin WHERE user = '$user'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);
    $num = $row['No']; 
    $time_end = microtime(true);
    $sql=mysqli_query($conn, "UPDATE checkin SET Date_Out='$datetoday',timeout='$timetoday',micro_out='$time_end' WHERE user='$user' AND No='$num'");
    $query = "SELECT micro_in,micro_out FROM checkin WHERE user = '$user' AND No='$num'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);
    $micro_start = $row['micro_in'];
    $micro_end = $row['micro_out'];
    $time_in_seconds = $micro_end - $micro_start;
    $time_in_minutes = $time_in_seconds/60;
    $time_in_hours = $time_in_minutes/60;
    echo"Duration in Seconds:$time_in_seconds<br>";
    echo"Duration in Minutes:$time_in_minutes<br>";
    echo"Duration in Hours:$time_in_hours<br>";
    $sql=mysqli_query($conn, "UPDATE checkin SET time_dur='$time_in_hours' WHERE user='$user' AND No='$num'");
  }
?>        
       
    </body>
</html>