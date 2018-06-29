<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styler.css">
    <div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" id="logo"><img src="logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a href="index.html">Startseite</a>
            <a class="active" href="KurseUebersicht.html">Kurse</a>
            <a href="FreundeUebersicht.html">Freunde</a>
            <a href="Profil.html">Profil</a>
            <a href="login.html">Login</a>
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

    <style>
        #KurseUebersicht {
            width: 80%;
            max-width: 960px;
            margin: 1em auto 5em auto;
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

    </style>
</head>

<body>
    <!-- Kopierenstart -->
    <div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" id="logo"><img src="logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a href="Startseite.html">Startseite</a>
            <a href="Profil.html">Profil</a>
            <a class="active" href="KurseUebersicht.html">Kurse</a>
            <a href="FreundeUebersicht.html">Freunde</a>
            <a href="Nachhilfe.html">Nachhilfe</a>
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

    <div id="KurseUebersicht">
        <div id="MeineKurseDiv">
            <h1 id="MeineKurseUeberschrift">Meine Kurse</h1>
            <ul id="MeineKurseListe">
                <li><a href="Kursbeigetreten%20C.html">C Programmierung</a></li>
                <li><a href="#">Rechnerarchitektur</a></li>
                <li><a href="#">Webtechnologien</a></li>
                <li><a href="#">IT-Sicherheit</a></li>
            </ul>
        </div>
        <div id="AlleKurseDiv">
            <h1 id="AlleKurseUeberschrift">Alle Kurse</h1>
            <ul class="AlleKurseListe">
                <li>
                    <button class="collapsible">Informatik und Elektrotechnik</button>
                    <div class="content">
                        <ul class="AlleKurseListe">
                            <li>
                                <button class="collapsible">Informatik</button>
                                <div class="content">
                                    <ul class="AlleKurseListe">
                                        <li><a href="Kurs.html">Java Programmierung</a></li>
                                        <li><a href="#">Rechnerarchitektur</a></li>
                                        <li><a href="#">Webtechnologien</a></li>
                                        <li><a href="#">IT-Sicherheit</a></li>
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
</body>

</html>