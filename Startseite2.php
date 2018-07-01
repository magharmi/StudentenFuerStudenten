Zeile 169
<?php
                        if(!isset($_POST['addTaskToDB'])){                                  // kennt den Button nicht
                            $_task = isset($_POST['task']) ? mysqli_real_escape_string($link,$_POST['task']): false;  
                            $_userID = mysqli_real_escape_string($link, $_SESSION["userID"]); 
                            if(isset($_POST['addTaskToDB'])){ // wenn 'task' dann immer bei neu laden neuer datensatz
                                $_sql = "INSERT INTO todoliste (userID, beschreibung) VALUES('$_userID', '$_task')"; 
                                $_res = mysqli_query($db, $_sql);
                            }
                          /*  $_checked = isset($_POST['checked']) ? mysqli_real_escape_string($link,$_POST['checked']): false; 
                            $_sql_checked = "UPDATE todoliste SET checked=true where class='checked' ";
                            $_res2 = mysqli_query($db,$_sql_checked);
                            */

                        }
                        
                        $daten = "SELECT * from todoliste where userID = $_userID";
                        $res3 = mysqli_query($db, $daten);
                        
                        while($fetch = mysqli_fetch_assoc($res3)){
                            echo "<ul>";
                            echo "<li>" . $fetch['beschreibung'] . "</li>";
                            echo "</ul>";
                        }
	
                        echo("<script>console.log('Eingeloggte User-Session-ID: ".$_SESSION["userID"]."');</script>");
                        ?>






    An den Anfang
    <?php 
	SESSION_START();
    $_userID = $_SESSION["userID"];
    $_userID1 = isset($_POST['userID']) ? mysqli_real_escape_string($_userID): false;

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
?> Zeile133


    <script>
        var input = document.getElementById("myInput");
        input.addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                newElement();
            }
        });

    </script>
