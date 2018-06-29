<?php  

	SESSION_START();

    $link = mysqli_connect("localhost", "root"); 
 
    if (!$link) 
        { 
        die("Keine Datenbankverbindung möglich: " . mysqli_error()); 
        } 
    $datenbank = mysqli_select_db($link, "StudentenFuerStudenten"); 


    if (!$datenbank) 
        { 
        echo "Kann die Datenbank nicht benutzen: " . mysqli_error(); 
        mysqli_close($link);
        exit;
        } 
		
    if (!empty($_POST["login"])) 
        { 
        $_loginEmail = mysqli_real_escape_string($link, $_POST["uname"]); 
        $_loginPasswort = mysqli_real_escape_string($link, $_POST["psw"]); 

        $_sql = "SELECT * FROM user WHERE 
                    email='$_loginEmail' AND 
                    passwort='$_loginPasswort'
                LIMIT 1"; 

        # Prüfen, ob der User in der Datenbank existiert ! 
        $_res = mysqli_query($link, $_sql);
		$_user = mysqli_query($link, $_sql);
        $_anzahl = @mysqli_num_rows($_res); 

        if ($_anzahl > 0) 
            {
			$_SESSION["userSession"] = $_loginEmail;
            echo "Der Login war erfolgreich.<br>Der Login war erfolgreich.<br>Der Login war erfolgreich.<br>Der Login war erfolgreich.<br>Der Login war erfolgreich.<br>"; 
			header("Location: Startseite.php");
			}
        else 
            { 
            echo "Die Logindaten sind nicht korrekt.<br>Die Logindaten sind nicht korrekt.<br>Die Logindaten sind nicht korrekt.<br>Die Logindaten sind nicht korrekt.<br>Die Logindaten sind nicht korrekt.<br>"; 
			} 
        }
	
    if (isset($_POST["register"])) 
        { 
        $_registerEmail = mysqli_real_escape_string($link, $_POST["email"]); 
        $_registerPasswort = mysqli_real_escape_string($link, $_POST["psw1"]);
		$_registerPasswortRepeat = mysqli_real_escape_string($link, $_POST["psw-repeat"]);
		
		if($_registerPasswortRepeat != $_registerPasswort || strpos($_registerEmail, '@') == false){
			echo("Passwörter stimmen nicht überein.<br>Passwörter stimmen nicht überein.<br>Passwörter stimmen nicht überein.<br>Passwörter stimmen nicht überein.<br>");
		}
		else{
			$_sql = "SELECT * FROM user WHERE 
						email='$_registerEmail'
					LIMIT 1"; 

			# Prüfen, ob der User in der Datenbank existiert ! 
			$_res = mysqli_query($link, $_sql); 
			$_anzahl = @mysqli_num_rows($_res); 

			if ($_anzahl > 0) 
				{ 
				echo "E-mail existiert bereits<br>E-mail existiert bereits<br>E-mail existiert bereits<br>E-mail existiert bereits<br>E-mail existiert bereits<br>E-mail existiert bereits<br>";
				}
			else 
				{ 
				$_sql = "INSERT INTO user (email, passwort) VALUES('$_registerEmail', '$_registerPasswort')";
				$_res = mysqli_query($link, $_sql); 
				} 
			}		
		}
		
    mysqli_close($link); 
?>



