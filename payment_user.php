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
                <div class="sidebar-brand-text mx-3">CMDL</div>
            </a>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home_user.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="loan_user.php">
                    <i class="fas fa-fw fas fa-comment-dollar"></i>
                    <span>Loans</span></a>
            </li>
			<li class="nav-item active">
                <a class="nav-link" href="payment_user.php">
                    <i class="fas fa-fw fas fa-coins"></i>
                    <span>Payments</span></a>
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
						<button class="ml-3 mb-3 btn btn-lg btn-primary" href="#" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span> New Payment</button>
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
                                            <th>Due Date</th>
                                            <th>Amount</th>
                                            <th>Reference Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php

										$connections = mysqli_connect("localhost","root","","cmdl");

                                            $name1 = $db->user_acc($_SESSION['user_id']);

                                            $retrieve_query = mysqli_query($connections, "SELECT * FROM loan_application WHERE name = '$name1' AND (status = 'APPROVED' OR status='DISBURSED')");
									while($row =mysqli_fetch_assoc($retrieve_query)){

												$refno = $row['refno'];

									

                                            $retrieve_query = mysqli_query($connections, "SELECT * FROM user_payment
                                            	WHERE name = '$name1' AND refno = '$refno' ");

                        				while($row = mysqli_fetch_assoc($retrieve_query)) {

                        						$id = $row['id'];
                        						$refno = $row['refno'];
                        						$amtpaid = $row['amountpaid'];
                        						$due = $row['duedate'];
                        						$datepaid = $row['datepaid'];
                        						$refcode = $row['refcode'];
                        						$status = $row['status'];


                        						echo "
                        						<tr>
                        							<th>$id</td>
                        							<th>$refno</th>
                        							<th>$due</th>
                        							<th>$amtpaid</th>
                        							<th>$refcode</th>
                        							<th>
                        								<div>
                        									<button type='button' class='form-control btn-secondary' data-toggle='modal' data-target='#view$id'>View</button>
                        								</div>

                        							</th>
                        						</tr>


                        						";

                        						echo "<!-- Confirm Loan Disbursement Modal-->
							<div class='modal fade' id='view$id' aria-hidden='true'>
								<div class='modal-dialog modal-lg'>
									<form method='POST' action=''>
										<div class='modal-content'>
											<div class='modal-header bg-primary'>
												<h5 class='modal-title text-white'>Loan Payment Details</h5>
												<button class='close' type='button' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>×</span>
												</button>
											</div>
											<div class='modal-body'>
											<div class='form-row'>
											<div class='form-group col-xl-6 col-md-6'>
												<label>Loan Reference No.</label>
												<input type='text' class='form-control' value='$refno' readonly>

												</div>
												
											<div class='form-group col-xl-6 col-md-6'>
													<label>Due Date</label>
												<input type='text' class='form-control' value='$due' readonly>
													<br />
														
												</div>
												<div class='form-group col-xl-6 col-md-6'>
													<label>Date Paid</label>
												<input type='text' class='form-control' value='$datepaid' readonly>
													<br />
														
												</div>
												<div class='form-group col-xl-6 col-md-6'>
													<label>Amount Paid</label>
												<input type='text' class='form-control' value='$amtpaid' readonly>
													<br />
														
												</div>

												<div class='form-group col-xl-6 col-md-6'>
													<label>Payment Reference Code</label>
												<input type='text' class='form-control' value='$refcode' readonly>
													<br />
														
												</div>

												<div class='form-group col-xl-6 col-md-6'>
													<label>Status</label>
												<input type='text' class='form-control' value='$status' readonly>
													<br />
														
												</div>
												
											</div>
											<div class='form-row'>
												<hr>
											
											</div>
											<div class='form-row'>
											
											
											</div>
											<div style='text-align:center;'>
											
											</div>
										

										</div>
										<hr>
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
			<form method="POST" action="payment_fillup.php">
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
								<label>REFERENCE NO.</label>
								<br />
								<select name="refno" class="ref_no" id="" required="required" style="width:465px;">
									<option value=""></option>
									<?php

									$name = $db->user_acc($_SESSION['user_id']);


									$conn = mysqli_connect('localhost','root','');
                                    $db = mysqli_select_db($conn, 'cmdl');



									$retrieve_query = mysqli_query($conn, "SELECT * FROM loan_application WHERE name = '$name' AND (status = 'APPROVED' OR status='DISBURSED')");
									while($row =mysqli_fetch_assoc($retrieve_query)){

											$ref = $row['refno'];
											$monthly = $row['monthlypayable'];


										echo "<option value='$ref'>$ref</option>";

									}

									?>	
								</select>
								
								<label>PAY FOR</label>
								<select name="paydate" class="ref_no" id="" required="required" style="width:465px;">
									<option value=""></option>
									<?php

									



									$retrieve_query = mysqli_query($conn, "SELECT * FROM monthly_payment_tbl WHERE name = '$name' AND refno ='$ref' ");
									while($row =mysqli_fetch_assoc($retrieve_query)){
											$months = $row['months'];
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

											if($months == 12){
										echo "<option value='$p1'>FIRST PAYMENT: $p1</option>";
										echo "<option value='$p2'>SECOND PAYMENT: $p2</option>";
										echo "<option value='$p3'>THIRD PAYMENT: $p3</option>";
										echo "<option value='$p4'>FOURTH PAYMENT: $p4</option>";
										echo "<option value='$p5'>FIFTH PAYMENT: $p5</option>";
										echo "<option value='$p6'>SIXTH PAYMENT: $p6</option>";
										echo "<option value='$p7'>SEVENTH PAYMENT: $p7</option>";
										echo "<option value='$p8'>EIGHTH PAYMENT: $p8</option>";
										echo "<option value='$p9'>NINTH PAYMENT: $p9</option>";
										echo "<option value='$p10'>TENTH PAYMENT: $p10</option>";
										echo "<option value='$p11'>ELEVENTH PAYMENT: $p11</option>";
										echo "<option value='$p12'>LAST PAYMENT: $p12</option>";

											}else if($months == 6){
										echo "<option value='$p1'>FIRST PAYMENT: $p1</option>";
										echo "<option value='$p2'>SECOND PAYMENT: $p2</option>";
										echo "<option value='$p3'>THIRD PAYMENT: $p3</option>";
										echo "<option value='$p4'>FOURTH PAYMENT: $p4</option>";
										echo "<option value='$p5'>FIFTH PAYMENT: $p5</option>";
										echo "<option value='$p6'>LAST PAYMENT: $p6</option>";
											}else if($months == 3){
										echo "<option value='$p1'>FIRST PAYMENT: $p1</option>";
										echo "<option value='$p2'>SECOND PAYMENT: $p2</option>";
										echo "<option value='$p3'>LAST PAYMENT: $p3</option>";
											}

											
									}

									echo "</select>";
									
									

									?>	

							<input type="hidden" name="monthly" value='<?php echo $monthly; ?>'>
							</div>

							
						</div>
						<div id="formField"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button type="submit" name="proceed" class="btn btn-primary">Proceed to Payment</a>
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

    			if(isset($_POST["proceed"])){


    				echo "<script language='javascript'>alert('Proceeding to Payment Forms.')</script>";
            							

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