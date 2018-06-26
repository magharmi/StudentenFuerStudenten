<?php include ("login.php"); ?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styler.css">

    <style>
        #Registrieren {
            width: 80%;
            max-width: 960px;
            margin: 0 auto 5em auto;
        }

        * {
            box-sizing: border-box
        }

        /* Set a grey background color and center the text of the "sign in" section */

        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }

        /* Full-width input fields */

        #Registrieren input[type=text],
        #Registrieren input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        /* Add Zoom Animation */

        #Registrieren .animate {
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

        #Registrieren a {
            color: dodgerblue;
            font-size: 1.1em;
        }

        #Loginbereich {
            margin: 20px auto 3em auto;
        }

        #LoginLogo {
            margin: 10px auto;
        }

        #LoginTextAusrichten:after {
            content: "";
            display: table;
            clear: both;
        }

        #DatenMerken {
            width: 50%;
            text-align: left;
            float: left;
        }

        #DatenMerken input[type=checkbox] {
            width: auto;
            margin: 0.33em 1em;
        }

        #PasswortVergessen {
            width: 50%;
            text-align: right;
            float: left;
        }

        #Beschreibung {
            text-align: justify;
        }

    </style>
</head>

<body>

    <!-- Header und Footer -->
    <div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" id="logo"><img src="logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a href="index.html">Studenten f&uumlr Studenten</a>
        </div>
    </div>
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
    <!-- Header und Footer -->

    <div id="Registrieren">
        <div id="Loginbereich" class="card">
            <img id="LoginLogo" src="logo.png" alt="Logo" style="width:50%">
            <p class="title">Lernen auf Augenh&oumlhe</p>
            <h2>Studenten f&uumlr Studenten</h2>
            <div class="LoginButtons">
                <button onclick="document.getElementById('id01').style.display='block'">Login</button>
                <button onclick="document.getElementById('id02').style.display='block'">Registrieren</button>
            </div>
            <div id="id01" class="modal">
                <form class="modal-content animate" method="POST">
                    <div class="imgcontainer">
                        <img src="logo.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="modalcontainer">
                        <input type="text" placeholder="Benutzername" name="uname" required>
                        <input type="password" placeholder="Passwort" name="psw" required>
                        <div id="LoginTextAusrichten">
                            <div id="DatenMerken">
                                <input type="checkbox" checked="checked" name="remember">Daten merken
                            </div>
                            <div id="PasswortVergessen">
                                <a href="#">Passwort vergessen?</a>
                            </div>
                        </div>
                        <div class="LoginButtons">
                            <button type="submit"  name=login value="Einloggen">Einloggen</button>
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Abbrechen</button>
                        </div>
                    </div>
                </form>
            </div>
            <script>
                // Get the modal
                var modal = document.getElementById('id01');
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }

            </script>
            <div id="id02" class="modal">
                <form class="modal-content animate" method="POST">
                    <div class="imgcontainer">
                        <img src="logo.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="modalcontainer">
                        <h1>Registrieren</h1>
                        <p>Um ein Konto zu erstellen, f&uumllle bitte die Felder aus.</p>
                        <input type="text" placeholder="E-Mail" name="email" required>
                        <input type="password" placeholder="Passwort" name="psw1" required>
                        <input type="password" placeholder="Passwort wiederholen" name="psw-repeat" required>
                        <p>Mit Erstellen des Kontos akzeptierst du unsere <a href="#">AGB</a>.</p>
                        <div class="LoginButtons">
                            <button type="Submit" name="register" class="signupbtn">Registrieren</button>
                            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Abbrechen</button>
                        </div>
                    </div>
                </form>
            </div>
            <script>
                // Get the modal
                var modal = document.getElementById('id02');
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }

            </script>
        </div>
        <div id="Beschreibung">
            <h4>Willkommen auf der Seite Studenten f&uumlr Studenten. Unser Leitmotive ist es Studenten in ganz Deutschland das Lernen zu erleichtern und setzen dabei auf das Prinzip der Gegenseitigkeit. Wir bieten dir hier eine Plattform, auf der du anderen Hilfe bieten sowie bekommen kannst, falls du diese ben&oumltigst. Dabei ist es egal, welches Fach du studierst oder im welchem Bundesland du dich befindest. Wir bieten dir die M&oumlglichkeit Aufgaben runter- bzw. hochzuladen, einen Nachhilfelehrer zu finden oder selbst zu einem zu werden. Wir bieten auch die M&oumlglichkeit Leute kennenzulernen und sich mit ihnen anzufreunden. Unsere Website ist komplett kostenfrei und unverbindlich. Also registriere dich jetzt, falls noch nicht geschehen, um denn ganzen Umfang unserer Website nutzen zu k&oumlnnen.</h4>
        </div>
    </div>
</body>

</html>
