<?php
    session_start();
?>
    <html>

    <head>
        <title>Sign Up</title>
    </head>

    <body id="body">
        <form method="post" id="reg">
            <label>Full Name:</label>
            <br>
            <input type="text" name="fullName">
            <br><br>
            <label>DOB:(DD/MM/YYYY)</label>
            <br>
            <select name="date" form="reg" id="date">
            </select> &nbsp;
            <select name="month" form="reg" id="month" onclick="checkDOB()">
            </select> &nbsp;
            <select name="year" form="reg" id="year">
            </select>
            <br><br>
            <label>Username:</label>
            <br>
            <input type="text" name="userName">
            <br><br>
            <label>Password:</label>
            <br>
            <input type="password" name="pass">
            <br><br>
            <label>Password Verification:</label>
            <br>
            <input type="password" name="passV">
            <br><br>
            <label>E-Mail:</label>
            <br>
            <input type="text" name="Email">
            <br><br>
            <input type="submit" value="Sign Up" name="reg">
            <input type="submit" value="Back" name="Back">
        </form>

        <?php
            if(isset($_POST['Back'])) echo"<script>window.location.assign(\"login.php\")</script>";
            if(isset($_POST['reg'])) include 'Reg_Conn.php';
        ?>
    </body>
    <script>
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
    </script>

    </html>