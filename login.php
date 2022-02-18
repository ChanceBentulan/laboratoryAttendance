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

    <!-- Login Form -->
    <form action="login.php" method="post">
        <h3>Login</h3>
      <input type="text" id="login" class="fadeIn second" name="user" placeholder="username">
      <input type="password" id="password" class="fadeIn third" name="pass" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="login">
    </form>

    <!-- Sign Up -->
    <div id="formFooter">
      <a class="underlineHover" href="signup.php">Sign Up</a>
    </div>

  </div>
</div>
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
  $query = "SELECT * FROM signup";
  if(isset($_POST['login'])){
    $username = $_POST["user"];  
    $password = $_POST["pass"];
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        $password = md5($password);
        $query = "SELECT * FROM signup WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        $usertype = $row['typeofaccount'];
        $labtype = $row['labassign'];
        $status = $row['Status'];
        if($usertype == "admin"){
            $_SESSION["username"] = $username;

            $_SESSION["logged"] = true;
            header("Location:admin/admin.php");
        }  
        elseif($usertype == "student"){
          if($status == "accepted"){  
            $_SESSION["username"] = $username;
            $_SESSION["logged"] = true;
            header("Location:student_volunteer/student_homepage.php"); 
          }
          else{
            $_SESSION["username"] = $username;
            $_SESSION["logged"] = true;
            header("Location:student_volunteer/student_homepageNULL.php"); 
          }
        } 
        elseif($usertype == "technical_assist"){
          if($status == "accepted"){ 
            $_SESSION["username"] = $username;
            $_SESSION["logged"] = true; 
            header("Location:technical_assist/tech_homepage.php"); 
          }
          else{
            $_SESSION["username"] = $username;
            $_SESSION["logged"] = true;
            header("Location:technical_assist/tech_homepageNULL.php"); 
          }
        }  
        elseif($usertype == "officer"){  
            $_SESSION["username"] = $username;
            $_SESSION["labtype"] = $labtype;
            $_SESSION["logged"] = true;
            header("Location:officer/officer_homepage.php"); 
        }  
        else{
          $_SESSION["logged"] = false;
          echo "<h1> Login failed. Invalid username or password.</h1>"; 
        }
    }
  ?>

     

    </body>
</html>