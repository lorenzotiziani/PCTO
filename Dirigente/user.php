<?php
	session_start();

	// Verificare se l'utente ha effettuato l'accesso, altrimenti reindirizzare alla pagina di login
	if (!isset($_SESSION['username']) || !isset($_SESSION['reparto'])) {
	header('Location: index.php');
	exit;
	}

	// La pagina protetta viene visualizzata solo se l'utente ha effettuato l'accesso
	/*echo 'Questa è una pagina protetta';*/

?>
<!DOCTYPE html>
<html lang="en">
	<!--Pagina Da risolvere dipendente-->
	<head>
		<meta charset="UTF-8">
		<title>Da risolvere</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://i.postimg.cc/8kbpQFZN/Logo.png">
		<link href="../header.css" rel="stylesheet" type="text/css">
		<link href="user.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="header">
			<a href="home.php"><img src="../Foto/Logo.png"></a>
			<a href="home.php"><img class="testo" style="margin: 0px" src="../Foto/testo.png"></a>
			<img src="../Foto/Logo.png" style="visibility: hidden">
		</div>

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

			$sqli = "SELECT nome, cognome, datanascita, mail FROM UTENTE WHERE username = '$username'";
			$result = $conn -> query($sqli);
			$conta = $result -> num_rows;

			$info = $result -> fetch_assoc();
			$nome = $info["nome"];
			$cognome = $info["cognome"];
			$datanascita = $info["datanascita"];
			$mail = $info["mail"];
			$nomereparto = $info["nomereparto"];

			echo
			"<div class=\"body\">
				<div class=\"pic\">
				<img class=\"andrew\" src=\"../Foto/Dirigente.jpg\">
					<h3>$username</h3>
				</div>
					<div class=\"info\">
						<table>
							<tr>
								<td><b>Nome:</b></td>
								<td>$nome</td>
							</tr>
							<tr>
								<td><b>cognome:</b></td>
								<td>$cognome</td>
							</tr>
							<tr>
								<td><b>Data di nascita:</b></td>
								<td>$datanascita</td>
							</tr>
							<tr>
								<td><b>E-mail:</b></td>
								<td>$mail</td>
							</tr>
						</table>
					</div><br>";
				?>
			<form action="logout.php">
				<button>Logout</button>
			</form>
		</div>
	</body>
</html>