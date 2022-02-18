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
$labtype=$_SESSION['labtype'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="updatestyle.css">
    <title>Delete Accounts</title>
    </head>

    <body>
        
         <form action = "deleteaccounts.php" method = "post">
            <h1>Delete Accounts Under <?php echo"<strong>$labtype</strong>";?></h1>
            
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="userta" placeholder="username">
  </div>
  <button type="submit" class="btn btn-primary" name="deleteta">Delete Technical Assistant</button><br><br>


  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="userstud" placeholder="Username">
  </div>
  <button type="submit" class="btn btn-primary" name="deletestudent">Delete Student</button><br><br>

  <button type="submit" class="btn btn-primary" name="back">Back To Homepage</button>
</form>


<?php
  
  if(isset($_POST['deleteta'])) {
      deleteta($conn,$_POST["userta"],$labtype);
    }

  elseif(isset($_POST['deletestudent'])) {
      deletestudent($conn,$_POST["userstud"],$labtype);
    }
  elseif(isset($_POST['back'])) {
        header("Location:officer_homepage.php");
    }

    function deleteta($conn,$userta, $labtype){

      if ($labtype == "ceac-tc"){         

          $query ="DELETE FROM signup WHERE username = '$userta' AND typeofaccount='technical_assist'";
          echo"Deleted Account: $userta Successfull! <br>";
           mysqli_query($conn,$query);

      }

      if ($labtype == "ncr"){
         
          $query ="DELETE FROM signup WHERE username = '$userta' AND typeofaccount='technical_assist'";
                        echo"<br>";
          echo"Deleted Account: $userta Successfull!  <br>";
          mysqli_query($conn,$query);

      }
      if ($labtype == "secn"){
         
         $query ="DELETE FROM signup WHERE username = '$userta' AND typeofaccount='technical_assist'";
                        echo"<br>";
          echo"Deleted Account: $userta Successfull!  <br>";
        mysqli_query($conn,$query);
      }

      if ($labtype == "dml"){
         
        $query ="DELETE FROM signup WHERE username = '$userta' AND typeofaccount='technical_assist'";
                        echo"<br>";
          echo"Deleted Account: $userta Successfull!  <br>";
        mysqli_query($conn,$query);
      }
      if ($labtype == "pcb-cra"){
         
          $query ="DELETE FROM signup WHERE username = '$userta' AND typeofaccount='technical_assist'";
                        echo"<br>";
          echo"Deleted Account: $userta Successfull!  <br>";
        mysqli_query($conn,$query);

      }    
      mysqli_close($conn);

    }



    function deletestudent($conn,$userstud, $labtype){

      if ($labtype == "ceac-tc"){         

          $query ="DELETE FROM signup WHERE username = $'userstud' AND typeofaccount='student'";
          echo"Deleted Account: $userstud Successfull!<br> ";
           mysqli_query($conn,$query);

      }

      if ($labtype == "ncr"){
         
          $query ="DELETE FROM signup WHERE username = '$userstud' AND typeofaccount='student'";
                        echo"<br>";
          echo"Deleted Account: $userstud Successfull!<br>";
          mysqli_query($conn,$query);

      }
      if ($labtype == "secn"){
         
         $query ="DELETE FROM signup WHERE username = '$userstud' AND typeofaccount='student'";
                        echo"<br>";
          echo"Deleted Account: $userstud Successfull!<br>";
        mysqli_query($conn,$query);
      }

      if ($labtype == "dml"){
         
        $query ="DELETE FROM signup WHERE username = '$userstud' AND typeofaccount='student'";
                        echo"<br>";
          echo"Deleted Account: $userstud Successfull!<br>";
        mysqli_query($conn,$query);
      }
      if ($labtype == "pcb-cra"){
         
          $query ="DELETE FROM signup WHERE username = '$userstud' AND typeofaccount='student'";
                        echo"<br>";
          echo"Deleted Account: $userstud Successfull!<br>";
        mysqli_query($conn,$query);

      }    
      mysqli_close($conn);

    }


?>

           
</body>
</html>