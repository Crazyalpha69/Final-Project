<?php
include 'db.php';
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = str_replace("'","",$data);
  return $data;
}



if(isset($_POST['id']) && isset($_POST['mobile']) && isset($_POST['address']))
{

  $id=test_input($_POST['id']);
  $mobile=test_input($_POST['mobile']);
  $address=test_input($_POST['address']);



$sql="DELETE FROM `customer` WHERE id =$id";
  mysqli_query($db, $sql);



}

else
{
echo '<meta http-equiv="refresh" content="0; URL=deposit.php">';
}

?>


