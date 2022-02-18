<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="#">
	<title>REQUEST</title>
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
	<form action="request.php" method="post">
		<center><h1>Do you want to request approval for your account?</h1><br>
		<input type="submit" name="req" value="REQUEST"></center>
	</form>
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
        $user = $_SESSION['username'];
       /* $request = $_SESSION['Request'];*/
        $query = "SELECT * FROM signup";
        if($result = mysqli_query($conn, $query)){
        	while($row = mysqli_fetch_assoc($result)){
				if(isset($_POST['req'])){
					$sql = mysqli_query($conn, "UPDATE signup  SET  Request = 'yes' WHERE username = '$user'");
					echo "<center><h1>You have successfully Request for your account's activation.</h1></center><br>";
				}	

			}
		}
		

	 ?>

</body>
</html>