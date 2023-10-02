<?php
include 'inc/header_php.php';
include_once "inc/header.php";
include_once "inc/sidebar.php";
include 'db.php';

$iderr="";
$cc=0;
$calc_done=0;

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = str_replace("'","",$data);
  return $data;
}


if (isset($_POST['submit'])) 
{
  $id2 = test_input($_POST["id2"]);
  $loan_amount2 = test_input($_POST["loan_amount2"]);
  $rate2 = test_input($_POST["rate2"]);
  $date2 = date("y/m/d");
  $total_amount = test_input($_POST["total_amount"]);
  $remaining = $total_amount;
  $payed = 0;
  $status = "Pending";
  $emi = test_input($_POST["emi"]);
    if ($rate2==1) 
              {
                $ratep=15;
                $days = 90;
              }
              elseif ($rate2==2) 
              {
                 $ratep=16;
                 $days = 180;
              }
              elseif ($rate2==3) 
              {
                 $ratep=18;
                 $days = 365;
              }
              else 
              {
                 $ratep=18;
                 $days = 730;
              }
$history = $total_amount." Birr loaned on ". date("m/d/y")." <br>"; 

$sql="INSERT INTO loan_application (c_id, interest_rate, loan_amount, datee, remaining, payed, history, total_loan_amount, status, emi, days) VALUE ('$id2','$ratep','$loan_amount2','$date2','$remaining','$payed','$history','$total_amount','$status','$emi','$days')";
mysqli_query($db, $sql);
echo "<script>alert('Application Submited Successfully ✓')</script>";

}


if (isset($_POST['search'])) 
{

  $id = test_input($_POST["id"]);
  $loan_amount = test_input($_POST["loan_amount"]);
  $rate = test_input($_POST["rate"]);
  $sqlc="SELECT * FROM customer where id = '$id'";
  $resultc= mysqli_query($db, $sqlc);
  $cc = mysqli_num_rows($resultc);




  
  $sqlc1="SELECT * FROM loan_application where c_id = '$id'";
  $resultc1= mysqli_query($db, $sqlc1);
  $cc1 = mysqli_num_rows($resultc1);
  if ($cc1 == 1) 
  {
     $iderr = "<span class='text-center' style='color:red'>There is an active loan under this account</span>"; 
  }


elseif ($cc == 0) 
{
  $iderr = "<span class='text-center' style='color:red'>Account number not Found</span>"; 
}

elseif ($cc == 1) 
{
  while ($row = mysqli_fetch_array($resultc))
  {
    $id = $row["id"];
    $name = $row["name"];
    $img = $row["image"];
    $balance = $row["balance"];
    $calc_done=1;
    
  }


              if ($rate==1) 
              {
                $totala=(($loan_amount/100)*15)+$loan_amount;
                $emi=($totala/90)*30.417;
              }
              elseif ($rate==2) 
              {
                $totala=(($loan_amount/100)*16)+$loan_amount;
                $emi=($totala/180)*30.417;
              }
              elseif ($rate==3) 
              {
                $totala=(($loan_amount/100)*18)+$loan_amount;
                $emi=($totala/365)*30.417;
              }
              else 
              {
                $totala=(($loan_amount/100)*20)+$loan_amount;
                $emi=($totala/730)*30.417;
              }


}

else 
{
  $iderr = "<span class='text-center' style='color:red'>Something goes wrong try again</span>"; 
}

}





?>



<h3 class="page-heading mb-4">Loan application form</h3>
<h5 class="card-title p-3 bg-info text-white rounded">Fill up loan details</h5>

<div class="container">
  <p style="color: #999999;" id="status">
  <?php
    echo $iderr;
  ?>
  <form action="" method="POST">

    <div class="form-group row">
    <label for="loanamount" class="text-right col-2 font-weight-bold col-form-label">Customer Account</label>                      
      <div class="col-sm-9">
        <input type="number" name="id" class="form-control" id="loanamount" placeholder="Enter Customer Account number" required>
      </div>
    </div>

    <div class="form-group row">
    <label for="loanamount" class="text-right col-2 font-weight-bold col-form-label">Loan amount</label>                      
      <div class="col-sm-9">
        <input type="number" name="loan_amount" class="form-control" id="loanamount" placeholder="Loan amount" required>
      </div>
    </div>

    <div class="form-group row">
      <label for="loanpercentage" class="text-right col-2 font-weight-bold col-form-label">Interest rate</label>                      
      <div class="col-sm-9">
        <select class="custom-select d-block w-100" name="rate" required>
          <option value="">Select Interest rate...</option>
            <?php
              $sqli="SELECT * FROM interest_rate";
              $resulti= mysqli_query($db, $sqli);
              while ($row = mysqli_fetch_array($resulti))
              {
                $idd = $row["id"];
                $days = $row["days"];
                $interest_rate = $row["interest_rate"];
                echo ' <option value="'.$idd.'">'.$interest_rate.'% for '.$days.' days </option>';
              }
            ?>      
        </select>
      </div>
    </div>
    <div class="col-sm-3">
      <center><input type="submit" class="btn btn-info" name="search" value="Calculate interest"></center>
    </div>  
  </form>
<br>
<?php
if ($calc_done==1) 
{

?>
  <form action="" method="POST">

      <div class="form-group row">
    <label for="loanamount" class="text-right col-2 font-weight-bold col-form-label">Customer Account</label>                      
      <div class="col-sm-9">
        <input type="number" name="id2" value="<?php echo $id;?>" class="form-control" id="loanamount" placeholder="Enter Customer Account number" readonly>
      </div>
    </div>

  <div class="form-group row">
    <label  class="text-right col-2 font-weight-bold col-form-label">Name</label>                      
    <div class="col-sm-9">
      <input type="text"  name="name" value="<?php echo $name;?>" class="form-control" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label class="text-right col-2 font-weight-bold col-form-label">Customer Image</label>  
    <div class="col-sm-9">
      <img style="width:80px;height:100px;" src="customers/<?php echo $img; ?>" alt="" >
    </div>
  </div>

  <div class="form-group row">
    <label for="loanamount" class="text-right col-2 font-weight-bold col-form-label">Loan amount</label>                      
    <div class="col-sm-9">
      <input type="number" name="loan_amount2" class="form-control" value="<?php echo $loan_amount;?>" id="loanamount" placeholder="Loan amount" readonly>
    </div>
  </div> 


    <div class="form-group row">
      <label for="loanpercentage" class="text-right col-2 font-weight-bold col-form-label">Interest rate</label>                      
      <div class="col-sm-9">
        <select class="custom-select d-block w-100" name="rate2" readonly>
            <?php
              if ($rate==1) 
              {
                echo ' <option value="1">15% for 90 days </option>';
              }
              elseif ($rate==2) 
              {
                echo ' <option value="2">16% for 180 days </option>';
              }
              elseif ($rate==3) 
              {
                echo ' <option value="3">18% for 365 days </option>';
              }
              else 
              {
                echo ' <option value="4">20% for 730 days </option>';
              }
                
              
            ?>      
        </select>
      </div>
    </div>

  <div class="form-group row">
    <label  class="text-right col-2 font-weight-bold col-form-label">Total amount including interest</label>                      
    <div class="col-sm-9">
      <input type="text"  name="total_amount" class="form-control" value="<?php echo $totala;?>" readonly >
    </div>
  </div> 

  <div class="form-group row">
    <label for="inputBorrowerMobile" class="text-right col-2 font-weight-bold col-form-label">Equated monthly installment</label>  
    <div class="col-sm-9">
      <input type="text" name="emi" value="<?php echo $emi;?>" class="form-control positive-integer" id="inputBorrowerMobile" readonly required>
    </div>
  </div>

  <hr>


  <div class="form-group row">
    <div class="col-md-6">
      <input type="submit" class="btn btn-info" name="submit" value="Submit">
    </div>
  </div>  
</form> 
<?php
}
?>       
</div>
<hr>








<?php
include_once "inc/footer.php";
?>