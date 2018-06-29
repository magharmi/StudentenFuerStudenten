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

		
	if(isset($_POST["joinKurs"])){
	$_userSession = $_SESSION["userSession"];
	$_sql = "SELECT userID FROM user WHERE email='$_userSession'";
	$_result = mysqli_query($link, $_sql);
	echo("<script>console.log('Eingeloggte User-Session: ".$_SESSION["userSession"]."');</script>");

	while($_row = mysqli_fetch_array($_result))
		echo("<script>console.log('Eingeloggte User-ID: ".$_row["userID"]."');</script>");
	
	$_userID = $_row["userID"];	
		echo("<script>console.log('userID: ".$_userID." und KursID: 1 in Datenbank gespeichert');</script>");		// userID ist leer?
		$_sql = "INSERT INTO userkurse (userID, kursID) VALUES('$_userID', '1')";									// userID auch leer? In Datenbank 0
		$_res = mysqli_query($link, $_sql);
	}
?>