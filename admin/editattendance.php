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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="#">
	<title>EDIT ATTENDANCE</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="admin.php">
      <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.0-9/40110097_1874047352649556_2771589700878598144_o.png?_nc_cat=101&_nc_sid=09cbfe&_nc_ohc=5rDo0p99rwMAX8fEgW4&_nc_ht=scontent.fceb2-1.fna&oh=7d294589575470d9bb7658fd2966e075&oe=5F387968" width="30" height="30" class="d-inline-block align-top" alt="">
    Computer Engineering Laboratory Admin
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="editlab.php" >Manage Laboratories<span class="sr-only"></span></a>
      <a class="nav-item nav-link" href="ManageAcc.php">Manage Accounts</a>
      <a class="nav-item nav-link active" href="admin.php" active>View attendance</a>
      <a class="nav-item nav-link" href="search.php" active>Search Attendance</a>
        <a class="nav-item nav-link" href="editattendance.php">Update records</a>
        <a class="nav-item nav-link" href="../login.php">Log Out</a>
    </div>
  </div>
</nav>
	<form action="editattendance.php" method="post">
		<center><h3>EDIT LAB RECORDS</h3></center>
		<input type="submit" name="showall" value="SHOW ALL"><br>
      <h5>Laboratory Assigned</h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="labname" value="ceac-tc">
          <label class="form-check-label" for="ceac">CEAC-TC</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="labname" value="dml">
          <label class="form-check-label" for="dml">DML</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="labname"value="secn">
          <label class="form-check-label" for="secn">SECN</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="labname" value="ncr">
          <label class="form-check-label" for="ncr">NCR</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="labname" value="pcb-cra">
          <label class="form-check-label" for="pcb">PCB-CRA</label>
        </div>
        <br>
    <input type="submit" name="submitlab" value="FILTER"><br>
		<label>User: </label><input type="text" name="edituser"><br><label>User No: </label><input type="text" name="num_id"><br>
        		<label>Time In: </label><input type="text" name="edittimein"><br>
        		<label>Time Out: </label><input type="text" name="edittimeout"><br>
            <label>Date In: </label><input type="text" name="editdatein"><br>
            <label>Date Out: </label><input type="text" name="editdateout"><br>
            <label>Duty Hours: </label><input type="text" name="editduty"><br>
        		<input type="submit" name="submitedit" value="submit">

	</form>
    <table class="table">
  	<thead>
    	<tr>
      	<th scope="col" class="bg-primary">#</th>
      	<th scope="col" class="bg-primary">User</th>
	    <th scope="col"class="bg-primary">Role</th>
	    <th scope="col"class="bg-primary">labassign</th>
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
        if(isset($_POST['showall'])){
        	$result = mysqli_query($conn, $query);
    		table($result);
    	}
        //$timein = $_SESSION['Date_In'];
       // $timeout = $_SESSION['Date_Out'];
        if(isset($_POST["submitedit"])){
        			$edittimein = $_POST["edittimein"];
              $No = $_POST["num_id"]; 
        			$edittimeout = $_POST["edittimeout"];
        			$edituser = $_POST["edituser"];
              $editdatein = $_POST["editdatein"];
              $editdateout = $_POST["editdateout"];
              $editduty = $_POST["editduty"];
              $query = "UPDATE checkin SET timein = '$edittimein', timeout = '$edittimeout',Date_In='$editdatein',Date_Out='$editdateout',time_dur='$editduty' WHERE user = '$edituser' AND No ='$No'";
              $result = mysqli_query($conn, $query);
				
			}
        if(isset($_POST['submitlab'])&&$_POST['labname']!=NULL){
        	if($_POST['labname']=="dml"){
        		$query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='dml' ORDER BY Date_In";
        		$result = mysqli_query($conn, $query);
    			table($result);
        	}
        	elseif($_POST['labname']=="pcb-cra"){
        		$query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='pcb-cra' ORDER BY Date_In";
        		$result = mysqli_query($conn, $query);
   				 table($result);
        	}
        	elseif($_POST['labname']=="secn"){
        		$query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='secn' ORDER BY Date_In";
        		$result = mysqli_query($conn, $query);
    			table($result);
        	}
        	elseif($_POST['labname']=="ceac"){
        		$query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='ceac-tc' ORDER BY Date_In";
        		$result = mysqli_query($conn, $query);
   				 table($result);	
        	}
        	elseif($_POST['labname']=="ncr"){
        		$query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='ncr' ORDER BY Date_In";
        		$result = mysqli_query($conn, $query);
   				 table($result);	
        		}
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
                 <td><?php echo$row['labassign'];?></td>
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
                    case "thursday":
                      echo$row['thursday'];
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