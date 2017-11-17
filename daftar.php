<?php
	include "db.php";

	if(isset($_POST['register_btn'])) {
		$nama = $_POST['usrnama'];
		$email = $_POST['email'];
		$password = md5($_POST['pswrd']);
		$dob = $_POST['year']."-". $_POST['month']."-".$_POST['date'];
		$gender = $_POST['gender'];
		$telp = $_POST['telp'];
		
		if($nama != '' and $email != '' and $password != '') {
			if(mysql_query("SELECT usr_email FROM pelanggan WHERE usr_email = $email")) {
				$errormsg = "Email already registered";
				header("Location:daftar.html");
				echo "<script>alert('$errormsg');</script>";
				
			} else {
				$query = mysql_query("INSERT INTO pelanggan (usr_nama, usr_email, usr_password, usr_gender, usr_dob, usr_telp) values ('$nama', '$email', '$password', '$gender', '$dob', '$telp')");
			}
		} else {
			$errormsg = "Some data not filled";
			echo "<script>alert('$errormsg');</script>";
		}
		
	} else {
		echo "<script>alert('Something went wrong!');</script>";
	}


?>