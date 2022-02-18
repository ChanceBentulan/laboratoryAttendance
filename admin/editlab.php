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


<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="#">
    <title>ManageLab</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="admin.php">
      <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.0-9/40110097_1874047352649556_2771589700878598144_o.png?_nc_cat=101&_nc_sid=09cbfe&_nc_ohc=5rDo0p99rwMAX8fEgW4&_nc_ht=scontent.fceb2-1.fna&oh=7d294589575470d9bb7658fd2966e075&oe=5F387968" width="30" height="30" class="d-inline-block align-top" alt="">
    Computer Engineering Laboratory Admin
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="editlab.php" >Manage Laboratories<span class="sr-only"></span></a>
      <a class="nav-item nav-link" href="ManageAcc.php">Manage Accounts</a>
      <a class="nav-item nav-link" href="admin.php">View attendance</a>
      <a class="nav-item nav-link" href="search.php">Search Attendance</a>
        <a class="nav-item nav-link" href="editattendance.php">Update records</a>
        <a class="nav-item nav-link" href="../login.php">Log Out</a>
    </div>
  </div>
</nav>
<!---------ADD LABORATORY----------->
<div>
<br>
<h3>Add New Laboratory</h3>
<form action="editlab.php" method="POST">
<br>
  <div class="form-group col-md-3">
    <label for="formGroupExampleInput"><h5>Laboratory Name</h5></label>
    <input type="text" class="form-control"  name="labname" placeholder="Laboratory Name">
    <br>
    <button type="submit" class="btn btn-primary" name="addlab">Add Laboratory</button>
  </div>
</form>
</div>

<!---------DELETE LABORATORY----------->
<div>
<br>
<h3>Delete Laboratory</h3>
<form action="editlab.php" method="POST">
<br>
  <div class="form-group col-md-3">
    <label for="formGroupExampleInput"><h5>Laboratory Name You want To Delete</h5></label>
    <input type="text" class="form-control"  name="labnamedel" placeholder="Laboratory Name">
    <br>
    <button type="submit" class="btn btn-primary" name="deletelab">Delete Laboratory</button>
  </div>
</form>
</div>

<!---------EDIT LABORATORY----------->
<div>
<br>
<h3>Edit Laboratory</h3>
<form action="editlab.php" method="POST">
<br>
<form>
  <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" placeholder="RECENT LABORATORY NAME" name="prevlab">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="NEW LABORATORY NAME" name="newlab">
    </div>
  </div>
  <div>
  <br>
  <button type="submit" class="btn btn-primary" name="editlabname">Update Laboratory Name</button>
  </div>
</form>
</form>
</div>
  
</html>




<?php

if(isset($_POST['addlab']))
{
    $labname = $_POST['labname'];
    $labnamestud = $labname ."_studentvolunteers";
    $query="CREATE TABLE $labname AS (SELECT * FROM ceac_tc WHERE 1=1)";
    mysqli_query($conn, $query);
    $query="ALTER TABLE  `$labname` ADD PRIMARY KEY (  `No` )";
    mysqli_query($conn, $query);
    $query="CREATE TABLE $labnamestud AS (SELECT * FROM ceac_studentvolunteers WHERE 1=1)";
    mysqli_query($conn, $query);
    $query="ALTER TABLE  `$labnamestud` ADD PRIMARY KEY (  `No` )";
    mysqli_query($conn, $query);

    echo "<h3>$labname ADDED</h3>";
}

if(isset($_POST['deletelab']))
{
    $labname = $_POST['labnamedel'];
    $labnamestud = $labname ."_studentvolunteers";
    $query="DROP TABLE  $labname";
    mysqli_query($conn, $query);
    $query="DROP TABLE  $labnamestud";
    mysqli_query($conn, $query);
    
    echo "<h3>$labname DELETED</h3>";
}

if(isset($_POST['editlabname']))
{
    $prevlabname = $_POST['prevlab'];
    $newlabname = $_POST['newlab'];
    $prevlabnamestud = $prevlabname."_studentvolunteers";
    $newlabnamestud = $newlabname."_studentvolunteers";
    $query="ALTER TABLE $prevlabname
    RENAME TO $newlabname;";
    mysqli_query($conn, $query);
    $query="ALTER TABLE $prevlabnamestud
    RENAME TO $newlabnamestud;";
    mysqli_query($conn, $query);
    
    echo "<h3>$prevlabname CHANGED TO $newlabname</h3>";
}


?>