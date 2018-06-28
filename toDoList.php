<?php 
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
		
    if (!$datenbank) 
        { 
        echo "Kann die Datenbank nicht benutzen: " . mysqli_error(); 
        mysqli_close($link);
        exit;
        } 
		
	
	// insert a quote if submit button is clicked
	if (isset($_POST["addTaskToDB"])) {   //Funktioniert wenn !isset.
		if (!isset($_POST['task'])) {
			$errors = "Eingabefeld für Aufgaben leer";
			echo("Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>Eingabefeld für Aufgaben leer<br>");
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO todolist (aufgabe) VALUES ('$task')";
			mysqli_query($link, $sql);
			echo("In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>In Datenbank eingetragen<br>");
		}
	}
?>