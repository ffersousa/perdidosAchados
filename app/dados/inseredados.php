<?php
include(__DIR__ . '/../../database/db.php');
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/menu.php';

if ($_POST) { // Se existir um post, entra!


	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nome = $_POST['nome'];


	try {

		$sql = "INSERT INTO utilizadores (nome, passw, username, tipo) VALUES (?,?,?, 2)";
		$stmt = $db->prepare($sql);
		$user = $stmt->execute([$nome, $password, $username]);
	} catch (Exception $e) {
		print_r($e);
	}

	if ($user) {
		echo "Novo registo adicionado com sucesso!";
	} else {
		echo "Falhou ao criar!";
	}


	//header("Location: menu.php \n"); // Não existe o utilizador, redirect  para a p�gina de inicio de sess�o.
}

?>


<div class="col-md-6 offset-md-3 text-center bg-light  border-secondary mt-5 col-sm-12">
	<h5 class=" text-secondary mt-5"> Inserir novo utilizador </h5>
	<form action="inseredados.php" method="post">

		<div class="form-group row ">
			<label for="username" class="col-sm-2 col-form-label mt-3">Nome</label>
			<div class="col-sm-10">
				<input type="text" class="form-control mt-3" name="nome">
			</div>
		</div>
		<div class="form-group row ">
			<label for="username" class="col-sm-2 col-form-label mt-3">Username</label>
			<div class="col-sm-10">
				<input type="text" class="form-control mt-3" name="username">
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label mt-3">Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control mt-3" name="password">
			</div>
		</div>
		<button type="submit" class="btn btn-primary mt-3 mb-3">Enviar</button>
	</form>
</div>

<?php include __DIR__ . '/../components/footer.php'; ?>