<?php
include 'inc/header_php.php';
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
  include 'db.php';

  $loan_id=$_GET['loan_id'];
?>
<div class="card">
  <div class="card-header">
    Loan report
  </div>
  <div class="card-body">
    	<h5 class="card-title">Loan report</h5>
    	<?php
				$sqli="SELECT history FROM loan_application where c_id = $loan_id";
              $resulti= mysqli_query($db, $sqli);
              while ($row = mysqli_fetch_array($resulti))
              {
              	$history = $row["history"];
              	echo "<p>".$history."</p>";
              }
    	?>
    	</div>
	</div>

<?php
include_once "inc/footer.php";
?>