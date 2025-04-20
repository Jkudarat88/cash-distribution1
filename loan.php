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
			<li class="nav-item active">
                <a class="nav-link" href="loan.php">
                    <i class="fas fa-fw fas fa-comment-dollar"></i>
                    <span>Loans</span></a>
            </li>
			<li class="nav-item">
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
                        <h1 class="h3 mb-0 text-gray-800">Loan List</h1>
                    </div>
					
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Reference No.</th>
                                            <th>Borrower</th>
                                            <th>Loan Detail</th>
                                            <th>Payment Detail</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php



										$connections = mysqli_connect("localhost","root","","cmdl");

											$name1 = $db->user_acc($_SESSION['user_id']);

											$retrieve_query = mysqli_query($connections, "SELECT * FROM loan_application WHERE status ='FOR APPROVAL'");

                        while($row = mysqli_fetch_assoc($retrieve_query)) {

                        					$id = $row['id'];
                        					$name = $row['name'];
                        					$contact = $row['contact'];
                        					$address = $row['address'];
                        					$refno = $row['refno'];
                        					$loantype = $row['loantype'];
                        					$loanplan = $row['loanplan'];
                        					$amount = $row['amount'];
                        					$totalpay = $row['totalpayable'];
                        					$monthly = $row['monthlypayable'];
                        					$overdue = $row['overduepayable'];
                        					$status = $row['status'];
                        					$purpose = $row['purpose'];
                        					$months = $row['months'];
                        					$bor1 = $row['coborrower1'];
                        					$bor1email = $row['coborrower1_email'];
                        					$bor2 = $row['coborrower2'];
                        					$bor2email = $row['coborrower2_email'];

                        					echo "<tr>

                        					<td>$refno</td>
                        					<td>$name</td>
                        					<td>$loantype</td>
                        					<td>
                        					<div>
                        						<button type='button' data-toggle='modal' data-target='#viewModal1$id'  class='form-control btn-secondary'>View</button>
                        					</div>
                        					 </td>

                        					<td>$status</td>
                        					<td>

                        						<div>
                        						<button type='button' data-toggle='modal' data-target='#reject$id' class='btn btn-danger'>Reject</button>
                        						<button type='button' data-toggle='modal' data-target='#approve$id' class='btn btn-success'>Approve</button>
                        						</div>

                        					</td>

                        					</tr>";

                        					echo "<!-- View Loan Details Modal-->
							<div class='modal fade' id='viewModal1$id' aria-hidden='true'>
								<div class='modal-dialog modal-lg'>
									<form method='POST' action=''>
										<div class='modal-content'>
											<div class='modal-header bg-primary'>
												<h5 class='modal-title text-white'>Loan Application Details</h5>
												<button class='close' type='button' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>×</span>
												</button>
											</div>
											<div class='modal-body'>
											<div class='form-row'>
												<div class='form-group col-xl-6 col-md-6'>
													<label>Reference Code</label>
													<br />
													<input type='text' name='borrower' value='$refno' class='form-control' style='width:100%;' readonly>
													<input type='hidden' name='nameborrow' value=''>
												</div>
												<div class='form-group col-xl-6 col-md-6'>
													<label>Loan type</label>
													<br />
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
													<label>Purpose</label>
													<textarea name='purpose' class='form-control' style='resize:none; height:100px; width:765px;' readonly>$purpose</textarea>
												</div>";

												 if (!empty($bor1) || !empty($bor1email) || !empty($bor2) || !empty($bor2email)): 
											echo "<hr>
											<div class='form-row'>";
												if (!empty($bor1)):
													echo "<div class='form-group col-md-6'>
														<label>Co-Borrower 1 Name</label>
														<input type='text' class='form-control' value='$bor1' readonly>
													</div>";
												 endif;
												 if (!empty($bor1email)):
													echo "<div class='form-group col-md-6'>
														<label>Co-Borrower 1 Email</label>
														<input type='email' class='form-control' value='$bor1email' readonly>
													</div>";
												endif;
											echo "	
											</div>
											<div class='form-row'>";
												if (!empty($bor2)):
													echo "<div class='form-group col-md-6'>
														<label>Co-Borrower 2 Name</label>
														<input type='text' class='form-control' value='$bor2' readonly>
													</div>";
												endif;
												 if (!empty($bor2email)):
													echo "<div class='form-group col-md-6'>
														<label>Co-Borrower 2 Email</label>
														<input type='email' class='form-control' value='$bor2email' readonly>
													</div>";
												 endif;
											echo "
											</div>";

										 	endif;

											
											echo "</div>
											<div style='text-align:center;'>
											<p >~LOAN BREAKDOWN~</p>
											</div>
											<hr>

											<div class='row'>
												<div class='col-xl-4 col-md-4'>
													<center><span>Total Payable Amount</span></center>
													
													<input type='text' class='form-control' id='' name='pay' 
													style='text-align:center;' value='₱ $totalpay' readonly>
												</div>
												<div class='col-xl-4 col-md-4'>
													<center><span >Monthly Payable Amount</span></center>
												
													<input type='text' class='form-control' id='' name='month' 
													style='text-align:center;' value='₱ $monthly' readonly>
												</div>
												<div class='col-xl-4 col-md-4'>
													<center><span>Penalty Amount</span></center>
												
													<input type='text' class='form-control' id='' name='penal' 
													style='text-align:center;' value='₱ $overdue' readonly>
												</div>
											</div>
										</div>
										<div class='modal-footer' >
										<div style='margin-right:400px;' class='row'>
										
										</div>
											
											
										</div>
									</div>
								</form>

									


							</div>
						</div>";

										echo "<!-- Approve Loan Modal-->
							<div class='modal fade' id='approve$id' aria-hidden='true'>
								<div class='modal-dialog modal-md'>
									<form method='POST' action=''>
										<div class='modal-content'>
											<div class='modal-header bg-primary'>
												<h5 class='modal-title text-white'>Confirm Approval</h5>
												<button class='close' type='button' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>×</span>
												</button>
											</div>
											<div class='modal-body'>
											<div class='form-row'>
												<input type='hidden' name='refno' value='$refno' >
												<input type='hidden' name='name' value='$name' >
												<input type='hidden' name='amount' value='$amount' >";

												$fullname = explode(" ", $name);


												$retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
													WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
												while($row = mysqli_fetch_assoc($retrieve_query1)) {
													$email = $row['email'];
												}

											echo	"
												<input type='hidden' name='email' value='$email' >
											<div class='form-group col-xl-6 col-md-6'>
													
													<br />
														
												</div>
											</div>
											<div class='form-row'>
												
											<input type='hidden' name='months' value='$months'>

											<input type='hidden' name='bor1' value='$bor1'>
											<input type='hidden' name='bor1email' value='$bor1email'>
											<input type='hidden' name='bor2' value='$bor2'>
											<input type='hidden' name='bor2email' value='$bor2email'>
											</div>
											<div class='form-row'>
											
											
											</div>
											<div style='text-align:center;'>
											<p >Approve Loan Application?</p>
											</div>
										

										</div>
										<div class='modal-footer' >
											<button type='submit' name='approve' class='btn btn-success'>Confirm</button>
										</div>
									</div>
								</form>

									


							</div>
						</div>";

						echo "<!-- Reject Loan Modal-->
							<div class='modal fade' id='reject$id' aria-hidden='true'>
								<div class='modal-dialog modal-md'>
									<form method='POST' action=''>
										<div class='modal-content'>
											<div class='modal-header bg-primary'>
												<h5 class='modal-title text-white'>Confirm Rejection</h5>
												<button class='close' type='button' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>×</span>
												</button>
											</div>
											<div class='modal-body'>
											<div class='form-row'>
												<input type='hidden' name='refno1' value='$refno' >
												<input type='hidden' name='name1' value='$name' >


											<input type='hidden' name='bor1' value='$bor1'>
											<input type='hidden' name='bor1email' value='$bor1email'>
											<input type='hidden' name='bor2' value='$bor2'>
											<input type='hidden' name='bor2email' value='$bor2email'>


												<div class='form-group col-xl-6 col-md-6'>
													
													<br />
														
												</div>
											</div>
											<div class='form-row'>
				
											</div>
											<div class='form-row'>
											
											
											</div>
											<div style='text-align:center;'>
											<p >Reject Loan Application?</p>
											</div>
										

										</div>
										<div class='modal-footer' >
											<button type='submit' name='reject' class='btn btn-danger'>Confirm</button>
										</div>
									</div>
								</form>

									


							</div>
						</div>";



										}


									



										?>
										
			
                                    </tbody>
                                </table>
                            </div>
						</div>
                       
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Disbursement List</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Reference No.</th>
                                            <th>Borrower</th>
                                            <th>Loan Detail</th>
                                            <th>Payment Detail</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php

                                    	$connections = mysqli_connect("localhost","root","","cmdl");

											$name1 = $db->user_acc($_SESSION['user_id']);

											$retrieve_query = mysqli_query($connections, "SELECT * FROM loan_application WHERE (status='APPROVED' OR status='DISBURSED')");

                        					while($row = mysqli_fetch_assoc($retrieve_query)) {
                        						$id = $row['id'];
                        					$name = $row['name'];
                        					$contact = $row['contact'];
                        					$address = $row['address'];
                        					$refno = $row['refno'];
                        					$loantype = $row['loantype'];
                        					$loanplan = $row['loanplan'];
                        					$amount = $row['amount'];
                        					$totalpay = $row['totalpayable'];
                        					$monthly = $row['monthlypayable'];
                        					$overdue = $row['overduepayable'];
                        					$status = $row['status'];
                        					$purpose = $row['purpose'];
                        					$months = $row['months'];

                        					echo "
                        					<tr>
                        						<td>$refno</td>
                        						<td>$name</td>
                        						<td>$loantype</td>

                        						<td>
                        							<div>
                        								<button type='button' class='form-control btn-secondary' data-toggle='modal' data-target='#viewModa$id'>View</button>
                        							</div>

                        						</td>

                        						<td>$status</td>

                        						<td>
                        						<div>";

                        							if($status == "APPROVED"){
                        								echo "<button type='button' class='form-control btn-primary' data-toggle='modal' data-target='#disb$id'>Disburse</button>";
                        							}else if($status == "DISBURSED"){

                        								echo "<button type='button' class='form-control btn-success' data-toggle='modal' data-target='#disb$id' disabled>Completed</button>";
                        							}


                        							echo "</div>
                        						</td>


                        					</tr>
                        					";

                        					echo "<!-- Confirm Loan Disbursement Modal-->
							<div class='modal fade' id='disb$id' aria-hidden='true'>
								<div class='modal-dialog modal-md'>
									<form method='POST' action=''>
										<div class='modal-content'>
											<div class='modal-header bg-primary'>
												<h5 class='modal-title text-white'>Confirm Disbursement</h5>
												<button class='close' type='button' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>×</span>
												</button>
											</div>
											<div class='modal-body'>
											<div class='form-row'>
												<input type='hidden' name='refno' value='$refno' >
												<input type='hidden' name='name' value='$name' >
												<input type='hidden' name='amount' value='$amount' >";

												$fullname = explode(" ", $name);


												$retrieve_query1 = mysqli_query($connections, "SELECT * FROM borrower
													WHERE firstname = '$fullname[0]' AND lastname = '$fullname[1]' ");
												while($row = mysqli_fetch_assoc($retrieve_query1)) {
													$email = $row['email'];
												}

											echo	"
												<input type='hidden' name='email' value='$email' >
											<div class='form-group col-xl-6 col-md-6'>
													
													<br />
														
												</div>
											</div>
											<div class='form-row'>
												
											<input type='hidden' name='months' value='$months'>

											</div>
											<div class='form-row'>
											
											
											</div>
											<div style='text-align:center;'>
											<p >Approve Loan Disbursement?</p>
											</div>
										

										</div>
										<div class='modal-footer' >
											<button type='submit' name='disburse' class='btn btn-success'>Confirm</button>
										</div>
									</div>
								</form>

									


							</div>
						</div>";

										echo "
							<!-- View Loan Details Modal-->
							<div class='modal fade' id='viewModa$id' aria-hidden='true'>
								<div class='modal-dialog modal-lg'>
									<form method='POST' action=''>
										<div class='modal-content'>
											<div class='modal-header bg-primary'>
												<h5 class='modal-title text-white'>Loan Application Details</h5>
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
													<br />
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
												<div class='form-group col-xl-6 col-md-6'>";

													if($status == "APPROVED" || $status == "DISBURSED"){

														$retrieve_query = mysqli_query($connections, "SELECT * FROM monthly_payment_tbl WHERE name='$name' AND refno = '$refno' ");



                        					while($row = mysqli_fetch_assoc($retrieve_query)) {
                        							$p1 = $row['payment1'];
                        							$p2 = $row['payment2'];
                        							$p3 = $row['payment3'];
                        							$p4 = $row['payment4'];
                        							$p5 = $row['payment5'];
                        							$p6 = $row['payment6'];
                        							$p7 = $row['payment7'];
                        							$p8 = $row['payment8'];
                        							$p9 = $row['payment9'];
                        							$p10 = $row['payment10'];
                        							$p11 = $row['payment11'];
                        							$p12 = $row['payment12'];

                        							$p1s = $row['payment1_status'];
                        							$p2s = $row['payment2_status'];
                        							$p3s = $row['payment3_status'];
                        							$p4s = $row['payment4_status'];
                        							$p5s = $row['payment5_status'];
                        							$p6s = $row['payment6_status'];
                        							$p7s = $row['payment7_status'];
                        							$p8s = $row['payment8_status'];
                        							$p9s = $row['payment9_status'];
                        							$p10s = $row['payment10_status'];
                        							$p11s = $row['payment11_status'];
                        							$p12s = $row['payment12_status'];



                        							
                        							if($months == 12){
                        								echo "
                        								<hr>
                        								<label>PAYMENT SCHEDULE</label>
													<div class='form-group'>
													<p>1ST PAYMENT: <strong>$p1</strong>";
													if($p1s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "<p>2ND PAYMENT: <strong>$p2</strong>";
													if($p2s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "<p>3RD PAYMENT: <strong>$p3</strong>";
													if($p3s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "<p>4TH PAYMENT: <strong>$p4</strong>";
													if($p4s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "<p>5TH PAYMENT: <strong>$p5</strong>";
													if($p5s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "<p>6TH PAYMENT: <strong>$p6</strong>";
													if($p6s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "<p>7TH PAYMENT: <strong>$p7</strong>";
													if($p7s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "<p>8TH PAYMENT: <strong>$p8</strong>";
													if($p8s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "<p>9TH PAYMENT: <strong>$p9</strong>";
													if($p9s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "<p>10TH PAYMENT: <strong>$p10</strong>";
													if($p10s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "<p>11TH PAYMENT: <strong>$p11</strong>";
													if($p11s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "<p>LAST PAYMENT: <strong>$p12</strong>
													";
													if($p12s == "PAID"){
														echo "&nbsp;&nbsp; (PAID)</p>";
													}
													echo "</div>
													";

                        							}else if($months == 6){
                        								echo "
                        								<hr>
                        								<label>PAYMENT SCHEDULE</label>
													<div class='form-group'>
													<p>1ST PAYMENT: <strong>$p1</strong></p>
													<p>2ND PAYMENT: <strong>$p2</strong></p>
													<p>3RD PAYMENT: <strong>$p3</strong></p> 
													<p>4TH PAYMENT: <strong>$p4</strong></p>
													<p>5TH PAYMENT: <strong>$p5</strong></p>
													<p>LAST PAYMENT: <strong>$p6</strong></p> 
													>
													</div>
													";

                        							}else if($months == 3){
                        								echo "
                        								<hr>
                        								<label>PAYMENT SCHEDULE</label>
													<div class='form-group'>
													<p>1ST PAYMENT: <strong>$p1</strong></p>
													<p>2ND PAYMENT: <strong>$p2</strong></p>
													<p>LAST PAYMENT: <strong>$p3</strong></p> 
													
													</div>
													";

                        							}


                        					}




													}else{
														echo "<label>Purpose</label>
													<textarea name='purpose' class='form-control' style='resize:none; height:100px; width:765px;' readonly>$purpose</textarea>";
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
													style='text-align:center;' value='₱ $totalpay' readonly>
												</div>
												<div class='col-xl-4 col-md-4'>
													<center><span >Monthly Payable Amount</span></center>
												
													<input type='text' class='form-control' id='' name='month' 
													style='text-align:center;' value='₱ $monthly' readonly>
												</div>
												<div class='col-xl-4 col-md-4'>
													<center><span>Penalty Amount</span></center>
												
													<input type='text' class='form-control' id='' name='penal' 
													style='text-align:center;' value='₱ $overdue' readonly>
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
										</div>";

											if($status == "APPROVED" || $status == "DISBURSED"){

											}else{

												echo "<button type='submit' name='cancelapp' class='btn btn-danger'>Cancel Application</button>";
											}

											echo "
										</div>
									</div>
								</form>

									


							</div>
						</div>";



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
                <div class="container my-auto">
                   
                </div>
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


                                    if(isset($_POST["approve"])){
                                    	$refno = $_POST['refno'];
                                    	$name = $_POST['name'];
                                    	$amount = $_POST['amount'];
                                    	$email = $_POST['email'];
                                    	$months = $_POST['months'];

                                    	$bor1 = $_POST['bor1'];
                                    	$bor1email = $_POST['bor1email'];
                                    	$bor2 = $_POST['bor2'];
                                    	$bor2email = $_POST['bor2email'];

                                    	if($months == 12){
                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 30 days'));
                                    		$sched1 = "1ST PAYMENT: " . $datemod;
                                    		$date1 = date('Y-m-d', strtotime($datetime. ' + 30 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 60 days'));
                                    		$sched2 = "2ND PAYMENT: " . $datemod;
                                    		$date2 = date('Y-m-d', strtotime($datetime. ' + 60 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 90 days'));
                                    		$sched3 = "3RD PAYMENT: " . $datemod;
                                    		$date3 = date('Y-m-d', strtotime($datetime. ' + 90 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 120 days'));
                                    		$sched4 = "4TH PAYMENT: " . $datemod;
                                    		$date4 = date('Y-m-d', strtotime($datetime. ' + 120 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 150 days'));
                                    		$sched5 = "5TH PAYMENT: " . $datemod;
                                    		$date5 = date('Y-m-d', strtotime($datetime. ' + 150 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 180 days'));
                                    		$sched6 = "6TH PAYMENT: " . $datemod;
                                    		$date6 = date('Y-m-d', strtotime($datetime. ' + 180 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 210 days'));
                                    		$sched7 = "7TH PAYMENT: " . $datemod;
                                    		$date7 = date('Y-m-d', strtotime($datetime. ' + 210 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 240 days'));
                                    		$sched8 = "8TH PAYMENT: " . $datemod;
                                    		$date8 = date('Y-m-d', strtotime($datetime. ' + 240 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 270 days'));
                                    		$sched9 = "9TH PAYMENT: " . $datemod;
                                    		$date9 = date('Y-m-d', strtotime($datetime. ' + 270 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 300 days'));
                                    		$sched10 = "10TH PAYMENT: " . $datemod;
                                    		$date10 = date('Y-m-d', strtotime($datetime. ' + 300 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 330 days'));
                                    		$sched11 = "11TH PAYMENT: " . $datemod;
                                    		$date11 = date('Y-m-d', strtotime($datetime. ' + 330 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 360 days'));
                                    		$sched12 = "LAST PAYMENT: " . $datemod;
                                    		$date12 = date('Y-m-d', strtotime($datetime. ' + 360 days'));

                                    		$paymentsched = array($sched1,$sched2,$sched3,$sched4,$sched5,$sched6,$sched7,$sched8,$sched9,$sched10,$sched11,$sched12);

                                    	}else if($months == 6){
                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 30 days'));
                                    		$sched1 = "1ST PAYMENT: " . $datemod;
                                    		$date1 = date('Y-m-d', strtotime($datetime. ' + 30 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 60 days'));
                                    		$sched1 = "2ND PAYMENT: " . $datemod;
                                    		$date1 = date('Y-m-d', strtotime($datetime. ' + 60 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 90 days'));
                                    		$sched1 = "3RD PAYMENT: " . $datemod;
                                    		$date1 = date('Y-m-d', strtotime($datetime. ' + 90 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 120 days'));
                                    		$sched1 = "4TH PAYMENT: " . $datemod;
                                    		$date1 = date('Y-m-d', strtotime($datetime. ' + 120 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 150 days'));
                                    		$sched1 = "5TH PAYMENT: " . $datemod;
                                    		$date1 = date('Y-m-d', strtotime($datetime. ' + 150 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 180 days'));
                                    		$sched1 = "LAST PAYMENT: " . $datemod;
                                    		$date1 = date('Y-m-d', strtotime($datetime. ' + 180 days'));

                                    		$paymentsched = array($sched1,$sched2,$sched3,$sched4,$sched5,$sched6);

                                    	}else if($months == 3){
                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 30 days'));
                                    		$sched1 = "1ST PAYMENT: " . $datemod;
                                    		$date1 = date('Y-m-d', strtotime($datetime. ' + 30 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 60 days'));
                                    		$sched1 = "2ND PAYMENT: " . $datemod;
                                    		$date1 = date('Y-m-d', strtotime($datetime. ' + 60 days'));

                                    		$datemod = date('F d, Y', strtotime($datetime. ' + 90 days'));
                                    		$sched1 = "LAST PAYMENT: " . $datemod;
                                    		$date1 = date('Y-m-d', strtotime($datetime. ' + 90 days'));

                                    		$paymentsched = array($sched1,$sched2,$sched3);
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
										
										if($bor1email == null && $bor2email == null){
										
										$mail->addAddress($email); //receiver address
										
										}else{

										$mail->addAddress($email);
										$mail->addAddress($bor1email);
										$mail->addAddress($bor2email);

										}
										
										$mail->isHTML(true);

										$mail->Subject = 'CMDL - LOAN APPLICATION APPROVAL AND LOAN POLICY';

										$mail->addAttachment('CASH_LOAN_AGREEMENT_POLICY.pdf');


										if($months == 12){
										$mail->Body = 'This is to inform you that your loan application with reference <strong>'. $refno .'</strong> amounting <strong>₱ '.$amount .'</strong> has been approved. Please wait for the amount to be disbursed in your CMDL account. Thank you.<br>
											You have chosen a 12-month paying term for your loan,
											Here is the payment schedule of your approved loan:<br>

											'. $paymentsched[0] . '<br>' .
											   $paymentsched[1] . '<br>' .
											   $paymentsched[2] . '<br>' .
											   $paymentsched[3] . '<br>' .
											   $paymentsched[4] . '<br>' .
											   $paymentsched[5] . '<br>' .
											   $paymentsched[6] . '<br>' .
											   $paymentsched[7] . '<br>' .
											   $paymentsched[8] . '<br>' .
											   $paymentsched[9] . '<br>' .
											   $paymentsched[10] . '<br>' .
											   $paymentsched[11] . '<br>
											   <br>
											   And herewith attached is the Cash Loan Agreement Policy document for your reference and responsibility as a borrower.  (Email will be sent too in your co-borrowers email if this is a group loan)
											   <br>
											   <br>
											   Approved loan will be disbursed within the day, Thank you and have a good day!';

										}else if($months == 6){
											$mail->Body = 'This is to inform you that your loan application with reference <strong>'. $refno .'</strong> amounting <strong>₱ '.$amount .'</strong> has been approved. Please wait for the amount to be disbursed in your CMDL account. Thank you.<br>
											You have chosen a 6-month paying term for your loan,
											Here is the payment schedule of your approved loan:<br>
											'. $paymentsched[0] . '<br>' .
											   $paymentsched[1] . '<br>' .
											   $paymentsched[2] . '<br>' .
											   $paymentsched[3] . '<br>' .
											   $paymentsched[4] . '<br>' .
											   $paymentsched[5] . '<br>
											   <br>
											   And herewith attached is the Cash Loan Agreement Policy document for your reference and responsibility as a borrower.  (Email will be sent too in your co-borrowers email if this is a group loan)
											   <br>
											   <br>
											   Approved loan will be disbursed within the day, Thank you and have a good day!';

										}else if($months == 3){
											$mail->Body = 'This is to inform you that your loan application with reference <strong>'. $refno .'</strong> amounting <strong>₱ '.$amount .'</strong> has been approved. Please wait for the amount to be disbursed in your CMDL account. Thank you.<br>
											You have chosen a 3-month paying term for your loan,
											Here is the payment schedule of your approved loan:<br>
											'. $paymentsched[0] . '<br>' .
											   $paymentsched[1] . '<br>' .
											   $paymentsched[2] . '<br>
											   <br>
											   And herewith attached is the Cash Loan Agreement Policy document for your reference and responsibility as a borrower. (Email will be sent too in your co-borrowers email if this is a group loan)
											   <br>
											   <br>
											   Approved loan will be disbursed within the day, Thank you and have a good day!';
										}

										$mail->send();

                                    	

                                    	$query1 = "UPDATE loan_application SET status='APPROVED', dateapproved = '$datetime' WHERE name='$name' AND refno = '$refno'" ;
       									$query_exec = mysqli_query($connections,$query1);

       									  if($query_exec){

       									  	if($months == 12){

       									  	$query = "INSERT INTO monthly_payment_tbl(name, refno,months, payment1, payment2, payment3, payment4, payment5, payment6, payment7, payment8, payment9, payment10, payment11, payment12,status) VALUES
            								('$name','$refno',$months ,'$date1','$date2','$date3', '$date4', '$date5', '$date6', '$date7', '$date8', '$date9', '$date10', '$date11', '$date12','STARTED')";
							            $query_exec = mysqli_query($conn,$query);
							        if($query_exec){

							        	echo "<script language='javascript'>alert('Loan Application Approved.')</script>";
            							echo "<script>window.location.href='loan.php';</script>";
							        }
							    			}else if($months == 6){
							    				$query = "INSERT INTO monthly_payment_tbl(name, refno,months, payment1, payment2, payment3, payment4, payment5, payment6,status) VALUES
            								('$name','$refno',$months,'$date1','$date2','$date3', '$date4', '$date5', '$date6','STARTED')";
							            $query_exec = mysqli_query($conn,$query);
							        if($query_exec){

							        	echo "<script language='javascript'>alert('Loan Application Approved.')</script>";
            							echo "<script>window.location.href='loan.php';</script>";
							        }
							    			}else if($months == 3){

							    				$query = "INSERT INTO monthly_payment_tbl(name, refno,months, payment1, payment2, payment3,status) VALUES
            								('$name','$refno',$months,'$date1','$date2','$date3','STARTED')";
							            $query_exec = mysqli_query($conn,$query);
							        if($query_exec){

							        	echo "<script language='javascript'>alert('Loan Application Approved.')</script>";
            							echo "<script>window.location.href='loan.php';</script>";
							        }
							    			}


                                    	
            							}
                                    }







                                    if(isset($_POST["reject"])){
                                    	$refno = $_POST['refno1'];
                                    	$name = $_POST['name1'];
                                    	
                                    	$query1 = "UPDATE loan_application SET status='REJECTED', daterejected = '$datetime' WHERE name='$name' AND refno = '$refno'" ;
                                    	$query_exec = mysqli_query($connections,$query1);
                                    	  if($query_exec){
                                    	echo "<script language='javascript'>alert('Loan Application Rejected.')</script>";
            							echo "<script>window.location.href='loan.php';</script>";
            							}
                                    }

                                     if(isset($_POST["disburse"])){
                                     	$refno = $_POST['refno'];
                                    	$name = $_POST['name'];
                                    	$amount = $_POST['amount'];
                                    	$email = $_POST['email'];
                                    	$months = $_POST['months'];

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

										$mail->Subject = 'CMDL - APPROVED LOAN DISBURSEMENT';
										$mail->Body = 'This is to inform you that your loan application with reference <strong>'. $refno .'</strong> amounting <strong>₱ '.$amount .'</strong> has been successfully disbursed into your account. You may login to your acount at CMDL website to check your balance. Thank you and have a nice day.<br>';

										$mail->send();

										$query1 = "UPDATE loan_application SET status='DISBURSED',datedisbursed = '$datetime' WHERE name='$name' AND refno = '$refno'" ;
                                    	$query_exec = mysqli_query($connections,$query1);
                                    	  if($query_exec){

                                    	  		$query = "INSERT INTO disbursement_tbl(name, refno, amount, status) VALUES
            								('$name','$refno','$amount','DISBURSED')";
							            $query_exec = mysqli_query($conn,$query);
							        if($query_exec){

							        				echo "<script language='javascript'>alert('Loan has been disbursed and email notification sent to the borrower.')</script>";
            							echo "<script>window.location.href='loan.php';</script>";
							        			}


                                    	  }

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
			$("#calcTable").hide();
			
			
			$('.borrow').select2({
				placeholder: 'Select an option'
			});
			
			$('.loan').select2({
				placeholder: 'Select an option'
			});
			
			
			
			$("#calculate").click(function(){
				if($("#lplan").val() == "" || $("#amount").val() == ""){
					alert("Please enter a Loan Plan or Amount to Calculate")
				}else{
					var lplan=$("#lplan option:selected").text();
					var months=parseFloat(lplan.split('months')[0]);
					var splitter=lplan.split('months')[1];
					var findinterest=splitter.split('%')[0];
					var interest=parseFloat(findinterest.replace(/[^0-9.]/g, ""));
					var findpenalty=splitter.split('%')[1];
					var penalty=parseFloat(findpenalty.replace(/[^0-9.]/g, ""));
					
					var amount=parseFloat($("#amount").val());
					
					var monthly =(amount + (amount * (interest/100))) / months;
					var penalty=monthly * (penalty/100);
					var totalAmount=amount+monthly;
					
					
					
					$("#tpa").text("\u20B1 "+totalAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					$("#mpa").text("\u20B1 "+monthly.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					$("#pa").text("\u20B1 "+penalty.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					
					$("#calcTable").show();
				}
				
			});
			
			
			$("#updateCalculate").click(function(){
				if($("#ulplan").val() == "" || $("#uamount").val() == ""){
					alert("Please enter a Loan Plan or Amount to Calculate")
				}else{
					var lplan=$("#ulplan option:selected").text();
					var months=parseFloat(lplan.split('months')[0]);
					var splitter=lplan.split('months')[1];
					var findinterest=splitter.split('%')[0];
					var interest=parseFloat(findinterest.replace(/[^0-9.]/g, ""));
					var findpenalty=splitter.split('%')[1];
					var penalty=parseFloat(findpenalty.replace(/[^0-9.]/g, ""));
					
					var amount=parseFloat($("#uamount").val());
					
					var monthly =(amount + (amount * (interest/100))) / months;
					var penalty=monthly * (penalty/100);
					var totalAmount=amount+monthly;
					
					
					
					$("#utpa").text("\u20B1 "+totalAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					$("#umpa").text("\u20B1 "+monthly.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					$("#upa").text("\u20B1 "+penalty.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					

				}
				
			});
			
			$('#dataTable').DataTable();
			$('#dataTable1').DataTable();
		});
	</script>

</body>

</html>