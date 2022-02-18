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
    <title>Add Account/s</title>
    </head>

    <body>
        
         <form action = "addaccounts.php" method = "post">
            <h1>Add Account/s</h1>
            <div class="form-group">
    <label>Profile Picture</label>
    <input type="file" name="profile">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="usernameta" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" name="passwordta" placeholder="Password">
  </div>


  <button type="submit" class="btn btn-primary" name="addta">Add Technical Assistant</button><br><br>


  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary" name="addstudent">Add Student</button><br><br>
  <button type="submit" class="btn btn-primary" name="back">Back To Homepage</button>
</form>


<?php
  
  if(isset($_POST['addta'])) {
      addta($conn,$_POST["usernameta"], $_POST["passwordta"],$labtype);
    }

  elseif(isset($_POST['addstudent'])) {
      addstudent($conn,$_POST["username"], $_POST["password"],$labtype);
    }
  elseif(isset($_POST['back'])) {
        header("Location:officer_homepage.php");
    }

    function addta($conn,$username, $password,$labtype){
      $password = md5($password);
      if ($labtype == "ceac-tc"){         

          $query ="INSERT INTO signup(No,username, password,labassign,typeofaccount) VALUES (NULL,'$username','$password','ceac-tc','technical_assist')";
           echo"<br>";
          echo"Add $username Successfull! <br>";
          mysqli_query($conn,$query);

      }

      if ($labtype== "ncr"){
         
          $query ="INSERT INTO signup(No,username, password,labassign,typeofaccount) VALUES (NULL,'$username','$password','ncr','technical_assist')";
           echo"<br>";
          echo"Add $username Successfull! <br>";
          mysqli_query($conn,$query);

      }
      if ($labtype == "secn"){
         
          $query ="INSERT INTO signup(No,username, password,labassign,typeofaccount) VALUES (NULL,'$username','$password','secn','technical_assist')";
           echo"<br>";
          echo"Add $username Successfull! <br>";
          mysqli_query($conn,$query);
      }

      if ($labtype == "dml"){
         
          $query ="INSERT INTO signup(No,username, password,labassign,typeofaccount) VALUES (NULL,'$username','$password','dml','technical_assist')";
           echo"<br>";
          echo"Add $username Successfull! <br>";
          mysqli_query($conn,$query);
      }
      if ($labtype == "pcb-cra"){
         
          $query ="INSERT INTO signup(No,username, password,labassign,typeofaccount) VALUES (NULL,'$username','$password','pcb-cra','technical_assist')";
           echo"<br>";
          echo"Add $username Successfull! <br>";
          mysqli_query($conn,$query);

      }    
      mysqli_close($conn);

    }



    function addstudent($conn,$username, $password,$labtype){
      $password = md5($password);
       if ($labtype == "ceac-tc"){         

          $query ="INSERT INTO signup(No,username, password,labassign,typeofaccount) VALUES (NULL,'$username','$password','ceac-tc','student')";
           echo"<br>";
          echo"Add $username Successfull! <br>";
          mysqli_query($conn,$query);

      }

      if ($labtype == "ncr"){
         
           $query ="INSERT INTO signup(No,username, password,labassign,typeofaccount) VALUES (NULL,'$username','$password','ncr','student')";
           echo"<br>";
          echo"Add $username Successfull! <br>";
          mysqli_query($conn,$query);

      }
      if ($labtype == "secn"){
          $query ="INSERT INTO signup(No,username, password,labassign,typeofaccount) VALUES (NULL,'$username','$password','secn','student')";
           echo"<br>";
          echo"Add $username Successfull! <br>";
          mysqli_query($conn,$query);
      }

      if ($labtype == "dml"){
         
          $query ="INSERT INTO signup(No,username, password,labassign,typeofaccount) VALUES (NULL,'$username','$password','dml','student')";
           echo"<br>";
          echo"Add $username Successfull! <br>";
          mysqli_query($conn,$query);
      }
      if ($labtype == "pcb-cra"){
         
          $query ="INSERT INTO signup(No,username, password,labassign,typeofaccount) VALUES (NULL,'$username','$password','pcb-cra','student')";
           echo"<br>";
          echo"Add $username Successfull! <br>";
          mysqli_query($conn,$query);

      }    
      mysqli_close($conn);

    }


?>

           
</body>
</html>