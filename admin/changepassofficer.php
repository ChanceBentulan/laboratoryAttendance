<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="updatestyle.css">
    <title>Change Password Officer</title>
    </head>

    <body>
        
         <form action = "changepassofficer.php" method = "post">
            <h1>Change Password</h1>

  <div class="form-group">
    <label for="exampleInputEmail1">Change Password (CEAC-TC)</label>
    
     <input type="text" class="form-control" name="passwordceac" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary" name="ceac">Change Password CEAC-TC</button><br><br>

   <div class="form-group">
    <label for="exampleInputEmail1">Change Password (NCR)</label>
    
     <input type="text" class="form-control" name="passwordncr" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary" name="ncr">Change Password NCR</button><br><br>

   <div class="form-group">
    <label for="exampleInputEmail1">Change Password (DML)</label>
    
     <input type="text" class="form-control" name="passworddml" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary" name="dml">Change Password DML</button><br><br>

   <div class="form-group">
    <label for="exampleInputEmail1">Change Password (SECN)</label>
   
     <input type="text" class="form-control" name="passwordsecn" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary" name="secn">Change Password SECN</button><br><br>

   <div class="form-group">
    <label for="exampleInputEmail1">Change Password (PCB-CRA)</label>
  
     <input type="text" class="form-control" name="passwordpcb" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary" name="pcb">Change Password PCB-CRA</button><br><br>

  <button type="submit" class="btn btn-primary" name="back">Back To Manage Accounts</button>
</form>


<?php
  
  if(isset($_POST['ceac'])) {
      ceac($_POST["passwordceac"]);
    }

  elseif(isset($_POST['ncr'])) {
      ncr($_POST["passwordncr"]);
    }

elseif(isset($_POST['dml'])) {
      dml($_POST["passworddml"]);
    }

    elseif(isset($_POST['secn'])) {
      secn($_POST["passwordsecn"]);
    }

    elseif(isset($_POST['pcb'])) {
      pcb($_POST["passwordpcb"]);
    }

  elseif(isset($_POST['back'])) {
        header("Location:ManageAcc.php");
    }



    function ceac($password){
      $password  = md5($password);
		 define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
        define('DB_USERNAME','cpe7520');
        define('DB_PASSWORD','P@ssw0rd!');
        define('DB_NAME','cpe7520');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        if(!$conn){
          die("Connection Unsuccessful:".mysqli_connect_error());
        }


           $query ="UPDATE signup SET password = '$password' WHERE labassign = 'ceac-tc' && typeofaccount = 'officer'";
           echo"<br>";
          echo"Change Pass Successfull! <br>";

           mysqli_query($conn,$query);

  
    }


    function ncr($password){
      $password  = md5($password);
     define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
        define('DB_USERNAME','cpe7520');
        define('DB_PASSWORD','P@ssw0rd!');
        define('DB_NAME','cpe7520');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        if(!$conn){
          die("Connection Unsuccessful:".mysqli_connect_error());
        }


           $query ="UPDATE signup SET password = '$password' WHERE labassign = 'ncr' && typeofaccount = 'officer'";
           echo"<br>";
          echo"Change Pass Successfull! <br>";

           mysqli_query($conn,$query);

  
    }


    function dml($password){
      $password  = md5($password);
     define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
        define('DB_USERNAME','cpe7520');
        define('DB_PASSWORD','P@ssw0rd!');
        define('DB_NAME','cpe7520');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        if(!$conn){
          die("Connection Unsuccessful:".mysqli_connect_error());
        }


           $query ="UPDATE signup SET password = '$password' WHERE labassign = 'dml' && typeofaccount = 'officer'";
           echo"<br>";
          echo"Change Pass Successfull! <br>";

           mysqli_query($conn,$query);

  
    }


    function secn($password){
      $password  = md5($password);
     define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
        define('DB_USERNAME','cpe7520');
        define('DB_PASSWORD','P@ssw0rd!');
        define('DB_NAME','cpe7520');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        if(!$conn){
          die("Connection Unsuccessful:".mysqli_connect_error());
        }


           $query ="UPDATE signup SET password = '$password' WHERE labassign = 'secn' && typeofaccount = 'officer'";
           echo"<br>";
          echo"Change Pass Successfull! <br>";

           mysqli_query($conn,$query);

  
    }



    function pcb($password){
      $password  = md5($password);
     define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
        define('DB_USERNAME','cpe7520');
        define('DB_PASSWORD','P@ssw0rd!');
        define('DB_NAME','cpe7520');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        if(!$conn){
          die("Connection Unsuccessful:".mysqli_connect_error());
        }


           $query ="UPDATE signup SET password = '$password' WHERE labassign = 'pcb' && typeofaccount = 'officer'";
           echo"<br>";
          echo"Change Pass Successfull! <br>";

           mysqli_query($conn,$query);

  
    }






    


?>

           
</body>
</html>