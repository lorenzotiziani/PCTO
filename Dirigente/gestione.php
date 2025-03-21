<?php
	$servername = "localhost";
	$username = "alligator";
	$password = "Miglioraziendaautomobilistic4";
	$db = "my_alligator";

	$conn = new mysqli($servername, $username, $password, $db);

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

  if(isset($_POST['InsUt'])){
    $username = $_POST["Nome"] . "." . $_POST["Cognome"];
    $password= password_hash($_POST["Password"], PASSWORD_DEFAULT);

    $nome = $_POST["Nome"];
    $cognome = $_POST["Cognome"];
    $email =$_POST["Password"];
    $data = date("y/m/d");  //data da sistemare
    $ruolo = $_POST["ruolo"];
    $reparto = $_POST["reparto"];

    $toinsert = "INSERT INTO UTENTE
            (username, psw, nome, cognome, mail, datanascita, tipo, reparto)
            VALUES
            ('$username', '$password', '$nome', '$cognome', '$email', '$data', '$ruolo', '$reparto')";

    $result = $conn -> query($toinsert);

    if($result){
      echo("<br>Inserimento avvenuto correttamente");
      header("Location: amministrazione.php");
    } else{
      echo("<br>Inserimento non eseguito");
    }
  }

  if(isset($_POST['RemUt'])){
    $utente = $_POST["utente"];

    $todelete = "DELETE FROM UTENTE WHERE username = '$utente' ";

    $result = $conn -> query($todelete);

    if($result){
      echo("<br>Rimozione avvenuta correttamente");
      header("Location: amministrazione.php");
    } else{
      echo("<br>Inserimento non eseguito");
    }
  }

  if(isset($_POST['InsRep'])){

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
  }

if(isset($_POST['RemRep'])){
    $reparto = $_POST["reparto"];

    $todelete = "DELETE FROM REPARTO WHERE nome = '$reparto' ";

    $result = $conn -> query($todelete);

    if($result){
      echo("<br>Rimozione avvenuta correttamente");
      header("Location: amministrazione.php");
    } else{
      echo("<br>Inserimento non eseguito");
    }
  }

if(isset($_POST['CamRuolo'])){
    $ruolo = $_POST["ruolo"];
    $utente = $_POST["utente"];

    $tochange = "UPDATE UTENTE SET tipo = '$ruolo' WHERE username ='$utente' ";

    $result = $conn -> query($tochange);

    if($result){
      echo("<br>Cambiamento avvenuta correttamente");
      header("Location: amministrazione.php");
    } else{
      echo("<br>Inserimento non eseguito");
    }
  }

  if(isset($_POST['CamRep'])){
    $reparto = $_POST["reparto"];
    $utente = $_POST["utente"];

    $tochange = "UPDATE UTENTE SET reparto = $reparto WHERE username ='$utente' ";

    $result = $conn -> query($tochange);

    if($result){
      echo("<br>Cambiamento avvenuta correttamente");
      header("Location: amministrazione.php");
    } else{
      echo("<br>Inserimento non eseguito");
    }
  }


?>
