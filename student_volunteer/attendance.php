<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="updatestyle.css">
    <title>Attendance</title>
    </head>
    <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">
      <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.0-9/40110097_1874047352649556_2771589700878598144_o.png?_nc_cat=101&_nc_sid=09cbfe&_nc_ohc=5rDo0p99rwMAX8fEgW4&_nc_ht=scontent.fceb2-1.fna&oh=7d294589575470d9bb7658fd2966e075&oe=5F387968" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        </div>
  </div>
</nav>
<br/>
        <form action = "attendance.php" method = "post">
          <h1>Check Attendance</h1>
   <button type="submit" class="btn btn-primary" name="attendance">Display Attendance</button>
   <button type="submit" class="btn btn-primary" name="back">Back to Homepage</button><br><br>

</form>

<?php


  
if(isset($_POST['attendance'])) {
    display();
}
  elseif(isset($_POST['back'])) {
        header("Location:student_homepage.php");
    }


   function display(){//BEGINNING OF DISPLAY
    define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
    define('DB_USERNAME','cpe7520');
    define('DB_PASSWORD','P@ssw0rd!');
    define('DB_NAME','cpe7520');
    $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if(!$conn){
      die("Connection Unsuccessful:".mysqli_connect_error());
    }
      //create connection
       $user = $_SESSION["username"];
      $query ="SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.user='$user' AND checkin.role=schedule.role AND checkin.labassign=schedule.labassign ORDER BY Date_In";   
     
      echo "<table border='1' width='100%' cellpadding='10' cellspacing='0'>";
      echo "<br/><tr><th>User</th><th>Role</th><th>Date In</th><th>Date Out</th><th>Time In</th><th>Time Out</th><th>Duty Hours</th><th>Sched Hours</th><tr>";
      echo"<center><h2>$user Attendance</h2></center>";

      if($result= mysqli_query($conn, $query)){
        while ($row = mysqli_fetch_assoc($result)){
          echo"<tr alight=center>
                  <td align=center>".$row['user']."</td>
                  <td align=center>".$row['role']."</td>
                  <td align=center>".$row['Date_In']."</td>
                  <td align=center>".$row['Date_Out']."</td>
                  <td align=center>".$row['timein']."</td>
                  <td align=center>".$row['timeout']."</td>
                  <td align=center>".$row['time_dur']."</td>";
                  $day = date('l',intval($row['Date_Out']));
                  switch($day){
                    case "Monday":
                      echo" <td align=center>".$row['Monday']."</td>
                      <td align=center><a class='btn btn-primary' href=\"taprint.php?user=$row[user]\">Print Attendance</a></td>
                      </tr>";
                      break;    
                    case "Tuesday":
                      echo" <td align=center>".$row['Tuesday']."</td>
                      <td align=center><a class='btn btn-primary' href=\"taprint.php?user=$row[user]\">Print Attendance</a></td>
                      </tr>";
                      break;    
                    case "Wednesday":
                      echo" <td align=center>".$row['Wednesday']."</td>
                      <td align=center><a class='btn btn-primary' href=\"taprint.php?user=$row[user]\">Print Attendance</a></td>
                      </tr>";
                      break;    
                    case "Thursday":
                      echo" <td align=center>".$row['Thursday']."</td>
                      <td align=center><a class='btn btn-primary' href=\"taprint.php?user=$row[user]\">Print Attendance</a></td>
                      </tr>";
                      break;   
                    case "Friday":
                      echo" <td align=center>".$row['Friday']."</td>
                      <td align=center><a class='btn btn-primary' href=\"taprint.php?user=$row[user]\">Print Attendance</a></td>
                      </tr>";
                      break;    
                    default:
                      echo" <td align=center>No data</td>
                      <td align=center><a class='btn btn-primary' href=\"taprint.php?user=$row[user]\">Print Attendance</a></td>
                      </tr>";
                      break;           
                  } 
          
        }
      }

      mysqli_close($conn);
    }



?>

           
</body>
</html>