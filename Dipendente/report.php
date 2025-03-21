<?php
	session_start();
	$servername = "localhost";
	$username = "alligator";
	$password = "Miglioraziendaautomobilistic4";
	$db = "my_alligator";

	$conn = new mysqli($servername, $username, $password, $db);

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	$descrizione = $_POST["descrizione"];
	$date = date('Y/m/d', strtotime($_POST["data"]));
    $segnalatore = $_SESSION['username'];
    $query = "INSERT INTO NON_CONFORMITÀ
			(descrizione, dataSegnalazione, segnalatore)
			VALUES
            ('$descrizione', '$date','$segnalatore')";

	$result = $conn -> query($query);

    if($result){
      echo("<br>Inserimento avvenuto correttamente");
    } else{
      echo("<br>Inserimento non eseguito");
    }

    echo $descrizione;
    echo $date;
    echo $segnalatore;

	header("Location: home.php");
?>