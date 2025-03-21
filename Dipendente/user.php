<?php
	session_start();

	if (!isset($_SESSION['username']) || !isset($_SESSION['reparto'])) {
	header('Location: index.php');
	exit;
	}

	$servername = "localhost";
	$username = "alligator";
	$password = "Miglioraziendaautomobilistic4";
	$db = "my_alligator";


	$conn = new mysqli($servername, $username, $password, $db);

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}



?>
<!DOCTYPE html>
<html lang="en">

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

			$sqli = "SELECT U.nome as nomeutente, cognome, datanascita, mail, R.nome as nomereparto FROM UTENTE U JOIN REPARTO R ON reparto = codice WHERE username = '$username'";
			$result = $conn -> query($sqli);
			$conta = $result -> num_rows;

			$info = $result -> fetch_assoc();
			$nomeutente = $info["nomeutente"];
			$cognome = $info["cognome"];

			$data_timestamp = strtotime($info["datanascita"]);
			$datanascita = date('d/m/Y', $data_timestamp);

			$mail = $info["mail"];
			$nomereparto = $info["nomereparto"];

			echo
			"<div class=\"body\">
				<div class=\"pic\">
				<img class=\"andrew\" src=\"../Foto/Dipendente.png\">
					<h3>$username</h3>
				</div>
					<div class=\"info\">
						<table>
							<tr>
								<td><b>Nome:</b></td>
								<td>$nomeutente</td>
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
							<tr>
								<td><b>Reparto:</b></td>
								<td>$nomereparto</td>
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