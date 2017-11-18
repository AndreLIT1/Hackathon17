<?php
	include "db.php";
	session_start();
	
	$user_check = $_SESSION['login_user'];
	$ses_sql = mysql_query("SELECT * from pelanggan WHERE usr_email = '$user_check'");
	$row = mysql_fetch_assoc($ses_sql);
	$login_session = $row['usr_nama'];
	$gender = $row['usr_gender'];
	$dob = $row['usr_dob'];
	$telp = $row['usr_telp'];
	/*$query = mysql_query("SELECT * FROM pelanggan WUERE usr_email = '$user_check'");
	$rownum = mysql_fetch_assoc($query);*/
	
	
	
	if(!isset($_SESSION['login_user'])) {
		header("location: masuk.html");
	}
?>