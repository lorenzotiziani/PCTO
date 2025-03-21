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
	<!--Pagina Storico risoluzioni dipendente-->
	<head>
		<meta charset="UTF-8">
		<title>Storico risoluzioni</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://i.postimg.cc/8kbpQFZN/Logo.png">
		<link href="../header.css" rel="stylesheet" type="text/css">
		<link href="../storico_risoluzioni.css" rel="stylesheet" type="text/css">
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
				<a href="amministrazione.php"><button href="amministrazione.php">Amministrazione</button></a>
				<a href="storico_risoluzioni.php"><button style="background-color: #185c1c; color:whitesmoke">Storico risoluzioni</button></a>
				<a href="da_risolvere.php"><button href="da_risolvere.php">Da risolvere</button></a>

			</header>
		<div class="body">
			<?php

				for($mul = 1; $mul <= 10; ++$mul){
					echo
					"<div class=\"rettangolo\">
						<div class=\"riga\">
							<div>Data segnalazione: 10/05/2023</div>
							<div>Urgenza:
								<div class=\"urgenza\" style=\"display: inline-block\">
									<span class=\"fa fa-star\" value=1></span>
									<span class=\"fa fa-star\" value=2></span>
									<span class=\"fa fa-star\" value=3></span>
									<span class=\"fa fa-star\" value=4></span>
									<span class=\"fa fa-star\" value=5></span>
								</div>
							</div>
							<div>Reparto: cazzeggio</div>
						</div>
						<div class=\"descrizione\">
							<div style=\"text-align: center\">Descrizione:</div>
							<div class=\"text\">non so fra una descrizione lunghissima lasciami stare
								non mi giudicare per quello che sto per scrivere mi servivano solo
								due righe da riempire per vedere come veniva il layout
							</div>
						</div>
						<div class=\"codice\">codice: NC000001</div>
					</div>";
				}
			?>
		</div>
	</body>
</html>