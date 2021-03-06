<!DOCTYPE html>
<?php SESSION_START(); ?>
<?php include ("loginCheck.php"); ?>
<html>

<head>
    <title>Kurs</title>
    <link rel="icon" href="symbole/favicon.ico">
    <link rel="icon" href="symbole/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styler.css">
    <style>
        .block {
            display: block;
            width: 100%;
            border: none;
            background-color: forestgreen;
            padding: 10px 3px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }

        #KursBeigetreten {
            width: 960px;
            margin: 0 auto 5em auto;
        }

        #KursZusammenfassung p {
            margin: 0.2em;
        }

        #KursBeschreibung {
            text-align: justify;
        }

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

        .AlleKurseListe li:hover {
            background-color: #eee;
            /* Add a hover effect to all links, except for headers */
        }

        #AlleKurseDiv {
            margin-top: 0.5em;
        }

        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active,
        .collapsible:hover {
            background-color: #555;
        }

        .content {
            padding: 0 18px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            background-color: #f1f1f1;
        }


        .downloadbutton {
            background-color: #4CAF50;
            height: auto;
            width: auto;

        }

        #KursBeigetreten .w3-half .w3-card {
            height: 19em;
        }

        .uploadbutton {
            background-color: #4CAF50;
            height: auto;
            width: 7em;


        }

        input[type="file"] {
            width: 100%;
            border: 2px solid darkorange;
            border-radius: 4px;
        }

        #modalinput {
            display: block;
            width: 100%;
            background-color: lightgrey;
            max-width: 30em;
        }

        #KursBeigetreten input[type="text"] {
            width: 100%;
            border: 2px solid darkorange;
            border-radius: 4px;
            margin-bottom: 1em;
        }

        @media (max-width:960px) {
            #logoutbtn {
                float: none;
                display: block;
                text-align: left;
            }
        }

        #leaveKurs {
            background-color: #f44336;
        }

    </style>
</head>

<body>
    <!-- Kopierenstart -->
    <div class="topnav" id="myTopnav">
        <a href="Startseite.php" id="logo"><img src="symbole/logo.png" alt="John" style="width:48px"></a>
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

    <div id="KursBeigetreten">
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
        
        //Kurs verlassen Button
        if(isset($_POST["leaveKurs"])){
            $_sql = "DELETE FROM userkurse WHERE userID='$_userID' AND kursID='$_kursID'";
            $_res = mysqli_query($link, $_sql);
            echo "<script>console.log('Kurs verlassen!');</script>";
            echo "<script>window.location.replace('Kurs.php?kid=$_kursID');</script>";
        }
        
        $_sql = "SELECT * FROM userkurse WHERE userID='$_userID' AND kursID='$_kursID'";
        $_res = mysqli_query($link, $_sql);
        $_anzahl = @mysqli_num_rows($_res);        
        if ($_anzahl == 0) { //Kurs noch nicht betreten!
            header("Location: Kurs.php?kid=$_kursID");
		}
        else {
            echo("<script>console.log('Kurs beigetreten, du bist hier richtig!');</script>");
            
            //Frage Daten ab
            $_sql2 = "SELECT * FROM kurs WHERE kursID='$_kursID'";
            $_res2 = mysqli_query($link, $_sql2);
            $_row = mysqli_fetch_assoc($_res2);
            $_titel = $_row["name"];
            $_beschreibung = $_row["beschreibung"];
            $_voraussetzung = $_row["voraussetzung"];
            
            //Frage Teilnehmerzahl ab
            $_sql3 = "SELECT COUNT(userID) AS teilnehmerzahl FROM userkurse WHERE kursID='$_kursID'";
            $_res3 = mysqli_query($link, $_sql3);
            $_row2 = mysqli_fetch_assoc($_res3);
            $_teilnehmerzahl = $_row2["teilnehmerzahl"];
            //Ueberpruefe ob leer
            if($_teilnehmerzahl == 0){
                $_teilnehmerzahl = "Dieser Kurs hat noch keine Teilnehmer!";
            }
            else{
                $_teilnehmerzahl = "Dieser Kurs hat $_teilnehmerzahl Teilnehmer!";
            }
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
                            <p id="KursTeilnehmeranzahl">
                                <?php echo "$_teilnehmerzahl" ?>
                            </p>
                            <form method="POST">
                                <button type='submit' name='leaveKurs' id='leaveKurs' class='block'>Kurs verlassen</button>
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
                <div class="w3-col">
                    <div class="w3-card w3-container w3-margin-top">
                        <div id="AlleKurseDiv">
                            <h1 id="AlleKurseUeberschrift">Aufgaben &Uuml;bersicht</h1>
                            <ul class="AlleKurseListe">
                                <li>
                                    <button class="collapsible">&Uuml;bung: Getter und Setter</button>
                                    <div class="content">
                                        <p> Eine &Uuml;bung zum richtigen Umgang von getter und setter. </p>


                                        <div id="downloadpos">
                                            <button class="downloadbutton">Download</button>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <button class="collapsible">Bauingenieurwesen</button>
                                    <div class="content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipilaboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </li>
                                <li>
                                    <button class="collapsible">Geod&auml;sie</button>
                                    <div class="content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipilaboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </li>
                                <li>
                                    <button class="collapsible">Wirtschaft</button>
                                    <div class="content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipilaboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </li>
                                <li>
                                    <button class="collapsible">Mechatronik und Maschinenbau</button>
                                    <div class="content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipilaboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <button onclick="document.getElementById('HochladModal').style.display='block'" class="uploadbutton">Hochladen</button>
                        <script>
                            var coll = document.getElementsByClassName("collapsible");
                            var i;
                            for (i = 0; i < coll.length; i++) {
                                coll[i].addEventListener("click", function() {
                                    this.classList.toggle("active");
                                    var content = this.nextElementSibling;
                                    if (content.style.maxHeight) {
                                        content.style.maxHeight = null;
                                    } else {
                                        content.style.maxHeight = content.scrollHeight + "em";
                                    }
                                });
                            }

                        </script>

                        <div id="HochladModal" class="modal">
                            <form class="modal-content animate">
                                <div class="modalcontainer">
                                    <h1>Teile Aufgaben mit Anderen</h1>
                                    <h2>Lade deine Aufgaben hoch</h2>
                                    <p> W&auml;hle deine Aufgabe (*.txt, *.html usw.) von deinem Rechner aus.</p>
                                    <input type="file" id="datei">
                                    <br />
                                    <br />
                                    <br />
                                    <p>Gib den Titel f&uuml;r deine Aufgabe ein.</p>
                                    <input type="text" id="ort" placeholder="Beispiel: Hochschule Bochum" required>
                                    <div class="LoginButtons">
                                        <button id="AufgabenHochladen">Hochladen</button>
                                        <button type="button" onclick="document.getElementById('HochladModal').style.display='none'" class="cancelbtn">Abbrechen</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script>
                            // Get the modal
                            var modal = document.getElementById('HochladModal');
                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }

                        </script>
                    </div>
                </div>
            </div>
    </div>
</body>

</html>
