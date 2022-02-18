<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="updatestyle.css">
    <title>Update Technical</title>
    </head>

    <body>
        
         <form action = "updatetechnicalassistant.php" method = "post">
            <h2>Update Technical Assistant</h2>
            <div class="form-group">
    <label>Profile Picture</label>
    <input type="file" name="profile">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" name="lname" placeholder="Last Name">
    <button type="submit" class="btn btn-primary" name="insertlastname">Edit Last Name</button>
  </div>
    <div class="form-group">  
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" name="fname" placeholder="First Name">
    <button type="submit" class="btn btn-primary" name="insertfirstname">Edit First Name</button>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Middle Name</label>
    <input type="text" class="form-control" name="mname" placeholder="Middle Name">
    <button type="submit" class="btn btn-primary" name="insertmiddlename">Edit Middle Name</button>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Education</label>
    <input type="text" class="form-control" name="course" placeholder="Course"><br>
    <input type="text" class="form-control" name="year" placeholder="Year Graduated"><br>
        <input type="text" class="form-control" name="school" placeholder="School Attended">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Birthdate</label>
    <input type="text" class="form-control" name="birth" placeholder="mm/dd/yyyy">
  </div>
  <button type="submit" class="btn btn-primary" name="update">Update</button>
  <button type="submit" class="btn btn-primary" name="back">Back To Homepage</button>
</form>


<?php
  
  if(isset($_POST['update'])) {
      update($_POST["lname"], $_POST["fname"], $_POST["mname"], $_POST["course"], $_POST["year"], $_POST["school"], $_POST["birth"]);
    }

      elseif(isset($_POST['insertlastname'])){
    insertlastname($_POST["lname"]);
  }

   elseif(isset($_POST['insertfirstname'])){
    insertfirstname($_POST["fname"]);
  }

   elseif(isset($_POST['insertmiddlename'])){
    insertmiddlename($_POST["mname"]);
  }
  elseif(isset($_POST['back'])) {
        header("Location:tech_homepage.php");
    }

    function update($lastname,$firstname,$middlename,$course,$year,$school,$birthdate){

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
      if ($labtype == "ceac-tc"){         
          $query ="INSERT INTO ceac_tc(firstname,middlename,lastname,birthdate,course, gradyear, school,username,password,accounttype) VALUES ('$firstname','$middlename','$lastname','$birthdate','$course','$year','$school','$username','$password','$account')";
                        echo"<br>";
                    echo"Sign-Up Successfull! <br>";
        mysqli_query($conn,$query);

      }
      if ($labtype == "ncr"){
         
          $query ="INSERT INTO ncr_tc(firstname,middlename,lastname,birthdate,course, gradyear, school,username,password,accounttype) VALUES ('$firstname','$middlename','$lastname','$birthdate','$course','$year','$school','$username','$password','$account')";
                        echo"<br>";
                    echo"Sign-Up Successfull! <br>";
        mysqli_query($conn,$query);

      }
      if ($labtype == "secn"){
         
          $query ="INSERT INTO secn_tc(firstname,middlename,lastname,birthdate,course, gradyear, school,username,password,accounttype) VALUES ('$firstname','$middlename','$lastname','$birthdate','$course','$year','$school','$username','$password','$account')";  
                              echo"<br>";
                    echo"Sign-Up Successfull! <br>";
        mysqli_query($conn,$query);
      }
      if ($labtype == "dml"){
         
          $query ="INSERT INTO dml_tc(firstname,middlename,lastname,birthdate,course, gradyear, school,username,password,accounttype) VALUES ('$firstname','$middlename','$lastname','$birthdate','$course','$year','$school','$username','$password','$account')";
                        echo"<br>";
                    echo"Sign-Up Successfull! <br>";
        mysqli_query($conn,$query);
      }
      if ($labtype == "pcb-cra"){
         
          $query ="INSERT INTO pcb_tc(firstname,middlename,lastname,birthdate,course, gradyear, school,username,password,accounttype) VALUES ('$firstname','$middlename','$lastname','$birthdate','$course','$year','$school','$username','$password','$account')";
                        echo"<br>";
                    echo"Sign-Up Successfull! <br>";
        mysqli_query($conn,$query);

      }    
      mysqli_close($conn);

    }


        function insertlastname($lastname){
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


        if ($labtype == "ceac-tc"){

          $query = "UPDATE ceac_tc SET lastname = '$lastname' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }

       if ($labtype == "ncr"){

          $query = "UPDATE ncr_tc SET lastname = '$lastname' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }


       if ($labtype == "secn"){

          $query = "UPDATE secn_tc SET lastname = '$lastname' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }


       if ($labtype == "dml"){

          $query = "UPDATE dml_tc SET lastname = '$lastname' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }


       if ($labtype == "pcb-cra"){

          $query = "UPDATE pcb_tc SET lastname = '$lastname' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }



    }



    function insertfirstname($firstname){
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


        if ($labtype == "ceac-tc"){

          $query = "UPDATE ceac_tc SET firstname = '$firstname' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }

       if ($labtype == "ncr"){

          $query = "UPDATE ncr_tc SET firstname = '$firstname' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }


       if ($labtype == "secn"){

          $query = "UPDATE secn_tc SET firstname = '$firstname' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }


       if ($labtype == "dml"){

          $query = "UPDATE dml_tc SET firstname = '$firstname' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }


       if ($labtype == "pcb-cra"){

          $query = "UPDATE pcb_tc SET firstname = '$firstname' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }



    }



          function insertmiddlename($middlename){
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


        if ($labtype == "ceac-tc"){

          $query = "UPDATE ceac_tc SET middlename = '$middlename' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }

       if ($labtype == "ncr"){

          $query = "UPDATE ncr_tc SET middlename = '$middlename' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }


       if ($labtype == "secn"){

          $query = "UPDATE secn_tc SET middlename = '$middlename' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }


       if ($labtype == "dml"){

          $query = "UPDATE dml_tc SET middlename = '$middlename' WHERE username = '$username'";
          mysqli_query($conn,$query);

      }


       if ($labtype == "pcb-cra"){

          $query = "UPDATE pcb_tc SET middlename = '$middlename' WHERE username = '$username'";
          mysqli_query($conn,$query);

    }

  }


?>

           
</body>
</html>