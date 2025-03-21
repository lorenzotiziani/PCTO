<?php
	session_start();

	if (!isset($_SESSION['username']) || !isset($_SESSION['reparto'])) {
	header('Location: index.php');
	exit;
	}

?>

<!DOCTYPE html>
<html lang="en">
	<!--Pagina Storico risoluzioni dipendente-->
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://i.postimg.cc/8kbpQFZN/Logo.png">
		<link href="../header.css" rel="stylesheet" type="text/css">
		<link href="home.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="header">
			<img src="../Foto/Logo.png">
			<img class="testo" src="../Foto/testo.png">
			<div class="Profilo">
				<a href="user.php"><button class="Profilo">Profilo</button></a>
				<img class="andrew" src="../Foto/Responsabile.jpg">
			</div>
		</div>
			<header>
				<a href="home.php"><button style="background-color: #185c1c; color:whitesmoke">Home</button></a>
				<a href="storico_risoluzioni.php"><button href="home.php">Storico risoluzioni</button></a>
				<a href="da_risolvere.php"><button href="da_risolvere.php">Da risolvere</button></a>
			</header>
		<form class="body" action="update.php" method="post">

			<?php

				$servername = "localhost";
				$username = "alligator";
				$password = "Miglioraziendaautomobilistic4";
				$db = "my_alligator";

				$conn = new mysqli($servername, $username, $password, $db);

				if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
				}

				$username = $_SESSION['username'];
				$reparto = $_SESSION['reparto'];

				$sqli = "SELECT nome FROM REPARTO WHERE codice = $reparto";
				$result = $conn -> query($sqli);
				$nomeReparto = $result -> fetch_assoc()['nome'];

				$sqli = "SELECT username FROM UTENTE WHERE reparto = $reparto AND username <> '$username'";
				$result = $conn -> query($sqli);
				$conta = $result -> num_rows;

				$risolutori="";

				while ($info = mysqli_fetch_assoc($result)){
					$utente = $info["username"];
					$risolutori = $risolutori . "<option value=\"$utente\">$utente</option>";
				}

				$sqli = "SELECT codice, dataSegnalazione, descrizione FROM NON_CONFORMITÀ JOIN UTENTE ON segnalatore = username WHERE reparto = $reparto ORDER BY codice";
				$result = $conn -> query($sqli);
				$conta = $result -> num_rows;

				while ($info = mysqli_fetch_assoc($result)){

					$codice = $info["codice"];
					$data_timestamp = strtotime($info["dataSegnalazione"]);
					$dataSegnalazione = date('d/m/Y', $data_timestamp);
					$descrizione = $info["descrizione"];

					echo
					"<div class=\"rettangolo\">
						<div class=\"riga\">
							<div>Data Segnalazione: $dataSegnalazione</div>
							<div>Reparto: $nomeReparto</div>
						</div>
						<div class=\"descrizione\">
							<div>Descrizione:</div>
								<div class=\"text\">$descrizione</div>
						</div>
						<div class=\"azione\">
							<div>Azione correttiva:</div>
							<textarea class=\"correttiva\" maxlength=\"255\"></textarea>
						</div>
						<div>
							<div>Assegna Risolutore ed Urgenza:</div>
							<select class=\"risolutore\">
								$risolutori
							</select>
							<select name=\"urgenza\" class=\"urgenza\">
							<option value=\"5\">Molto Alta</option>
							<option value=\"4\">Alta</option>
							<option value=\"3\">Moderata</option>
							<option value=\"2\">Bassa</option>
							<option value=\"1\">Molto Bassa</option>
							</select>
						</div>
						<div class=\"assegna\">
							<div class=\"codice\" style=\"visibility: hidden\">codice: $codice</div>
							<button class=\"bottone\" type=\"submit\">
							Assegna
								<div class=\"arrow-wrapper\">
									<div class=\"arrow\"></div>
								</div>
							</button>
							<div class=\"codice\">codice: $codice</div>
						</div>
					</div>";
				}
			?>


			</div>

		</form>
	</body>
</html>