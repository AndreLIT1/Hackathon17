<?php
	include "db.php";
	session_start();
	
	$user_check = $_SESSION['login_user'];
	$ses_sql = mysql_query("SELECT usr_nama from pelanggan WHERE usr_email = '$user_check'");
	$row = mysql_fetch_assoc($ses_sql);
	$loggin_session = $row['usr_nama'];
	
	if(!isset($login_session)) {
		header("location:masuk.html");
	}
?>