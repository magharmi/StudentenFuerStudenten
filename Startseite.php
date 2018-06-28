<!DOCTYPE html>
<?php include ("toDoList.php"); ?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styler.css">

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
        <a href="javascript:void(0);" id="logo"><img src="logo.png" alt="John" style="width:48px"></a>
        <div class="topbartexte" id="topbartexte">
            <a class="active" href="Startseite.html">Startseite</a>
            <a href="Profil.html">Profil</a>
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


    <div class="w3-row-padding w3-center w3-margin-top seiteninhalt">
        <div class="mittig">
            <div class="w3-half">
                <div class="w3-card w3-container" style="min-height:460px">
                    <div id="MeineKurseDiv">
                        <h2 id="MeineKurseUeberschrift">Meine Kurse</h2>
                        <ul id="MeineKurseListe">
                            <li><a href="Kursbeigetreten.html">Java Programmierung</a></li>
                            <li><a href="#">C Programmierung</a></li>
                            <li><a href="#">Rechnerarchitektur</a></li>
                            <li><a href="#">Webtechnologien</a></li>
                            <li><a href="#">IT-Sicherheit</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="w3-half">
                <div class="w3-card w3-container" style="min-height:460px">
                    <div class="card">
                        <div id="myDIV" class="header">
                            <h2>To-Do-Liste</h2>
                            <form method="POST">
								<div class="button-group">
									<input type="text" id="myInput" name="task" placeholder="Was merken?">	
									<script>
										var input = document.getElementById("myInput");
										input.addEventListener("keyup", function(event) {
											event.preventDefault();
											if (event.keyCode === 13) {
												newElement();
											}
										});

									</script>
									<span type="submit" onclick="newElement()" name="addTaskToDB" class="addBtn">Hinzuf&uumlgen</span>
								</form>
                            </div>
                        </div>

						<ul id="ToDoListe">
							<li>Mathe lernen</li>
							<li class="checked">Vortrag vorbereiten</li>
							<li>Physikhefter ordnen</li>
							<li>Hausarbeit abgeben</li>
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
                                var li = document.createElement("li");
                                var inputValue = document.getElementById("myInput").value;
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
        </div>
        <div class="mittig">
            <div class="w3-half">
                <div class="w3-card w3-container w3-margin-top" style="min-height:460px">

                    <h2>Aufgaben &Uumlbersicht</h2>
                    <p>
                        <img src="aufgaben.jpg" alt="John" style="width:20%">
                        <p>
                            <div id="MeineKurseDiv">

                                <ul id="MeineKurseListe">
                                    <li><a href="Kursbeigetreten.html">Java: Aufgabe 3</a></li>
                                    <li><a href="#">Mathe: Aufgabe 3</a></li>
                                    <li><a href="#">Java: Aufgabe 2</a></li>
                                    <li><a href="#">Java: Aufgabe 1</a></li>
                                    <li><a href="#">IT-Sicherheit: Aufgabe 5</a></li>
                                </ul>
                            </div>
                </div>
            </div>


            <div class="w3-half">
                <div class="w3-card w3-container w3-margin-top" style="min-height:460px">
                    <h2>Zuletzt bearbeitete Aufgabe</h2>
                    <p> <img src="aufgaben.jpg" alt="John" style="width:20%">
                        <p>
                            <div id="MeineKurseDiv">

                                <ul id="MeineKurseListe">
                                    <li><a href="Kursbeigetreten.html">Java: Aufgabe 3</a></li>
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