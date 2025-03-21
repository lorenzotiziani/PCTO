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
		<title>Da Risolvere</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://i.postimg.cc/8kbpQFZN/Logo.png">
		<link href="../header.css" rel="stylesheet" type="text/css">
		<link href="da_risolvere.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="header">
			<img src="../Foto/Logo.png">
			<img class="testo" src="../Foto/testo.png">
			<div class="Profilo">
				<a href="user.php"><button class="Profilo">Profilo</button></a>
				<img class="andrew" src="../Foto/Dipendente.png">
			</div>
		</div>
			<header>
				<a href="home.php"><button href="home.php">Home</button></a>
				<a href="storico_risoluzioni.php"><button href="da_risolvere.php">Storico risoluzioni</button></a>
				<a href="da_risolvere.php"><button style="background-color: #185c1c; color:whitesmoke">Da Risolvere</button></a>
			</header>
		<div class="body" action="solved.php" method="post">

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

				$sqli = "SELECT N.codice, dataSegnalazione, descrizione, urgenza, azioneCorrettiva FROM NON_CONFORMITÀ N JOIN UTENTE U ON segnalatore = username JOIN REPARTO R ON reparto = R.codice WHERE R.codice = $reparto ORDER BY codice";
				$result = $conn -> query($sqli);
				$conta = $result -> num_rows;

				while ($info = mysqli_fetch_assoc($result)){

					$codice = $info["codice"];
					$data_timestamp = strtotime($info["dataSegnalazione"]);
					$dataSegnalazione = date('d/m/Y', $data_timestamp);
					$descrizione = $info["descrizione"];
					$urgenza = $info["urgenza"];
					$azioneCorrettiva = $info["azioneCorrettiva"];

					$stelle="";
					$i = 0;
					while($i < $urgenza){
						$stelle .= "<span class=\"fa fa-star checked\" value=$i></span>";
						$i++;
					}
					while($i < 5){
						$stelle .= "<span class=\"fa fa-star\" value=$i></span>";
						$i++;
					}

					echo "<div class=\"rettangolo\">
						<div class=\"riga\">
							<div>Data segnalazione: $dataSegnalazione</div>
							<div>Urgenza:
								<div class=\"urgenza\" style=\"display: inline-block\">
									$stelle
								</div>
							</div>
							<div>Reparto: $nomeReparto</div>
						</div>
 						<div class=\"descrizione\">
 							<div style=\"text-align: center\">Descrizione:</div>
 							<div class=\"text\">$descrizione</div>
 						</div>
						<div class=\"azione\">
							<div style=\"text-align: center\">Azione correttiva:</div>
							<div class=\"text\">$azioneCorrettiva</div>
						</div>
						<div class=\"segnala\">
							<div style=\"visibility: hidden\">codice: $codice</div>
							<button class=\"bottone\" type=\"submit\">
							Solved
								<div class=\"arrow-wrapper\">
									<div class=\"arrow\"></div>
								</div>
							</button>
							<div>codice: $codice</div>
						</div>
					</div>";
				}
			?>
		</div>
	</body>
</html>