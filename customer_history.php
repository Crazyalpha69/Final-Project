<?php
include 'inc/header_php.php';
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
  include 'db.php';

  $id=$_GET['id'];
?>
<div class="card">
  <div class="card-header">
    Customer History
  </div>
  <div class="card-body">
    	<h5 class="card-title">Transaction History</h5>
    	<?php
				$sqli="SELECT history FROM customer where id = $id";
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