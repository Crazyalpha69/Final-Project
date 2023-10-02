<?php
include 'inc/header_php.php';
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
  include 'db.php';
?>

<div class="card">
  <div class="card-header">
    ALL customers
  </div>
  <div class="card-body">
    	<h5 class="card-title">Customers</h5>
		<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	            	<th>A_No</th>
	                <th>Name</th>
	                <th>Gender</th>
	                <th>Mobile</th>
	                <th>Address</th>
	                <th>Balance</th>
                  <th>History</th>
	            </tr>
	        </thead>

	        <tbody>
	        	
	            <tr>
	        <?php
              $sqli="SELECT * FROM customer";
              $resulti= mysqli_query($db, $sqli);
              while ($row = mysqli_fetch_array($resulti))
              {
                $id = $row["id"];
                $name = $row["name"];
                $gender = $row["gender"];
                $mobile = $row["mobile"];
                $address = $row["address"];
                $balance = $row["balance"];
                
                echo '<td>'.$id.'</td>';
                echo '<td>'.$name.'</td>';
                echo '<td>'.$gender.'</td>';
                echo '<td>'.$mobile.'</td>';
                echo '<td>'.$address.'</td>';
                echo '<td>'.$balance.'</td>';
                echo '<td><a target="_blank" href="customer_history.php?id='.$id.'">History</a></td>';
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