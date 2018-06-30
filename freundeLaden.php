<?php 
	SESSION_START();
   
    // initialize errors variable
	$errors = "";

	// connect to database
    $link = mysqli_connect("localhost", "root"); 
    $userID = $_SESSION["userID"];
 
    if (!$link) { 
        die("Keine Datenbankverbindung möglich: " . mysqli_error()); 
    } 

    $datenbank = mysqli_select_db($link, "StudentenFuerStudenten"); 

    if (!$datenbank) { 
        echo "Kann die Datenbank nicht benutzen: " . mysqli_error(); 
        mysqli_close($link);
        exit;
    }
		
    // wenn dieser Code läuft, wird die Freundesübersicht kleiner!
	if(!isset($_POST["joinKurs"])){
        $_sql = "SELECT userID2 FROM freund WHERE userID1='$userID'";
        $_res = mysqli_query($link, $_sql);
        echo "<script>console.log('Freunde geladen');</script>";
	}
?>
