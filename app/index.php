<?php
include  __DIR__ . '/../database/db.php';
$emptyUsernameOrPassword = '';

if ($_POST) { // Se existir um post, entra!

	$username = $_POST['username'];  // Get do username
	$password = $_POST['password'];  // Get da password

	if ($username && $password) { // Validar se ambos os campos têm valor.	
		$password = md5($password);

		$query = "SELECT * FROM $utilizadores WHERE username=? AND passw=?";
		$stmt = $db->prepare($query);
		$stmt->execute([$username, $password]);
		$result = $stmt->fetch();

		// remover tudo isto para o ficheiro a parte (como api/)

		//echo (count($result));
		if (count($result) > 0) // Se encontrou password porque está registado
		//if($result) // Se encontrou password porque está registado
		{
			session_start();
			$_SESSION['username'] = $username; // Cria um cookie saving the username
			$_SESSION['loggedIn'] = true; // Creates a cookie saying the user is logged in


			header("Location: app/painel.php \n"); // redireciona para pagina protegida.
		} else {
			echo "Utilizador não encontrado";
		}
	} else {
		$emptyUsernameOrPassword = true;
	}
}



?>


<?php include __DIR__ . './components/header.php';  ?>




<main class="row col-md-6 offset-md-3 text-center mt-1 mb-5">


	<div class="container">
		<div class="row m-3 ">
			<div class="p-1 card-title">
				Se perdeste algo na ESAG podes registar o teu perdido aqui ou pesquisar nos achados
			</div>
			<section>
				<img class="" src="../perdidosAchados/assets/imagens/menina1.jpg" alt="Perdidos e Achados">
				
			</section>
		</div>
		<div class="row m-3">
			
			<section class="row card pt-3">
				<form action="index.php" method="post" class="col">
					<label for="name" class=" lead card-text">Utilizador:</label>
					<input type="text" name="username" class="input" value="" />
					<br>
					<label for="password" class="lead card-text">Password: </label>
					<input type="password" name="password" class="input mt-1" value="" />
					<br>
					<input type="submit" class="btn btn-warning mt-3" value="Iniciar sessao" class="button" />
				</form>

				<div class="col border-top mt-3 p-3">
					<a href="registo.php" class="text-primary col col-lg-3 "> Novo utilizador </a>
				</div>
			</section>			
		</div>

	</div>

<div class="container">

	<div class="row">
				<h5 class=" "> Listagem de Achados</h5>
					<table id="dtBasicExample" class="table table-striped table-hover">
						<tr>
							<th scope="col">
								<h6> Achado <h6>
							</th>

							<th scope="col">
								<h6> Data <h6>
							</th>
							

							<?php
							// Implementar uma solução mais abstracta.
							$achados = $db->query("SELECT * from achados order by data")->fetchAll(); // vai buscar tudo na base de dados
							//var_dump($perdidos);

							foreach ($achados  as $achado) {

							?>
						<tr>
							<td class="text-success" > <?= $achado['desc'] ?></td>
							<td class="text-success"> <?= $achado['data'] ?></td>
						</tr>
					<?php
							}
					?>
					</table>
	</div>
	<hr class="hr" />
	<div class="row">	
				<h5 class=" "> Listagem de Perdidos</h5>
				<table id="dtBasicExample" class=" table table-striped table-hover">
					<thead>
					<tr>
						<th scope="col">
							<h6> Perdido <h6>
						</th>

						<th scope="col">
							<h6> Data <h6>
						</th>
					</tr>
					</thead>	
				<tbody>		
						<?php
						// Implementar uma solução mais abstracta.
						$perdidos = $db->query("SELECT * from perdidos order by data")->fetchAll(); // vai buscar tudo na base de dados
						//var_dump($perdidos);

						foreach ($perdidos  as $perdido) {

						?>
					<tr>
						<td class="text-danger"> <?= $perdido['desc'] ?></td>
						<td class="text-danger" > <?= $perdido['data'] ?></td>
					</tr>
				<?php
						}
				?>
				</tbody>
				</table>
	</div>



</div>


	<?php
	if ($emptyUsernameOrPassword)
		echo '<p>Username ou password vazio</p>'
	?>

</main>



<?php include __DIR__ .  './components/footer.php'; ?>