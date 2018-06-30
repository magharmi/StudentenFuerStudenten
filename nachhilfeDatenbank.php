<?php  

	SESSION_START();

    $link = mysqli_connect("localhost", "root");
 
    if (!$link) { 
        die("Keine Datenbankverbindung möglich: " . mysqli_error()); 
    } 
    $datenbank = mysqli_select_db($link, "StudentenFuerStudenten"); 

    if (!$datenbank) { 
        echo "Kann die Datenbank nicht benutzen: " . mysqli_error(); 
        mysqli_close($link);
        exit;
    }
	
    if (isset($_POST["anbietenAbschicken"])) {
        $_anbietenTitel = mysqli_real_escape_string($link, $_POST["anbietenTitel"]);
        $_anbietenOrt = mysqli_real_escape_string($link, $_POST["anbietenOrt"]);
        $_anbietenZeit = mysqli_real_escape_string($link, $_POST["anbietenZeit"]);
        $_anbietenPreis = mysqli_real_escape_string($link, $_POST["anbietenPreis"]);
		
        $_sql = "INSERT INTO nachhilfeangebot (kursID, titel, ort, zeit, preis, userID) VALUES('1','$_anbietenTitel','$_anbietenOrt', '$_anbietenZeit', '$_anbietenPreis', '1')";
        $_res = mysqli_query($link, $_sql);	
	}
		
    mysqli_close($link); 
?>
