<?php
	include "db.php";
	include "session.php";
	session_start();
?>

<html>
	<head>
		<title>HOME</title>
		
	</head>
	<body>
		<h1>WELCOME <?php echo $login_session; ?></h1>
		<h2><a href="logout.php">KELUAR</a></h2>
	</body>
</html>