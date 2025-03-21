<!doctype html>
<html>
	<!--Pagina login-->
	<head>
		<title>Alligator</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://i.postimg.cc/8kbpQFZN/Logo.png">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<img src="Foto/Logo.png">
		<img src="Foto/testo.png">
		<form action="action.php" method="post">
			<input type="text" name="username" placeholder="username"><br>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
			<input type="password" name="password" autocomplete="current-password"  required="" id="id_password"  placeholder="password">
			<i class="far fa-eye" id="togglePassword"  style="margin-left: -50px; cursor: pointer;"></i><br>
			
			
			
			
			<script>
				window.onload = function() {
					var urlParams = new URLSearchParams(window.location.search);
					var errorMessage = urlParams.get('error');
					
					if (errorMessage) {
						var errorElement = document.getElementById('error-message');
						errorElement.innerHTML = errorMessage;
						errorElement.style.color = 'black';
					}
				};
			</script>
			
			<p id="error-message"></p>

			<script>
				const togglePassword = document.querySelector('#togglePassword');
				const password = document.querySelector('#id_password');

				togglePassword.addEventListener('click', function (e) {
					// toggle the type attribute
					const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
					password.setAttribute('type', type);
					// toggle the eye slash icon
					this.classList.toggle('fa-eye-slash');
				});
			</script>
			<button type="submit" style="margin-top: 5px;">
			Accedi
				<div class="arrow-wrapper">
					<div class="arrow"></div>
				</div>
			</button>
       </form>
	</body>
</html>
