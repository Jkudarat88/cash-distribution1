<?php date_default_timezone_set("Asia/Taipei");?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cash Management & Distribution Loan</title>

    <link href="css/all.css" rel="stylesheet" type="text/css">
  
   
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>

<body style="background-image: url('back1.jpg'); background-repeat: no-repeat;background-size: cover;
">
	<nav class="navbar navbar-expand-lg" >
		<a class="navbar-brand" href="" style="color: white;"></a>
	</nav>
    <div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background-color: #088F8F;"><h2 style="text-align: center; margin-top: 55px; font-family: 'Courier New', monospace; color:white;">CASH MANAGEMENT & DISTRIBUTION LOAN</h2>
                            <img src="loangif.gif" alt="" height="300" width="452">
                        </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                    </div>
                                    <form method="POST" class="user" action="login.php">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="" required>
                                        </div>
										<?php 
											session_start();
											if(ISSET($_SESSION['message'])){
												echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
											}
										?>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login" style="background-color: #088F8F;">Login</button>
                                        <button type="button" onclick="location.href = 'register.php';" class="btn btn-primary btn-user btn-block" name="register" style="background-color: #89CFF0;">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</body>

</html>