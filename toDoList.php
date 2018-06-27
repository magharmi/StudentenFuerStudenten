<?php 
    // initialize errors variable
	$errors = "";

	// connect to database
    $link = mysql_connect("localhost", "root"); 
 
    if (!$link) 
        { 
        die("Keine Datenbankverbindung möglich: " . mysql_error()); 
        } 

    $datenbank = mysql_select_db("StudentenFuerStudenten", $link); 

    if (!$datenbank) 
        { 
        echo "Kann die Datenbank nicht benutzen: " . mysql_error(); 
        mysql_close($link);
        exit;
        } 
		
    if (!$datenbank) 
        { 
        echo "Kann die Datenbank nicht benutzen: " . mysql_error(); 
        mysql_close($db);
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