<?php 
    $_db_host = "localhost";
    $_db_datenbank = "StudentenFuerStudenten"; 

    SESSION_START(); 

    $link = mysql_connect($_db_host, "root"); 
 
    if (!$link) 
        { 
        die("Keine Datenbankverbindung möglich: " . mysql_error()); 
        } 

    $datenbank = mysql_select_db($_db_datenbank, $link); 

    if (!$datenbank) 
        { 
        echo "Kann die Datenbank nicht benutzen: " . mysql_error(); 
        mysql_close($link);
        exit;
        } 
		
    if (!empty($_POST["login"])) 
        { 
        $_loginEmail = mysql_real_escape_string($_POST["uname"]); 
        $_loginPasswort = mysql_real_escape_string($_POST["psw"]); 

        $_sql = "SELECT * FROM benutzer WHERE 
                    email='$_loginEmail' AND 
                    passwort='$_loginPasswort'
                LIMIT 1"; 

        # Prüfen, ob der User in der Datenbank existiert ! 
        $_res = mysql_query($_sql, $link); 
        $_anzahl = @mysql_num_rows($_res); 

        if ($_anzahl > 0) 
            { 
            echo "Der Login war erfolgreich.<br>Der Login war erfolgreich.<br>Der Login war erfolgreich.<br>Der Login war erfolgreich.<br>Der Login war erfolgreich.<br>"; 
			header("Location: Startseite.html");
			}
        else 
            { 
            echo "Die Logindaten sind nicht korrekt.<br>Die Logindaten sind nicht korrekt.<br>Die Logindaten sind nicht korrekt.<br>Die Logindaten sind nicht korrekt.<br>Die Logindaten sind nicht korrekt.<br>"; 
            } 
        }
		
    if (!empty($_POST["register"])) 
        { 
        $_registerEmail = mysql_real_escape_string($_POST["email"]); 
        $_registerPasswort = mysql_real_escape_string($_POST["psw1"]);

        $_sql = "SELECT * FROM benutzer WHERE 
                    email='$_registerEmail'
                LIMIT 1"; 

        # Prüfen, ob der User in der Datenbank existiert ! 
        $_res = mysql_query($_sql, $link); 
        $_anzahl = @mysql_num_rows($_res); 

        if ($_anzahl > 0) 
            { 
            echo "E-mail existiert bereits<br>E-mail existiert bereits<br>E-mail existiert bereits<br>E-mail existiert bereits<br>E-mail existiert bereits<br>E-mail existiert bereits<br>";
			}
        else 
            { 
			$_sql = "INSERT INTO benutzer (email, passwort) VALUES('$_registerEmail', '$_registerPasswort')";
			$_res = mysqli_query($_sql, $link); 
			} 
		}		
		
		
    mysql_close($link); 
?>



