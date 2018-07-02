<!DOCTYPE html>
<?php SESSION_START(); ?>
<?php include ("loginCheck.php"); ?>
<html>

<head>
    <title>Freunde</title>
    <link rel="icon" href="favicon.ico">
    <link rel="icon" href="favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styler.css">
    <style>
        .row,
        .row>.column {
            padding: 8px;
        }

        /* Create three equal columns that floats next to each other */

        .column {
            float: left;
            width: 25%;
        }

        /* Clear floats after rows */

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Content */

        .content {
            height: 24em;
            background-color: white;
            padding: 1em;
            box-shadow: 2px 2px 3px 1px rgba(0, 0, 0, 0.2), 0 4px 10px 0 rgba(0, 0, 0, 0.19)
        }

        .Profilbild {
            display: block;
            margin: 0 auto 5px auto;
            height: auto;
            width: auto;
            max-width: 100%;
            max-height: 15em;
        }

        @media screen and (max-width: 1200px) {
            .column {
                width: 33%;
            }
        }

        @media screen and (max-width: 900px) {
            .column {
                width: 50%;
            }
        }

        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }

        #FreundeUebersicht {
            width: 80%;
            max-width: 960;
            margin: 0 auto 5em auto;
        }

        #FreundeUeberschriftDiv:after {
            content: "";
            display: table;
            clear: both;
        }

        .nebeneinander {
            float: left;
        }

        #FreundeLogo {
            margin: 0.5em 0 0 0;
        }

        #FreundeUeberschrift {
            margin: 0.8em 0 0 0.5em;
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
    <div class="topnav" id="myTopnav">
        <a href="Startseite.php" id="logo"><img src="symbole/logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a href="Startseite.php">Startseite</a>
            <a href="Profil.php">Profil</a>
            <a href="KurseUebersicht.php">Kurse</a>
            <a class="active" href="FreundeUebersicht.php">Freunde</a>
            <a href="Nachhilfe.php">Nachhilfe</a>
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

    <div id="FreundeUebersicht">
        <div id="FreundeUeberschriftDiv">
            <div class="nebeneinander">
                <img id="FreundeLogo" src="symbole/freunde.png" width="100em">
            </div>
            <div class="nebeneinander">
                <h1 id="FreundeUeberschrift">Freunde</h1>
            </div>
        </div>

        <!-- Portfolio Gallery Grid -->
        <div class="row">
            <?php      
                $userID = $_SESSION["userID"];
                $db = mysqli_connect("localhost", "root", "", "studentenfuerstudenten");
                $sql = "SELECT userID2 FROM freund WHERE userID1='$userID'";
                $_res = mysqli_query($db, $sql);
                while($_row = mysqli_fetch_assoc($_res)){
                    $_freundID = $_row["userID2"];
                    $_sql = "SELECT * FROM user WHERE userID='$_freundID'";
                    $_erg = mysqli_query($db, $_sql);
                    while($_zeile = $_erg->fetch_assoc()){
                        $_freundName = $_zeile["name"];
                        $_uni = $_zeile["uni"];
                        $_fach = $_zeile["fach"];
                        $_bild = $_zeile["bild"];
                        echo "<script>console.log('".$_freundName."');</script>";
                        echo "<script>console.log('".$_fach."');</script>";
                        echo "<script>console.log('".$_uni."');</script>";
                        echo "<script>console.log('".$_bild."');</script>";
                        echo "<div class='column'>";
                        echo "<div class='content'>";
                        if(empty($_bild)){
                            echo "<img class='Profilbild' src='symbole/logo.png' alt='Profilbild'>";
                        }
                        else{
                            echo "<img class='Profilbild' src='profilbilder/".$_bild."' alt='Profilbild'>";
                        }
                        echo "<a href='Freund.php?fID=".$_freundID."'>".$_freundName."</a>";
                        echo "<p>".$_fach.",<br/>".$_uni."</p>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            ?>
        </div>
    </div>
</body>

</html>
