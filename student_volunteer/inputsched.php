<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="updatestyle.css">
    <title>Update Student Volunteer</title>
    </head>

    <body>

        <form action = "inputsched.php" method = "post">
            <h1>Input Schedule (in hours)</h1>
            
  <div class="form-group">
    <label for="exampleInputEmail1">Total Hours for Monday</label>
    <input type="number" class="form-control" name="Monhours" placeholder="ie. 1">
    <label for="exampleInputEmail1">Total Hours for Tuesday</label>
    <input type="number" class="form-control" name="Tuehours" placeholder="ie. 1">
    <label for="exampleInputEmail1">Total Hours for Wednesday</label>
    <input type="number" class="form-control" name="Wedhours" placeholder="ie. 1">
    <label for="exampleInputEmail1">Total Hours for Thursday</label>
    <input type="number" class="form-control" name="Thurhours" placeholder="ie. 1">
    <label for="exampleInputEmail1">Total Hours for Friday</label>
    <input type="number" class="form-control" name="Frihours" placeholder="ie. 1">
    <button type="submit" class="btn btn-primary" name="add">Add Hours</button>
    <button type="submit" class="btn btn-primary" name="update">Update Hours</button>

    <button type="submit" class="btn btn-primary" name="back">Back To Homepage</button>
  </div>

</form>



<?php
  
  if(isset($_POST['update'])) {
      update();
    }
  elseif(isset($_POST['add'])) {
      add();
    }
  elseif(isset($_POST['back'])) {
        header("Location:student_homepage.php");
    }

    function update(){

        define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
        define('DB_USERNAME','cpe7520');
        define('DB_PASSWORD','P@ssw0rd!');
        define('DB_NAME','cpe7520');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        if(!$conn){
          die("Connection Unsuccessful:".mysqli_connect_error());
        }
        $mon = $_POST['Monhours'];
        $tues = $_POST['Tuehours'];
        $wed = $_POST['Wedhours'];
        $thur = $_POST['Thurhours'];
        $fri = $_POST['Frihours'];
        $username=$_SESSION['username'];
        $query = "SELECT * FROM signup WHERE username = '$username'";
        $result = mysqli_query($conn, $query);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        $labtype = $row['labassign'];
        $account = $row['typeofaccount'];



          $query ="UPDATE schedule SET user='$username',role='$account',labassign='$labtype',Monday = '$mon',Tuesday='$tues',Wednesday='$wed',Thursday='$thur',Friday='$fri', Request = 'yes' WHERE user = '$username'";
                        echo"<br>";
                    echo"Update Schedule Successfull! <br>";
        mysqli_query($conn,$query);

      
      mysqli_close($conn);

    }
        function add(){

        define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
        define('DB_USERNAME','cpe7520');
        define('DB_PASSWORD','P@ssw0rd!');
        define('DB_NAME','cpe7520');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        if(!$conn){
          die("Connection Unsuccessful:".mysqli_connect_error());
        }
        $mon = $_POST['Monhours'];
        $tues = $_POST['Tuehours'];
        $wed = $_POST['Wedhours'];
        $thur = $_POST['Thurhours'];
        $fri = $_POST['Frihours'];
        $username=$_SESSION['username'];
        $query = "SELECT * FROM signup WHERE username = '$username'";
        $query_sched = "SELECT * FROM schedule WHERE user = '$username'";
        $result = mysqli_query($conn, $query);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        $labtype = $row['labassign'];
        $account = $row['typeofaccount'];
        $sql=mysqli_query($conn,"INSERT INTO schedule(user,role,labassign,Monday,Tuesday,Wednesday,Thursday,Friday) VALUES ('$username','$account','$labtype','$mon','$tues','$wed','$thur','$fri')");
        $query = "UPDATE schedule SET Request = 'yes' WHERE user = '$username'";
        echo"<br>";
        echo"Schedule Successfull Added! <br>";
        mysqli_query($conn,$query);

      
      mysqli_close($conn);

    }


   
   


?>

           
</body>
</html>