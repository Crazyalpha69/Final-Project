<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
	 ?>
	 <div class="list-group">
           <a class="list-group-item">Name: Dagi</a>
           <a class="list-group-item">NID: 1234</a>
           <a class="list-group-item">Date of birth: 00/00/0000</a>
           <a class="list-group-item">Phone:  0123456789</a>
           <a class="list-group-item">Address: AA</a>

       </div>

		<hr>
		<div class="row">
			<a href="loan_status.php" class="btn btn-primary ml-4">Back to loan status</a>
		</div>
          <div class="card-body">
            <h5 class="card-title mb-4">Loan Payment history</h5>
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Pay Date</th>
                  <th>Amount paid</th>
                  <th>Installment</th>
                  <th>Fine</th>
                  <th>Payment report</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>00/00/0000</td>
                  <td>123</td>
                  <td>1234</td>
                  <td>12345</td>
                   <td><a target="_blank" href="payment_report.php?loan_id=123&pay_id=1234&b_id=12345">report</a></td>
                </tr>


				<tfoot>
                  <th>Total: 1</th>
                  <th></th>
                  <th>Total: 1234</th>
                  <th>Total Completed Installment: 12345</th>
                </tfoot>
              </tbody>

            </table>
          </div>
        </div>
<?php
include_once "inc/footer.php";
?>