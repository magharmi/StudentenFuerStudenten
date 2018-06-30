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
		
	if(isset($_POST["joinKurs"])){
        $_sql = "INSERT INTO userkurse (userID, kursID) VALUES('$userID', '1')";
        $_res = mysqli_query($link, $_sql);
        echo "<script>console.log('Kurs beigetreten!');</script>";
	}
?>
