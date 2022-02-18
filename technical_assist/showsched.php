<?php
session_start();

?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="updatestyle.css">
    <title>Show Schedule</title>
    </head>

    <body>

        <form action = "showsched.php" method = "post">
          <h1>Schedule</h1>
   <button type="submit" class="btn btn-primary" name="attendance">Show Schedule</button><br><br>
   <button type="submit" class="btn btn-primary" name="compare">Compare Schedule</button>
    <button type="submit" class="btn btn-primary" name="back">Back to Homepage</button><br><br>

</form>

<?php


  
if(isset($_POST['attendance'])) {
    display();
}

if(isset($_POST['compare'])) {
    displaycompare();
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


        $query ="SELECT * FROM schedule WHERE user = '$username' && labassign = '$labtype'"; 
     
      echo "<table border='1' width='100%' cellpadding='10' cellspacing='0'>";
      echo "<br/><tr><th>Username</th><th>Lab</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><tr>";
      echo"<center><h2>$username Schedule</h2></center>";

      if($result= mysqli_query($conn, $query)){
        while ($row = mysqli_fetch_assoc($result)){
          echo "<tr alight=center><td allign=center>".$row['user']."</td>";
          echo "<td align=center>".$row['labassign']."</td>";
          echo "<td align=center>".$row['Monday']."</td>";
          echo "<td align=center>".$row['Tuesday']."</td>";
          echo "<td align=center>".$row['Wednesday']."</td>";
          echo "<td align=center>".$row['Thursday']."</td>";
          echo "<td align=center>".$row['Friday']."</td>";
       
        }
      }

      mysqli_close($conn);
    }


    function displaycompare(){//BEGINNING OF DISPLAY

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


        $query ="SELECT * FROM schedule WHERE labassign = '$labtype'"; 
     
      echo "<table border='1' width='100%' cellpadding='10' cellspacing='0'>";
      echo "<br/><tr><th>Username</th><th>Lab</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><tr>";
      echo"<center><h2>$username Schedule</h2></center>";

      if($result= mysqli_query($conn, $query)){
        while ($row = mysqli_fetch_assoc($result)){
          echo "<tr alight=center><td allign=center>".$row['user']."</td>";
          echo "<td align=center>".$row['labassign']."</td>";
          echo "<td align=center>".$row['Monday']."</td>";
          echo "<td align=center>".$row['Tuesday']."</td>";
          echo "<td align=center>".$row['Wednesday']."</td>";
          echo "<td align=center>".$row['Thursday']."</td>";
          echo "<td align=center>".$row['Friday']."</td>";
       
        }
      }

      mysqli_close($conn);
    }



?>

           
</body>
</html>