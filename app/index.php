<?php
include __DIR__ . "/../database/db.php";
$emptyUsernameOrPassword = "";


if ($_POST) {
	// Se existir um post, entra!

	$username = $_POST["username"]; // Get do username
	$password = $_POST["password"]; // Get da password

	if ($username && $password) {
		// Validar se ambos os campos têm valor.
		$password = md5($password);

		$query = "SELECT * FROM $utilizadores WHERE username=? AND passw=?";
		$stmt = $db->prepare($query);
		$stmt->execute([$username, $password]);
		$result = $stmt->fetch();

		//echo (count($result));
		if (count($result) > 0) {
			// Se encontrou password porque está registado
			//if($result) // Se encontrou password porque está registado
			session_start();
			$_SESSION["username"] = $username; // Cria um cookie saving the username
			$_SESSION["loggedIn"] = true; // Creates a cookie saying the user is logged in
			$_SESSION["userid"] = $result["id"];

			header("Location: app/painel.php \n"); // redireciona para pagina protegida.
		} else {
			echo "Utilizador não encontrado";
		}
	} else {
		$emptyUsernameOrPassword = true;
	}
}
?>


<?php include __DIR__ . "./components/header.php"; ?>




<main>


	<div class="container">

		<?php
		$httpProtocol =
			!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on" ? "http" : "https";
		$base =
			$httpProtocol . "://" . $_SERVER["HTTP_HOST"] . "/perdidosAchados/app/";
		?>

		<div class=" col text-center mt-2 pb-2" style="border-bottom: 1px solid #26272B ;">
			<!-- vai inserir o logo da ESAG -->
			<?php
			$pathImagens = $base . "../assets/imagens/";
			$file = "ESAG.jpg";
			echo '<img src="' . $pathImagens . $file . '">';
			?>
		</div>


		<div class="row">
			<div class="col-12 text-secondary text-center mt-3">
				<h5>Se perdeste algo na ESAG podes registar o teu perdido aqui ou pesquisar nos achados</h5>
			</div>
			<section class="col-sm-7">
				<img class="rounded mt-3 img-fluid" style="width:100%;" src="./assets/imagens/menina1.jpg" alt="Perdidos e Achados">
			</section>
			<section class="mt-3 col-sm-5 p-1">
				<form action="index.php" method="post" class="col card pt-3 bg-success form-group p-3 ">


					<input type="text" name="username" class="input form-control" placeholder="Utilizador" value="" />


					<input type="password" name="password" class="input form-control mt-3" placeholder="Palavra passe" value="" />

					<input type="submit" class="btn btn-warning mt-3" value="Iniciar sessao" class="btn" />
				</form>

				<div class="col-12 mt-3 p-3 text-center btn--criar">
					<a href="registo.php" class="text-primary col col-lg-3  text-white"> Novo utilizador </a>
				</div>
			</section>
		</div>



		<div class="row mt-3">
			<div class="col">
				<h5 > Achados</h5>
				<div id="dtBasicExample" class="tabela mb-3">
					<div class="row">
						<div class="col-6 titulo">
							<span> Achado <span>
						</div>
						<div class="col-6 titulo">
							<span> Data <span>
						</div>
					</div>

					<?php
					// Implementar uma solução mais abstracta.
					$achados = $db->query("SELECT * from achados order by data LIMIT 6")->fetchAll(); // vai buscar tudo na base de dados
					//var_dump($perdidos);

					foreach ($achados as $achado) { ?>
						<div class="row lines">
							<div class=" col-6 text-success"> <?= $achado["desc"] ?></div>
							<div class=" col-6 text-success"> <?= $achado["data"] ?></div>
						</div>
					<?php } ?>
					</table>
				</div>

				<div class="col">
					<h5 class=" "> Perdidos</h5>
					<table id="dtBasicExample" class=" table table-secondary table-hover">
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
							$perdidos = $db
								->query("SELECT * from perdidos order by data LIMIT 6")
								->fetchAll(); // vai buscar tudo na base de dados
							//var_dump($perdidos);

							foreach ($perdidos as $perdido) { ?>
								<tr>
									<td class="text-danger"> <?= $perdido["desc"] ?></td>
									<td class="text-danger"> <?= $perdido["data"] ?></td>
								</tr>
							<?php }
							?>
						</tbody>
					</table>
				</div> -->



			</div>


			<?php if ($emptyUsernameOrPassword) {
				echo "<p>Username ou password vazio</p>";
			} ?>



</main>



<?php include __DIR__ . "./components/footer.php"; ?>