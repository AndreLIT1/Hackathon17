<?php
	include "session.php";
?>

<html>

<head>
    <title>HACKATHON 101</title>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="icon" href="angkot.jpg">
	<link rel="stylesheet" href="loadOut.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body onload="showSlide(slideNum)">
	<div class="destbg">
	
	
	<script>
		//slider

var slideNum = 1;

function PrevNext(n) {
    showSlide(slideNum += n);
}


function showSlide(n) {
    var i;
    var slide = document.getElementsByClassName("inslider");
    if (n > slide.length) {slideNum = 1}    
    for (i = 0; i < slide.length; i++) {
        slide[i].style.display = "none";  
    }
    slide[slideNum-1].style.display = "block";  
	
	
}
		
		setInterval(function() {
		PrevNext(1);
	}, 5000);
		
		
	</script>
	<ul class="container slideInDown animated">
        <li style="float: left"><a href="destination.php" title="Homepage"><img src="angkot.jpg"/></a></li>
		<li><a href="#aboutus">TENTANG KAMI</a></li>
        <li><a id="profile" href="profile.php" title="Login">AKUN</a></li>
        <li><a id="keluar" href="logout.php">KELUAR</a></li>
    </ul>
	<div class="slider">
            <div class="inslider fade">
                <img src="header1.jpg" class="slideimg" />
            </div>
            <div class="inslider fade">
                <img src="header2.jpg" class="slideimg" />
            </div>
            <div class="inslider fade">
                <img src="header3.jpg" class="slideimg" />
            </div>
       </div>
	<br>
	
	<h2>Pilih Tempat Penjemputan & Tujuan Akhir</h2>
	
     <div id="select" style= "display:none">
        <label>Pickup Destination Stopovers Angkot</label>
        <br>
        <form method="POST" action="">
        <select name="pickUp" id="pickUp" onclick="checkArr()">
            		</select> &nbsp;
        <select placeholder="Destination" name="destination" id="destination" onclick="checkS()">
            		</select> &nbsp;
        <input type="text" placeholder="Stopovers" name="stopOver" id="stopOver" readonly> &nbsp;
        <input type="text" placeholder="Route" name="angkot" id="angkot" readonly> &nbsp;
        <br>
        <input type="submit" value = "Search For Route" name="sub">
    <input id="make_text0" type = "hidden" name = "make_text0" value = "" />
    <input id="make_text1" type = "hidden" name = "make_text1" value = "" />
        </form>
    </div>
    
    <img class = "center" src="mapRedirect.png" id="map">
    <input class = "center" type="text" placeholder = "Find Your Angkot!" id="find" readonly>

<script type="text/javascript">
    var pick = document.getElementById('pickUp');
    var dest = document.getElementById('destination');
    function setTextField(ddl, id) {
        document.getElementById(id).value = ddl.options[ddl.selectedIndex].text;
    }
</script>
<?php
    if(isset($_POST['sub'])){
        $_SESSION['route'] = $_POST['angkot'];
        $_SESSION['pickUp'] = $_POST['make_text0'];
        $_SESSION['dest'] = $_POST['make_text1'];
        $_SESSION['stopOver'] = $_POST['stopOver'];
        header('Location: map.php');
        exit;
    }
?>
    <script>
         $(document).ready(function() {
            $("#find").on("click",function() {
                $("#map").hide();
                $("#find").hide();
                $("#select").show();
                $("#select").addClass("center container slideInUp animated");
            });
        });
        
        var pick = ["Terminal Cikarang", "Lemahabang"];
        var arrive = ["Lippo", "Cibarusah", "Pebayuran", "Sukadanau", "MM2100", "Delta Mas", "CBL"];
        var stopOvers = ["Lemahabang", "Serang", "Cibitung"];

        function initPickup() {
            for (var i = 0; i < pick.length; i++)
                document.getElementById("pickUp").innerHTML += "<option value=\'" + i + "\' id=\'" + i + "d\'>" + pick[i] + "</option>";
        }

        initPickup();

        function checkArr() {
            var selP = document.getElementById("pickUp");
            var selA = document.getElementById("destination");
            var pickPlace = selP.selectedIndex;

            if (selA.options.length != 0) {
                selA.options.length = 0;
            }
            switch (pickPlace) {
                case 0:
                    for (var i = 1; i < arrive.length; i++)
                        document.getElementById("destination").innerHTML += "<option value=\'" + i + "\' id=\'" + i + "m\' class=\'option\'>" + arrive[i] + "</option>";
                    break;
                case 1:
                    document.getElementById("destination").innerHTML += "<option value=\'0\' id=\'0d\' class=\'option\'>" + arrive[0] + "</option>";
                    break;
            }
            setTextField(selP, 'make_text0');
            setTextField(selA, 'make_text1');
        }

        function checkS() {
            var selP = document.getElementById("pickUp");
            var selA = document.getElementById("destination");
            var stopOver = document.getElementById("stopOver");
            var route = document.getElementById("angkot");
            var selectPick = selP.options[selP.selectedIndex].text;
            var selectArr = selA.options[selA.selectedIndex].text;
            if (selectPick == "Terminal Cikarang") {
                if (selectArr == "Cibarusah") {
                    stopOver.value = "Lemahabang & Serang";
                    route.value = "K17";
                    <?php
                        $_SESSION['K17ETA'] = 30;
                        $_SESSION['K17Cost'] = 5000;
                    ?>
                } else if (selectArr == "MM2100" || selectArr == "CBL") {
                    stopOver.value = "Cibitung";
                    if(selectArr == "MM2100") {
                        route.value = "K32A"
                        <?php
                            $_SESSION['K32AETA'] = 85;
                            $_SESSION['K32ACost'] = 12000;
                        ?>
                    } else{ 
                        route.value = "K36A";
                        <?php
                            $_SESSION['K36AETA'] = 65;
                            $_SESSION['K36ACost'] = 10000;
                        ?>
                    }
                } else stopOver.value = "No Stopovers";

                if (selectArr == "Pebayuran"){
                    route.value = "K29A/B";
                    <?php
                        $_SESSION['K29ABETA'] = 60;
                        $_SESSION['K29ABCost'] = 10000;
                    ?>
                }else if (selectArr == "Sukadanau"){
                    route.value = "K32";
                    <?php
                        $_SESSION['K32ETA'] = 75;
                        $_SESSION['K32Cost'] = 10000;
                    ?>
                }else if (selectArr == "Delta Mas"){
                    route.value = "K35";
                    <?php
                         $_SESSION['K35ETA'] = 45;
                         $_SESSION['K35Cost'] = 5000;
                    ?>
                }

            } else {
                stopOver.value = "No Stopovers";
                route.value = "K33";
                <?php
                        $_SESSION['K33ETA'] = 30;
                        $_SESSION['K33Cost'] = 5000;
                ?>
            }

        }

    </script>
	<div class="advertise" id="advertise">
		<img src="advertising.png" class="advimg">
	</div>
	<h2>TENTANG KAMI</h2>
	<div class="aboutus" id="aboutus">
		<img src="another1.jpg" class="aboutimg">
		<img src="about%20us.png" class="aboutimg">
	</div>
	</div>
</body>


</html>