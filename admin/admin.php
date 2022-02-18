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
    <title>Homepage</title>
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
      <a class="nav-item nav-link" href="search.php">Search Attendance</a>
        <a class="nav-item nav-link" href="editattendance.php">Update records</a>
        <a class="nav-item nav-link" href="../login.php">Log Out</a>
    </div>
  </div>
</nav>
    <div>
    <br>
      <h1>Attendance</h1>
      <br>
        <form action="admin.php" method="post">
     		<input type="submit" name="printall" value="PRINT ALL">
     	<?php
     		if(isset($_POST['printall'])){
     			header("Location:printall.php");
     		}
     		elseif(isset($_POST['printceac'])){
     			header("Location:printceac.php");
     		}
     		elseif(isset($_POST['printdml'])){
     			header("Location:printdml.php");			
     		}
     		elseif(isset($_POST['printncr'])){
     			header("Location:printncr.php");	
     		}
     		elseif(isset($_POST['printpcb'])){
     			header("Location:printpcb.php");
     		}
     		elseif(isset($_POST['printsecn'])){
     			header("Location:printsecn.php");
     		}
     	?>
      <h2>CEAC</h2>
           </form>
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
	$query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='ceac-tc' ORDER BY Date_In";// ADD LANG ATONG DATABASE ARI
	$result = mysqli_query($conn, $query);
	?>
	<?php
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
                  <!---- IBUTANG LANG SULOD SA  QUOTATION ANG NAME SA RECORD NGA IDISPLAY--->

					    </tr>
					  </tbody>				
	<?php 
			}
		}
		 ?>

</table>
        <form action="admin.php" method="post">  		
         	<input type="submit" name="printceac" value="PRINT">
        </form>
      </div>



      <div>
    <br>
      
      <br>
      <h2>DML</h2>
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
	$query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='ceac-tc' ORDER BY Date_In";// ADD LANG ATONG DATABASE ARI
	$result = mysqli_query($conn, $query);
	?>
	<?php
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
                  <!---- IBUTANG LANG SULOD SA  QUOTATION ANG NAME SA RECORD NGA IDISPLAY--->

					    </tr>
					  </tbody>



				
	<?php 
			}
		}
		 ?>

</table>
        <form action="admin.php" method="post">  		
         	<input type="submit" name="printdml" value="PRINT">
        </form>
      </div>


      <div>
    <br>
      
      <br>
      <h2>NCR</h2>
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
	$query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='ncr' ORDER BY Date_In";// ADD LANG ATONG DATABASE ARI
	$result = mysqli_query($conn, $query);
	?>
	<?php
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
                  <!---- IBUTANG LANG SULOD SA  QUOTATION ANG NAME SA RECORD NGA IDISPLAY--->

					    </tr>
					  </tbody>



				
	<?php 
			}
		}
		 ?>

</table>
        <form action="admin.php" method="post">  		
         	<input type="submit" name="printncr" value="PRINT">
        </form>
      </div>


      <div>
    <br>
      
      <br>
      <h2>PCB</h2>
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
	$query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='pcb-cra' ORDER BY Date_In";// ADD LANG ATONG DATABASE ARI
	$result = mysqli_query($conn, $query);
	?>
	<?php
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
                  <!---- IBUTANG LANG SULOD SA  QUOTATION ANG NAME SA RECORD NGA IDISPLAY--->

					    </tr>
					  </tbody>



				
	<?php 
			}
		}
		 ?>

</table>
        <form action="admin.php" method="post">  		
         	<input type="submit" name="printpcb" value="PRINT">
        </form>
      </div>
    </body>

    <div>
    <br>
      
      <br>
      <h2>SECN</h2>
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
	$query = "SELECT checkin.No,checkin.user,checkin.role,checkin.labassign,checkin.Date_In,checkin.Date_Out,checkin.timein,checkin.timeout,checkin.time_dur,schedule.Monday,schedule.Tuesday,schedule.Wednesday,schedule.Thursday,schedule.Friday FROM checkin inner join schedule WHERE checkin.role=schedule.role AND checkin.labassign='secn' ORDER BY Date_In";// ADD LANG ATONG DATABASE ARI
	$result = mysqli_query($conn, $query);
	?>
	<?php
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
                } ?></td>s
                  <!---- IBUTANG LANG SULOD SA  QUOTATION ANG NAME SA RECORD NGA IDISPLAY--->

					    </tr>
					  </tbody>



				
	<?php 
			}
		}
		 ?>

</table>
        <form action="admin.php" method="post">  		
         	<input type="submit" name="printsecn" value="PRINT">
        </form>
      </div>


    
</html>