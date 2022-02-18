<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="#">
	<title>Notification for LAB ATTENDANCE</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">
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
<div>
	<form action="notification.php" method="post">
		
		<p>Enter the username to be approved or disapproved</p>
		
		<label for="No"></label><input type="text" name="entry"><br>
		<input type="submit" name="approve" value="approve"><input type="submit" name="disapprove" value="disapprove">
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
         ?>
    <table class="table">
  	<thead>
    	<tr>
      	<th scope="col" class="bg-primary">No.</th>
    	<th scope="col" class="bg-primary">Username</th>
     	<th scope="col"class="bg-primary">labassign</th>
      	<th scope="col"class="bg-primary">typeofaccount</th>
      	<th scope="col"class="bg-primary">Status</th>
    	</tr>
    </thead>
    <?php
    //START OF REQUEST APPROVAL
        $query = "SELECT * FROM signup";
        $labtype = $_SESSION["labtype"];

   	if($labtype == "dml"){
	    $query = "SELECT * FROM signup WHERE labassign='dml' AND Request = 'yes'";
	    $result = mysqli_query($conn, $query);
	    if(isset($_POST['approve'])){
        $entry = $_POST["entry"];
        if($entry ==""){
          echo"Please Input The Details required!";
        }
        else{
        $sql = mysqli_query($conn, "UPDATE signup  SET  Status = 'accepted' WHERE username = '$entry'");
        echo"Account Successfully Accepted!";
        }
  		}
  		elseif(isset($_POST['disapprove'])){
        $entry = $_POST["entry"];
        if($entry ==""){
          echo"Please Input The Details required!";
        }
        else{
  			 $sql = mysqli_query($conn, "UPDATE signup  SET  Status = 'declined' WHERE username = '$entry'");
   			  echo"Account Successfully Declined!";
        }
  		}
  		table($result);
 	}
  	elseif($labtype == "secn"){
	    $query = "SELECT * FROM signup WHERE labassign='secn' AND Request = 'yes'";
	    $result = mysqli_query($conn, $query);
	    
	    if(isset($_POST['approve'])){
        $entry = $_POST["entry"];
        if($entry ==""){
          echo"Please Input The Details required!";
        }
        else{
        $sql = mysqli_query($conn, "UPDATE signup  SET  Status = 'accepted' WHERE username = '$entry'");
        echo"Account Successfully Accepted!";
        }
  		}
  		elseif(isset($_POST['disapprove'])){
        $entry = $_POST["entry"];
        if($entry ==""){
          echo"Please Input The Details required!";
        }
        else{
         $sql = mysqli_query($conn, "UPDATE signup  SET  Status = 'declined' WHERE username = '$entry'");
          echo"Account Successfully Declined!";
        }
	    table($result);  
  	}
  }
  	elseif($labtype == "ceac-tc"){
	    $query = "SELECT * FROM signup WHERE labassign='ceac-tc' AND Request = 'yes'";
	    $result = mysqli_query($conn, $query);
	    if(isset($_POST['approve'])){
        $entry = $_POST["entry"];
        if($entry ==""){
          echo"Please Input The Details required!";
        }
        else{
        $sql = mysqli_query($conn, "UPDATE signup  SET  Status = 'accepted' WHERE username = '$entry'");
        echo"Account Successfully Accepted!";
        }
  		}
  		elseif(isset($_POST['disapprove'])){
        $entry = $_POST["entry"];
        if($entry ==""){
          echo"Please Input The Details required!";
        }
        else{
         $sql = mysqli_query($conn, "UPDATE signup  SET  Status = 'declined' WHERE username = '$entry'");
          echo"Account Successfully Declined!";
        }
	    table($result);  
  	}
  }
 	elseif($labtype == "ncr"){
	    $query = "SELECT * FROM signup WHERE labassign='ncr' AND Request = 'yes'";
	    $result = mysqli_query($conn, $query);
	    if(isset($_POST['approve'])){
        $entry = $_POST["entry"];
        if($entry ==""){
          echo"Please Input The Details required!";
        }
        else{
        $sql = mysqli_query($conn, "UPDATE signup  SET  Status = 'accepted' WHERE username = '$entry'");
        echo"Account Successfully Accepted!";
        }
  		}
  		elseif(isset($_POST['disapprove'])){
        $entry = $_POST["entry"];
        if($entry ==""){
          echo"Please Input The Details required!";
        }
        else{
         $sql = mysqli_query($conn, "UPDATE signup  SET  Status = 'declined' WHERE username = '$entry'");
          echo"Account Successfully Declined!";
        }
	    table($result);  
 	 }
  }
  	elseif($labtype == "pcb-cra"){
	    $query = "SELECT * FROM signup WHERE labassign='pcb-cra' AND Request = 'yes'";
	    $result = mysqli_query($conn, $query);
	    if(isset($_POST['approve'])){
        $entry = $_POST["entry"];
        if($entry ==""){
          echo"Please Input The Details required!";
        }
        else{
        $sql = mysqli_query($conn, "UPDATE signup  SET  Status = 'accepted' WHERE username = '$entry'");
        echo"Account Successfully Accepted!";
        }
  		}
  		elseif(isset($_POST['disapprove'])){
        $entry = $_POST["entry"];
        if($entry ==""){
          echo"Please Input The Details required!";
        }
        else{
         $sql = mysqli_query($conn, "UPDATE signup  SET  Status = 'declined' WHERE username = '$entry'");
          echo"Account Successfully Declined!";
        }
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
                <td><?php echo$row['username'];?></td>
                <td><?php echo$row['labassign'];?></td>
                <td><?php echo$row['typeofaccount'];?></td>
                <td><?php echo$row['Status'];?></td>
                  <!---- IBUTANG LANG SULOD SA  QUOTATION ANG NAME SA RECORD NGA IDISPLAY--->
              </tr>
    </tbody>
    <?php 
    //END OF REQUEST APPROVAL
    		}
    	}
	}?>
  <form action="notification.php" method="post">
    <p>Enter username for Schedule request</p>
  <input type="text" name="entrysched"><br>
  <input type="submit" name="approveshced" value="approve">
  <input type="submit" name="disapprovesched" value="disapprove">
  
</form>
</div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col" class="bg-primary">No.</th>
      <th scope="col" class="bg-primary">User</th>
      <th scope="col" class="bg-primary">Role</th>
      <th scope="col"class="bg-primary">labassign</th>
       <th scope="col" class="bg-primary">Monday</th>
       <th scope="col" class="bg-primary">Tuesday</th>
       <th scope="col" class="bg-primary">Wednesday</th>
       <th scope="col" class="bg-primary">Thursday</th>
       <th scope="col" class="bg-primary">Friday</th>
       <th scope="col" class="bg-primary">Status</th>
      </tr>
    </thead>
    <?php
    //START OF REQUEST SCHEDULE
	function tablesched($result_sched){
      if($result_sched){
          foreach($result_sched as $row){
   ?>
   <tbody>
              <tr>
                <td><?php echo$row['No'];?></td>
                <td><?php echo$row['user'];?></td>
                <td><?php echo$row['role'];?></td>
                <td><?php echo$row['labassign'];?></td>
                <td><?php echo$row['Monday'];?></td>
                <td><?php echo$row['Tuesday'];?></td>
                <td><?php echo$row['Wednesday'];?></td>
                <td><?php echo$row['Thursday'];?></td>
                <td><?php echo$row['Friday'];?></td>
                <td><?php echo$row['Status'];?></td>
                  <!---- IBUTANG LANG SULOD SA  QUOTATION ANG NAME SA RECORD NGA IDISPLAY--->
              </tr>
    </tbody>
    <?php 
        }
      }
  }?>



  <?php
  $query_sched = "SELECT * FROM schedule";
  if($labtype == "dml"){
      $query_sched = "SELECT * FROM schedule WHERE labassign='dml' AND Request = 'yes'";
      $result_sched = mysqli_query($conn, $query_sched);
      if(isset($_POST['approveshced'])){
        $entrysched = $_POST["entrysched"];
        if($entrysched ==""){
          echo"Please Input The Details required!";
        }
        else{
        $sql = mysqli_query($conn, "UPDATE schedule  SET  Status = 'accepted' WHERE user = '$entrysched'");
        echo"Account Successfully Accepted!";
        }
      }
      elseif(isset($_POST['disapprovesched'])){
        $entrysched = $_POST["entrysched"];
        if($entrysched ==""){
          echo"Please Input The Details required!";
        }
        else{
         $sql = mysqli_query($conn, "UPDATE schedule  SET  Monday = '0',Tuesday = '0',Wednesday = '0',Thursday = '0',Friday = '0',Status = 'declined',Request =''  WHERE user = '$entrysched'");
          echo"Account Successfully Declined!";
        }
      }
      tablesched($result_sched);
  }
    if($labtype == "secn"){
      $query_sched = "SELECT * FROM schedule WHERE labassign ='secn' AND Request = 'yes'";
      $result_sched = mysqli_query($conn, $query_sched);
      if(isset($_POST['approveshced'])){
        $entrysched = $_POST["entrysched"];
        if($entrysched ==""){
          echo"Please Input The Details required!";
        }
        else{
        $sql = mysqli_query($conn, "UPDATE schedule  SET  Status = 'accepted' WHERE user = '$entrysched'");
        echo"Account Successfully Accepted!";
        }
      }
      elseif(isset($_POST['disapprovesched'])){
        $entrysched = $_POST["entrysched"];
        if($entrysched ==""){
          echo"Please Input The Details required!";
        }
        else{
         $sql = mysqli_query($conn, "UPDATE schedule  SET  Monday = '0',Tuesday = '0',Wednesday = '0',Thursday = '0',Friday = '0',Status = 'declined',Request =''  WHERE user = '$entrysched'");
          echo"Account Successfully Declined!";
        }
      
      }
      tablesched($result_sched);
    }
    if($labtype == "ceac-tc"){
      $query_sched = "SELECT * FROM schedule WHERE labassign='ceac-tc' AND Request = 'yes'";
      $result_sched = mysqli_query($conn, $query_sched);
      if(isset($_POST['approveshced'])){
        $entrysched = $_POST["entrysched"];
        if($entrysched ==""){
          echo"Please Input The Details required!";
        }
        else{
        $sql = mysqli_query($conn, "UPDATE schedule  SET  Status = 'accepted' WHERE user = '$entrysched'");
        echo"Account Successfully Accepted!";
        }
      }
      elseif(isset($_POST['disapprovesched'])){
        $entrysched = $_POST["entrysched"];
        if($entrysched ==""){
          echo"Please Input The Details required!";
        }
        else{
        $sql = mysqli_query($conn, "UPDATE schedule  SET  Monday = '0',Tuesday = '0',Wednesday = '0',Thursday = '0',Friday = '0',Status = 'declined',Request =''  WHERE user = '$entrysched'");
          echo"Account Successfully Declined!";
        }
      
      }
      tablesched($result_sched);
    }if($labtype == "ncr"){
      $query_sched = "SELECT * FROM schedule WHERE labassign='ncr' AND Request = 'yes'";
      $result_sched = mysqli_query($conn, $query_sched);
      if(isset($_POST['approveshced'])){
        $entrysched = $_POST["entrysched"];
        if($entrysched ==""){
          echo"Please Input The Details required!";
        }
        else{
        $sql = mysqli_query($conn, "UPDATE schedule  SET  Status = 'accepted' WHERE user = '$entrysched'");
        echo"Account Successfully Accepted!";
        }
      }
      elseif(isset($_POST['disapprovesched'])){
        $entrysched = $_POST["entrysched"];
        if($entrysched ==""){
          echo"Please Input The Details required!";
        }
        else{
         $sql = mysqli_query($conn, "UPDATE schedule  SET  Monday = '0',Tuesday = '0',Wednesday = '0',Thursday = '0',Friday = '0',Status = 'declined',Request =''  WHERE user = '$entrysched'");
          echo"Account Successfully Declined!";
        }
      
      }
      tablesched($result_sched);
    }
    if($labtype == "pcb-cra"){
      $query_sched = "SELECT * FROM schedule WHERE labassign='pcb-cra' AND Request = 'yes'";
      $result_sched = mysqli_query($conn, $query_sched);
      if(isset($_POST['approveshced'])){
        $entrysched = $_POST["entrysched"];
        if($entrysched ==""){
          echo"Please Input The Details required!";
        }
        else{
        $sql = mysqli_query($conn, "UPDATE schedule  SET  Status = 'accepted' WHERE user = '$entrysched'");
        echo"Account Successfully Accepted!";
        }
      }
      elseif(isset($_POST['disapprovesched'])){
        $entrysched = $_POST["entrysched"];
        if($entrysched ==""){
          echo"Please Input The Details required!";
        }
        else{
          $sql = mysqli_query($conn, "UPDATE schedule  SET  Monday = '0',Tuesday = '0',Wednesday = '0',Thursday = '0',Friday = '0',Status = 'declined',Request =''  WHERE user = '$entrysched'");
          echo"Account Successfully Declined!";
        }
      
      }
      tablesched($result_sched);
    }

      //END OF REQUEST SCHEDULE
	 ?>
</body>
</html>