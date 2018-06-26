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
		
    if (!empty($_POST["rSubmit"])) 
        { 
        $_email = mysql_real_escape_string($_POST["email"]); 
        $_passwort = mysql_real_escape_string($_POST["psw"]);

        $_sql = "SELECT * FROM benutzer WHERE 
                    email='$_email'
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
			$_sql = "INSERT INTO benutzer (email, passwort) VALUES('$_email', '$_passwort')";
			$_res = mysqli_query($_sql, $link); 
			} 
		}
    mysql_close($link); 
?>