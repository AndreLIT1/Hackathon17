<?php
    $host = 'localhost';
    $admin = 'root';
    $password = '';
    $db = 'daftaruser';
    $conn = mysql_connect($host,$admin,$password,$db) or die("unable to connect to host");
	$sql = mysql_select_db ($db, $conn) or die ("unable to connect to database");
?>
