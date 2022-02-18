<html xmlns="http://www.w3.org/1999/xhtml">
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
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="updatestyle.css">
    <title>Create Officer</title>
    </head>

    <body>
        
         <form action = "createofficer.php" method = "post">
            <h1>Create Officer</h1>
      <h5>Laboratory Assigned</h5>
        <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="lab" value="ceac-tc">
    <label class="form-check-label" for="ceac">CEAC-TC</label>
            </div>
        <div>
            <input class="form-check-input" type="radio" name="lab" value="dml">
    <label class="form-check-label" for="dml">DML</label>
            </div>
        <div>
            <input class="form-check-input" type="radio" name="lab"value="secn">
    <label class="form-check-label" for="secn">SECN</label>
            </div>
        <div>
            <input class="form-check-input" type="radio" name="lab" value="ncr">
    <label class="form-check-label" for="ncr">NCR</label>
            </div>
        <div>
            <input class="form-check-input" type="radio" name="lab" value="pcb-cra">
    <label class="form-check-label" for="pcb">PCB-CRA</label>
            </div>
        <br>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
    <div class="form-group">  
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary" name="create">Create Officer</button>
  <button type="submit" class="btn btn-primary" name="back">Back To Manage Accounts</button>
  </form>


<?php
  
  if(isset($_POST['create'])) {
      createofficer($conn,$_POST["lab"], $_POST["username"], $_POST["password"]);
    }
  elseif(isset($_POST['back'])) {
      header("Location:ManageAcc.php");
    }

    function createofficer($conn,$lab, $username, $password){ 
      if(isset($_POST['lab'])){
        $username = $_POST["username"];
        $password=md5($password);
        $labAssign = $_POST["lab"];
        $query ="INSERT INTO signup(No, username, password,labassign,typeofaccount) VALUES (NULL,'$username','$password','$lab','officer')";
        echo"Officer Account Successfully Created!";
        mysqli_query($conn,$query);
        mysqli_close($conn);
      }
      else{
        echo"Pls input the Laboratory assigned!<br>";     
          }

    }


?>

           
</body>
</html>