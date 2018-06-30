<!DOCTYPE html>
<html>

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
        <img src="banner.jpg" class="" width="2100px" height="250px" />
        <p id="name">Max Mustermann</p>
        <p id="hochschule">Hochschule Bochum</p>
        <p id="studiengang">BWL-Student</p>
        <div id="profilbild">
            <img id="userlogo" src="freund.png" width="75em">
            <img src="bwlJustus.jpg" alt="John" style="width:150%">
            <button type="button" id="nachricht" class="block">Nachricht schreiben</button>
            <button type="button" id="" class="block">Freund entfernen</button>
        </div>
    </div>
    <div id="txtbox">
        <div class="personbeschreibung">
            <h1>Beschreibung</h1>
            <h3>
            Hallo, ich bin Max Mustermann und studiere BWL seit 9 Semestern an der Hochschule Bochum. Ich bin 30 Jahre alt und gebe schon seit 9 Jahren Nachhilfe zu g&uumlnstigen Preisen. Das Feedback meiner "Sch&uumller" ist durchaus positiv. Dies hat sich auch dadurch bemerkbar gemacht, indem die selben Leute wieder Nachhilfe bei mir haben wollten, da sie so gute Note erzielt hatten. Nat&uumlrlich m&oumlchte auch ich mein Wissen erweitern und nutze diese Plattform, um Hilfe zu fordern.
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
                                <li><a href="Kurs.php">Java Programmierung</a></li>
                                <li><a href="#">C Programmierung</a></li>
                                <li><a href="#">Rechnerarchitektur</a></li>
                                <li><a href="#">Webtechnologien</a></li>
                                <li><a href="#">IT-Sicherheit</a></li>
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
                                <li><a href="Kurs.php">Java Programmierung</a></li>
                                <li><a href="#">C Programmierung</a></li>
                                <li><a href="#">Rechnerarchitektur</a></li>
                                <li><a href="#">Webtechnologien</a></li>
                                <li><a href="#">IT-Sicherheit</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-half w3-margin-top">
                <div class="w3-card w3-container">
                    <div id="KursZusammenfassung">
                        <div id="MeineKurseDiv">
                            <h2 id="MeineKurseUeberschrift">Ben&oumltigt Hilfe bei ...</h2>
                            <ul id="MeineKurseListe">
                                <li><a href="Kursbeigetreten.php">Java: Aufgabe 1</a></li>
                                <li><a href="#">C Programmierung: Pointer</a></li>
                                <li><a href="#">Mathe: Aufgabe 9</a></li>
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
