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
		<div class="utente">
			<form class="body" action="gestione.php" method="post">
				<div class="gestioneUtente">
					<h3>Inserisci un nuovo utente</h3>
						Nome:<br><input type="text" class="text" name="Nome"><br>
						Cognome:<br><input type="text" class="text" name="Cognome"><br>
						Password:<br><input type="password" class="text" name="Password"><br>
						Email:<br><input type="text" class="text" name="Email"><br>
						Data di nascita:<br><input type="date" class="data" name="Data"><br>
						Ruolo:<br><select name="ruolo">
									<option value="Dipendente">Dipendente</option>
									<option value="Responsabile">Responsabile</option>
									<option value="Dirigente">Dirigente</option>
								</select><br>
						Reparto:<br><select name="reparto">
							<?php
								$sqli = "SELECT nome FROM REPARTO";
								$result = $conn -> query($sqli);
								$conta = $result -> num_rows;

								$reparti="";

								$i = 1;
								while($info = mysqli_fetch_assoc($result)){

									$reparto = $info["nome"];
									$reparti = $reparti . "<option value=\"$i\">$reparto</option>";
									$i = $i + 1;
								}

								echo "$reparti";
							?>
						</select>
					<button class="bottone" type="submit" name="InsUt" style="margin-top: 10px;">
					Inserisci
					<div class="arrow-wrapper">
							<div class="arrow"></div>
					</div>
				</div>
			</form>

			<form class="body" action="gestione.php" method="post">
				<div class="gestioneReparto">
					<h4>Rimuovi un utente</h4>
					<?php
						$sqli = "SELECT username FROM UTENTE WHERE username <> '$username'";
						$result = $conn -> query($sqli);
						$conta = $result -> num_rows;

						$utenti="";

						while ($info = mysqli_fetch_assoc($result)){
							$utente = $info["username"];
							$utenti = $utenti . "<option value=\"$utente\">$utente</option>";
						}

						echo "<select class=\"rimozione\" name = \"utente\">$utenti</select>";
					?>
					<button class="bottone" type="submit" name="RemUt" style="margin-top: 10px;">
					Rimuovi
					<div class="arrow-wrapper">
							<div class="arrow"></div>
					</div>
					</div>
			</form>

			<form class="body" action="gestione.php" method="post">
				<div class="modificaRuolo">
					<h4>Modifica il ruolo di un utente<h4>
						<?php

							$sqli = "SELECT username FROM UTENTE WHERE username <> '$username'";
							$result = $conn -> query($sqli);
							$conta = $result -> num_rows;

							$utenti="";

							while ($info = mysqli_fetch_assoc($result)){
								$utente = $info["username"];
								$utenti = $utenti . "<option value=\"$utente\">$utente</option>";
							}

							echo "<select class=\"ut\" name = \"utente\">$utenti</select>";

							$sqli = "SELECT DISTINCT tipo FROM UTENTE";
							$result = $conn ->query($sqli);
							$conta = $result -> num_rows;

							$ruoli="";

							while ($info = mysqli_fetch_assoc($result)){
								$ruolo = $info["tipo"];
								$ruoli= $ruoli . "<option value=\"$ruolo\">$ruolo</option>";
							}

							echo "<select class=\"Ruolo\" name = \"ruolo\">$ruoli</select>";

						?>
						<button class="bottone" type="submit" name="CamRuolo" style="margin-top: 10px;">
						Cambia
						<div class="arrow-wrapper">
							<div class="arrow"></div>
						</div>
				</div>
			</form>
			<!-- modifica da sistemare -->
			<form class="body" action="gestione.php" method="post">
				<div class="modificaReparto">
					<h4>Modifica il reparto di un utente<h4>
						<?php

							$sqli = "SELECT username FROM UTENTE WHERE username <> '$username'";
							$result = $conn -> query($sqli);
							$conta = $result -> num_rows;

							$utenti="";

							while ($info = mysqli_fetch_assoc($result)){
								$utente = $info["username"];
								$utenti = $utenti . "<option value=\"$utente\">$utente</option>";
							}

							echo "<select class=\"ut\" name = \"utente\">$utenti</select>";

							$sqli = "SELECT DISTINCT codice FROM REPARTO";
							$result = $conn ->query($sqli);
							$conta = $result -> num_rows;

							$reparti="";

							while ($info = mysqli_fetch_assoc($result)){
								$reparto = $info["codice"];
								$reparti= $reparti . "<option value=\"$reparto\">$reparto</option>";
							}

							echo "<select class=\"Reparto\" name = \"reparto\">$reparti</select>";

						?>
						<button class="bottone" type="submit" name="CamRep" style="margin-top: 10px;">
						Cambia
						<div class="arrow-wrapper">
							<div class="arrow"></div>
						</div>
				</div>
			</form>
		</div>
		<div class="reparto">
			<form class="body" action="gestione.php" method="post">
				<div class="gestioneReparto">
					<h4>Inserisci un reparto</h4>
						Codice del reparto:<br><input type="text" class="text" name="CodR"><br>
						Nome del reparto:<br><input type="text" class="text" name="Rep"><br>
					<button class="bottone" type="submit" name="InsRep" style="margin-top: 10px;">
					Inserisci
					<div class="arrow-wrapper">
							<div class="arrow"></div>
					</div>
				</div>
			</form>

			<form class="body" action="gestione.php" method="post">

				<div class="rimuoviReparto">
					<h4>Rimuovi un reparto<h4>
					<?php
						$sqli = "SELECT nome FROM REPARTO";
						$result = $conn ->query($sqli);
						$conta = $result -> num_rows;

						$reparti="";

						while ($info = mysqli_fetch_assoc($result)){
							$reparto = $info["nome"];
							$reparti= $reparti . "<option value=\"$reparto\">$reparto</option>";
						}

						echo "<select class=\"rimRep\" name = \"reparto\">$reparti</select>";

					?>
					<button class="bottone" type="submit" name="RemRep" style="margin-top: 10px;">
					Rimuovi
					<div class="arrow-wrapper">
							<div class="arrow"></div>
					</div>
				</div>
			</form>

		</div>
		<a href="Modifica.php" style="text-decoration: none; outline: none;"><button class="bottone" style="margin-top: 10px;">Modifica o rimuovi una NON_CONFORMITÀ</button></a>
			<div class="arrow-wrapper">
				<div class="arrow"></div>
			</div>

	</body>
</html>
