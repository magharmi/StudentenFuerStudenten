<!DOCTYPE html>
<html>

<head>
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

    </style>
</head>

<body>
    <!-- Kopierenstart -->
    <div class="topnav" style="height: 56px" id="myTopnav">
        <a href="javascript:void(0);" id="logo"><img src="logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a href="Startseite.php">Startseite</a>
            <a href="Profil.php">Profil</a>
            <a href="KurseUebersicht.php">Kurse</a>
            <a href="FreundeUebersicht.php">Freunde</a>
            <a class="active" href="Nachhilfe.php">Nachhilfe</a>
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
                                                                    <h4>Hilfe f&uumlr Java-Programmierung anbieten?</h4>
                                                                    <button onclick="document.getElementById('id03').style.display='block'" class="NachhilfeEintragen">Nachhilfe eintragen</button>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <button class="collapsible">C Programmierung</button>
                                                            <div class="content">
                                                                <ul class="AlleKurseListe">
                                                                    <h4>Hilfe f&uumlr C-Programmierung anbieten?</h4>
                                                                    <a onclick="document.getElementById('id03').style.display='block'"><button class="NachhilfeEintragen">Nachhilfe eintragen</button></a>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <button class="collapsible">Objektorientierte Programmierung</button>
                                                            <div class="content">
                                                                <ul class="AlleKurseListe">
                                                                    <h4>Hilfe f&uumlr OO-Programmierung anbieten?</h4>
                                                                    <a onclick="document.getElementById('id03').style.display='block'"><button class="NachhilfeEintragen">Nachhilfe eintragen</button></a>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <button class="collapsible">Moderne Webtechnologien</button>
                                                            <div class="content">
                                                                <ul class="AlleKurseListe">
                                                                    <h4>Hilfe f&uumlr Moderne Webtechnologien anbieten?</h4>
                                                                    <a onclick="document.getElementById('id03').style.display='block'"><button class="NachhilfeEintragen">Nachhilfe eintragen</button></a>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <button class="collapsible">IT Sicherheit</button>
                                                            <div class="content">
                                                                <ul class="AlleKurseListe">
                                                                    <h4>Hilfe f&uumlr IT-Sicherheit anbieten?</h4>
                                                                    <a onclick="document.getElementById('id03').style.display='block'"><button class="NachhilfeEintragen">Nachhilfe eintragen</button></a>

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
                                    <button class="collapsible">Geod&aumlsie</button>
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
                    <form class="modal-content animate" action="/action_page.php">
                        <div class="modalcontainer">
                            <h1>Nachhilfe anbieten</h1>
                            <h2>Bitte f&uumllle folgende Felder aus</h2>
                            <label for="titel">Titel (wird bei Nachhilfeangebote angezeigt)</label>
                            <input type="text" id="titel" placeholder="Beispiel: Biete Hilfe für Java an, insbesondere für JavaFX" required>
                            <label for="ort">Bevorzugter Ort</label>
                            <input type="text" id="ort" placeholder="Beispiel: Hochschule Bochum" required>
                            <label for="titel">Voraussichtliche Verf&uumlgbarkeit</label>
                            <input type="text" id="zeit" placeholder="Beispiel: Stehe von dd.mm.yyyy bis dd.mm.yyyy zur Verfügung." required>
                            <label for="preis">Preis</label>
                            <input type="text" id="preis" placeholder="Beispiel: 8,50€/Stunde" required>
                            <div class="LoginButtons">
                                <button type="button" onclick="document.getElementById('id03').style.display='none'">Abschicken</button>
                                <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Abbrechen</button>
                            </div>
                        </div>
                    </form>
                </div>
                <script>
                    // Get the modal
                    var modal = document.getElementById('id03');
                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }

                </script>
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
                                                                        <h4>Hilfe f&uumlr Java-Programmierung anfordern?</h4>
                                                                        <a onclick="document.getElementById('id04').style.display='block'"><button class="NachhilfeEintragen">Hilfe anfordern</button></a>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <button class="collapsible">C Programmierung</button>
                                                                <div class="content">
                                                                    <ul class="AlleKurseListe">
                                                                        <h4>Hilfe f&uumlr C-Programmierung anfordern?</h4>
                                                                        <a onclick="document.getElementById('id04').style.display='block'"><button class="NachhilfeEintragen">Hilfe anfordern</button></a>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <button class="collapsible">Objektorientierte Programmierung</button>
                                                                <div class="content">
                                                                    <ul class="AlleKurseListe">
                                                                        <h4>Hilfe f&uumlr OO-Programmierung anfordern?</h4>
                                                                        <a onclick="document.getElementById('id04').style.display='block'"><button class="NachhilfeEintragen">Hilfe anfordern</button></a>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <button class="collapsible">Moderne Webtechnologien</button>
                                                                <div class="content">
                                                                    <ul class="AlleKurseListe">
                                                                        <h4>Hilfe f&uumlr Moderne Webtechnologien anfordern?</h4>
                                                                        <a onclick="document.getElementById('id04').style.display='block'"><button class="NachhilfeEintragen">Hilfe anfordern</button></a>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <button class="collapsible">IT Sicherheit</button>
                                                                <div class="content">
                                                                    <ul class="AlleKurseListe">
                                                                        <h4>Hilfe f&uumlr IT-Sicherheit anfordern?</h4>
                                                                        <a onclick="document.getElementById('id04').style.display='block'"><button class="NachhilfeEintragen">Hilfe anfordern</button></a>
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
                                        <button class="collapsible">Geod&aumlsie</button>
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
                    <form class="modal-content animate" action="/action_page.php">
                        <div class="modalcontainer">
                            <h1>Hilfe anfordern</h1>
                            <h2>Bitte f&uumllle folgende Felder aus</h2>
                            <label for="titel">Titel (wird bei Hilfesuchenden angezeigt)</label>
                            <input type="text" id="titel" placeholder="Beispiel: Suche Hilfe für Java, insbesondere für JavaFX" required>
                            <label for="ort">Bevorzugter Ort</label>
                            <input type="text" id="ort" placeholder="Beispiel: Hochschule Bochum" required>
                            <label for="titel">Voraussichtliche Verf&uumlgbarkeit</label>
                            <input type="text" id="zeit" placeholder="Beispiel: Benötige Hilfe von dd.mm.yyyy bis dd.mm.yyyy." required>
                            <label for="preis">Preisvorstellung</label>
                            <input type="text" id="preis" placeholder="Beispiel: 8,50€/Stunde" required>

                            <div class="LoginButtons">
                                <button type="button" onclick="document.getElementById('id04').style.display='none'">Abschicken</button>
                                <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Abbrechen</button>
                            </div>
                        </div>
                    </form>
                </div>
                <script>
                    // Get the modal
                    var modal = document.getElementById('id04');
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

</body>

</html>
