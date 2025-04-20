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
			<li class="nav-item active">
                <a class="nav-link" href="loan_user.php">
                    <i class="fas fa-fw fas fa-comment-dollar"></i>
                    <span>Loans</span></a>
            </li>
			<li class="nav-item">
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
                        <h1 class="h3 mb-0 text-gray-800">My Loan</h1>
                    </div>
					<button class="mb-2 btn btn-lg btn-success" href="#" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span> Apply for a new Loan</button>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            
                                            <th>Loan Detail</th>
                                            <th>Loan Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	
										<?php

											$connections = mysqli_connect("localhost","root","","cmdl");

											$name1 = $db->user_acc($_SESSION['user_id']);

											$retrieve_query = mysqli_query($connections, "SELECT * FROM loan_application
											WHERE name = '$name1'");

                        while($row = mysqli_fetch_assoc($retrieve_query)) {
                        					$id = $row['id'];
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

											echo "<tr >
												<th style='font-weight: normal;'>$refno</th>
												<th style='font-weight: normal;'>$loantype</th>
												<th style='font-weight: normal;'>$amount</th>
												<th style='font-weight: normal;'>$status</th>
												<th >
												<button class='form-control btn btn-primary' type='button' 
												data-toggle='modal' data-target='#viewModal$id'> View </button>
												</th>
											</tr>";


											echo "
							<!-- View Loan Details Modal-->
							<div class='modal fade' id='viewModal$id' aria-hidden='true'>
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

														$retrieve_query = mysqli_query($connections, "SELECT * FROM monthly_payment_tbl WHERE name='$name1' AND refno = '$refno' ");



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

                                       
										
										
										<!-- Update User Modal -->
										
										
										
										
										<!-- Delete Loan Modal -->
										
										
										<!-- View Payment Schedule -->
										
										
										
										
										
										
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
		<div class="modal-dialog modal-lg">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
                                            ?>">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white">Loan Application</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-row">
							<div class="form-group col-xl-6 col-md-6">
								<label>Borrower</label>
								<br />
								<input type="text" name="borrower" value="<?php echo $db->user_acc($_SESSION['user_id'])?>" class="form-control" style="width:100%;" disabled>
								<input type="hidden" name="nameborrow" value="<?php echo $db->user_acc($_SESSION['user_id'])?>">
							</div>
							<div class="form-group col-xl-6 col-md-6">
								<label>Loan type</label>
								<br />
								<select name="ltype" class="loan" required="required" style="width:100%;">
										<option value=""></option>
									<?php
										$tbl_ltype=$db->display_ltype();
										while($fetch=$tbl_ltype->fetch_array()){
									?>
										<option value="<?php echo $fetch['ltype_name']?>"><?php echo $fetch['ltype_name']?></option>
									<?php
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-xl-6 col-md-6">
								<label>Loan Plan</label>
								<select name="lplan" class="form-control" required="required" id="lplan">
										<option value="">Please select an option</option>
									<?php
										$tbl_lplan=$db->display_lplan();
										while($fetch=$tbl_lplan->fetch_array()){
									?>
										<option value="<?php echo $fetch['lplan_month']." months[".$fetch['lplan_interest']."%, ".$fetch['lplan_penalty']."%]"?>"><?php echo $fetch['lplan_month']." months[".$fetch['lplan_interest']."%, ".$fetch['lplan_penalty']."%]"?></option>
									<?php
										}
									?>
								</select>
								<label>Months[Interest%, Penalty%]</label>
							</div>
							<div class="form-group col-xl-6 col-md-6">
								<label>Loan Amount</label>
								<input type="number" name="loan_amount" class="form-control" id="amount" required="required"/>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-xl-6 col-md-6">
								<label>Purpose</label>
								<textarea name="purpose" class="form-control" style="resize:none; height:200px;" required="required"></textarea>
							</div>


							<div class="form-group col-xl-12">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="groupLoanCheckbox">
									<label class="form-check-label" for="groupLoanCheckbox">
										Group Loan
									</label>
								</div>
							</div>

							<!-- Co-Borrowers Section (Initially Hidden) -->
							<div id="coBorrowersSection" style="display: none;">
							<input type="hidden" id="isGroupLoan" name="is_group_loan" value="0">

								<div class="form-row">
									<div class="form-group col-md-6">
										<label>2. Co-Borrower Name</label>
										<input type="text" name="co_borrower2_name" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<label>2. Co-Borrower Email</label>
										<input type="email" name="co_borrower2_email" class="form-control">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>3. Co-Borrower Name</label>
										<input type="text" name="co_borrower3_name" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<label>3. Co-Borrower Email</label>
										<input type="email" name="co_borrower3_email" class="form-control">
									</div>
								</div>
							</div>
							<!-- co borrowers section end -->

							<div class="form-group col-xl-6 col-md-6">
								<button type="button" class="btn btn-primary btn-block" id="calculate">Calculate Amount</button>
							</div>
						</div>
						<hr>
						<div class="row" id="calcTable">
							<div class="col-xl-4 col-md-4">

								<input type="hidden" name="months"  id="months">

								<center><span>Total Payable Amount</span></center>
								<center><span id="tpa"></span></center>
								<input type="text" class="form-control" id="totp" name="pay" 
								style="text-align:center;" readonly>
							</div>
							<div class="col-xl-4 col-md-4">
								<center><span >Monthly Payable Amount</span></center>
								<center><span id="mpa"></span></center>
								<input type="text" class="form-control" id="monthp" name="month" 
								style="text-align:center;" readonly>
							</div>
							<div class="col-xl-4 col-md-4">
								<center><span>Penalty Amount</span></center>
								<center><span id="pa"></span></center>
								<input type="text" class="form-control" id="penalp" name="penal" 
								style="text-align:center;" readonly>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button type="submit" name="apply" class="btn btn-primary">Apply</button>
					</div>
				</div>
			</form>

				


		</div>
	</div>


	

	<?php

					

									$conn = mysqli_connect('localhost','root','');
                                    $db = mysqli_select_db($conn, 'cmdl');

                                    use  PHPMailer\PHPMailer\PHPMailer;
									use PHPMailer\PHPMailer\Exception;

									require 'phpmailer/src/Exception.php';
									require 'phpmailer/src/PHPMailer.php';
									require 'phpmailer/src/SMTP.php';


                                    if(isset($_POST["apply"])){


                                    	 $months = $_POST['months'];

                                    	 //$_SESSION['months'] = $months;

                                    	 $name1 = $_POST['nameborrow'];
                                    	 $arrays = explode(" ",$name1);
										 //print_r($arrays);

										 $fname = $arrays[0];
										 $lname = $arrays[1];

                                    	 $ref_no = mt_rand(1,99999999);

                                    	 $loantype = $_POST['ltype'];
                                    	 $loanplan = $_POST['lplan'];
                                    	 $loanamount = $_POST['loan_amount'];

                                    	 $totalpay = str_replace(',', '', $_POST['pay']);
                                    	 $monthly = str_replace(',', '', $_POST['month']);
                                    	 $penalty = str_replace(',', '', $_POST['penal']);
                                    	 $purpose = $_POST['purpose'];

                                    	 $total = str_replace(',', '', $totalpay);

                                    	$is_group_loan = isset($_POST['is_group_loan']) && $_POST['is_group_loan'] == '1';

                                    	 
                                    	if ($is_group_loan) {

										    $coborrower1_name = $_POST['co_borrower2_name'];
										    $coborrower1_email = $_POST['co_borrower2_email'];
										    $coborrower2_name = $_POST['co_borrower3_name'];
										    $coborrower2_email = $_POST['co_borrower3_email'];

										$mail = new PHPMailer(true);


										$mail->isSMTP();
										$mail->Host = 'smtp.gmail.com';
										$mail->SMTPAuth = true;
										$mail->Username = 'cashmdl2025@gmail.com';
										$mail->Password = 'sywo jzyf obri srbx';
										$mail->SMTPSecure = 'ssl';
										$mail->Port = '465';


										$mail->setFrom('cashmdl2025@gmail.com');
										$mail->addAddress($coborrower1_email); //receiver address
										$mail->addAddress($coborrower2_email); //receiver address

										$mail->isHTML(true);

										$mail->Subject = 'CMDL - GROUP LOAN APPLICATION NOTICE';

										$mail->Body = 'This is to inform you that <strong>'.$fname .' '. $lname .'</strong> has applied for a group loan application with reference <strong>'. $ref_no .'</strong> amounting <strong>₱ '.$loanamount .'</strong>.<br><br>
											List of co-borrowers:<br>
											1. <strong>'.$coborrower1_name.'</strong><br>
											2. <strong>'.$coborrower2_name.'</strong><br>
											<br>
											Please contact the major loan user if you think this is without your consent. Otherwise, please wait the proces of approval for this application. Thank you.<br>';

										$mail->send();



										    // Optional: Validate or sanitize these values
										    $retrieve_query = mysqli_query($conn, "SELECT DISTINCT * FROM borrower WHERE firstname = '$fname' AND lastname = '$lname' LIMIT 1");
                        $check_rows = mysqli_num_rows($retrieve_query);
                        if($check_rows > 0){
                        		//TO CHECK IF THERE IS AN EXISTING APPLICATION SHOULD ONLY HAVE 1 LOAN APPLICATION
                        			$retrieve_query1 = mysqli_query($conn, "SELECT * FROM loan_application WHERE name = '$name1' AND status != 'REJECTED'");
                        $check_rows = mysqli_num_rows($retrieve_query1);
                        if($check_rows == 0){

                        				while($row =mysqli_fetch_assoc($retrieve_query)){

                        					$db_contact = $row['contact_no'];
                        					$db_address = $row['address'];
                        					}

                        					//insert into loan application table

                        					$query = "INSERT INTO loan_application (name, contact, address,refno,loantype,loanplan,amount,totalpayable,monthlypayable,overduepayable,status,months,purpose,coborrower1, coborrower1_email,coborrower2, coborrower2_email) VALUES ('$name1', '$db_contact', '$db_address','$ref_no','$loantype','$loanplan',$loanamount,
                        						$totalpay,$monthly,$penalty,'FOR APPROVAL',$months,'$purpose','$coborrower1_name','$coborrower1_email','$coborrower2_name','$coborrower2_email')";

                        					$query_exec = mysqli_query($conn,$query);


       if($query_exec){
       		echo "<script language='javascript'>alert('Loan Application successful. Loan Application subject for approval.')</script>";
            echo "<script>window.location.href='loan_user.php';</script>";

       }else{
       		echo "<script language='javascript'>alert('ERROR PRE.')</script>";
       			}
       		
       	


                        				
                        			}else{
                        				echo "<script language='javascript'>alert('You cannot apply for another loan application because you have a pending application/unfinished loan. Or you have been rejected for a loan application and you may apply after 3 months.')</script>";
            echo "<script>window.location.href='loan_user.php';</script>";
                        			}





                                    }else{
                                    	echo "<script language='javascript'>alert('WALANG BORROWER.')</script>";
                                    }


										} else {

										    $coborrower1_name = $coborrower1_email = $coborrower2_name = $coborrower2_email = null;

										    $retrieve_query = mysqli_query($conn, "SELECT DISTINCT * FROM borrower WHERE firstname = '$fname' AND lastname = '$lname' LIMIT 1");
                        $check_rows = mysqli_num_rows($retrieve_query);
                        if($check_rows > 0){
                        		//TO CHECK IF THERE IS AN EXISTING APPLICATION SHOULD ONLY HAVE 1 LOAN APPLICATION
                        			$retrieve_query1 = mysqli_query($conn, "SELECT * FROM loan_application WHERE name = '$name1' AND status != 'REJECTED'");
                        $check_rows = mysqli_num_rows($retrieve_query1);
                        if($check_rows == 0){

                        				while($row =mysqli_fetch_assoc($retrieve_query)){

                        					$db_contact = $row['contact_no'];
                        					$db_address = $row['address'];
                        					}

                        					//insert into loan application table

                        					$query = "INSERT INTO loan_application (name, contact, address,refno,loantype,loanplan,amount,totalpayable,monthlypayable,overduepayable,status,months,purpose,coborrower1, coborrower1_email,coborrower2, coborrower2_email) VALUES ('$name1', '$db_contact', '$db_address','$ref_no','$loantype','$loanplan',$loanamount,
                        						$totalpay,$monthly,$penalty,'FOR APPROVAL',$months,'$purpose','$coborrower1_name','$coborrower1_email','$coborrower2_name','$coborrower2_email')";

                        					$query_exec = mysqli_query($conn,$query);


       if($query_exec){
       		echo "<script language='javascript'>alert('Loan Application successful. Loan Application subject for approval.')</script>";
            echo "<script>window.location.href='loan_user.php';</script>";

       }else{
       		echo "<script language='javascript'>alert('ERROR PRE.')</script>";
       			}
       		
       	


                        				
                        			}else{
                        				echo "<script language='javascript'>alert('You cannot apply for another loan application because you have a pending application/unfinished loan. Or you have been rejected for a loan application and you may apply after 3 months.')</script>";
            echo "<script>window.location.href='loan_user.php';</script>";
                        			}





                                    }else{
                                    	echo "<script language='javascript'>alert('WALANG BORROWER.')</script>";
                                    }


										}

									}








                          		if(isset($_POST["cancelapp"])){

                          			$refno = $_POST['refno'];

                          			$query1 = "DELETE FROM loan_application WHERE refno='$refno'" ;
                                    	$query_exec = mysqli_query($connections,$query1);
                                    	  if($query_exec){
                          				
                          				echo "<script language='javascript'>alert('Application successfully cancelled.')</script>";
            							echo "<script>window.location.href='loan_user.php';</script>";


                          		}

                          	}


				?>
	
	
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
			//$("#calcTable").hide();
			
			
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
					
					var getInterest = amount * (interest/100);
					var monthly =(amount + (amount * (interest/100))) / months;
					var penalty=monthly * (penalty/100);
					var totalAmount=amount+getInterest;
					
					var totalpay = totalAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2});

					var monthpay = monthly.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2});

					var penaltypay = penalty.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2});
					
					//$("#tpa").text("\u20B1 "+totalAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					//$("#mpa").text("\u20B1 "+monthly.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					//$("#pa").text("\u20B1 "+penalty.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));


					document.getElementById("totp").value = totalpay;
					document.getElementById("monthp").value = monthpay;
					document.getElementById("penalp").value = penaltypay;
					document.getElementById("months").value = months;




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
		});
	</script>

	<script>
	document.addEventListener("DOMContentLoaded", function () {
		const checkbox = document.getElementById("groupLoanCheckbox");
		const coBorrowersSection = document.getElementById("coBorrowersSection");
		const isGroupLoan = document.getElementById("isGroupLoan");

		checkbox.addEventListener("change", function () {
			if (this.checked) {
				coBorrowersSection.style.display = "block";
				isGroupLoan.value = "1";
			} else {
				coBorrowersSection.style.display = "none";
				isGroupLoan.value = "0";
			}
		});
	});
</script>


</body>

</html>