<!DOCTYPE html>
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
       <?php
      $user = $_SESSION['username'];
      $labtype = $_SESSION['labtype'];  
   ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="#">
	<title>EDIT ATTENDANCE FOR LABORATORY(officer)</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="admin.php">
      <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.0-9/40110097_1874047352649556_2771589700878598144_o.png?_nc_cat=101&_nc_sid=09cbfe&_nc_ohc=5rDo0p99rwMAX8fEgW4&_nc_ht=scontent.fceb2-1.fna&oh=7d294589575470d9bb7658fd2966e075&oe=5F387968" width="30" height="30" class="d-inline-block align-top" alt="">
    Computer Engineering Laboratory
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
       <a class="nav-item nav-link" href="officer_homepage.php">Homepage <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="officereditattendance.php">Update Records</a>
      <a class="nav-item nav-link" href="updateofficerpass.php">Update Password</a>
      <a class="nav-item nav-link" href="notification.php">Notification</a>
      <a class="nav-item nav-link" href="../login.php">Logout</a>
    </div>
  </div>
</nav>
<div class="container">
  <!-------GREETINGS AND BUTTONS FOR CHECKIN/CHECKOUT----->
  <h1>Welcome <?php $user=$_SESSION['username'];
  echo"$user";?> assigned to <?php $labtype=$_SESSION['labtype'];
  echo"$labtype";?>!</h1>

  <br><br><br>

<center><h1>EDIT LAB RECORDS</h1></center>
<form action="officereditattendance.php" method="post">
	<label>Enter User: </label><input type="text" name="edituserO"><br>
  <label>Enter User No: </label><input type="text" name="num_id"><br>
	<label>Time In: </label><input type="text" name="edittimeinO"><br>
	<label>Time Out: </label><input type="text" name="edittimeoutO"><br>
  <label>Date In: </label><input type="text" name="editdateinO"><br>
  <label>Date Out: </label><input type="text" name="editdateoutO"><br>
  <label>Duty Hours: </label><input type="text" name="editdutyO"><br>
	<input type="submit" name="sumbiteditO" value="SUBMIT"><br>
  <br>
</form>
</div>
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
       $query = "SELECT * FROM checkin";
       if(isset($_POST['sumbiteditO'])){     
			      $edituserO = $_POST["edituserO"];
            $No = $_POST["num_id"];  
			      $edittimeinO = $_POST["edittimeinO"];
			      $edittimeoutO = $_POST["edittimeoutO"];
            $editdateinO = $_POST["editdateinO"];
            $editdateoutO = $_POST["editdateoutO"];
            $editdutyO = $_POST["editdutyO"];
			      $query = "UPDATE checkin SET timein = '$edittimeinO', timeout = '$edittimeoutO',Date_In = '$editdateinO',Date_Out = '$editdateoutO',time_dur='$editdutyO' WHERE user = '$edituserO' AND No ='$No'";
            $result = mysqli_query($conn, $query);            
		}
        //$query = "SELECT  * FROM signup";
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
  		if($result){
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
                  <!---- IBUTANG LANG SULOD SA  QUOTATION ANG NAME SA RECORD NGA IDISPLAY--->
              </tr>
    </tbody>
    <?php 
    		}
    	}
	}
     ?>


</body>
</html>