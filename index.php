<?php
include 'inc/header_php.php';
include_once "inc/header.php";
include_once "inc/sidebar.php";
include 'db.php';
?>



          <h3 class="page-heading mb-4">Dashboard</h3>
          <div class="row">
 <?php
                 if ($_SESSION["user"] == 2) 
                {
                  ?>
             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-primary">
                        <i class="fa fa-bell highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Pending Loan Applications</p>
                      <h4 class="bold-text">
                        
      <?php
        $sqli="SELECT status FROM loan_application where status = 'Pending'";
              $resulti= mysqli_query($db, $sqli);
              $ce = mysqli_num_rows($resulti);
              echo $ce;
      ?>

                      </h4>
                    </div>
                  </div>
  
                </div>
              </div>
            </div>
                       <?php
         }
         ?>
 <?php
                 if ($_SESSION["user"] == 2) 
                {
                  ?>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-danger">
                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Borrowers</p>
                      <h4 class="bold-text">
      <?php
        $sqli="SELECT * FROM loan_application";
              $resulti= mysqli_query($db, $sqli);
              $ce = mysqli_num_rows($resulti);
              echo $ce;
      ?>
                      </h4>
                    </div>
                  </div>
                
                </div>
              </div>
            </div>
                                   <?php
         }
         ?>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-warning">
                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Active Loans</p>
                      <h4 class="bold-text">
                              <?php
        $sqli="SELECT status FROM loan_application where status = 'Verified'";
              $resulti= mysqli_query($db, $sqli);
              $ce = mysqli_num_rows($resulti);
              echo $ce;
      ?>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <?php
                 if ($_SESSION["user"] == 3) 
                {
                  ?>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-success">
                        <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Total Paid Money</p>
                      <h4 class="bold-text">
                              <?php
                              $remaining2 = 0;
        $sqli="SELECT remaining FROM loan_application where status = 'Verified'";
              $resulti= mysqli_query($db, $sqli);
                while ($row = mysqli_fetch_array($resulti))
  {
    $remaining = $row["remaining"];
    $remaining2 = $remaining2 + $remaining;
  }
  echo $remaining2;
      ?>
                       Birr</h4>
                    </div>
                  </div>
              
                </div>
              </div>
            </div>
                                   <?php
         }
         ?>
           
          </div>
          <hr>
  
           <h5 class="card-title p-3 bg-info text-white rounded">Active Loan</h5><br>
          <div class="row">

            
                           

                                    <?php
              $sqli="SELECT * FROM loan_application where status = 'Verified'";
              $resulti= mysqli_query($db, $sqli);
              while ($row = mysqli_fetch_array($resulti))
              {
                $c_id = $row["c_id"];
                $interest_rate = $row["interest_rate"];
                $loan_amount = $row["loan_amount"];
                $datee = $row["datee"];
                $remaining = $row["remaining"];
                $payed = $row["payed"];
                $total_loan_amount = $row["total_loan_amount"];
                $status = $row["status"];
                $days = $row["days"];
                $emi = $row["emi"];

                $sqlic="SELECT * FROM customer where id = $c_id";
              $resultic= mysqli_query($db, $sqlic);
              while ($row = mysqli_fetch_array($resultic))
              {
                $id = $row["id"];
                $name = $row["name"];
                $mobile = $row["mobile"];
                $address = $row["address"];
echo '<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 mb-4">
              <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      '.$name.' | Account Number: '.$id.'.
                    </button>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                  <div class="list-group">';
                echo '<a class="list-group-item">Name: '.$name.'</a>';
                echo '<a class="list-group-item">Account Number: '.$id.'</a>';
                echo '<a class="list-group-item">Phone: '.$mobile.'</a>';
                echo '<a class="list-group-item">Address: '.$address.'</a>';
              }
                
                          
                echo '<a class="list-group-item">Total Paid: '.$payed.' Birr</a>';
                echo '<a class="list-group-item">Remaining: '.$remaining.' Birr</a>';
echo "          </div>
            </div>
            </div>
            </div>
            </div>
            </div>";
              }
            ?>
  

           
          </div>
  

       
  
<?php
include_once "inc/footer.php";
?>