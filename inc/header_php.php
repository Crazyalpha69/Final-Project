<?php
$action="signin";
if(isset($_GET['action'])) 
{
  $action=$_GET['action'];
}

session_start();
if (!isset($_SESSION["user"]) || $_SESSION["user"] <= 0 || $_SESSION["user"] >= 4)
{
  header('Location: signin.php');
}
 


if($action=="logout") 
{
   session_destroy();
   echo'<script type="text/javascript">';
echo"window.location.href = 'signin.php';";
echo"</script>";
} 
?>