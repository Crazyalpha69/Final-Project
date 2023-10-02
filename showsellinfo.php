<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>

<div class="card">
  <div class="card-header">
    Liability Management
  </div>
  <div class="card-body">
    	<h5 class="card-title">Property sell and due loan manage</h5>
		<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>Name</th>
	                <th>Nid</th>
	                <th>Property name</th>
	                <th>Property Details</th>
	                <th>Sell price</th>
	                <th>Paid due</th>
	                <th>Return Money</th>
	            </tr>
	        </thead>

	        <tbody>

	            <tr>
	                <td>Dagi</td>
	                <td>123</td>
	                <td>car</td>
	                <td>SUV</td>
	                <td>100000 Birr</td>
	                <td>50000 Birr</td>
	                <td>10000 Birr</td>
	             
	            </tr>
				
	        </tbody>
	    </table>
	  </div>
	</div>

<?php
include_once "inc/footer.php";
?>