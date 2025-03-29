<?php
require_once'../class.php';
    session_start();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Detection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/face-api.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
    <style>
        /* Fullscreen background */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }

        .container {
            text-align: center;
            width: 60%;
            max-width: 500px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .container h3 {
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
            color: #333;
        }

        #webcam-container {
            position: relative;
            width: 100%;
            height: 300px;
            margin-bottom: 20px;
            background-color: #000;
            border-radius: 10px;
            overflow: hidden;
        }

        #webcam {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .loading {
            display: none;
        }

        .message {
            font-size: 18px;
            font-family: Arial, sans-serif;
            color: #333;
            margin-top: 15px;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Face Verification</h3>
       
        <div id="webcam-container">
            <video id="webcam" autoplay muted playsinline></video>
        </div>
        <div class="loading d-none">
            <div class="spinner-border" role="status">
                <span class="sr-only"></span>
            </div>
            Loading Model...
        </div>
        <div class="message">
            <strong>Please center your face in the camera frame.</strong><br>
            This is to ensure you are a real person and not a bot.
        </div>
        <div id="errorMsg" class="alert alert-danger d-none">
            Fail to start camera. Please allow camera permissions.
        </div>
    </div>

    <script src="js/face-detection.js"></script>
</body>
</html>
