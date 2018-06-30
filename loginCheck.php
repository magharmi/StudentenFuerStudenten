<?php 
    if (isset($_SESSION['userID'])) {  

        echo("<script>console.log('Eingeloggte User-Session: ".$_SESSION["userID"]."');</script>");
    } else {
        echo("<script>console.log('Nicht eingeloggt!');</script>");
        header('Location: index.php');
    }
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
		
?>
