<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Escola Website - Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta charset="UTF-8">
</head>

<body>
	<header class="row">
		<div class="col-md-6 offset-md-3 text-center bg-light border border-secondary mt-5 col-sm-12">
			<!-- offset-md-3 desloca 3 colunas para a direita  -->
			<h2>Aplicação Escola</h2>
		</div>
	</header>
	<main class="row col-md-6 offset-md-3 text-center mt-5 mb-5">
		<section class="row">
			<form action="login.php" method="post" id="login">
				<label for="name">Utilizador:</label>
				<input id="username" type="text" name="username" class="input" value="" required />
				<br>
				<label for="password">Password: </label>
				<input id="password" type="password" name="password" class="input" value="" required />
				<br>
				<input type="submit" class="btn btn-success" value="Iniciar sessao" class="button" />
			</form>
		</section>
		<label>
			<p>Username ou password vazio</p>
		</label>
	</main>
	<section class="row col-md-6 offset-md-3 mt-5 text center">
		<a href="registo.php"> Novo utilizador </a>
	</section>

	<script>
		const form = document.getElementById('login');

		form.addEventListener('submit', (event) => {
			let username = document.getElementById('username').value;
			let password = document.getElementById('password').value;

			fetch('../api/login.php', {
					method: 'POST', // or 'PUT'
					headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({
						username,
						password
					})
				})
				.then((response) => response.json())
				.then((data) => {
					alert('LOGIN NO LOGIN');
				})
				.catch((error) => {
					alert('FALHOU NO LOGIN');
				});

			console.log(username, password);

			// stop form submission
			event.preventDefault();
		});
	</script>
</body>

</html>