<?php 
	SESSION_START();
    $_userID = $_SESSION["userID"];
    $_userID1 = mysqli_real_escape_string($_userID); 
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
		
	
	/*
	if (!isset($_POST["addTaskToDB"])) {   //Funktioniert wenn !isset.
		if (!isset($_POST['task'])) {
			$errors = "Eingabefeld für Aufgaben leer";
			echo("Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>");
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO todoliste (beschreibung) VALUES ('$task')";
			mysqli_query($link, $sql);
			echo("In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>");
		}
	*/

    if(!isset($_POST["addTaskToDB"])){
        echo("<script>console.log('userID: ".$_userID1." und KursID: 1 in Datenbank gespeichert');</script>");
        $_task = mysqli_real_escape_string($link, $_POST["task"]);
        $_userID = mysqli_real_escape_string($link, $_SESSION["userID"]); 
		$_sql = "INSERT INTO todoliste (userID, beschreibung) VALUES('$_userID', '$_task')"; 
		$_res = mysqli_query($link, $_sql);
	}
	
	echo("<script>console.log('Eingeloggte User-Session: ".$_SESSION["userSession"]."');</script>");
    echo("<script>console.log('Eingeloggte User-Session-ID: ".$_SESSION["userID"]."');</script>");
?>
