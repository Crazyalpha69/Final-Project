<?php
session_start();
include 'db.php';
$inserted = "";
if (isset($_POST['submit'])) 
{

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = str_replace("'","",$data);
  return $data;
}

$email = test_input($_POST["email"]);
$pass = test_input($_POST["pass"]);
$password = "";
$roll = 0;
$ce=0;
$sqle="SELECT * FROM user where Email LIKE '$email'";
$resulte= mysqli_query($db, $sqle);
$ce = mysqli_num_rows($resulte);
if ($ce == 0) 
{
$inserted = "<b><h5><p style='color: red'>Incorrect email or password!!!</p></h5></b>";
}
else
{
  while ($row = mysqli_fetch_array($resulte))
  {
    $password = $row["pass"];
    $emaill = $row["email"];
    $roll = $row["designation"];
    $name = $row["name"];
  }
  if ($password == $pass && $emaill == $email) 
  {
$_SESSION["user"] = $roll;
$_SESSION["name"] = $name;
echo'<script type="text/javascript">';
echo"window.location.href = 'index.php';";
echo"</script>";
  }
  else
  {
    $inserted = "<b><h5><p style='color: red'>Incorrect email or password!!!</p></h5></b>";
  }
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Sign in</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>

  <body>

  <div class="container">
    <form class="form-signin" action="" method="POST">
      <div class="text-center mb-4">
        <img class="mb-2" src="images/kershi_logo1.jpg" alt="" width="220" height="220">

      </div>
      <div class="text-center mb-4">
 <?php
 echo $inserted;
 ?>
      </div>
      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="submit">
      <p class="mt-3 text-uppercase font-weight-bold text-center"><a href="signup.php">Register</a> a new account.</p>
    </form>

    <div class="row">
      <div class="col-md-12 ">
        <p class="text-muted text-center">Developed by &copy; RView Students - 2021 </p></div>
    </div>
    </div>
  </body>
</html>

