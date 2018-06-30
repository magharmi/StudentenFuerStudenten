<?php  
    SESSION_START();
    $link = mysqli_connect("localhost", "root");
    $extraSchutz = "QVpdoz4b1dGdHAd8kIiAL20cWoypIGA2WBU1Ko7R";
 
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
		

    session_destroy();
    echo("<script>console.log('Du wurdest ausgeloggt!');</script>");  
    header("Location: index.php");
	
    mysqli_close($link);
?>