<?php
	date_default_timezone_set("Etc/GMT+8");
	require_once'session.php';
	require_once'class.php';
	$db=new db_class(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button{ 
			-webkit-appearance: none; 
		}

	</style>
	
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Loan Management System</title>

    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
   
    <link href="css/sb-admin-2.css" rel="stylesheet">
    
	<!-- Custom styles for this page -->
    <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/select2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">ADMIN PANEL</div>
            </a>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="loan.php">
                    <i class="fas fa-fw fas fa-comment-dollar"></i>
                    <span>Loans</span></a>
            </li>
			<li class="nav-item active">
                <a class="nav-link" href="payment.php">
                    <i class="fas fa-fw fas fa-coins"></i>
                    <span>Payments</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="borrower.php">
                    <i class="fas fa-fw fas fa-book"></i>
                    <span>Borrowers</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="loan_plan.php">
                    <i class="fas fa-fw fa-piggy-bank"></i>
                    <span>Loan Plans</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="loan_type.php">
                    <i class="fas fa-fw fa-money-check"></i>
                    <span>Loan Types</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
	
                   
					<!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $db->user_acc($_SESSION['user_id'])?></span>
                                <img class="img-profile rounded-circle"
                                    src="image/admin_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Payment List</h1>
                    </div>
					<div class="row">
						
					</div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Loan Reference No.</th>
                                            <th>Payee</th>
                                            
                                            <th>Months to Pay</th>
                                            <th>Status</th>
                                            <th>Payment Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
									
                                                $connections = mysqli_connect("localhost","root","","cmdl");

                                            $name1 = $db->user_acc($_SESSION['user_id']);

                                            $retrieve_query = mysqli_query($connections, "SELECT * FROM monthly_payment_tbl");

                        while($row = mysqli_fetch_assoc($retrieve_query)) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $refno = $row['refno'];
                                            $p1 = $row['payment1'];
                                            $p1s = $row['payment1_status'];
                                            $p2 = $row['payment2'];
                                            $p2s = $row['payment2_status'];
                                            $p3 = $row['payment3'];
                                            $p3s = $row['payment3_status'];
                                            $p4 = $row['payment4'];
                                            $p4s = $row['payment4_status'];
                                            $p5 = $row['payment5'];
                                            $p5s = $row['payment5_status'];
                                            $p6 = $row['payment6'];
                                            $p6s = $row['payment6_status'];
                                            $p7 = $row['payment7'];
                                            $p7s = $row['payment7_status'];
                                            $p8 = $row['payment8'];
                                            $p8s = $row['payment8_status'];
                                            $p9 = $row['payment9'];
                                            $p9s = $row['payment9_status'];
                                            $p10 = $row['payment10'];
                                            $p10s = $row['payment10_status'];
                                            $p11 = $row['payment11'];
                                            $p11s = $row['payment11_status'];
                                            $p12 = $row['payment12'];
                                            $p12s = $row['payment12_status'];
                                            $months = $row['months'];
                                            $status = $row['status'];

                                            echo "
                                            <tr>
                                                <th>$id</th>
                                                <th>$refno</th>
                                                <th>$name</th>
                                                
                                                <th>$months</th>
                                                <th>$status</th>
                                                   <th>
                                                        <div>
                                                        <button type='button' class='form-control btn-secondary' data-toggle='modal' data-target='#view$id'>View</button>
                                                        </div>
                                                    </th>

                                            </tr>";

                                            

                                            echo "
                            <!-- View Loan Details Modal-->
                            <div class='modal fade' id='view$id' aria-hidden='true'>
                                <div class='modal-dialog modal-lg'>
                                    <form method='POST' action=''>
                                        <div class='modal-content'>
                                            <div class='modal-header bg-primary'>
                                                <h5 class='modal-title text-white'>Loan Details</h5>
                                                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>×</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                            <div class='form-row'>
                                                <div class='form-group col-xl-6 col-md-6'>
                                                    <label>Reference Code</label>
                                                    <br />
                                                    <input type='text' name='refno' value='$refno' class='form-control' style='width:100%;' readonly>
                                                    <input type='hidden' name='nameborrow' value=''>
                                                </div>
                                                <div class='form-group col-xl-6 col-md-6'>
                                                    <label>Loan type</label>
                                                    <br />";

                                                    $retrieve_query1 = mysqli_query($connections, "SELECT * FROM loan_application WHERE name ='$name' AND refno = '$refno'");

                                            while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                            $name = $row['name'];
                                                            $loantype = $row['loantype'];
                                                            $loanplan = $row['loanplan'];
                                                            $amount = $row['amount'];
                                                            $totalpay = $row['totalpayable'];
                                                            $monthly = $row['monthlypayable'];
                                                            $overdue = $row['overduepayable'];


                                                        echo "
                                                        <input type='text' class='form-control' value='$loantype' readonly>
                                                </div>
                                            </div>
                                            <div class='form-row'>
                                                <div class='form-group col-xl-6 col-md-6'>
                                                    <label>Loan Plan</label>
                                                    
                                                    <label>( Months[Interest%, Penalty%] )</label>
                                                    <input type='text' value='$loanplan' class='form-control' readonly>
                                                </div>
                                                <div class='form-group col-xl-6 col-md-6'>
                                                    <label>Loan Amount</label>
                                                    <input type='text' name='loan_amount' class='form-control' id='' value='₱ $amount' readonly/>
                                                </div>
                                            </div>
                                            <div class='form-row'>
                                                <div class='form-group col-xl-6 col-md-6'>
                                                <input type='hidden' name='name' value='$name'>
                                                <input type='hidden' name='amount' value='$amount'>
                                                <input type='hidden' name='months' value='$months'>";

                                                  


                                                    
                                                    if($months == 12){
                                         echo "
                                                <hr>
                                                <label>PAYMENT SCHEDULE</label>
                                                <div class='form-inline'>
                                                <input type='hidden' value='$p1' name='p1date'>
                                                <p>1ST PAYMENT: <strong>$p1</strong></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p1s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p2' name='p2date'>
                                                <p>2ND PAYMENT: <strong>$p2</strong></p>&nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p2s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p3' name='p3date'>
                                                <p>3RD PAYMENT: <strong>$p3</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p3s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p4' name='p4date'>
                                                <p>4TH PAYMENT: <strong>$p4</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p4s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p5' name='p5date'>
                                                <p>5TH PAYMENT: <strong>$p5</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p5s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p6' name='p6date'>
                                                <p>6TH PAYMENT: <strong>$p6</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p6s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p7' name='p7date'>
                                                <p>7TH PAYMENT: <strong>$p7</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p7s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p8' name='p8date'>
                                                <p>8TH PAYMENT: <strong>$p8</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p8s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p9' name='p9date'>
                                                <p>9TH PAYMENT: <strong>$p9</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p9s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p10' name='p10date'>
                                                <p>10TH PAYMENT: <strong>$p10</strong></p> &nbsp;&nbsp;";

                                                if($p10s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p11' name='p11date'>
                                                <p>11TH PAYMENT: <strong>$p11</strong></p> &nbsp;&nbsp;";

                                                if($p11s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p12' name='p12date'>
                                                <p>LAST PAYMENT: <strong>$p12</strong></p> &nbsp;&nbsp;";

                                                if($p12s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "</div>
                                                    ";

                                                    }else if($months == 6){
                                                        echo "
                                                        <hr>
                                                        <label>PAYMENT SCHEDULE</label>
                                                    <div class='form-group'>
                                                    <p>1ST PAYMENT: <strong>$p1</strong></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p1s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p2' name='p2date'>
                                                <p>2ND PAYMENT: <strong>$p2</strong></p>&nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p2s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p3' name='p3date'>
                                                <p>3RD PAYMENT: <strong>$p3</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p3s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p4' name='p4date'>
                                                <p>4TH PAYMENT: <strong>$p4</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p4s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p5' name='p5date'>
                                                <p>5TH PAYMENT: <strong>$p5</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p5s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p6' name='p6date'>
                                                <p>LAST PAYMENT: <strong>$p6</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p6s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                } echo"
                                                    </div>
                                                    ";

                                                    }else if($months == 3){
                                                        echo "
                                                        <hr>
                                                        <label>PAYMENT SCHEDULE</label>
                                                    <div class='form-group'>
                                                    <p>1ST PAYMENT: <strong>$p1</strong></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p1s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p2' name='p2date'>
                                                <p>2ND PAYMENT: <strong>$p2</strong></p>&nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p2s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }

                                                echo "<input type='hidden' value='$p3' name='p3date'>
                                                <p>LAST PAYMENT: <strong>$p3</strong></p> &nbsp;&nbsp;&nbsp;&nbsp;";

                                                if($p3s == "PAID"){
                                                    echo "<button class='form-control btn-success' style='height:35px;margin-top:-15px;' type='submit' name='not1' disabled>PAID</button>";
                                                
                                                }else{
                                                    echo "<button class='form-control btn-primary' style='height:35px;margin-top:-15px;' type='submit' name='not1'>Send Notice</button>";
                                                }
                                                    echo "   
                                                    </div>
                                                    ";

                                                    }

   
                                            echo "</div>
                                            
                                            </div>
                                            <div style='text-align:center;'>
                                            <p >~LOAN BREAKDOWN~</p>
                                            </div>
                                            <hr>

                                            <div class='row'>
                                                <div class='col-xl-4 col-md-4'>
                                                    <center><span>Total Payable Amount</span></center>
                                                    
                                                    <input type='text' class='form-control' id='' name='pay' 
                                                    style='text-align:center;' value='$totalpay' readonly>
                                                </div>
                                                <div class='col-xl-4 col-md-4'>
                                                    <center><span >Monthly Payable Amount</span></center>
                                                
                                                    <input type='text' class='form-control' id='' name='month' 
                                                    style='text-align:center;' value='$monthly' readonly>
                                                </div>
                                                <div class='col-xl-4 col-md-4'>
                                                    <center><span>Penalty Amount</span></center>
                                                
                                                    <input type='text' class='form-control' id='' name='penal' 
                                                    style='text-align:center;' value='$overdue' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='modal-footer' >
                                        <div style='margin-right:400px;' class='row'>
                                        <p>STATUS:</p>&nbsp;<strong style='color: ";

                                        if($status == "FOR APPROVAL"){
                                            echo "orange";
                                        }else if($status == "REJECTED"){
                                            echo "red";
                                        }else if($status == "APPROVED" || $status == "DISBURSED"){
                                            echo "green";
                                        }

                                        echo ";'>$status</strong>
                                        </div>
                                        </div>
                                    </div>
                                </form>

                                    


                            </div>
                        </div>";




                            }

                        }




										?>
                                    </tbody>
                                </table>
                            </div>
						</div>
                       
                    </div>
				</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="stocky-footer">
            
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
	
	
	<!-- Add Loan Modal-->
	<div class="modal fade" id="addModal" aria-hidden="true">
		<div class="modal-dialog">
			<form method="POST" action="save_payment.php">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white">Payment Form</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-row">
							<div class="form-group col-xl-5 col-md-5">
								<label>Reference no</label>
								<br />
								<select name="loan_id" class="ref_no" id="ref_no" required="required" style="width:100%;">
									<option value=""></option>
									<?php
										$tbl_loan=$db->display_loan();
										while($fetch=$tbl_loan->fetch_array()){
											if($fetch['status'] == 2){
									?>
										<option value="<?php echo $fetch['loan_id']?>"><?php echo $fetch['ref_no']?></option>
									<?php
											}
										}
									?>
								</select>
							</div>
						</div>
						<div id="formField"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button type="submit" name="save" class="btn btn-primary">Save</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white">System Information</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <?php

                                    date_default_timezone_set('Asia/Taipei');

                                    $conn = mysqli_connect('localhost','root','');
                                    $db = mysqli_select_db($conn, 'cmdl');
                                    $datetime = date_create()->format('Y-m-d H:i:s');

                                    use  PHPMailer\PHPMailer\PHPMailer;
                                    use PHPMailer\PHPMailer\Exception;

                                    require 'phpmailer/src/Exception.php';
                                    require 'phpmailer/src/PHPMailer.php';
                                    require 'phpmailer/src/SMTP.php';


                                    if(isset($_POST["not1"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p1date = $_POST['p1date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p1date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }

                                    if(isset($_POST["not2"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p2date = $_POST['p2date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p2date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }

                                    if(isset($_POST["not3"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p3date = $_POST['p3date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p3date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }
                                    if(isset($_POST["not4"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p4date = $_POST['p4date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p4date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }

                                    if(isset($_POST["not5"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p5date = $_POST['p5date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p5date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }

                                    if(isset($_POST["not6"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p6date = $_POST['p6date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p6date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }

                                    if(isset($_POST["not7"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p7date = $_POST['p7date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p7date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }

                                    if(isset($_POST["not8"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p8date = $_POST['p8date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p8date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }

                                    if(isset($_POST["not9"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p9date = $_POST['p9date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p9date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }

                                    if(isset($_POST["not10"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p10date = $_POST['p10date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p10date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }

                                    if(isset($_POST["not11"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p11date = $_POST['p11date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p11date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }

                                    if(isset($_POST["not12"])){
                                        $refno = $_POST['refno'];
                                        $name = $_POST['name'];
                                        $amount = $_POST['amount'];
                                        //$email = $_POST['email'];
                                        $months = $_POST['months'];
                                        $monthly = $_POST['month'];
                                        $p12date = $_POST['p12date'];

                                                $fullname = explode(" ", $name);

                                                $retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
                                                    WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
                                                while($row = mysqli_fetch_assoc($retrieve_query1)) {
                                                    $email = $row['email'];
                                                
                                                }

                                        $mail = new PHPMailer(true);


                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'cashmdl2025@gmail.com';
                                        $mail->Password = 'sywo jzyf obri srbx';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = '465';


                                        $mail->setFrom('cashmdl2025@gmail.com');
                                        $mail->addAddress($email); //receiver address

                                        $mail->isHTML(true);

                                        $mail->Subject = 'CMDL - SCHEDULED PAYMENT NOTICE';

                                        $mail->Body = 'This is to inform you that your loan with reference <strong>'. $refno .'</strong> has a scheduled payment amounting <strong>₱'.$monthly .'</strong> on <strong>'.$p12date.'</strong>. Please pay accordingly on your due date to avoid penalty. You can log-in to your CMDL account for processing a payment. Thank you.<br>';

                                        $mail->send();


                                        echo "<script language='javascript'>alert('Notice sent successfully.')</script>";
                                        echo "<script>window.location.href='payment.php';</script>";

                                    }


    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.js"></script>
    <script src="js/select2.js"></script>


	<!-- Page level plugins -->
	<script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap4.js"></script>
	

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>
	
	<script>
		
		$(document).ready(function() {
			
			$('#dataTable').DataTable();
			
			$('.ref_no').select2({
				placeholder: 'Select an option'
			});
			
			$('#ref_no').on('change', function(){
				if($('#ref_no').val()== ""){
					$('#formField').empty();
				}else{
					$('#formField').empty();
					$('#formField').load("get_field.php?loan_id="+$(this).val());
				}
			});
		});
	</script>

</body>

</html>