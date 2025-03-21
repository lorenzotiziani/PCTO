<?php
	session_start();
	session_unset();
	session_destroy();

	$servername = "localhost";
	$username = "alligator";
	$password = "Miglioraziendaautomobilistic4";
	$db = "my_alligator";

	$conn = new mysqli($servername, $username, $password, $db);

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	$username = mysqli_real_escape_string($conn, $_POST["username"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);


	$sqli = "SELECT psw, tipo, reparto FROM UTENTE WHERE username = '$username'";
	$result = $conn -> query($sqli);
	$conta = $result -> num_rows;

	echo $conta;
	header("Location: index.php");

	if($conta == 1){
		$info = $result -> fetch_assoc();
		$psw = $info["psw"];
		$tipo = $info["tipo"];
		$reparto = $info["reparto"];

		if(password_verify($password, $psw)){
			session_start();
			
			$_SESSION['username'] = $username;
			$_SESSION['reparto'] = $reparto;
			$_SESSION['tipo'] = $tipo;

			if($tipo == "Dirigente"){
				header("Location: Dirigente/amministrazione.php");
			}else if($tipo == "Dipendente"){
				header("Location: Dipendente/home.php");
			}else{
				header("Location: Responsabile/home.php");
			}
		}
		else{
			$errorMessage = "<div class=\"pwd\" id=\"error-message\">Credenziali errate</div>";
        	header("Location: index.php?error=" . urlencode($errorMessage));
		}
	}
	else{
		$errorMessage = "<div class=\"pwd\" id=\"error-message\">Credenziali errate</div>";
        header("Location: index.php?error=" . urlencode($errorMessage));
	}
?>