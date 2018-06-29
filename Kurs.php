<?php include ("kursBeitreten.php"); ?>

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

    <div id="Kurs">
        <div class="w3-row-padding w3-margin-top">
            <div class="w3-half">
                <div class="w3-card w3-container">
                    <div id="KursZusammenfassung">
                        <h2>Kurs:</h2>
                        <h4 id="KursTitel">Java Programmierung</h4>
                        <p> </p>
                        <h3>Voraussetzungen:</h3>
                        <p id="KursVoraussetzung">Dieser Kurs hat keine Voraussetzungen!</p>
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
                    <p id="KursBeschreibung">Java ist eine objektorientierte Programmiersprache, die sich durch einige zentrale Eigenschaften auszeichnet. Diese machen sie universell einsetzbar und f&uumlr die Industrie als robuste Programmiersprache interessant. Da Java objektorientiertes Programmieren erm&oumlglicht, k&oumlnnen Entwickler moderne und wiederverwertbare Softwarekomponenten programmieren.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
