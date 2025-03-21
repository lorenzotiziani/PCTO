<?php
	$servername = "localhost";
	$username = "alligator";
	$password = "Miglioraziendaautomobilistic4";
	$db = "my_alligator";

	$conn = new mysqli($servername, $username, $password, $db);

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	$descrizione = $_POST["descrizione"];
	$date = date("Y/m/d");
    $segnalatore = $_SESSION['username'];
    $toinsert = "INSERT INTO NON_CONFORMITÀ
			(codice, descrizione, dataSegnalazione)
			VALUES
            ('0000000', '$descrizione', '$date')";

	$result = $conn -> query($toinsert);

    if($result){
      echo("<br>Inserimento avvenuto correttamente");	  
    } else{
      echo("<br>Inserimento non eseguito");
    }

    echo $descrizione;
    echo $date;
    echo $segnalatore;

	//header("Location: home.php");
?>