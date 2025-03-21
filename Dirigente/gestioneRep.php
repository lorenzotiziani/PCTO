<?php
	$servername = "localhost";
	$username = "alligator";
	$password = "Miglioraziendaautomobilistic4";
	$db = "my_alligator";

	$conn = new mysqli($servername, $username, $password, $db);

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
    }

    $codiceReparto = $_POST["CodR"];
    $nomeReparto =$_POST["Rep"];
    $toinsert ="INSERT INTO REPARTO
            (codice,nome)
            VALUES
            ('$codiceReparto', '$nomeReparto')";
    $result =$conn -> query($toinsert);

    if($result){
      echo("<br>Inserimento avvenuto correttamente");
      header("Location: amministrazione.php");
    } else{
      echo("<br>Inserimento non eseguito");
    }



?>