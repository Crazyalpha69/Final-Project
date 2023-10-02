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

$oldremaining = 0;
$oldpayed = 0;
$oldhistory = "";

if(isset($_POST['deposit']) && isset($_POST['id']))
{
  $deposit=test_input($_POST['deposit']);
  $id=test_input($_POST['id']);

$sql="SELECT * FROM loan_application where c_id = '$id'";
$result= mysqli_query($db, $sql);
  while ($row = mysqli_fetch_array($result))
  {
    
    $oldremaining = $row["remaining"];
    $oldpayed = $row["payed"];
    $oldhistory = $row["history"];
  }




$newremaining = $oldremaining - $deposit;
$newpayed = $oldpayed+$deposit;
$newhistory = $oldhistory.$deposit." Birr payed on ".date("m/d/y")."<br>";

$sql="update loan_application set remaining = '$newremaining', payed = '$newpayed', history = '$newhistory' WHERE c_id = $id";
  mysqli_query($db, $sql);



}

else
{
echo '<meta http-equiv="refresh" content="0; URL=deposit.php">';
}

?>


