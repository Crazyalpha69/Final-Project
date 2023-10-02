<?php
include 'inc/header_php.php';
include_once "inc/header.php";
include_once "inc/sidebar.php";
include 'db.php';

$imgerr = "";
$inserted = '';

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
$gender = test_input($_POST["gender"]);
$mobile = test_input($_POST["mobile"]);
$address = test_input($_POST["address"]);
$balance = test_input($_POST["balance"]);
$history = $balance." Birr Credited on ".date("m/d/y")."<br>";

$vcode=(rand(100000,999999));
$target="customers/".$vcode.basename($_FILES['img']['name']);
$allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg",
        "webp"
    );
// Get image file extension 
$file_extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

if (! in_array($file_extension, $allowed_image_extension))
      {
         $imgerr = "<b><h6><p style='color: red'>* Upload valid images. Only Webp PNG JPG and JPEG are allowed.!!!</p></h6></b>"; 
      }

else 
{
  $img=$vcode.$_FILES['img']['name'];
  $imgerr="";
}

if ($imgerr=="") 
{
$sql="INSERT INTO customer (name, gender, mobile, address, image, balance, history) VALUE ('$name','$gender','$mobile','$address','$img','$balance','$history')";
mysqli_query($db, $sql);

if (
        move_uploaded_file($_FILES['img']['tmp_name'], $target)
        
       ) 

    {
        $inserted = '<div id="successMessage" class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              New Customer add Successfully ✓
         </div>';
    }


    else
        {
            
            echo "<script>alert('There was a problem during uploading the image !!!')</script>";
        
}
}


}
?>

        <h3 class="page-heading mb-4">Add New Customer</h3>
        <h5 class="card-title p-3 bg-info text-white rounded">Customer Personal Details</h5>
        <div class="container">

          <?php
            echo $inserted;
          ?>

          <form action="" method="post" enctype="multipart/form-data" id="add_borrower_form">

            <div class="form-group row">
              <label for="inputBorrowerFirstName" class="text-right col-2 font-weight-bold col-form-label">Full Name</label>                      
              <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="inputBorrowerFirstName" placeholder="Enter Full Name" value="" required>
              </div>
            </div>

            <div class="form-group row">
                <label for="inputBorrowerGender" class="text-right col-2 font-weight-bold col-form-label">Gender</label>                      
                <div class="col-sm-6">
                    <select class="form-control" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div> 
            <div class="form-group row">
                <label for="inputBorrowerMobile" class="text-right col-2 font-weight-bold col-form-label">Mobile</label>  
                <div class="col-sm-9">
                    <input type="text" name="mobile" class="form-control positive-integer" id="inputBorrowerMobile" placeholder="Numbers Only" value="" required>
                </div>
            </div>

            <hr>
            <div class="form-group row">
                <label for="inputBorrowerAddress" class="text-right font-weight-bold col-2 col-form-label">Address</label>                      
                <div class="col-sm-9">
                    <input type="text" name="address" class="form-control" id="inputBorrowerAddress" placeholder="Address" value="" required>
                </div>
            </div>

           <div class="form-group row">
                <label for="inputBorrowerAddress" class="text-right font-weight-bold col-2 col-form-label">Balance (Birr)</label>                      
                <div class="col-sm-9">
                    <input type="text" name="balance" class="form-control" id="inputBorrowerbalance" placeholder="Balance" value="" required>
                </div>
            </div>
          <hr>
          <div class="form-group row">
              
              <label for="user_picture" class="text-right font-weight-bold col-2 col-form-label">Customer Photo</label>
              <div class="col-sm-9">    
                <input type="file" id="photo_file" name="img" required>
                <p class="text-muted">Only Webp PNG JPG and JPEG are allowed otherwise you get error message</p>
                <p class="text-muted"><?php echo $imgerr; ?></p>
              </div>
          </div>
             <hr>
          <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait">Submit</button>
          </div>
        </form>
       </div>           
<?php
include_once "inc/footer.php";
?>