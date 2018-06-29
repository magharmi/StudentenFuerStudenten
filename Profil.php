<?php
    $db = mysqli_connect("localhost", "root", "", "studentenfuerstudenten");

    $msg = "";
    if(isset($_POST['upload'])){
        $dir="profilbilder/";
        $image = $_FILES['bild']['name'];
        // image file directory
        $target = $dir.basename($image);

  	     $sql = "INSERT INTO user (bild) VALUES ('$image')";
  	     // execute query
  	     mysqli_query($db, $sql);

  	     if (move_uploaded_file($_FILES['bild']['tmp_name'], $target)) {
  		    $msg = "Image uploaded successfully";
  	     }else{
            $msg = "Failed to upload image";
  	     }
    }
    $result = mysqli_query($db, "SELECT bild FROM user");
?>

<!DOCTYPE html>
<html>

<head>
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
            background-color: forestgreen;
            padding: 10px 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            margin: 0.4em auto;
            color: white;

        }

        #beschreibungbutton {
            background-color: forestgreen;
            width: 50%;

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
         #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
  /*      img{
            float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
        }
        */
   
    </style>

</head>

<body>
    <!-- Kopierenstart -->
    <div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" id="logo"><img src="logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a href="Startseite.html">Startseite</a>
            <a class="active" href="Profil.html">Profil</a>
            <a href="KurseUebersicht.html">Kurse</a>
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

    <div style="width: 500px; height: 60px; background: laven">
        <img src="banner.jpg" class="" width="2100px" height="250px" />
        <p id="name">Sulfikar Hamka</p>
        <p id="hochschule">Hochschule Bochum</p>
        <p id="studiengang">Informatik</p>
       <div id="content">
  <?php
           
    $db = mysqli_connect("localhost", "root", "", "studentenfuerstudenten");
    $sql = "SELECT bild from user";
    $result = mysqli_query($db, $sql);

           
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='profilbilder/".$row['bild']."' >";
      echo "</div>";
    }
  ?>
  <form method="POST" action="Profil.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="100">
      <div>
  	  <input type="file" name="bild">
  	</div>
      
  	     <div>
            <button type="submit" name="upload" id="bild hochladen" class="block">Bild hochladen</button>
        </div>
           </form>
        </div>
    </div>

    <div id="txtbox">
        <div class="personbeschreibung">
            <h1>Beschreibung</h1>
            <a>
            Hallo, ich bin Sulfikar Hamka und studiere Informatik seit vier Semestern an der Hochschule Bochum. Ich bin 21 Jahre alt und gebe schon seit einem Jahr Nachhilfe zu g&uumlnstigen Preisen. Das Feedback meiner "Sch&uumller" ist durchaus positiv. Dies hat sich auch dadurch bemerkbar gemacht, indem die selben Leute wieder Nachhilfe bei mir haben wollten, da sie so gute Note erzielt hatten. Nat&uumlrlich m&oumlchte auch ich mein Wissen erweitern und nutze diese Plattform, um Hilfe zu fordern.
            </a>
        </div>
        <button type="button" id="beschreibungbutton" class="block">Beschreibung bearbeiten</button>
    </div>
    <div id="Kurs">
        <div class="w3-row-padding w3-margin-top">
            <div class="w3-half">
                <div class="w3-card w3-container">
                    <div id="KursZusammenfassung">
                        <div id="MeineKurseDiv">
                            <h2 id="MeineKurseUeberschrift">Sulfikar's Kurse</h2>
                            <ul id="MeineKurseListe">
                                <li><a href="Kurs.html">Java Programmierung</a></li>
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
                            <h2 id="MeineKurseUeberschrift"> Sulfikar bietet Hilfe bei...</h2>
                            <ul id="MeineKurseListe">
                                <li><a href="Kurs.html">Java Programmierung</a></li>
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
                            <h2 id="MeineKurseUeberschrift"> Ben&oumltigt Hilfe bei...</h2>
                            <ul id="MeineKurseListe">
                                <li><a href="Kursbeigetreten.html">Java: Aufgabe 1</a></li>
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
                            <h2 id="MeineKurseUeberschrift"> Zuletzt bearbeitete Aufgaben ...</h2>
                            <ul id="MeineKurseListe">
                                <li><a href="Kursbeigetreten.html">Java: Aufgabe 1</a></li>
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