<?php
	require_once'class.php';
	session_start();
	
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

            		if($role == $db_role){
            			//login ng admin
            			$_SESSION['user_id']=$get_id['user_id'];
            			$_SESSION['firstname'] = $db_firstname;
            			$_SESSION['lastname'] = $db_lastname;
						unset($_SESSION['message']);
						echo"<script>alert('Admin Login Successful')</script>";
						echo"<script>window.location='home.php'</script>";
            		}else if($role != $db_role){
            			//login ng user
            			$_SESSION['user_id']=$get_id['user_id'];
            			$_SESSION['firstname'] = $db_firstname;
            			$_SESSION['lastname'] = $db_lastname;
						unset($_SESSION['message']);
						echo"<script>alert('User Login Successful')</script>";
						echo"<script>window.location='./facedetection/face-detection.php'</script>";
            		}
            	}
            }

			



		}else{
			$_SESSION['message']="Invalid Username or Password";

			echo"<script>window.location='index.php'</script>";
		}
	}
?>