<!DOCTYPE html>
<html>

<head>
    <title>Impressum</title>
    <link rel="icon" href="favicon.ico">
    <link rel="icon" href="favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styler.css">

    <style>
        #impressumseite {
            width: 80%;
            max-width: 960px;
            margin: 2em auto 5em auto;
        }

        #impressumtext {
            width: 90%;
            max-width: 960px;
            margin: 1em auto 2em auto;
            padding-top: 1em;
        }

        #impressumtext h4 {
            text-align: justify;
        }

    </style>
</head>

<body>
    <!-- Kopierenstart -->
    <!-- Header und Footer, active Tab zuweisen-->
    <div class="topnav" id="myTopnav">
        <a href="Startseite.php" id="logo"><img src="logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a class="active" href="Startseite.php">Startseite</a>
            <a href="Profil.php">Profil</a>
            <a href="KurseUebersicht.php">Kurse</a>
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

    <div id="impressumseite">
        <div class="w3-card">
            <div id="impressumtext">
                <h1>Impressum</h1>
                <h4>StudentenFuerStudenten<br />Hochschule Bochum C5-14<br />Lennershofstraße 140<br />44801 Bochum<br />Deutschland<br /><br /></h4>
                <h1>Kontakt</h1>
                <h4>E-Mail: support@studentenfuerstudenten.com<br /><br /></h4>
                <h1>Haftung f&uuml;r Inhalte</h1>
                <h4>Es wird keinerlei Haftung vom Betreiber der Website f&uuml;r die Inhalte &uuml;bernommen. Jeder kann hier Inhalte ver&ouml;ffentlichen und wir haben keine Uploadfilter in unser System eingebaut. Niemand hat je weniger Sinn ergeben als dieser Text. Bli Bla Blup wir haften f&uuml;r garnichts.<br /></h4>
            </div>
        </div>
    </div>
</body>

</html>
