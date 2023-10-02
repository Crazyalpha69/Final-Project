<?php
include 'inc/header_php.php';
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
  include 'db.php';
?>

<div class="card">
  <div class="card-header">
    ALl loan Application
  </div>
  <div class="card-body">
    	<h5 class="card-title">Loan details</h5>
		<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	            	<th>A_No</th>
	                <th>Loan amount</th>
	                <th>Interest Rate</th>
	                <th>Total loan amount</th>
	                <th>Date</th>
	                <th>remaining</th>
	                <th>payed</th>
                  <th>Time given</th>
	                <th>EMI</th>
	                <th>Report</th>
	                <th>Status</th>
	            </tr>
	        </thead>

	        <tbody>
	        	
	            <tr>
	        <?php
              $sqli="SELECT * FROM loan_application";
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
                
                echo '<td>'.$c_id.'</td>';
                //echo '<td>'.$c_id.'</td>';
                echo '<td>'.$loan_amount.'</td>';
                echo '<td>'.$interest_rate.'</td>';
                echo '<td>'.$total_loan_amount.'</td>';
                echo '<td>'.$datee.'</td>';
                echo '<td>'.$remaining.'</td>';
                echo '<td>'.$payed.'</td>';
                echo '<td>'.$days.'</td>';
                echo '<td>'.$emi.'</td>';
                echo '<td><a target="_blank" href="loan_report.php?loan_id='.$c_id.'">report</a></td>';
                echo '<td><label class="badge badge-warning">'.$status.'</label></td>';
                echo '</tr>';
              }
            ?>
	             

				
	        </tbody>
	    </table>
	  </div>
	</div>

<?php
include_once "inc/footer.php";
?>