<?php 
	SESSION_START();

    $_userID = ($_SESSION["userID"]);
    // initialize errors variable
	$errors = "";

	// connect to database
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

		
	if(isset($_POST["joinKurs"])){
		echo("<script>console.log('userID: ".$_userID." und KursID: 1 in Datenbank gespeichert');</script>");		// userID ist leer?
        $_sql = "INSERT INTO userkurse (userID, kursID) VALUES('".$_SESSION['userID']."','1')";                       // userID auch leer? In Datenbank 0
        echo $_sql;
        
	}
?>