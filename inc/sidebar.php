<!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <br>
            <img src="images/user.png" alt="">
            <p class="name"><?php echo $_SESSION["name"]; ?></p>
            <p class="designation">
              <?php
                if ($_SESSION["user"] == 1) 
                {
                  echo "Accountant"; 
                }
                elseif ($_SESSION["user"] == 2) 
                {
                  echo "Loan Manager";
                }

                elseif ($_SESSION["user"] == 3) 
                {
                  echo "Branch Manager";
                }
                else 
                {
                  echo "Admin";
                }
                
              ?>
            </p>
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <img src="images/icons/1.png" alt="">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="add_customer.php">
                <img src="images/icons/0.png" alt="">
                <span class="menu-title">Add Customer</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="edit_customer.php">
                <img src="images/icons/009.png" alt="">
                <span class="menu-title">Edit Customer</span>
              </a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="delete_customer.php">
                <img src="images/icons/exclamation-mark.png" alt="">
                <span class="menu-title">Delete Customer</span>
              </a>
            </li>


             <li class="nav-item">
              <a class="nav-link" href="customer_list.php">
                <img src="images/icons/002-test.png" alt="">
                <span class="menu-title">Customer List</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="deposit.php">
                <img src="images/icons/2.png" alt="">
                <span class="menu-title">Deposit</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="withdrawal.php">
                <img src="images/icons/003-outbox.png" alt="">
                <span class="menu-title">Withdrawal</span>
              </a>
            </li>

          <!-- borrower option -->

            <!-- end borrower option -->
            <li class="nav-item">
              <a class="nav-link" href="apply_for_loan.php">
                <img src="images/icons/4.png" alt="">
                <span class="menu-title">Apply for loan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="loan_application.php">
                <img src="images/icons/5.png" alt="">
                <span class="menu-title">Loan applications</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="payloan.php">
                <img src="images/icons/6.png" alt="">
                <span class="menu-title">Loan Payment</span>
              </a>
            </li>

           
            <!-- liability option -->
 <?php
                 if ($_SESSION["user"] == 2) 
                {
                  ?>
             <li class="nav-item">
              <a class="nav-link" href="loanverify.php">
                <img src="images/icons/6.png" alt="">
                <span class="menu-title">Loan Verification</span>
              </a>
            </li>
           <?php
         }
         ?>
          </ul>
        </nav>

        <!-- partial -->
        <div class="content-wrapper">