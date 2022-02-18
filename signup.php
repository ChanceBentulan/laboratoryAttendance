<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="loginstyle.css">
<!------ Include the above in your HEAD tag ---------->
    <title></title>
    </head>
    <body>
        

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.0-9/40110097_1874047352649556_2771589700878598144_o.png?_nc_cat=101&_nc_sid=09cbfe&_nc_ohc=5rDo0p99rwMAX8fEgW4&_nc_ht=scontent.fceb2-1.fna&oh=7d294589575470d9bb7658fd2966e075&oe=5F387968" id="icon" alt="User Icon" />
    </div>

    <!-- SignUp Form -->
    <form action="signup.php" method="post">
        <h3>Sign Up</h3>
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
        <div>
            <br>
            </div>
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
        <h5>Type of Account</h5>
        <p>Check only one</p>
         <div class="form-check">
        <input class="form-check-input" type="radio" value="tech" name="role">
        <label class="form-check-label" for="defaultCheck1">Technical Assistant </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" value="stud" name="role">
        <label class="form-check-label" for="defaultCheck1">Student Volunteer</label>
        </div>
        <br>
      <input type="submit" class="fadeIn fourth" value="Sign Up" name="sign_up">
      <?php
        define('DB_SERVER','cpe7520.db.11808498.952.hostedresource.net');
        define('DB_USERNAME','cpe7520');
        define('DB_PASSWORD','P@ssw0rd!');
        define('DB_NAME','cpe7520');
        $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
        if(!$conn){
          die("Connection Unsuccessful:".mysqli_connect_error());
        }
        $query = "SELECT * FROM signup";
        if($result=mysqli_query($conn,$query)){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);
            $usertype = $row['typeofaccount'];
            $user = $row['username'];
            $lab = $row['labassign'];
          if(isset($_POST['sign_up'])){
                if(isset($_POST['role']) && $_POST['role'] == 'tech'){
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $password = md5($password); 
                    //check if username exists
                    $sql = "SELECT * FROM signup WHERE username = '".$username."'";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>=1)
                       {
                        echo "<br> Username Already Taken!";
                       }
                     else
                        { 
                    if(isset($_POST['lab'])){
                        $acctype = "technical_assist";
                        $labAssign = $_POST["lab"];
                        $query = "INSERT INTO signup (No, username, password, labassign, typeofaccount) VALUE (NULL,'$username','$password','$labAssign','$acctype')";
                        echo"<br>";
                        echo"Sign-Up Successfull! <br>";
                        mysqli_query($conn,$query);
                    }
                    else{
                    echo"<br>Please input the Laboratory assigned!<br>";                    
                  }
                }
            }
            elseif(isset($_POST['role']) && $_POST['role'] == 'stud'){
                  if(isset($_POST['lab'])){
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $password = md5($password);
                   //check if username exists
                   $sql = "SELECT * FROM signup WHERE username = '".$username."'";
                   $result = mysqli_query($conn,$sql);
                   if(mysqli_num_rows($result)>=1)
                      {
                       echo "<br> Username Already Taken!";
                      }
                    else{
                        if(isset($_POST['lab'])){
                            $acctype = "technical_assist";
                            $labAssign = $_POST["lab"];
                            $query = "INSERT INTO signup (No, username, password, labassign, typeofaccount) VALUE (NULL,'$username','$password','$labAssign','$acctype')";
                            echo"<br>";
                            echo"Sign-Up Successfull! <br>";
                            mysqli_query($conn,$query);
                    }
                        else{
                            echo"<br>Please input the Laboratory assigned!";                    
                  }
                }
              }
            }
        }
    }
      ?>

    </form>

    <!-- Login -->
    <div id="formFooter">
      <a class="underlineHover" href="login.php">Login</a>
    </div>

  </div>
</div>
    </body>
</html>