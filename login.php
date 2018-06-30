<?php  

	SESSION_START();

    $link = mysqli_connect("localhost", "root");
    $extraSchutz = "QVpdoz4b1dGdHAd8kIiAL20cWoypIGA2WBU1Ko7R";
 
    if (!$link) { 
        die("Keine Datenbankverbindung möglich: " . mysqli_error()); 
    } 
    $datenbank = mysqli_select_db($link, "StudentenFuerStudenten"); 


    if (!$datenbank) { 
        echo "Kann die Datenbank nicht benutzen: " . mysqli_error(); 
        mysqli_close($link);
        exit;
    }
		
    if (isset($_POST["login"])) { 
        echo("<script>console.log('Login gedrückt!');</script>"); 
        $_loginEmail = mysqli_real_escape_string($link, $_POST["uname"]); 
        $_loginPasswort = md5(mysqli_real_escape_string($link, $_POST["psw"]).$extraSchutz); 

        $_sql = "SELECT * FROM user WHERE 
                    email='$_loginEmail' AND 
                    passwort='$_loginPasswort'
                LIMIT 1"; 

        # Prüfen, ob der User in der Datenbank existiert ! 
        $_res = mysqli_query($link, $_sql);
        $_anzahl = @mysqli_num_rows($_res);
        
        if ($_anzahl > 0) {
            $_sql = "SELECT userID FROM user WHERE email='$_loginEmail'";
            $_result = mysqli_query($link, $_sql);
            $row = $_result->fetch_assoc();
            $_SESSION["userID"] = $row["userID"];
            header("Location: Startseite.php");
		}
        else { 
            echo("<script>console.log('Logindaten nicht korrekt!');</script>");   
		} 
    }
	
    if (isset($_POST["register"])) { 
        $_registerEmail = mysqli_real_escape_string($link, $_POST["email"]); 
        $_registerPasswort = md5(mysqli_real_escape_string($link, $_POST["psw1"]).$extraSchutz);
		$_registerPasswortRepeat = md5(mysqli_real_escape_string($link, $_POST["psw-repeat"]).$extraSchutz);
		
		if($_registerPasswortRepeat != $_registerPasswort || strpos($_registerEmail, '@') == false){
            echo("<script>console.log('Eingaben stimmen nicht!');</script>"); 
		}
		else{
			$_sql = "SELECT * FROM user WHERE 
						email='$_registerEmail'
					LIMIT 1"; 

			# Prüfen, ob der User in der Datenbank existiert ! 
			$_res = mysqli_query($link, $_sql); 
			$_anzahl = @mysqli_num_rows($_res); 

			if ($_anzahl > 0) { 
                echo("<script>console.log('Email existiert bereits!');</script>"); 
			}
			else { 
				$_sql = "INSERT INTO user (email, passwort) VALUES('$_registerEmail', '$_registerPasswort')";
				$_res = mysqli_query($link, $_sql); 
			} 
		}		
	}
		
    mysqli_close($link); 
?>
