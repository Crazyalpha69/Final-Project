<?php
include 'db.php';
$emailerr="";
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


$name = test_input($_POST["name"]);
$email = test_input($_POST["email"]);
$pass = test_input($_POST["pass"]);
$role = test_input($_POST["role"]);


$ce=0;
$sqle="SELECT email FROM user where Email LIKE '$email'";
$resulte= mysqli_query($db, $sqle);
$ce = mysqli_num_rows($resulte);
if ($ce == 0) 
{
$sql="INSERT INTO user (name, email, pass, designation) VALUE ('$name','$email','$pass','$role')";
mysqli_query($db, $sql);
echo "<script>alert('REGISTERED Successfully ✓')</script>";
echo '<meta http-equiv="refresh" content="0; URL=signin.php">';
}
else 
{
echo "<script>alert('Email is already being used!!!')</script>";
$emailerr="<b><h5><p style='color: red'>* Email is already being used!!!</p></h5></b>";
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

    <title>Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>

  <body>

    <form class="form-signin" action="" method="POST">
      <div class="text-center mb-4">
        <img class="" src="images/kershi_logo1.jpg" alt="" width="220" height="220">
      </div>

      <div class="form-label-group">
        <input type="text" id="inputName" class="form-control" name="name" placeholder="Full Name" required autofocus>
        <label for="inputName">Full Name</label>
      </div>
      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus><?php echo $emailerr?>
        <label for="inputEmail">Email address</label> 
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>
      
      <div class="form-label-group">
        <select class="custom-select d-block w-100" name="role" required>
          <option value="">Select Designation...</option>
          <option value="1">Accountant</option>
          <option value="2">Loan Manager</option>
          <option value="3">Branch Manager</option>
        </select>
      </div>

      



      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Register">
      <p class="mt-3 text-uppercase font-weight-bold text-center">Already registered ? <a href="signin.php">Sign in</a>.</p>

    </form>
  </body>
</html>
