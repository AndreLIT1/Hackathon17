<?php
	include "db.php";
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
	
		$user_email = mysql_real_escape_string($_POST['usremail']);
		$result = mysql_query("SELECT * FROM pelanggan WHERE usr_email = '$user_email'");

		if(mysql_num_rows($result) == 0) {
			$error = "User does not exist!";
			echo "<script>alert('$error');</script>";
		} else {
			$user = mysql_fetch_assoc($result);
			if (md5($_POST['usrpswrd']) == $user['usr_password']) {
				echo md5($_POST['usrpswrd']) . "<br />";
				echo $user['usr_password'];
				$_SESSION['user_nama'] = $user['usr_nama'];
				$_SESSION['user_gender'] = $user['usr_gender'];
				$_SESSION['user_dob'] = $user['usr_dob'];
				$_SESSION['user_telp'] = $user['usr_telp'];
				$_SESSION['login_user'] = $user['usr_email'];
				$_SESSION['logged_in'] = true;
				header("location: destination.php");
			} else {
				echo md5($_POST['usrpswrd']) . "<br />";
				echo $user['usr_password'];
				$error = "Wrong password!";
				echo "<script>alert('$error');</script>";
			}
		}
	} else {
		$error = "You email or password is wrong!";
		echo "<script>alert('$error');</script>";
	}
	
	/*if(isset($_POST['login_btn'])) {
		$user_email = $_POST['usremail'];
		$user_password = md5($_POST['pswrd']);
		
		$query = "SELECT * FROM pelanggan WHERE usr_email = '$user_email' AND usr_password = '$user_password'";
		$result = mysql_query($query);
		
		if (mysql_num_rows($result) == 1 and $user_email == 'usr_email' and $user_password == 'usr_password') {
			$_SESSION['login_user'] = $user_email;
			header("location: welcome.php");
		} else {
			$error = "Email or Password is wrong!";
			echo "<script>alert('$error');</script>";
		}
	} else {
		$errormsg = "Something went wrong!";
		echo "<script>alert('$errormsg');</script>";
	}*/

	/*if(isset($_POST['login_btn'])) {
		$user_email = $_POST['usremail'];
		$user_password = md5($_POST['pswrd']);
		if($user_email == "SELECT usr_email FROM pelanggan WHERE usr_email = '$user_email'" and $user_password == "SELECT usr_password FROM pelanggan WHERE usr_password = '$user_password'") {
			session_register("user_email");
			$_SESSION['login_user'] = $user_email;
			
			header("location: home.php");
		} else {
			$error = "Email or Password is Wrong!";
			echo "<script>alert('$error');</script>";
		}
	} else {
		echo "<script>alert('something wrong!');</script>";
	}*/
		
	

	/*if($_SERVER["REQUEST_METHOD"] == "POST") {
		$user_email = mysql_real_escape_string($_POST['usremail'
		]);
		$user_password = mysql_real_escape_string($_POST['pswrd'
		]);
		
		$sql = "SELECT usr_nama FROM pelanggan WHERE usr_email = '$user_email' and usr_password = '$user_password'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		$active = $row['active'];
		
		$count = mysql_num_rows($result);
		
		if ($count == 1) {
			session_register("user_email");
			$_SESSION['login_user'] = $user_email;
			
			header("location: home.php");
		} else {
			$error = "Your Login Name or Password is Invalid";
			echo "<script>alert('$error');</script>";
		}
	}*/

	/*if(isset($_POST['login_btn'])) {
		if(empty($_POST['usremail']) or empty($_POST['pswrd'])) {
			$error = "Username or Password is wrong!";
		} else {
			$user_email = mysql_real_escape_string($_POST['usremail']);
			$user_password = md5(mysql_real_escape_string($_POST['pswrd']));
			$query = "SELECT * FROM pelanggan WHERE usr_email = '$user_email' AND usr_password = '$user_password'";
			$result = mysql_query($sql);
			if(mysql_num_rows($result) == 1 && $user_email == 		'usr_email' && $user_password == 'usr_password') {
				$_SESSION['login_user'] = $user_email;
			
				header("location: welcome.php");
			} else {
				$error = "Email or Password is Wrong!";
				echo "<script>alert('$error');</script>";
				header("location: masuk.html");
			}
		}	
	} else {
		echo "<script>alert('Something went wrong!');</script>";
	}*/
	
			
/*$user_email = $_POST['usremail'];
$user_password = md5($_POST['pswrd']);

	if(isset($_POST['login_btn'])) {
		if ($user_password == "SELECT usr_password FROM pelanggan WHERE usr_email = '$user_email'" and $user_email == "SELECT usr_email FROM pelanggan WHERE usr_password = '$user_password'" ) {
			$query = "SELECT usr_nama FROM pelanggan WHERE usr_email = '$user_email' AND usr_password = '$user_password'";
			if($query == NULL) {
				$error = "Something wrong!";
				echo "<script>alert('$error');</script>";
				header("location:masuk.html");
			} else {
				$_SESSION['login_user'] = $user_email;
			
				header("location: welcome.php");
			}
		} else {
			$error = "Email or Password is Wrong!";
			echo "<script>alert('$error');</script>";	
		}
	} else {
		echo "<script>alert('Something went wrong!');</script>";
	}*/


?>