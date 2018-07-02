<?php
    include ("Profilbeschreibung.php");
    include ("loginCheck.php");

    $db = mysqli_connect("localhost", "root", "", "studentenfuerstudenten");

    $msg = "";
    if(isset($_POST['upload'])){
        $dir="profilbilder/";
        $image = $_FILES['bild']['name'];
        // image file directory
        $target = $dir.basename($image);

        if(!empty($image)){
            $_userID = $_SESSION["userID"];
            $sql = "UPDATE user SET bild = '$image' WHERE userID = '$_userID';";
            // execute query
            $_erg = mysqli_query($db, $sql);
            if (move_uploaded_file($_FILES['bild']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }
        }
    }
    $result = mysqli_query($db, "SELECT bild FROM user");
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Profil</title>
        <link rel="icon" href="favicon.ico">
        <link rel="icon" href="favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styler.css">
        <style>
            #userlogo {
                margin: -30% 0% 0% 80%;
            }

            .title {
                color: grey;
                font-size: 18px;
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

            #registerbild {
                width: 100%;
                padding: 12px 10px;
                margin: 8px 18em;
            }

            #txtbox {
                margin: 210px 1em 0 26em;
            }

            div.personbeschreibung {
                background-color: darkgrey;
                padding: 25px;
                margin-right: 20px;
                min-height: 17.7em;
            }

            .block {
                display: block;
                width: 150%;
                border: none;
                background-color: forestgreen;
                padding: 10px 5px;
                font-size: 16px;
                cursor: pointer;
                text-align: center;
                margin: 0.4em auto;
                color: white;

            }

            #profilbild {
                margin: -25% 40% 15% 25%;

                text-align: center;
            }

            #beschreibungbutton {
                background-color: forestgreen;
                width: 50%;

            }

            #bild_hochladen {
                background-color: forestgreen;
                width: 50%;
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


            /*Zoom für Modals*/

            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {
                    -webkit-transform: scale(0)
                }
                to {
                    -webkit-transform: scale(1)
                }
            }

            @keyframes animatezoom {
                from {
                    transform: scale(0)
                }
                to {
                    transform: scale(1)
                }
            }

            #beschreibungeingabe {
                resize: none;
            }

            .banner {
                margin-top: -1px;
            }

            @media (max-width:960px) {
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
            <a href="Startseite.php" id="logo"><img src="symbole/logo.png" alt="John" style="width:48px"></a>
            <div class="topbartexte" id="topbartexte">
                <a href="Startseite.php">Startseite</a>
                <a class="active" href="Profil.php">Profil</a>
                <a href="KurseUebersicht.php">Kurse</a>
                <a href="FreundeUebersicht.php">Freunde</a>
                <a href="Nachhilfe.php">Nachhilfe</a>
            </div>


            <div class="container" onclick="myFunction(this)" id="burgerbutton">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>

            <div class="container" id="logoutbtn">
                <form method="POST">
                    <a href="logoutSeite.php">Logout</a>
                </form>
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
            <a href="#impressum">Impressum</a>
            <a href="#datenschutz">Datenschutz</a>
            <a href="#agb">AGB</a>
            <a href="#kontakt">Kontakt</a>
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

            <img src="symbole/banner.jpg" class="banner" width="2100px" height="250px" />
            <img id="userlogo" src="symbole/user.png" width="75em">
            <div id="content">
                <?php
                    $_userID = $_SESSION["userID"];
                    $db = mysqli_connect("localhost", "root", "", "studentenfuerstudenten");
                    $sql = "SELECT * FROM user WHERE userID='$_userID'";
                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $_name = $row["name"];
                        $_uni = $row["uni"];
                        $_fach = $row["fach"];
                        $_bild = $row["bild"];
                        $_beschreibung = $row["beschreibung"];
                        echo "<p id='name'>".$_name."</p>";
                        echo "<p id='hochschule'>".$_uni."</p>";
                        echo "<p id='studiengang'>".$_fach."</p>";
                        echo "<div id='profilbild' class='Profilbild'>";
                        echo "<img src='profilbilder/".$_bild."' height=350em width=145% >";
                        echo "</div>";
                    }
                ?>
                    <form method="POST" action="Profil.php" enctype="multipart/form-data">
                        <input type="hidden" name="size" value="100">
                        <div>
                            <input type="file" name="bild">
                        </div>

                        <div>
                            <button type="submit" name="upload" id="bild_hochladen" class="block">Bild hochladen</button>
                        </div>
                    </form>
            </div>
        </div>

        <div id="txtbox">
            <div class="personbeschreibung">
                <h1>Beschreibung</h1>
                <h3>
                    <?php echo "$_beschreibung"; ?>
                </h3>
            </div>

            <button name="beschreibungbutton" id="beschreibungbutton" class="block" onclick="document.getElementById('id01').style.display='block'">Beschreibung bearbeiten</button>
            <div id="id01" class="modal">
                <form class="modal-content animate" method="POST">
                    <div class="imgcontainer">
                        <img src="symbole/user.png" id="registerbild" style="width:18%" />
                    </div>
                    <div class="modalcontainer">
                        <h2>Geben sie ihre Beschreibung ein </h2>
                        <textarea id="beschreibungeingabe" name="beschreibungtxt" cols="55" rows="10"></textarea>
                        <div class="LoginButtons">
                            <button type="submit" name="beschreibungOK" class="signupbtn">OK</button>
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Abbrechen</button>
                        </div>
                    </div>
                </form>
            </div>
            <script>
                // Get the modals
                var modal = document.getElementById('id01');
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }

            </script>

        </div>
        <div id="Kurs">
            <div class="w3-row-padding w3-margin-top">
                <div class="w3-half">
                    <div class="w3-card w3-container">
                        <div id="KursZusammenfassung">
                            <div id="MeineKurseDiv">
                                <h2 id="MeineKurseUeberschrift">
                                    <?php echo "$_name"; ?> Kurse</h2>
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
                                <h2 id="MeineKurseUeberschrift">
                                    <?php echo "$_name"; ?> bietet Hilfe bei...</h2>
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
                                <h2 id="MeineKurseUeberschrift"> Ben&oumltigt Hilfe bei...</h2>
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
                                <h2 id="MeineKurseUeberschrift"> Zuletzt bearbeitete Aufgaben ...</h2>
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
