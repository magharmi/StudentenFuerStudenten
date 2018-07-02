<!DOCTYPE html>
<?php SESSION_START(); ?>
<?php include ("loginCheck.php"); ?>
<html>

<head>
    <title>Startseite</title>
    <link rel="stylesheet" href="styler.css">
    <link rel="icon" href="symbole/favicon.ico">
    <link rel="icon" href="symbole/favicon.png">
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

        @media (max-width:960px) {
            #logoutbtn {
                float: none;
                display: block;
                text-align: left;
            }
        }

    </style>
</head>

<body>
    <!-- Kopierenstart -->
    <!-- Header und Footer, active Tab zuweisen-->
    <div class="topnav" id="myTopnav">
        <a href="Startseite.php" id="logo"><img src="symbole/logo.png" alt="John" style="width:48px"></a>
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
                            <?php
                            $_userID = $_SESSION["userID"];
                            echo("<script>console.log('User: $_userID');</script>");

                            // connect to database
                            $link = mysqli_connect("localhost", "root"); 
                            $db = mysqli_connect("localhost", "root", "", "studentenfuerstudenten");
                            if (!$link) { 
                                die("Keine Datenbankverbindung möglich: " . mysqli_error()); 
                            } 

                            $datenbank = mysqli_select_db($link, "StudentenFuerStudenten");
                            if (!$datenbank) { 
                                echo "Kann die Datenbank nicht benutzen: " . mysqli_error(); 
                                mysqli_close($link);
                                exit;
                            }
                            
                            //Pruefe ob ein neuer Eintrag da ist
                            if(isset($_GET["neuerEintrag"])){
                                $_neuerEintrag = $_GET["neuerEintrag"];
                                $_sql2 = "INSERT INTO todoliste (userID, beschreibung) VALUES('$_userID', '$_neuerEintrag')";
                                $_res = mysqli_query($link, $_sql2);
                                echo("<script>console.log('Neuer Eintrag: $_neuerEintrag');</script>");
                            }
                            else{
                                echo("<script>console.log('Nichts Neues');</script>");
                            }
                            
                            //Pruefe ob ein Eintrag weg soll
                            if(isset($_GET["weg"])){
                                $_weg = $_GET["weg"];
                                $_sql3 = "DELETE FROM todoliste WHERE todoID='$_weg'";
                                $_res = mysqli_query($link, $_sql3);
                                echo("<script>console.log('Eintrag entfernt: $_weg');</script>");
                            }
                            else{
                                echo("<script>console.log('Nichts entfernt');</script>");
                            }
                            
                            $_sql = "SELECT * FROM todoliste WHERE userID='$_userID'";
                            $_res = mysqli_query($link, $_sql);

                            $_anzahl = mysqli_num_rows($_res);
                            if ($_anzahl == 0) {
                                echo("<script>console.log('Keine ToDoPunkte gefunden!');</script>");
                                echo "<li>Fuege hier Notizen ein</li>";
                                echo "<li>Oder notiere dir wichtige Deadlines</li>";
                            }
                            else {
                                while($_row = mysqli_fetch_assoc($_res)){
                                    $_beschreibung = $_row["beschreibung"];
                                    $_todoID = $_row["todoID"];
                                    $_checked = $_row["checked"];
                                    if($_checked == 0){
                                        echo "<li id='$_todoID'>$_beschreibung</li>";
                                    }
                                    else{
                                        echo "<li id='$_todoID' class='checked'>$_beschreibung</li>";
                                    }
                                }
                            }
                            mysqli_close($link);
                            ?>
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
                                    //laed Seite neu und fuegt Element Name in url ein
                                    window.location.href = "Startseite.php?weg=" + this.parentElement["id"];
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
                                if (inputValue === '') {
                                    alert("Du musst etwas eingeben!");
                                } else {
                                    //laed Seite neu fuegt dabei Wert in url ein
                                    window.location.href = "Startseite.php?neuerEintrag=" + inputValue;
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
                        <p><a href="KurseUebersicht.php"><img src="symbole/kurs2.png"  style="width:18%"/></a>
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
                    <p><a href="Kursbeigetreten.php"><img src="symbole/aufgaben.jpg" alt="John"   style="width:20%"/></a>
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
                    <p><a href="Kursbeigetreten.php"><img src="symbole/aufgaben.jpg" alt="John"   style="width:20%"/></a>
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
