<?php
require_once'class.php';
    session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>OTP Verification</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      color: #fff;
    }

    .otp-container {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border-radius: 16px;
      padding: 40px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      text-align: center;
      animation: fadeInUp 0.8s ease;
    }

    .otp-container h4 {
      margin-bottom: 25px;
      font-weight: 600;
      color: #ffffff;
    }

    .otp-full {
      width: 100%;
      height: 55px;
      font-size: 24px;
      text-align: center;
      letter-spacing: 8px;
      border-radius: 10px;
      border: 2px solid #1abc9c;
      background: #ffffff10;
      color: #fff;
      transition: all 0.3s ease;
    }

    .otp-full:focus {
      border-color: #1abc9c;
      box-shadow: 0 0 12px rgba(26, 188, 156, 0.6);
      outline: none;
      transform: scale(1.02);
    }

    .btn-confirm {
      margin-top: 30px;
      width: 100%;
      padding: 12px;
      font-weight: 600;
      border-radius: 10px;
      background-color: #1abc9c;
      color: white;
      border: none;
      font-size: 16px;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-confirm:hover {
      background-color: #16a085;
      transform: scale(1.05);
    }

    @keyframes fadeInUp {
      from {
        transform: translateY(50px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
</head>
<body>

  <div class="otp-container">
    <h4>🔐 Enter Your 6-Digit OTP</h4>
    <form id="otpForm" action="" method="POST">
      <input type="text" name="otptext" maxlength="6" class="otp-full" placeholder="______" required />
      <button type="submit" name="otpsub" class="btn btn-confirm">Confirm</button>
    </form>
  </div>

  <?php

            $conn = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn, "cmdl");

            $username = $_SESSION['username'];
            $password = $_SESSION['password'];


            if(isset($_POST["otpsub"])){

            $otptext = $_POST['otptext'];


            $retrieve_query = mysqli_query($conn, "SELECT otp FROM user WHERE username = '$username' AND password = '$password'");
            $check_rows = mysqli_num_rows($retrieve_query);

            if($check_rows > 0){
                while($row =mysqli_fetch_assoc($retrieve_query)){
                        $otp = $row['otp'];
                    }

                        if($otptext == $otp){

                        echo"<script>alert('OTP successfully verified.')</script>";
                        echo"<script>window.location='./facedetection/face-detection.php'</script>";

                        }else{

                        echo"<script>alert('OTP incorrect. Please input the OTP on your email.')</script>";
                        echo"<script>window.location='otp.php'</script>";
                            
                        }



                
            }
        }

  ?>


</body>
</html>
