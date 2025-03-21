<?php
	session_start();

	if (!isset($_SESSION['username']) || !isset($_SESSION['reparto'])) {
	header('Location: index.php');
	exit;
	}

?>

<!DOCTYPE html>
<html lang="en">
	<!--Pagina home dipendente-->
	<head>
		<meta charset="UTF-8">
		<title>Home page</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://i.postimg.cc/8kbpQFZN/Logo.png">
		<link href="../header.css" rel="stylesheet" type="text/css">

		<link href="amministrazione.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

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
	?>

		<div class="header">
			<img src="../Foto/Logo.png">
			<img class="testo" src="../Foto/testo.png">
			<div class="Profilo">
				<a href="user.php"><button class="Profilo">Profilo</button></a>
				<img class="andrew" src="../Foto/Dirigente.jpg">
			</div>
		</div>
		<header>
			<a href="amministrazione.php"><button href="amministrazione.php" style="background-color: #185c1c; color:whitesmoke">Amministrazione</button></a>
			<a href="storico_risoluzioni.php"><button href="storico_risoluzioni.php">Storico risoluzioni</button></a>
			<a href="da_risolvere.php"><button href="da_risolvere.php">Da risolvere</button></a>

		</header>
		<form class="body" action="gestione.php" method="post">
			<div class="modificaConformita">
				<h4>Modifica una NON_CONFORMITÀ<h4>
					<h4>codice<h4>
					<?php

						$sqli = "SELECT codice FROM NON_CONFORMITÀ";
						$result = $conn -> query($sqli);
						$conta = $result -> num_rows;

						$codici="";

						while ($info = mysqli_fetch_assoc($result)){
							$codice = $info["codice"];
							$codici = $codici . "<option value=\"$codice\">$codice</option>";
						}
						$sqli = "SELECT username FROM UTENTE WHERE tipo = 'Dipendente' AND username <> '$username'";
						$result = $conn -> query($sqli);
						$conta = $result -> num_rows;

						$risolutori="";

						while ($info = mysqli_fetch_assoc($result)){
							$utente = $info["username"];
							$risolutori = $risolutori . "<option value=\"$utente\">$utente</option>";
						}

						echo "<select class=\"co\" name = \"codice\">$codici</select>
								<div class=\"descrizione\">
									<div>Descrizione:</div>
									<div><textarea class=\"descrizione\" maxlength=\"255\"></textarea>//qui dentro va il testo della descrzione
								</div>
								<div class=\"modifica\">
									<div>Modifica risolutore ed urgenza:</div>
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
								<div class=\"stato\">
									<div>Stato:</div>
									<select name=\"stati\" class=\"stati\">
									<option value=\"1\">Segnalata</option>
									<option value=\"2\">Assegnata</option>
									<option value=\"3\">Risolta</option>
								</div>
								<div class=\"AzioneCorrettiva\">
									<div>Azione Correttiva:</div>
									<div><textarea class=\"azione\" maxlength=\"255\"></textarea>
								</div>













								";

                    ?>

            </div>
        </form>



	</body>
</html>