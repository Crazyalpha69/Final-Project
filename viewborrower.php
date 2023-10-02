<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>

<div class="card">
  <div class="card-header">
    Borrower Information
  </div>
  <div class="card-body">
    	<h5 class="card-title">Borrower personal details</h5>
		<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>Name</th>
	                <th>Nid</th>
	                <th>gender</th>
	                <th>mobile</th>
	                <th>email</th>
	                <th>DOB</th>
	                <th>address</th>
	                <th>working status</th>
	                <th>Image</th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                <th>Name</th>
	                <th>Nid</th>
	                <th>gender</th>
	                <th>mobile</th>
	                <th>email</th>
	                <th>DOB</th>
	                <th>address</th>
	                <th>working status</th>
	                <th>Image</th>
	            </tr>
	        </tfoot>
	        <tbody>
	            <tr>
	                <td>Dagi</td>
	                <td>123</td>
	                <td>M</td>
	                <td>0123456789</td>
	                <td>abc@defg.hij</td>
	                <td>00/00/0000</td>
	                <td>AA</td>
	                <td>Emploid</td>
	                <td><img style="width:80px;height:70px;" src="images/logo_star_black.png" alt="" ></td>

	            </tr>
	        </tbody>
	    </table>
	  </div>
	</div>

<?php
include_once "inc/footer.php";
?>