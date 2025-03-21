<?php
	session_start();

	// Verificare se l'utente ha effettuato l'accesso, altrimenti reindirizzare alla pagina di login
	if (!isset($_SESSION['username']) || !isset($_SESSION['reparto'])) {
	header('Location: index.php');
	exit;
	}

	// La pagina protetta viene visualizzata solo se l'utente ha effettuato l'accesso
	//echo 'Questa è una pagina protetta';

?>

<!DOCTYPE html>
<html lang="en">
	<!--Pagina home dipendente-->
	<head>
		<meta charset="UTF-8">
		<title>Home page</title>
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
				<img class="andrew" src="../Foto/Dirigente.jpg">
			</div>
		</div>
		<header>
		<a href="home.php"><button style="background-color: #185c1c; color:whitesmoke">Home</button></a>
			<a href="storico_risoluzioni.php"><button href="storico_risoluzioni.php">Storico risoluzioni</button></a>
			<a href="da_risolvere.php"><button href="da_risolvere.php">Da risolvere</button></a>
			<a href="amministrazione.php"><button href="amministrazione.php">Amministrazione</button></a>
		</header>

		<form class="body" action="report.php" method="post">
			<div class="ghost">
				<h3>In scadenza</h3>
				<div class="boh">
					<p style="text-align: left;">NC1</p>

					descrizione non conformità
				</div>
				<div class="boh">
					<p style="text-align: left;">NC2</p>

					descrizione non conformità
				</div>
			</div>

			<div class="main">
				<h1>Segnalazione di una non conformità</h1>
				Data di segnalazione:<br><input type="date" class="data"><br>

				<label>Reparto:</label><br>
				<select name="reparto" class="reparto">
					<option value="Amministrazione">Amministrazione</option>
					<option value="Marketing">Marketing</option>
					<option value="Vendite">Vendite</option>
					<option value="Produzione">Produzione</option>
					<option value="Ricerca e sviluppo">Ricerca e sviluppo</option>
					<option value="IT">IT</option>
					<option value="Logistica">Logistica</option>
				</select>
				<br>Descrizione:<br>
				<textarea class="descrizione"name="descrizione" maxlength="255"></textarea><br>
				<button class="bottone" type="submit" style="margin-top: 10px;">
					Segnala
					<div class="arrow-wrapper">
						<div class="arrow"></div>
					</div>
			</div>

			<div class="nc">
				<h3>In scadenza:</h3>
				<div class="boh">
					NC1
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<br>descrizione non conformità
				</div>
				<div class="boh">
					NC2
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<br>descrizione non conformità
				</div>
			</div>
		</form>
	</body>
</html>
