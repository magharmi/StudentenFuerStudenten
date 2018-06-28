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
        mysqli_close($db);
        exit;
        } 
	
	// insert a quote if submit button is clicked
	if (isset($_POST['addTaskToDB'])) {
		if (empty($_POST['task'])) {
			$errors = "Eingabefeld für Aufgaben leer";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO todolist (aufgabe) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: index.php');
		}
	}
	
?>