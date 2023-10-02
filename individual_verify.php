<?php
include 'inc/header_php.php';
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
  include 'db.php';

    $loan_id=$_GET['loan_id'];
 if (isset($_POST['submit'])) 
{
$sql="update loan_application set status = 'Verified' WHERE c_id = $loan_id";
  mysqli_query($db, $sql);
  echo '<meta http-equiv="refresh" content="0; URL=loanverify.php">';
}           
        $sqli="SELECT * FROM loan_application where c_id = $loan_id";
              $resulti= mysqli_query($db, $sqli);
              while ($row = mysqli_fetch_array($resulti))
              {
                $c_id = $row["c_id"];
                $interest_rate = $row["interest_rate"];
                $loan_amount = $row["loan_amount"];
                $datee = $row["datee"];
                $total_loan_amount= $row["total_loan_amount"];
                $emi = $row["emi"];
                $days = $row["days"];
              }

              $sqli="SELECT name FROM customer where id = $c_id";
              $resulti= mysqli_query($db, $sqli);
              while ($row = mysqli_fetch_array($resulti))
              {
                $name = $row["name"];
              }

     
      
?>


 <h3 class="page-heading mb-4">Loan verification page</h3>
          <div class="row mb-2">
			
			   <div class="col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Borrower Details</h5>
                  <div class="table-responsive table-sales">
                    <table class="table">
                   	
                      <tbody>
                                                <tr>
                          <td>Customer account number: </td>
                          <td class="text-right">
                           <?php
                            echo $c_id;
                           ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Name: </td>
                          <td class="text-right">
                           <?php
                            echo $name;
                           ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Loan Amount: </td>
                          <td class="text-right">
                           		 <?php
                            echo $loan_amount. " Birr";
                           ?>
                          </td>
                        </tr>
                          <tr>
                          <td>Interest Rate: </td>
                          <td class="text-right">
                               <?php
                            echo $interest_rate. "%";
                           ?>
                          </td>
                        </tr>
                         <tr>
                          <td>Time given: </td>
                          <td class="text-right">
                               <?php
                            echo $days. " days";
                           ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Total Loan(including interest): </td>
                          <td class="text-right">
                           		<?php
                            echo $total_loan_amount. " Birr";
                           ?>
                          </td>
                        </tr>
                        <tr>
                          <td>EMI: </td>
                          <td class="text-right">
                            <?php
                            echo $emi. " Birr/month";
                           ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Application date: </td>
                          <td class="text-right">
                            <?php
                            echo $datee;
                           ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


             <div class="col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Verify loan</h5>
        

					<form  action="" class="form" method="POST" >
  
					    <hr>
					    <div class="for-group">
					    	<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Verify">
					    </div>
						
					</form>
                </div>
              </div>
            </div>
		</div>

<?php
include_once "inc/footer.php";
?>