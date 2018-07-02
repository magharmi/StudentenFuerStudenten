<?php SESSION_START(); ?>
<?php include ("loginCheck.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Kurs</title>
    <link rel="icon" href="favicon.ico">
    <link rel="icon" href="favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styler.css">
    <style>
        .block {
            display: block;
            width: 50%;
            border: none;
            background-color: forestgreen;
            padding: 10px 3px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }

        #Kurs {
            width: 960px;
            margin: 0 auto 5em auto;
        }

        #KursZusammenfassung p {
            margin: 0.2em;
        }

        #ts {
            display: table;
        }

        .luls {
            display: table-cell;
        }

        #KursBeschreibung {
            text-align: justify;
        }

        #Kurs .w3-card {
            height: 19em;
        }
        
        @media (max-width:960px){
            #logoutbtn {
                float: none;
                display: block;
                text-align: left;
            }
        }

    </style>
</head>

<body>
    <!-- Kopierenstart -->
    <div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" id="logo"><img src="logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a href="Startseite.php">Startseite</a>
            <a href="Profil.php">Profil</a>
            <a class="active" href="KurseUebersicht.php">Kurse</a>
            <a href="FreundeUebersicht.php">Freunde</a>
            <a href="Nachhilfe.php">Nachhilfe</a>
             <div class="container" id="logoutbtn">
            <form method="POST">
            <a href="logoutSeite.php">Logout</a>
            </form>
        </div>
        </div>


        <div class="container" onclick="myFunction(this)" id="burgerbutton">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </div>
    <script>
        function myFunction(x) {
            x.classList.toggle("change");

            var y = document.getElementById("topbartexte");
            if (y.className === "topbartexte") {
                y.className += " responsive";
            } else {
                y.className = "topbartexte";
            }
        }

    </script>
    <p class="headerabstand"></p>
    <div class="footerContent">
        <a href="impressum.php">Impressum</a>
        <a href="datenschutz.php">Datenschutz</a>
        <a href="datenschutz.php">AGB</a>
        <a href="impressum.php">Kontakt</a>
    </div>
    <footer>
        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("myBtn").style.display = "block";
                } else {
                    document.getElementById("myBtn").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }

        </script>
    </footer>
    <!-- Kopierenende -->

    <div id="Kurs">
        <?php
        $link = mysqli_connect("localhost", "root");
        if (!$link) {
            die("Keine Datenbankverbindung möglich: " . mysqli_error());
        } 
        $datenbank = mysqli_select_db($link, "StudentenFuerStudenten");
        if (!$datenbank) {
            echo "Kann die Datenbank nicht benutzen: " . mysqli_error();
            mysqli_close($link);
            exit;
        }
        
        $_userID = $_SESSION["userID"];
        echo("<script>console.log('User: $_userID');</script>");
        $_kursID = $_GET["kid"];
        echo("<script>console.log('Kurs: $_kursID');</script>");
        
        //Kurs beitreten Button
        if(isset($_POST["joinKurs"])){
            $_sql = "INSERT INTO userkurse (userID, kursID) VALUES('$_userID', '$_kursID')";
            $_res = mysqli_query($link, $_sql);
            echo "<script>console.log('Kurs beigetreten!');</script>";
        }
        
        $_sql = "SELECT * FROM userkurse WHERE userID='$_userID' AND kursID='$_kursID'";
        $_res = mysqli_query($link, $_sql);
        $_anzahl = @mysqli_num_rows($_res);        
        if ($_anzahl > 0) { //Kurs bereits beigetreten!
            header("Location: Kursbeigetreten.php?kid=$_kursID");
		}
        else {
            echo("<script>console.log('Kurs noch nicht beigetreten, du bist hier richtig!');</script>");
            
            //Frage Daten ab
            $_sql2 = "SELECT * FROM kurs WHERE kursID='$_kursID'";
            $_res2 = mysqli_query($link, $_sql2);
            $_row = mysqli_fetch_assoc($_res2);
            $_titel = $_row["name"];
            $_beschreibung = $_row["beschreibung"];
            $_voraussetzung = $_row["voraussetzung"];
		} 
        mysqli_close($link);
        ?>

            <div class="w3-row-padding w3-margin-top">
                <div class="w3-half">
                    <div class="w3-card w3-container">
                        <div id="KursZusammenfassung">
                            <h2>Kurs:</h2>
                            <h4 id="KursTitel">
                                <?php echo "$_titel" ?>
                            </h4>
                            <p> </p>
                            <h3>Voraussetzungen:</h3>
                            <p id="KursVoraussetzung">
                                <?php echo "$_voraussetzung" ?>
                            </p>
                            <h3>Teilnehmeranzahl:</h3>
                            <p id="KursTeilnehmeranzahl">Dieser Kurs hat noch keine Teilnehmer!</p>
                            <form method="POST">
                                <button type="submit" name="joinKurs" class="block" onclick="window.location.replace('Kursbeigetreten.html')">Kurs beitreten</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w3-half">
                    <div class="w3-card w3-container">
                        <h1>Beschreibung</h1>
                        <p id="KursBeschreibung">
                            <?php echo "$_beschreibung" ?>
                        </p>
                    </div>
                </div>
            </div>
    </div>
</body>

</html>
