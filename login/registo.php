<?php ob_start();

include './database/db.php';

if ($_POST) { // Se existir um post, entra!

	$tabela = 'utilizadores';

	$username = $_POST['username'];  // Get do username
	$password = $_POST['password'];  // Get da password
	$nome = $_POST['nome'];

	if ($username && $password & $nome) { // Validar se ambos os campos têm valor.	
		$password = md5($password);


		$sql = "INSERT INTO $tabela (nome, passw, username, tipo) VALUES (?,?,?, 2)";
		$stmt = $db->prepare($sql);
		$result = $stmt->execute([$nome, $password, $username]);

		var_dump($result);
		// remover tudo isto para o ficheiro a parte (como api/)

		//echo (count($result));
		if ($result) // Se encontrou password porque está registado
		//if($result) // Se encontrou password porque está registado
		{
			session_start();
			$_SESSION['username'] = $username; // Cria um cookie saving the username
			$_SESSION['loggedIn'] = true; // Creates a cookie saying the user is logged in
			$_SESSION['tipo'] = 2;

			header("Location: menu.php \n"); // redireciona para pagina protegida.
		} else {
			echo "Utilizador não encontrado";
		}
	} else {
		$emptyUsernameOrPassword = true;
	}
}

include './components/header.php';
?>

<div class="container">

	<form action="registo.php" method="post">

		<h1> Novo utilizador <h1>
				<div class="mb-3 row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nome" name="nome">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="username" name="username">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" name="password">
					</div>
				</div>
				<input type="submit" class="btn btn-secondary" value="Criar"/>
	</form>
</div>
</body>

</html>

<?php include './components/footer.php'; ?>