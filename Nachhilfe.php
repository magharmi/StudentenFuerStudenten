<!DOCTYPE html>
<?php SESSION_START(); ?>
<?php include ("loginCheck.php"); ?>
<html>

<head>
    <title>Nachhilfe</title>
    <link rel="icon" href="symbole/favicon.ico">
    <link rel="icon" href="symbole/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styler.css">

    <style>
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


        #nHilfeButton {
            display: block;
            width: 100%;
            border: none;
            background-color: #4CAF50;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }

        .close {
            background: #606061;
            color: #FFFFFF;
            line-height: 25px;
            position: absolute;
            right: -12px;
            text-align: center;
            top: -10px;
            width: 24px;
            text-decoration: none;
            font-weight: bold;
            -webkit-border-radius: 12px;
            -moz-border-radius: 12px;
            border-radius: 12px;
            -moz-box-shadow: 1px 1px 3px #000;
            -webkit-box-shadow: 1px 1px 3px #000;
            box-shadow: 1px 1px 3px #000;
        }

        .close:hover {
            background: #00d9ff;
        }

        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 15px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            max-height: 1;

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

        #MeineKurseListe li:hover,
        .AlleKurseListe li:hover {
            background-color: #eee;
            /* Add a hover effect to all links, except for headers */
        }

        #AlleKurseDiv {
            margin-top: 0.5em;
        }

        .seiteninhalt .animate {
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

        .NachhilfeEintragen {
            background-color: #4CAF50;
        }

        label {
            display: block;
        }

        .mittig input {
            width: 100%;
            border: 2px solid darkorange;
            border-radius: 4px;
        }

        .LoginButtons {
            padding-top: 69px;
        }



        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 18px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }



        .gesuchteNachhilfe {
            background-color: #4CAF50;
            margin-top: 10px;
        }

        @media (max-width:960px) {
            #logoutbtn {
                float: none;
                display: block;
                text-align: left;
            }
        }

        .nachhifleTabelle {
            width: 90%;
            margin: 1em auto 2em auto;
        }

        .modalcontainer {
            text-align: center;
            margin: 1em 3em 1em 3em;
        }

        .kontaktButton {
            color: white;
        }

    </style>
</head>

<body>
    <!-- Kopierenstart -->
    <div class="topnav" style="height: 56px" id="myTopnav">
        <a href="Startseite.php" id="logo"><img src="symbole/logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a href="Startseite.php">Startseite</a>
            <a href="Profil.php">Profil</a>
            <a href="KurseUebersicht.php">Kurse</a>
            <a href="FreundeUebersicht.php">Freunde</a>
            <a class="active" href="Nachhilfe.php">Nachhilfe</a>
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


    <div class="w3-row-padding w3-center w3-margin-top seiteninhalt">
        <div class="mittig">
            <div class="w3-half">
                <div class="w3-card w3-container" style="min-height:460px">
                    <div id="KurseUebersicht">
                        <div id="AlleKurseDiv">
                            <h1 id="AlleKurseUeberschrift">Nachhilfe anbieten</h1>
                            <ul class="AlleKurseListe">
                                <li>
                                    <button class="collapsible">Informatik und Elektrotechnik</button>
                                    <div class="content">
                                        <ul class="AlleKurseListe">
                                            <li>
                                                <button class="collapsible">Informatik</button>
                                                <div class="content">
                                                    <ul class="AlleKurseListe">
                                                        <li>
                                                            <button class="collapsible">Java Programmierung</button>
                                                            <div class="content">
                                                                <ul class="AlleKurseListe">
                                                                    <h4>Hilfe f&uuml;r Java-Programmierung anbieten?</h4>
                                                                    <button onclick="document.getElementById('id03').style.display='block'" class="NachhilfeEintragen">Nachhilfe eintragen</button>
                                                                    <button onclick="document.getElementById('id05').style.display='block'" class="gesuchteNachhilfe">Gesuchte Nachhilfe anzeigen</button>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <button class="collapsible">C Programmierung</button>
                                                            <div class="content">
                                                                <ul class="AlleKurseListe">
                                                                    <h4>Hilfe f&uuml;r C-Programmierung anbieten?</h4>
                                                                    <a onclick="document.getElementById('id03').style.display='block'"><button class="NachhilfeEintragen">Nachhilfe eintragen</button></a>
                                                                    <button onclick="document.getElementById('id05').style.display='block'" class="gesuchteNachhilfe">Gesuchte Nachhilfe anzeigen</button>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <button class="collapsible">Objektorientierte Programmierung</button>
                                                            <div class="content">
                                                                <ul class="AlleKurseListe">
                                                                    <h4>Hilfe f&uuml;r OO-Programmierung anbieten?</h4>
                                                                    <a onclick="document.getElementById('id03').style.display='block'"><button class="NachhilfeEintragen">Nachhilfe eintragen</button></a>
                                                                    <button onclick="document.getElementById('id05').style.display='block'" class="gesuchteNachhilfe">Gesuchte Nachhilfe anzeigen</button>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <button class="collapsible">Moderne Webtechnologien</button>
                                                            <div class="content">
                                                                <ul class="AlleKurseListe">
                                                                    <h4>Hilfe f&uuml;r Moderne Webtechnologien anbieten?</h4>
                                                                    <a onclick="document.getElementById('id03').style.display='block'"><button class="NachhilfeEintragen">Nachhilfe eintragen</button></a>
                                                                    <button onclick="document.getElementById('id05').style.display='block'" class="gesuchteNachhilfe">Gesuchte Nachhilfe anzeigen</button>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <button class="collapsible">IT Sicherheit</button>
                                                            <div class="content">
                                                                <ul class="AlleKurseListe">
                                                                    <h4>Hilfe f&uuml;r IT-Sicherheit anbieten?</h4>
                                                                    <a onclick="document.getElementById('id03').style.display='block'"><button class="NachhilfeEintragen">Nachhilfe eintragen</button></a>
                                                                    <button onclick="document.getElementById('id05').style.display='block'" class="gesuchteNachhilfe">Gesuchte Nachhilfe anzeigen</button>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <button class="collapsible">Elektrotechnik</button>
                                                <div class="content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipilaboris nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <button class="collapsible">Mechatronik</button>
                                                <div class="content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipilaboris nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </li>
                                        </ul>
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
                    </div>
                </div>
                <div id="id03" class="modal">
                    <form class="modal-content animate" method="POST">
                        <div class="modalcontainer">
                            <h1>Nachhilfe anbieten</h1>
                            <h2>Bitte f&uuml;lle folgende Felder aus</h2>
                            <label for="titel">Titel (wird bei Nachhilfeangebote angezeigt)</label>
                            <input type="text" id="titel" placeholder="Beispiel: Biete Hilfe für Java an, insbesondere für JavaFX" required name="anbietenTitel">
                            <label for="ort">Bevorzugter Ort</label>
                            <input type="text" id="ort" placeholder="Beispiel: Hochschule Bochum" required name="anbietenOrt">
                            <label for="titel">Voraussichtliche Verf&uuml;gbarkeit</label>
                            <input type="text" id="zeit" placeholder="Beispiel: Stehe von dd.mm.yyyy bis dd.mm.yyyy zur Verfügung." required name="anbietenZeit">
                            <label for="preis">Preis</label>
                            <input type="text" id="preis" placeholder="Beispiel: 8,50€/Stunde" required name="anbietenPreis">
                            <div class="LoginButtons">
                                <button type="submit" name="anbietenAbschicken" onclick="document.getElementById('id03').style.display='none'">Abschicken</button>
                                <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Abbrechen</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="w3-half">
                <div class="w3-card w3-container" style="min-height:460px">
                    <div id="MeineKurseDiv">
                        <div id="KurseUebersicht">
                            <div id="AlleKurseDiv">
                                <h1 id="AlleKurseUeberschrift">Nachhilfe suchen</h1>
                                <ul class="AlleKurseListe">
                                    <li>
                                        <button class="collapsible">Informatik und Elektrotechnik</button>
                                        <div class="content">
                                            <ul class="AlleKurseListe">
                                                <li>
                                                    <button class="collapsible">Informatik</button>
                                                    <div class="content">
                                                        <ul class="AlleKurseListe">
                                                            <li>
                                                                <button class="collapsible">Java Programmierung</button>
                                                                <div class="content">
                                                                    <ul class="AlleKurseListe">
                                                                        <h4>Hilfe f&uuml;r Java-Programmierung anfordern?</h4>
                                                                        <a onclick="document.getElementById('id04').style.display='block'"><button class="NachhilfeEintragen">Hilfe anfordern</button></a>
                                                                        <button onclick="document.getElementById('id06').style.display='block'" class="gesuchteNachhilfe">Nachhilfeangebote anzeigen</button>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <button class="collapsible">C Programmierung</button>
                                                                <div class="content">
                                                                    <ul class="AlleKurseListe">
                                                                        <h4>Hilfe f&uuml;r C-Programmierung anfordern?</h4>
                                                                        <a onclick="document.getElementById('id04').style.display='block'"><button class="NachhilfeEintragen">Hilfe anfordern</button></a>
                                                                        <button onclick="document.getElementById('id06').style.display='block'" class="gesuchteNachhilfe">Nachhilfeangebote anzeigen</button>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <button class="collapsible">Objektorientierte Programmierung</button>
                                                                <div class="content">
                                                                    <ul class="AlleKurseListe">
                                                                        <h4>Hilfe f&uuml;r OO-Programmierung anfordern?</h4>
                                                                        <a onclick="document.getElementById('id04').style.display='block'"><button class="NachhilfeEintragen">Hilfe anfordern</button></a>
                                                                        <button onclick="document.getElementById('id06').style.display='block'" class="gesuchteNachhilfe">Nachhilfeangebote anzeigen</button>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <button class="collapsible">Moderne Webtechnologien</button>
                                                                <div class="content">
                                                                    <ul class="AlleKurseListe">
                                                                        <h4>Hilfe f&uuml;r Moderne Webtechnologien anfordern?</h4>
                                                                        <a onclick="document.getElementById('id04').style.display='block'"><button class="NachhilfeEintragen">Hilfe anfordern</button></a>
                                                                        <button onclick="document.getElementById('id06').style.display='block'" class="gesuchteNachhilfe">Nachhilfeangebote anzeigen</button>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <button class="collapsible">IT Sicherheit</button>
                                                                <div class="content">
                                                                    <ul class="AlleKurseListe">
                                                                        <h4>Hilfe f&uuml;r IT-Sicherheit anfordern?</h4>
                                                                        <a onclick="document.getElementById('id04').style.display='block'"><button class="NachhilfeEintragen">Hilfe anfordern</button></a>
                                                                        <button onclick="document.getElementById('id06').style.display='block'" class="gesuchteNachhilfe">Nachhilfeangebote anzeigen</button>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <button class="collapsible">Elektrotechnik</button>
                                                    <div class="content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipilaboris nisi ut aliquip ex ea commodo consequat.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <button class="collapsible">Mechatronik</button>
                                                    <div class="content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipilaboris nisi ut aliquip ex ea commodo consequat.</p>
                                                    </div>
                                                </li>
                                            </ul>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div id="id04" class="modal">
                    <form class="modal-content animate" method="POST">
                        <div class="modalcontainer">
                            <h1>Hilfe anfordern</h1>
                            <h2>Bitte f&uuml;lle folgende Felder aus</h2>
                            <label for="titel">Titel (wird bei Hilfesuchenden angezeigt)</label>
                            <input type="text" id="titel" placeholder="Beispiel: Suche Hilfe für Java, insbesondere für JavaFX" required name="anfordernTitel">
                            <label for="ort">Bevorzugter Ort</label>
                            <input type="text" id="ort" placeholder="Beispiel: Hochschule Bochum" required name="anfordernOrt">
                            <label for="titel">Voraussichtliche Verf&uuml;gbarkeit</label>
                            <input type="text" id="zeit" placeholder="Beispiel: Benötige Hilfe von dd.mm.yyyy bis dd.mm.yyyy." required name="anfordernZeit">
                            <label for="preis">Preisvorstellung</label>
                            <input type="text" id="preis" placeholder="Beispiel: 8,50€/Stunde" required name="anfordernPreis">

                            <div class="LoginButtons">
                                <button type="submit" onclick="document.getElementById('id04').style.display='none'" name="anfordernAbschicken">Abschicken</button>
                                <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Abbrechen</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="id05" class="modal">
                    <form class="modal-content animate" method="POST">
                        <div class="modalcontainer">
                            <?php
                            echo "<h1>Diese User suchen Hilfe</h1>";
                            echo "<h2>Kontaktiere sie um ihnen zu helfen</h2>";
                            echo "<table class='nachhifleTabelle'>";
                            echo "<tr>";
                            echo "<th>Name</th>";
                            echo "<th>Kurs</th>";
                            echo "<th>Ort</th>";
                            echo "<th>geplante Uhrzeit</th>";
                            echo "<th>Preis</th>";
                            echo "<th>Kontakt</th>";
                            echo "</tr>";
                            $db = mysqli_connect("localhost", "root", "", "studentenfuerstudenten");
                            $sql1 = "SELECT * FROM nachhilfeangebot WHERE kursID='1'";
                            $_res = mysqli_query($db, $sql1);
                            while($_row = mysqli_fetch_assoc($_res)){
                                $_freundID = $_row["userID"];
                                $_ort = $_row["ort"];
                                $_titel = $_row["titel"];
                                $_zeit = $_row["zeit"];
                                $_preis = $_row["preis"];
                                $_sql = "SELECT name FROM user WHERE userID='$_freundID'";
                                $_erg = mysqli_query($db, $_sql);
                                while($_zeile = $_erg->fetch_assoc()){
                                    $_freundName = $_zeile["name"];
                                    echo "<tr>";
                                    echo "<td>".$_freundName."</td>";
                                    echo "<td>".$_titel."</td>";
                                    echo "<td>".$_ort."</td>";
                                    echo "<td>".$_zeit."</td>";
                                    echo "<td>".$_preis."</td>";
                                    echo "<td bgcolor=#4CAF50><a href='Freund.php?fID=$_freundID' class='kontaktButton'>Kontakt</a></td>";
                                    echo "</tr>";
                                }
                            }
                            echo "</table>";
                        ?>
                        </div>
                    </form>
                </div>
            </div>

            <div id="id06" class="modal">
                <form class="modal-content animate" method="POST">
                    <div class="modalcontainer">
                        <?php
                            echo "<h1>Diese User bieten Hilfe an</h1>";
                            echo "<h2>Kontaktiere sie wenn du Hilfe brauchst</h2>";
                            echo "<table class='nachhifleTabelle'>";
                            echo "<tr>";
                            echo "<th>Name</th>";
                            echo "<th>Kurs</th>";
                            echo "<th>Ort</th>";
                            echo "<th>geplante Uhrzeit</th>";
                            echo "<th>Preis</th>";
                            echo "<th>Kontakt</th>";
                            echo "</tr>";
                            $db = mysqli_connect("localhost", "root", "", "studentenfuerstudenten");
                            $sql1 = "SELECT * FROM nachhilfeangebot WHERE kursID='1'";
                            $_res = mysqli_query($db, $sql1);
                            while($_row = mysqli_fetch_assoc($_res)){
                                $_freundID = $_row["userID"];
                                $_ort = $_row["ort"];
                                $_titel = $_row["titel"];
                                $_zeit = $_row["zeit"];
                                $_preis = $_row["preis"];
                                $_sql = "SELECT name FROM user WHERE userID='$_freundID'";
                                $_erg = mysqli_query($db, $_sql);
                                while($_zeile = $_erg->fetch_assoc()){
                                    $_freundName = $_zeile["name"];
                                    echo "<tr>";
                                    echo "<td>".$_freundName."</td>";
                                    echo "<td>".$_titel."</td>";
                                    echo "<td>".$_ort."</td>";
                                    echo "<td>".$_zeit."</td>";
                                    echo "<td>".$_preis."</td>";
                                    echo "<td bgcolor=#4CAF50><a href='Freund.php?fID=$_freundID' class='kontaktButton'>Kontakt</a></td>";
                                    echo "</tr>";
                                }
                            }
                            echo "</table>";
                        ?>
                    </div>
                </form>
            </div>
        </div>

        <script>
            //Schließt die Modals wenn daneben geklickt wird
            var modal = document.getElementById('id03');
            var modal2 = document.getElementById('id04');
            var modal3 = document.getElementById('id05');
            var modal4 = document.getElementById('id06');
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
                if (event.target == modal2) {
                    modal2.style.display = "none";
                }
                if (event.target == modal3) {
                    modal3.style.display = "none";
                }
                if (event.target == modal4) {
                    modal4.style.display = "none";
                }
            }

        </script>
    </div>
</body>

</html>
