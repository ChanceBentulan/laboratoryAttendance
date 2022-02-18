<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="updatestyle.css">
    <title>Create Officer</title>
    </head>

    <body>
        
         <form action = "updateofficerpass.php" method = "post">
            <h1>Update Password Officer</h1>
  <div class="form-group">
    <label for="exampleInputUser1">Username (required)</label>
    <input type="text" class="form-control" name="user" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleInputUser1">Old Password (required)</label>
    <input type="password" class="form-control" name="oldpass" placeholder="Old Password">
  </div>
  <div class="form-group">
    <label for="exampleInputUser1">New Password</label>
    <input type="password" class="form-control" name="newpass" placeholder="New Password">
  </div>
  <button type="submit" class="btn btn-primary" name="updatepass">Update Password</button>
  <button type="submit" class="btn btn-primary" name="BackHome">Back to Homepage</button>
  </form>


<?php
  
  if(isset($_POST['updatepass'])) {
      createofficer($_POST["oldpass"], $_POST["newpass"], $_POST["user"]);
    }
  elseif(isset($_POST['BackHome'])){
      header("Location:officer_homepage.php"); 
      exit();
  }
    function createofficer($oldpass, $newpass, $user){

        session_start();
        define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
        define('DB_USERNAME','cpe7520');
        define('DB_PASSWORD','P@ssw0rd!');
        define('DB_NAME','cpe7520');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        if(!$conn){
          die("Connection Unsuccessful:".mysqli_connect_error());
        }     
      $oldpass=md5($oldpass);
      $newpassword=md5($newpass);
      $sql=mysqli_query($conn,"SELECT password FROM signup WHERE password='$oldpass' && username='$user'");
      $num=mysqli_fetch_array($sql);
      if($num>0){
        $query=mysqli_query($conn,"UPDATE signup SET password='$newpassword' WHERE username='$user'");
        $_SESSION['msg1']="Password Changed Successfully !!";
        mysqli_query($conn,$query);
        mysqli_close($conn);
      }
      else{
        $_SESSION['msg1']="Password/Email do not match!";
      }



    }

?>

           
</body>
</html>