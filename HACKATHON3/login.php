<html>

<head>
    <title>HACKATHON 101</title>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="icon" href="angkot.jpg">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <ul class="container slideInDown animated">
        <li style="float: left"><a href="index.html" title="Homepage"><img src="angkot.jpg"/></a></li>
        <li><a id="masuk" href="masuk.html" title="Login">MASUK</a></li>
        <li><a id="daftar" href="javascript: void(0);">DAFTAR</a></li>
    </ul>

    <div id="masuk-container">
        <form method="post">
            <div id="login" class="container slideInUp animated">
                <br>
                <h2>MASUK</h2>
                White space perkecil dan kasih garis pembatas aja.
                <br>
                <label>EMAIL</label>
                <br>
                <input maxlength="32" type="text" placeholder="Email" name="usremail" required>
                <br>
                <label>PASSWORD</label>
                <br>
                <input maxlength="32" type="password" placeholder="Password" name="pswrd" id="password" required>
                <br>
                <img src="seepswrd.png" class="seepswrd" onmouseover="seePswrd()" onmouseout="hidePswrd()" title="See Password">
                <br>
                <input type="submit" name="login_btn" value="MASUK" class="register_button">
            </div>
        </form>
    </div>

	<?php
	include "db.php";
	session_start();

	if(isset($_POST['login_btn'])) {
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
	}
   ?> <div id="daftar-container" style="display:none;">
        <form method="post" action="daftar.php" id="reg">
            <div id="register">
                <h2>DAFTAR</h2>
                White space perkecil dan kasih garis pembatas aja.
                <br>
                <label>NAMA</label>
                <br>
                <input type="text" placeholder="Nama" name="usrnama" required>
                <br>
                <label>EMAIL</label>
                <br>
                <input type="text" placeholder="Email" name="email" required>
                <br>
                <label>PASSWORD (MAKS. 32 KARAKTER)</label>
                <br>
                <input maxlength="32" type="password" placeholder="Password" name="pswrd" id="password" required>
                <br>
                <img src="seepswrd.png" class="seepswrd" onmouseover="seePswrd()" onmouseout="hidePswrd()" title="See Password">
                <br>
                <label>TANGGAL LAHIR (1998/12/31)</label>
                <br>
                <br>
                <select name="year" form="reg" id="year">
            	</select> &nbsp;
                <select name="month" form="reg" id="month" onclick="checkDOB()">
            	</select> &nbsp;
                <select name="date" form="reg" id="date">
            	</select>
                <br>
                <br>
				<label>JENIS KELAMIN</label>
					<br>
					<br>
					<select name="gender" form="reg" id="gender">
						<option value="M">Laki - Laki</option>
						<option value="F">Perempuan</option>
					</select>
				<br>
				<br>
                <label>NO. TELPON</label>
                <br>
                <input type="text" placeholder="Phone" name="telp" required>
                <br>
                <br>
                <input type="submit" name="register_btn" value="DAFTAR" class="register_button">
            </div>

    </div>

</body>
<script>
        $(document).ready(function() {
            $("#daftar").on("click",function() {
                $("#daftar-container").show();
                $("#daftar-container").addClass("container slideInUp animated");
                $("#masuk-container").hide();
            });
        });
    function initDOB() {
        for (var i = 1; i <= 31; i++)
            document.getElementById("date").innerHTML += "<option value=\'" + i + "\' id=\'" + i + "d\'>" + i + "</option>";
        for (var i = 1; i <= 12; i++)
            document.getElementById("month").innerHTML += "<option value=\'" + i + "\' id=\'" + i + "m\'>" + i + "</option>";
        for (var i = 1970; i <= 2050; i++)
            document.getElementById("year").innerHTML += "<option value=\'" + i + "\' id=\'" + i + "y\'>" + i + "</option>";
    }
    function checkDOB() {
        var selD = document.getElementById("date");
        var selM = document.getElementById("month");
        var selY = document.getElementById("year");
        var selectMonth = selM.selectedIndex;
        var selectYear = selY.options[selY.selectedIndex].text;
        console.log("checkDB");
        if (selD.options.length != 0) {
            console.log("selectMonth: " + selectMonth);
            console.log("switch");
            selD.options.length = 0;
        }
        switch (selectMonth) {
            case 0:
            case 2:
            case 4:
            case 6:
            case 7:
            case 9:
            case 11:
                console.log("switch 31");
                for (var i = 1; i <= 31; i++)
                    document.getElementById("date").innerHTML += "<option value=\'" + i + "\' id=\'" + i + "d\'>" + i + "</option>";
                break;
            case 3:
            case 5:
            case 8:
            case 10:
                console.log("switch 30");
                for (var i = 1; i <= 30; i++)
                    document.getElementById("date").innerHTML += "<option value=\'" + i + "\' id=\'" + i + "d\'>" + i + "</option>";
                break;
            case 1:
                if (selectYear % 4 == 0) {
                    console.log("switch 29");
                    for (var i = 1; i <= 29; i++)
                        document.getElementById("date").innerHTML += "<option value=\'" + i + "\' id=\'" + i + "d\'>" + i + "</option>";
                } else {
                    console.log("switch 28");
                    for (var i = 1; i <= 28; i++)
                        document.getElementById("date").innerHTML += "<option value=\'" + i + "\' id=\'" + i + "d\'>" + i + "</option>";
                }
                break;
        }
    }
    initDOB();
function seePswrd() {
        document.getElementById("password").type = "text";
 }
function hidePswrd() {
	document.getElementById("password").type = "password";
}
</script>


</html>