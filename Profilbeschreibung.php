<?php 
	SESSION_START();

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

		
	if(isset($_POST["beschreibungOK"])){
        $_userID = ($_SESSION["userID"]);
		$_beschreibungtxt = mysqli_real_escape_string($link, $_POST["beschreibungtxt"]); 

		echo("<script>console.log('userID: ".$_userID." hat seine Beschreibung zu: ".$_beschreibungtxt." geaendert!');</script>");
        
        $_sql = "INSERT INTO user WHERE userID = ".$_userID." (beschreibung) VALUES('".$_beschreibungtxt."')";
        $_res = mysqli_query($link, $_sql);	
        echo "<script>console.log('Beschreibung geaendert');</script>";        
	}
?>
