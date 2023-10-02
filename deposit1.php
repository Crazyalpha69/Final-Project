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

$deposit=0;
$id=0;

$oldbalance = 0;
$oldhistory = "";

if(isset($_POST['deposit']) && isset($_POST['id']))
{
  $deposit=test_input($_POST['deposit']);
  $id=test_input($_POST['id']);

$sql="SELECT * FROM customer where id = '$id'";
$result= mysqli_query($db, $sql);
  while ($row = mysqli_fetch_array($result))
  {
    
    $oldbalance = $row["balance"];
    $oldhistory = $row["history"];
  }




$newbalance = $oldbalance + $deposit;
$newhistory = $oldhistory.$deposit." Birr Credited on ".date("m/d/y")."<br>";

$sql="update customer set balance = '$newbalance', history = '$newhistory' WHERE id = $id";
  mysqli_query($db, $sql);



}

else
{
echo '<meta http-equiv="refresh" content="0; URL=deposit.php">';
}

?>


