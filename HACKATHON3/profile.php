<?php
	include "db.php";
	include "session.php";
	
?>

<script>
	function addPoints(){
		var points = document.getElementById('pts').innerHTML;
		var pts = parseInt(points);
		pts+=100;
		document.getElementById('pts').innerHTML = pts;
	}
</script>

<html>
	<head>
		<title>HACKATHON 101</title>
		<link rel="icon" href="angkot.jpg">
		<link rel="stylesheet" href="design.css">
		<link rel="stylesheet" href="animate.css">
		<link rel="stylesheet" href="navbar.css">
	</head>
	<body>
		<ul class="container slideInDown animated">
        	<li style="float: left"><a href="destination.php" title="Homepage"><img src="angkot.jpg"/></a></li>
			<li><a href="destination.php#aboutus">TENTANG KAMI</a></li>
        	<li><a id="profile" href="profile.php" title="Login">AKUN</a></li>
        	<li><a id="keluar" href="logout.php">KELUAR</a></li>
    	</ul>
		<div id="akun">
			<h1>AKUN</h1>
			<br>
			<br>
			<label>NAMA	: </label>
			<h3><?php echo $login_session; ?></h3>
			<label>EMAIL	: </label>
			<h3><?php echo $_SESSION['login_user']; ?></h3>
			<label>GENDER	: </label>
			<h3><?php echo $gender; ?></h3>
			<label>TANGGAL LAHIR	: </label>
			<h3><?php echo $dob; ?></h3>
			<label>NO. TELP	: </label>
			<h3><?php echo $telp; ?></h3>
			<label>POINT :</label>
			<h3 id="pts">0</h3></h>
			<button onclick="addPoints()">CLICK ME FOR ADS :D</button>
			
		</div>
	</body>

</html>