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
		<link href="home.css" rel="stylesheet" type="text/css">
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
				<img class="andrew" src="../Foto/Dipendente.png">
			</div>
		</div>
		<header>
		<a href="home.php"><button style="background-color: #185c1c; color:whitesmoke">Home</button></a>
			<a href="storico_risoluzioni.php"><button href="storico_risoluzioni.php">Storico risoluzioni</button></a>
			<a href="da_risolvere.php"><button href="da_risolvere.php">Da risolvere</button></a>
		</header>

		<form class="body" action="report.php" method="post">
		<div class="ghost">
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

			<div class="main">
				<h1>Segnalazione di una non conformità</h1>
				Data di segnalazione:
				<br><input type="date" class="data" name = "data" value="<?php echo date('Y-m-d'); ?>">
				<br>Reparto:<br>
				<select name="reparto" class="reparto">
					<?php
						$codiceRep = $_SESSION["reparto"];
						$sqli = "SELECT nome FROM REPARTO";
						$result = $conn -> query($sqli);
						$conta = $result -> num_rows;

						$reparti = "";

						$i = 1;
						while($info = mysqli_fetch_assoc($result)){

							$reparto = $info["nome"];
							if($i == $codiceRep){
								$reparti = $reparti . "<option value=\"$i\" selected>$reparto</option>";
							}else{
								$reparti = $reparti . "<option value=\"$i\">$reparto</option>";
							}
							$i = $i + 1;
						}

						echo "$reparti";
					?>
				</select>
				<br>Descrizione:<br>
				<textarea class="descrizione" name="descrizione" maxlength="255"></textarea><br>
				<button class="bottone" type="submit">
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
