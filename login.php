<?php
	require_once'class.php';
	session_start();

	use  PHPMailer\PHPMailer\PHPMailer;
									use PHPMailer\PHPMailer\Exception;

									require 'phpmailer/src/Exception.php';
									require 'phpmailer/src/PHPMailer.php';
									require 'phpmailer/src/SMTP.php';

	
	if(ISSET($_POST['login'])){
	
		$db=new db_class();
		$username=$_POST['username'];
		$password=$_POST['password'];
		$get_id=$db->login($username, $password);
		

		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;

		$usernses = $_SESSION['username'];
		$passnses = $_SESSION['password']; 
		


		$role = "admin";

		if($get_id['count'] > 0){
			
			$conn = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn, "cmdl");
            $retrieve_query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
            $check_rows = mysqli_num_rows($retrieve_query);

            if($check_rows > 0){
            	while($row =mysqli_fetch_assoc($retrieve_query)){

            		$db_role = $row['role'];
            		$db_firstname = $row['firstname'];
            		$db_lastname = $row['lastname'];
            		$email = $row['email'];

            		if($role == $db_role){
            			//login ng admin
            			$_SESSION['user_id']=$get_id['user_id'];
            			$_SESSION['firstname'] = $db_firstname;
            			$_SESSION['lastname'] = $db_lastname;


            			$otp = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);

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

										$mail->Subject = 'CMDL - ADMIN LOGIN OTP CODE';

										$mail->Body = 'This is your One Time Pin code <strong>'.$otp .'</strong>. Paste it on the OTP page for verification, Thank you and have a good day!';

										$mail->send();


						$query1 = "UPDATE user SET otp='$otp' WHERE username='$username' AND password = '$password'" ;
       									$query_exec = mysqli_query($conn,$query1);

       									  if($query_exec){



						unset($_SESSION['message']);
						echo"<script>alert('OTP sent to your email. Please check your registered email.')</script>";
						echo"<script>window.location='otpadmin.php'</script>";

						}

            		}else if($role != $db_role){





            			//login ng user
            			$_SESSION['user_id']=$get_id['user_id'];
            			$_SESSION['firstname'] = $db_firstname;
            			$_SESSION['lastname'] = $db_lastname;

            			$retrieve_query = mysqli_query($conn, "SELECT * FROM borrower WHERE firstname = '$db_firstname' AND lastname = '$db_lastname'");
            				while($row =mysqli_fetch_assoc($retrieve_query)){

            						$db_email = $row['email'];
            				}

            				$otp = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);

            							$mail = new PHPMailer(true);


										$mail->isSMTP();
										$mail->Host = 'smtp.gmail.com';
										$mail->SMTPAuth = true;
										$mail->Username = 'cashmdl2025@gmail.com';
										$mail->Password = 'sywo jzyf obri srbx';
										$mail->SMTPSecure = 'ssl';
										$mail->Port = '465';


										$mail->setFrom('cashmdl2025@gmail.com');
										$mail->addAddress($db_email); //receiver address

										$mail->isHTML(true);

										$mail->Subject = 'CMDL - LOGIN OTP CODE';

										$mail->Body = 'This is your One Time Pin code <strong>'.$otp .'</strong>. Paste it on the OTP page for verification, Thank you and have a good day!';

										$mail->send();
							

						$query1 = "UPDATE user SET otp='$otp' WHERE username='$username' AND password = '$password'" ;
       									$query_exec = mysqli_query($conn,$query1);

       									  if($query_exec){


						unset($_SESSION['message']);
						echo"<script>alert('OTP sent to your email. Please check your registered email.')</script>";
						echo"<script>window.location='otp.php'</script>";
						}
            		}
            	}
            }

			



		}else{
			$_SESSION['message']="Invalid Username or Password";

			echo"<script>window.location='index.php'</script>";
		}
	}
?>