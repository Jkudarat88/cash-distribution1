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
    <script>
        // Function to enable/disable the register button based on the checkbox state
        function toggleRegisterButton() {
            const checkbox = document.getElementById("termsCheckbox");
            const registerButton = document.getElementById("registerButton");

            if (checkbox.checked) {
                registerButton.disabled = false;  // Enable the Register button
            } else {
                registerButton.disabled = true;  // Disable the Register button
            }
        }
    </script>

</head>

<body style="background-image: url('back1.jpg'); background-repeat: no-repeat;background-size: cover;">
    <nav class="navbar navbar-expand-lg" >
        <a class="navbar-brand" href="" style="color: white;"></a>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background-color: #088F8F;">
                                <h2 style="text-align: center; margin-top: 120px; font-family: 'Courier New', monospace; color:white;">CASH MANAGEMENT & DISTRIBUTION LOAN</h2>

                                <img src="loangif.gif" alt="" height="300" width="452">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">REGISTER</h1>
                                    </div>
                                    <form method="POST" class="user" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control form-control-user" name="firstname" placeholder="" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control form-control-user" name="middlename" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control form-control-user" name="lastname" placeholder="" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact No.</label>
                                            <input type="tel" class="form-control form-control-user" placeholder="Eg.[0965 567 6544]" pattern="[0-9]{4} [0-9]{3} [0-9]{4}" name="contact" placeholder="" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control form-control-user" placeholder="" name="address" placeholder="" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control form-control-user" placeholder="" name="email" placeholder="" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>TIN ID</label>
                                            <input type="text" class="form-control form-control-user" placeholder="" name="tinid" placeholder="" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Current work</label>
                                            <input type="text" class="form-control form-control-user" name="work" placeholder="" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Monthly Salary</label>
                                            <input type="text" class="form-control form-control-user" name="salary" placeholder="" required="required">
                                        </div>

                                        <!-- Checkbox for Terms and Conditions -->
                                        <div class="form-group">
                                            <input type="checkbox" id="termsCheckbox" onclick="toggleRegisterButton()">
                                            <label for="termsCheckbox"> I accept the <a href="#">Terms and Agreements</a></label>
                                        </div>

                                        <!-- Register Button (Initially disabled) -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="register" id="registerButton" style="background-color: #89CFF0;" disabled>Register</button>
                                    </form>
                                </div>

                                <?php
                                    $conn = mysqli_connect('localhost','root','');
                                    $db = mysqli_select_db($conn, 'cmdl');

                                    if(isset($_POST["register"])){

                                        $username = $_POST['username'];
                                        $password = $_POST['password'];
                                        $fname = $_POST['firstname'];
                                        $mname = $_POST['middlename'];
                                        $lname = $_POST['lastname'];
                                        $contact = $_POST['contact'];
                                        $address = $_POST['address'];
                                        $email = $_POST['email'];
                                        $tinid = $_POST['tinid'];
                                        $work = $_POST['work'];
                                        $salary = $_POST['salary'];

                                        $query = "INSERT INTO borrower (firstname, middlename, lastname,contact_no,address,email,tax_id,work,salary) VALUES ('$fname', '$mname', '$lname','$contact','$address','$email','$tinid','$work',$salary)";
                                        $query1 = "INSERT INTO user (username,password,firstname,lastname,role) VALUES ('$username','$password','$fname','$lname','user')";
                                        $query_exec = mysqli_query($conn,$query);
                                        $query_exec1 = mysqli_query($conn,$query1);

                                        if($query_exec && $query_exec1){
                                            echo "<script language='javascript'>alert('Registration Successful. Redirecting to Login Page')</script>";
                                            echo "<script>window.location.href='index.php';</script>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
