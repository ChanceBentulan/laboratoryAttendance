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

        <form action = "checkinfoTA.php" method = "post">
          <h1>Information</h1>
   <button type="submit" class="btn btn-primary" name="info">Display Info</button>
       <button type="submit" class="btn btn-primary" name="back">Back To Homepage</button><br><br>


</form>

<?php


  
if(isset($_POST['info'])) {
    display();
}
  elseif(isset($_POST['back'])) {
        header("Location:tech_homepage.php");
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
        $username=$_SESSION['username'];
        $query = "SELECT * FROM signup WHERE username = '$username'";
        $result = mysqli_query($conn, $query);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        $labtype = $row['labassign'];
        $account = $row['typeofaccount'];
        $password = $row['password'];
     
      echo "<table border='1' width='150%' cellpadding='20' cellspacing='10'>";
      echo "<br/><tr><th>Last Name</th><th>First Name</th><th>Middle Name</th><th>Birthdate</th><th>Course</th><th>Grad Year</th><th>School</th><tr>";

      if($labtype == "ceac-tc"){
          $query ="SELECT * FROM ceac_tc WHERE username = '$username'"; 

          if($result= mysqli_query($conn, $query)){
          while ($row = mysqli_fetch_assoc($result)){
          echo "<tr alight=center><td allign=center>".$row['lastname']."</td>";
          echo "<td align=center>".$row['firstname']."</td>";
          echo "<td align=center>".$row['middlename']."</td>";
          echo "<td align=center>".$row['birthdate']."</td>";
          echo "<td align=center>".$row['course']."</td>";
          echo "<td align=center>".$row['gradyear']."</td>";
          echo "<td align=center>".$row['school']."</td>";

          
        }
      }
      }

      if($labtype == "ncr"){
          $query ="SELECT * FROM ncr_tc WHERE username = '$username'"; 

          if($result= mysqli_query($conn, $query)){
          while ($row = mysqli_fetch_assoc($result)){
          echo "<tr alight=center><td allign=center>".$row['lastname']."</td>";
          echo "<td align=center>".$row['firstname']."</td>";
          echo "<td align=center>".$row['middlename']."</td>";
          echo "<td align=center>".$row['birthdate']."</td>";
          echo "<td align=center>".$row['course']."</td>";
          echo "<td align=center>".$row['gradyear']."</td>";
          echo "<td align=center>".$row['school']."</td>";
          
        }
      }
      }


      if($labtype == "dml"){
          $query ="SELECT * FROM dml_tc WHERE username = '$username'"; 

          if($result= mysqli_query($conn, $query)){
          while ($row = mysqli_fetch_assoc($result)){
          echo "<tr alight=center><td allign=center>".$row['lastname']."</td>";
          echo "<td align=center>".$row['firstname']."</td>";
          echo "<td align=center>".$row['middlename']."</td>";
          echo "<td align=center>".$row['birthdate']."</td>";
          echo "<td align=center>".$row['course']."</td>";
          echo "<td align=center>".$row['gradyear']."</td>";
          echo "<td align=center>".$row['school']."</td>";
          
        }
      }
      }

      if($labtype == "secn"){
          $query ="SELECT * FROM secn_tc WHERE username = '$username'"; 

          if($result= mysqli_query($conn, $query)){
          while ($row = mysqli_fetch_assoc($result)){
          echo "<tr alight=center><td allign=center>".$row['lastname']."</td>";
          echo "<td align=center>".$row['firstname']."</td>";
          echo "<td align=center>".$row['middlename']."</td>";
          echo "<td align=center>".$row['birthdate']."</td>";
          echo "<td align=center>".$row['course']."</td>";
          echo "<td align=center>".$row['gradyear']."</td>";
          echo "<td align=center>".$row['school']."</td>";
          
        }
      }
      }


      if($labtype == "pcb-cra"){
          $query ="SELECT * FROM pcb_tc WHERE username = '$username'"; 

          if($result= mysqli_query($conn, $query)){
          while ($row = mysqli_fetch_assoc($result)){
          echo "<tr alight=center><td allign=center>".$row['lastname']."</td>";
          echo "<td align=center>".$row['firstname']."</td>";
          echo "<td align=center>".$row['middlename']."</td>";
          echo "<td align=center>".$row['birthdate']."</td>";
          echo "<td align=center>".$row['course']."</td>";
          echo "<td align=center>".$row['gradyear']."</td>";
          echo "<td align=center>".$row['school']."</td>";
          
        }
      }
      }

      

      mysqli_close($conn);
    }



?>

           
</body>
</html>