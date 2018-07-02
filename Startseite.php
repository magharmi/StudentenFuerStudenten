<!DOCTYPE html>
<?php SESSION_START(); ?>
<?php include ("loginCheck.php"); ?>
<html>

<head>
    <title>Startseite</title>
    <link rel="stylesheet" href="styler.css">
    <link rel="icon" href="favicon.ico">
    <link rel="icon" href="favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        #MeineKurseListe {
            /* Remove default list styling */
            list-style-type: none;
            padding: 0px;
            margin: 0px;
        }

        #MeineKurseListe li {
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

        #MeineKurseListe li:hover {
            background-color: #eee;
            /* Add a hover effect to all links, except for headers */
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
                    <div class="card">
                        <div id="myDIV" class="header">
                            <h2>To-Do-Liste</h2>
                            <div class="button-group">
                                <input type="text" id="myInput" name="task" placeholder="Was merken?">
                                <span type="submit" onclick="newElement()" class="addBtn">Hinzuf&uuml;gen</span>
                                <script>
                                    var input = document.getElementById("myInput");
                                    input.addEventListener("keyup", function(event) {
                                        event.preventDefault();
                                        if (event.keyCode === 13) {
                                            newElement();
                                        }
                                    });

                                </script>
                            </div>
                        </div>
                        <ul id="ToDoListe">
                            <li>Hit the gym</li>
                            <li class="checked">Pay bills</li>
                            <li>Meet George</li>
                            <li>Read a book</li>
                        </ul>

                        <script>
                            // Create a "close" button and append it to each list item
                            var myNodelist = document.getElementsByTagName("LI");
                            var i;
                            for (i = 0; i < myNodelist.length; i++) {
                                var span = document.createElement("SPAN");
                                var txt = document.createTextNode("\u00D7");
                                span.className = "close";
                                span.appendChild(txt);
                                myNodelist[i].appendChild(span);
                            }

                            // Click on a close button to hide the current list item
                            var close = document.getElementsByClassName("close");
                            var i;
                            for (i = 0; i < close.length; i++) {
                                close[i].onclick = function() {
                                    var div = this.parentElement;
                                    div.style.display = "none";
                                }
                            }

                            // Add a "checked" symbol when clicking on a list item
                            var list = document.querySelector('ul');
                            list.addEventListener('click', function(ev) {
                                if (ev.target.tagName === 'LI') {
                                    ev.target.classList.toggle('checked');
                                }
                            }, false);

                            // Create a new list item when clicking on the "Add" button
                            function newElement() {
                                var inputValue = document.getElementById("myInput").value;
                                newElementDB(inputValue);
                            }

                            //newElement mit Datenuebergabe
                            function newElementDB(inputValue) {
                                var li = document.createElement("li");
                                var t = document.createTextNode(inputValue);
                                li.appendChild(t);
                                if (inputValue === '') {
                                    alert("Du musst etwas eingeben!");
                                } else {
                                    document.getElementById("ToDoListe").appendChild(li);
                                }
                                document.getElementById("myInput").value = "";

                                var span = document.createElement("SPAN");
                                var txt = document.createTextNode("\u00D7");
                                span.className = "close";
                                span.appendChild(txt);
                                li.appendChild(span);

                                for (i = 0; i < close.length; i++) {
                                    close[i].onclick = function() {
                                        var div = this.parentElement;
                                        div.style.display = "none";
                                    }
                                }

                            }

                        </script>
                    </div>
                </div>
            </div>

            <div class="w3-half">
                <div class="w3-card w3-container" style="min-height:460px">
                    <div id="MeineKurseDiv">
                        <h2 id="MeineKurseUeberschrift">Meine Kurse</h2>
                        <p><a href="KurseUebersicht.php"><img src="kurs2.png"  style="width:18%"/></a>
                            <p>
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
        <div class="mittig">
            <div class="w3-half">
                <div class="w3-card w3-container w3-margin-top" style="min-height:460px">
                    <h2>Aufgaben &Uuml;bersicht</h2>
                    <p><a href="Kursbeigetreten.php"><img src="aufgaben.jpg" alt="John"   style="width:20%"/></a>
                        <p>
                            <div id="MeineKurseDiv">
                                <ul id="MeineKurseListe">
                                    <li><a href="Kursbeigetreten.php">Java: Aufgabe 3</a></li>
                                    <li><a href="#">Mathe: Aufgabe 3</a></li>
                                    <li><a href="#">Java: Aufgabe 2</a></li>
                                    <li><a href="#">Java: Aufgabe 1</a></li>
                                    <li><a href="#">IT-Sicherheit: Aufgabe 5</a></li>
                                </ul>
                            </div>
                </div>
            </div>
            <div class="w3-half">
                <div class="w3-card w3-container w3-margin-top" href="Kursbeigetreten.php" style="min-height:460px">
                    <h2>Zuletzt bearbeitete Aufgabe</h2>
                    <p><a href="Kursbeigetreten.php"><img src="aufgaben.jpg" alt="John"   style="width:20%"/></a>
                        <p>
                            <div id="MeineKurseDiv">
                                <ul id="MeineKurseListe">
                                    <li><a href="Kursbeigetreten.php">Java: Aufgabe 3</a></li>
                                    <li><a href="#">Mathe: Aufgabe 3</a></li>
                                    <li><a href="#">Java: Aufgabe 2</a></li>
                                    <li><a href="#">Java: Aufgabe 1</a></li>
                                    <li><a href="#">IT-Sicherheit: Aufgabe 5</a></li>
                                </ul>
                            </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
