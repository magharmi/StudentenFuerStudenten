<!DOCTYPE html>
<?php SESSION_START(); ?>
<?php include ("loginCheck.php"); ?>
<html>
<?php
        $_freundID = $_GET["fID"];
        $db = mysqli_connect("localhost", "root", "", "studentenfuerstudenten");
        $_sql = "SELECT * FROM user WHERE userID='$_freundID'";
        $_erg = mysqli_query($db, $_sql);
        while($_zeile = $_erg->fetch_assoc()){
            $_freundName = $_zeile["name"];
            $_uni = $_zeile["uni"];
            $_fach = $_zeile["fach"];
            $_bild = $_zeile["bild"];
            $_beschreibung = $_zeile["beschreibung"];
            echo "<script>console.log('".$_freundName."');</script>";
            echo "<script>console.log('".$_fach."');</script>";
            echo "<script>console.log('".$_uni."');</script>";
            echo "<script>console.log('".$_bild."');</script>";
        }
    
        if(isset($_POST["deleteFriend"])){
            $_userID = $_SESSION["userID"]; 
            $_sql = "DELETE FROM freund WHERE userID1='$_userID' AND userID2='$_freundID'";
            mysqli_query($db, $_sql);
            echo "<script>console.log('Freund entfernt');</script>";
        }
    
        if(isset($_POST["addFriend"])){
            $_userID = $_SESSION["userID"]; 
            $_sql = "INSERT INTO freund (userID1, userID2) VALUES ('$_userID', '$_freundID')";
            mysqli_query($db, $_sql);
            echo "<script>console.log('Freund entfernt');</script>";
        }
	?>

    <head>
        <title>Freund</title>
        <link rel="icon" href="favicon.ico">
        <link rel="icon" href="favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styler.css">
        <style>
            #userlogo {
                margin: -15% 0% 0% 160%;
            }

            .title {
                color: grey;
                font-size: 18px;
            }

            #profilbild {
                margin: -30% 40% 50% 30%;
            }

            #name {
                margin: -30% 100% 15% 100%;
                font-family: serif;
                font-size: 300%;
                width: 100%;
            }

            #hochschule {
                margin: -18% 100% 15% 100%;
                font-family: serif;
                font-size: 150%;
                width: 100%;
            }

            #studiengang {
                margin: -16% 100% 15% 100%;
                font-family: serif;
                font-size: 150%;
                width: 100%;
            }


            #profilbild card {
                width: 50px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 200px;
                margin: auto;
                text-align: center;
                font-family: arial;

            }

            #txtbox {
                margin: 210px 1em 0 26em;
            }

            div.personbeschreibung {
                background-color: darkgrey;
                padding: 25px;
                margin-right: 20px;
                min-height: 32.1em;
            }

            @media screen and (min-width: 600px) {
                div.personbeschreibung {
                    font-size: 10px;
                }
            }

            @media screen and (max-width: 601px) {
                div. div.personbeschreibung {
                    font-size: 20px;
                }
            }

            .block {
                display: block;
                width: 150%;
                border: none;
                background-color: red;
                padding: 10px 5px;
                font-size: 16px;
                cursor: pointer;
                text-align: center;
                margin: 0.4em auto;
                color: white;

            }

            #nachricht {
                background-color: #4CAF50;

            }

            #Kurs {
                width: 100%;
                max-width: 960px;
                margin: 2em auto 5em auto;
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

            #KurseUebersicht {
                width: 80%;
                max-width: 960;
                margin: 0 auto;
            }

            #MeineKurseListe,
            .AlleKurseListe {
                /* Remove default list styling */
                list-style-type: none;
                padding: 0px;
                margin: 0px;
            }

            #MeineKurseListe li,
            .AlleKurseListe li {
                border: 1px solid #ddd;
                /* Add a border to all links */
                margin-top: -1px;
                /* Prevent double borders */
                background-color: #f6f6f6;
                /* Grey background color */
                padding: 12px;
                /* Add some padding */
                text-decoration: none;
                /* Remove default text underline */
                font-size: 18px;
                /* Increase the font-size */
                color: black;
                /* Add a black text color */
                display: block;
                /* Make it into a block element to fill the whole list */
            }

            .banner {
                margin-top: -1px;
            }

        </style>
    </head>

    <body>
        <!-- Kopierenstart -->
        <div class="topnav" id="myTopnav">
            <a href="Startseite.php" id="logo"><img src="logo.png" alt="John" style="width:48px"></a>
            <div class="topbartexte" id="topbartexte">
                <a href="Startseite.php">Startseite</a>
                <a href="Profil.php">Profil</a>
                <a href="KurseUebersicht.php">Kurse</a>
                <a class="active" href="FreundeUebersicht.php">Freunde</a>
                <a href="Nachhilfe.php">Nachhilfe</a>
            </div>

            <input type="text" id="suchfeld" placeholder="Suche...">

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

        <div style="width: 500px; height: 60px; background: laven">
            <img src="banner.jpg" class="banner" width="2100px" height="250px" />
            <p id="name">
                <?php echo $_freundName ?>
            </p>
            <p id="hochschule">
                <?php echo $_uni ?>
            </p>
            <p id="studiengang">
                <?php echo $_fach ?>
            </p>
            <div id="profilbild">
                <img id="userlogo" src="freund.png" width="75em">
                <img src="<?php echo $_bild ?>" alt="John" style="width:150%">
                <button type="button" id="nachricht" class="block">Nachricht schreiben</button>
                <form method="POST">
                    <?php
                    $_freundID = $_GET["fID"];
                    $_userID = $_SESSION["userID"]; 
                    $sql = "SELECT * FROM freund WHERE userID1='$_userID' AND userID2='$_freundID'";
                    $_res = mysqli_query($db, $sql);
                    $_row = mysqli_fetch_assoc($_res);
                    if(is_null($_row)){
                        echo "<script>console.log('Nicht befreundet.');</script>";
                        echo "<button type='submit' name='addFriend' id='nachricht' class='block'>Freund hinzufügen</button>";
                    }
                    else{
                        echo "<script>console.log('Befreundet');</script>";
                        echo "<button type='submit' name='deleteFriend' class='block'>Freund entfernen</button>";
                    }
                    
                    ?>
                </form>
            </div>
        </div>
        <div id="txtbox">
            <div class="personbeschreibung">
                <h1>Beschreibung</h1>
                <h3>
                    <?php echo $_beschreibung ?>
                </h3>
            </div>
        </div>

        <div id="Kurs">
            <div class="w3-row-padding w3-margin-top">
                <div class="w3-half">
                    <div class="w3-card w3-container">
                        <div id="KursZusammenfassung">
                            <div id="MeineKurseDiv">
                                <h2 id="MeineKurseUeberschrift">Max's Kurse</h2>
                                <ul id="MeineKurseListe">
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
                    //echo("<script>console.log('User: $_userID');</script>");
                    $sql1 = "SELECT kursID FROM userkurse WHERE userID='$_userID'";
                    $_res1 = mysqli_query($link, $sql1);

                    $_anzahl = mysqli_num_rows($_res1);
                    //echo("<script>console.log('Anzahl: $_anzahl');</script>");
                    if ($_anzahl == 0) {
                        echo("<script>console.log('Kein beigetretener Kurs gefunden');</script>");
                        echo "<li><a href='#'>Hier k&ouml;nnten deine Kurse stehen</a></li>";
                        echo "<li><a href='#'>Trete daf&uuml;r einem Kurs bei</a></li>";
                    }
                    else {
                        while($_row1 = $_res1->fetch_assoc()){
                            $_kursID = $_row1["kursID"];
                            $_sql2 = "SELECT name FROM kurs WHERE kursID='$_kursID'";
                            $_res2 = mysqli_query($link, $_sql2);
                            while($_row2 = $_res2->fetch_assoc()){
                                $_kursName = $_row2["name"];
                                echo "<li><a href='Kurs.php?kid=$_kursID'>$_kursName</a></li>";
                                echo("<script>console.log('Kurs angezeigt, ID: $_kursID Name: $_kursName');</script>");
                            }
                        }
                    }
                    mysqli_close($link);
                ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w3-half">
                    <div class="w3-card w3-container">
                        <div id="KursZusammenfassung">
                            <div id="MeineKurseDiv">
                                <h2 id="MeineKurseUeberschrift">Max bietet Hilfe bei ...</h2>
                                <ul id="MeineKurseListe">
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
                    //echo("<script>console.log('User: $_userID');</script>");
                    $sql1 = "SELECT kursID FROM nachhilfeangebot WHERE userID='$_userID'";
                    $_res1 = mysqli_query($link, $sql1);

                    $_anzahl = mysqli_num_rows($_res1);
                    //echo("<script>console.log('Anzahl: $_anzahl');</script>");
                    if ($_anzahl == 0) {
                        echo("<script>console.log('Kein beigetretener Kurs gefunden');</script>");
                        echo "<li><a href='#'>Hier k&ouml;nnten deine Kurse stehen</a></li>";
                        echo "<li><a href='#'>Trete daf&uuml;r einem Kurs bei</a></li>";
                    }
                    else {
                        while($_row1 = $_res1->fetch_assoc()){
                            $_kursID = $_row1["kursID"];
                            $_sql2 = "SELECT name FROM kurs WHERE kursID='$_kursID'";
                            $_res2 = mysqli_query($link, $_sql2);
                            while($_row2 = $_res2->fetch_assoc()){
                                $_kursName = $_row2["name"];
                                echo "<li><a href='Kurs.php?kid=$_kursID'>$_kursName</a></li>";
                                echo("<script>console.log('Kurs angezeigt, ID: $_kursID Name: $_kursName');</script>");
                            }
                        }
                    }
                    mysqli_close($link);
                ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w3-half w3-margin-top">
                    <div class="w3-card w3-container">
                        <div id="KursZusammenfassung">
                            <div id="MeineKurseDiv">
                                <h2 id="MeineKurseUeberschrift">Ben&ouml;tigt Hilfe bei ...</h2>
                                <ul id="MeineKurseListe">
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
                    //echo("<script>console.log('User: $_userID');</script>");
                    $sql1 = "SELECT kursID FROM nachhilfesuche WHERE userID='$_userID'";
                    $_res1 = mysqli_query($link, $sql1);

                    $_anzahl = mysqli_num_rows($_res1);
                    //echo("<script>console.log('Anzahl: $_anzahl');</script>");
                    if ($_anzahl == 0) {
                        echo("<script>console.log('Kein beigetretener Kurs gefunden');</script>");
                        echo "<li><a href='#'>Hier k&ouml;nnten deine Kurse stehen</a></li>";
                        echo "<li><a href='#'>Trete daf&uuml;r einem Kurs bei</a></li>";
                    }
                    else {
                        while($_row1 = $_res1->fetch_assoc()){
                            $_kursID = $_row1["kursID"];
                            $_sql2 = "SELECT name FROM kurs WHERE kursID='$_kursID'";
                            $_res2 = mysqli_query($link, $_sql2);
                            while($_row2 = $_res2->fetch_assoc()){
                                $_kursName = $_row2["name"];
                                echo "<li><a href='Kurs.php?kid=$_kursID'>$_kursName</a></li>";
                                echo("<script>console.log('Kurs angezeigt, ID: $_kursID Name: $_kursName');</script>");
                            }
                        }
                    }
                    mysqli_close($link);
                ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w3-half w3-margin-top">
                    <div class="w3-card w3-container">
                        <div id="KursZusammenfassung">
                            <div id="MeineKurseDiv">
                                <h2 id="MeineKurseUeberschrift">Zuletzt bearbeitete Aufgaben ...</h2>
                                <ul id="MeineKurseListe">
                                   <li><a href="Kursbeigetreten.php">Java: Aufgabe 1</a></li>
                                    <li><a href="#">C Programmierung: Pointer</a></li>

                                    <li><a href="#">Mathe: Aufgabe 9</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
