<?php
date_default_timezone_set("Asia/Taipei");
require_once 'session.php';
require_once 'class.php';
$db = new db_class(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CASH MANAGEMENT & DISTRIBUTION LOAN</title>

    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <!-- Sidebar Links -->
            <li class="nav-item active"><a class="nav-link" href="home.php"><i class="fas fa-fw fa-home"></i><span>Home</span></a></li>
            <li class="nav-item"><a class="nav-link" href="loan.php"><i class="fas fa-fw fas fa-comment-dollar"></i><span>Loans</span></a></li>
            <li class="nav-item"><a class="nav-link" href="payment.php"><i class="fas fa-fw fas fa-coins"></i><span>Payments</span></a></li>
            <li class="nav-item"><a class="nav-link" href="borrower.php"><i class="fas fa-fw fas fa-book"></i><span>Borrowers</span></a></li>
            <li class="nav-item"><a class="nav-link" href="loan_plan.php"><i class="fas fa-fw fa-piggy-bank"></i><span>Loan Plans</span></a></li>
            <li class="nav-item"><a class="nav-link" href="loan_type.php"><i class="fas fa-fw fa-money-check"></i><span>Loan Types</span></a></li>
            <li class="nav-item"><a class="nav-link" href="user.php"><i class="fas fa-fw fa-user"></i><span>Users</span></a></li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $db->user_acc($_SESSION['user_id'])?></span>
                                <img class="img-profile rounded-circle" src="image/admin_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Active Loans Box -->
                        <div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Active Loans</div>
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">
                                                <?php 
                                                    $tbl_loan = $db->conn->query("SELECT * FROM `loan` WHERE `status`='2'");
                                                    echo $tbl_loan->num_rows > 0 ? $tbl_loan->num_rows : "0";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fas fa-comment-dollar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small stretched-link" href="loan.php">View Loan List</a>
                                    <div class="small"><i class="fa fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Payments Today Box -->
                        <div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Payments Today</div>
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">
                                                <?php 
                                                    $tbl_payment = $db->conn->query("SELECT sum(pay_amount) as total FROM `payment` WHERE date(date_created)='".date("Y-m-d")."'");
                                                    echo $tbl_payment->num_rows > 0 ? "&#8369; ".number_format($tbl_payment->fetch_array()['total'], 2) : "&#8369; 0.00";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fas fa-coins fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small stretched-link" href="payment.php">View Payments</a>
                                    <div class="small"><i class="fa fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Borrowers Box -->
                        <div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Borrowers</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php 
                                                            $tbl_borrower = $db->conn->query("SELECT * FROM `borrower`");
                                                            echo $tbl_borrower->num_rows > 0 ? $tbl_borrower->num_rows : "0";
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small stretched-link" href="borrower.php">View Borrowers</a>
                                    <div class="small"><i class="fa fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart below the boxes -->
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Monthly Active Loans, Payments, and Borrowers Chart</h5>
                                    <canvas id="myChart"></canvas> <!-- Canvas for the chart -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Bootstrap core JavaScript-->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="js/jquery.easing.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.js"></script>

        <!-- Chart.js script -->
        <script>
            // Sample data for the chart (replace with dynamic PHP data)
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar', // You can change this to 'line', 'pie', etc. based on your preference
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'], // Time labels
                    datasets: [{
                        label: 'Active Loans',
                        data: [10, 20, 30, 40, 50, 60], // Replace with dynamic values from PHP
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Payments Today',
                        data: [200, 300, 400, 500, 600, 700], // Replace with dynamic values from PHP
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Borrowers',
                        data: [5, 10, 15, 20, 25, 30], // Replace with dynamic values from PHP
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        }
                    }
                }
            });
        </script>

</body>

</html>
