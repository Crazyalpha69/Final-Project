<?php
include 'inc/header_php.php';
include_once "inc/header.php";
include_once "inc/sidebar.php";
include 'db.php';

$iderr="";
$cc=0;
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = str_replace("'","",$data);
  return $data;
}



if (isset($_POST['search'])) 
{

$id = test_input($_POST["id"]);
$sqlc="SELECT * FROM customer where id = '$id'";
$resultc= mysqli_query($db, $sqlc);
$cc = mysqli_num_rows($resultc);

if ($cc == 0) 
{
 $iderr = "<span class='text-center' style='color:red'>Account number not Found</span>"; 
}
elseif ($cc == 1) 
{
  while ($row = mysqli_fetch_array($resultc))
  {
    $id = $row["id"];
    $name = $row["name"];
    $gender = $row["gender"];
    $mobile = $row["mobile"];
    $address = $row["address"];
    $img = $row["image"];
    $balance = $row["balance"];
    
  }


}
else 
{
  $iderr = "<span class='text-center' style='color:red'>Something goes wrong try again</span>"; 
}
}


?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
function chk()
{

  
  var id = document.getElementById("id").value;
  var mobile = document.getElementById("mobile").value;
  var address = document.getElementById("address").value;
  


 if(id && mobile && address)
  {
    $.ajax
    ({
      type: 'post',
      url: 'edit_customer1.php',
      data: 
      {
      id:id,
      mobile:mobile,
      address:address
      },
       cache:false,
      success: function (response) 
      {
      document.getElementById("status").innerHTML="<div id='successMessage' class='alert alert-success alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Edited Successfully ✓</div>";;
  document.getElementById("status1").innerHTML="<div id='successMessage' class='alert alert-success alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Edited Successfully ✓</div>";;

      }
    });
  }
  
  return false;
}
</script>

        <h3 class="page-heading mb-4">Edit Customer</h3>
       <h5 class="card-title p-3 bg-info text-white rounded">Edit Customer Personal Details</h5>
        <div class="container">

<p style="color: #999999;" id="status">




<?php
echo $iderr;
?>
<form action="" method="POST">
  <div class="form-group row">
    <label for="inputBorrowerFirstName" class="text-right col-2 font-weight-bold col-form-label">Search Customer: </label>                      
    <div class="col-sm-6">
      <input type="number" name="id" class="form-control" id="inputBorrowerFirstName" placeholder="Enter Customer Account number" required>
    </div>
    <div class="col-sm-3">
      <input type="submit" class="btn btn-info" name="search" value="Search">
    </div>  
  </div>
</form>  
          
</div>
<hr>


    <?php
if ($cc == 1)
{
    ?>

<form action="" method="post" enctype="multipart/form-data" onsubmit="return chk();" />
            <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Account number</label>                      
                 <div class="col-sm-9">
                  <input type="number"  id="id" name="id" value="<?php echo $id;?>" class="form-control" readonly>
              </div>
            </div> 

             <div class="form-group row">
                <label  class="text-right col-2 font-weight-bold col-form-label">Name</label>                      
                 <div class="col-sm-9">
                  <input type="text"  name="name" value="<?php echo $name;?>" class="form-control" readonly>
              </div>
            </div> 


            <div class="form-group row">
                <label class="text-right col-2 font-weight-bold col-form-label">Gender</label>  
                <div class="col-sm-9">
                    <input type="text" name="gender"  value="<?php echo $gender; ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="text-right col-2 font-weight-bold col-form-label">Mobile *</label>  
                <div class="col-sm-9">
                    <input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>" class="form-control">
                </div>
            </div>

              <div class="form-group row">
                <label class="text-right col-2 font-weight-bold col-form-label">Address *</label>  
                <div class="col-sm-9">
                    <input type="text" name="address" id="address"  value="<?php echo $address; ?>" class="form-control">
                </div>
            </div>


              <div class="form-group row">
                <label class="text-right col-2 font-weight-bold col-form-label">Customer Image</label>  
                <div class="col-sm-9">
                    <img style="width:80px;height:100px;" src="customers/<?php echo $img; ?>" alt="" >
                </div>
            </div>

         <div class="form-group row">
                <label class="text-right col-2 font-weight-bold col-form-label">Balance</label>  
                <div class="col-sm-9">
                    <input type="number" name="address"  value="<?php echo $balance; ?>" class="form-control" readonly>
                </div>
            </div>

             <hr>
             <p style="color: #999999;" id="status1">
          <div class="form-group row">
              <div class="col-md-6">
              <button class="btn btn-info pull-right" name="submit">Save</button>
              </div>
          </div>  
        </form>
     
<?php
}
include_once "inc/footer.php";
?>