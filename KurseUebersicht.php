<!DOCTYPE html>
<?php SESSION_START(); ?>
<html>

<head>
    <title>Kurs</title>
    <link rel="icon" href="favicon.ico">
    <link rel="icon" href="favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styler.css">
    <div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" id="logo"><img src="logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a href="index.php">Startseite</a>
            <a class="active" href="KurseUebersicht.php">Kurse</a>
            <a href="FreundeUebersicht.php">Freunde</a>
            <a href="Profil.php">Profil</a>
            <a href="login.php">Login</a>
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
        <a href="Startseite.php" id="logo"><img src="logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a href="Startseite.php">Startseite</a>
            <a href="Profil.php">Profil</a>
            <a class="active" href="KurseUebersicht.php">Kurse</a>
            <a href="FreundeUebersicht.php">Freunde</a>
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

    <div id="KurseUebersicht">
        <div id="MeineKurseDiv">
            <h1 id="MeineKurseUeberschrift">Meine Kurse</h1>
            <ul id="MeineKurseListe">
                <li><a href="Kurs.php?kid=7">C Programmierung</a></li>
                <li><a href="Kurs.php?kid=2">Java 2</a></li>
                <li><a href="Kurs.php?kid=3">Mathe 1</a></li>
                <li><a href="Kurs.php?kid=5">IT-Sicherheit</a></li>

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
                                        <li><a href="Kurs.php?kid=1">Java Programmierung 1</a></li>
                                        <li><a href="Kurs.php?kid=2">Java Programmierung 2</a></li>
                                        <li><a href="Kurs.php?kid=6">Datenbanken</a></li>
                                        <li><a href="Kurs.php?kid=7">C Programmierung</a></li>
                                        <li><a href="Kurs.php?kid=5">IT-Sicherheit</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <button class="collapsible">Elektrotechnik</button>
                                <div class="content">
                                    <ul class="AlleKurseListe">
                                        <li><a href="Kurs.php?kid=3">Mathe 1</a></li>
                                        <li><a href="Kurs.php?kid=4">Mathe 2</a></li>
                                        <li><a href="Kurs.php?kid=6">Datenbanken</a></li>
                                        <li><a href="Kurs.php?kid=7">C Programmierung</a></li>
                                        <li><a href="Kurs.php?kid=5">IT-Sicherheit</a></li>
                                    </ul>
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
