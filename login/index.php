<?php
include  'database/db.php';



$emptyUsernameOrPassword = '';

if($_POST){ // Se existir um post, entra!

	$username = $_POST['username'];  // Get do username
	$password = $_POST['password'];  // Get da password

	if ($username && $password){ // Validar se ambos os campos têm valor.	
		$password = md5($password);
		
		$query = "SELECT * FROM $utilizadores WHERE username=? AND passw=?";			
		$stmt = $db->prepare($query);
        $stmt->execute([$username, $password]);
		$result = $stmt->fetch();
		
		// remover tudo isto para o ficheiro a parte (como api/)
							
		//echo (count($result));
		if(count($result) > 0) // Se encontrou password porque está registado
							//if($result) // Se encontrou password porque está registado
		{
			session_start() ;
			$_SESSION['username'] = $username; // Cria um cookie saving the username
			$_SESSION['loggedIn'] = true; // Creates a cookie saying the user is logged in


			header("Location: menu.php \n"); // redireciona para pagina protegida.
		}
		else
		{ 		
			echo "Utilizador não encontrado";
	
		}
		}else{
				$emptyUsernameOrPassword = true; 
		}
	}

	include './components/header.php';
?>
	<header class="row">
		<div class="col-md-6 offset-md-3 text-center bg-light border border-secondary mt-5 col-sm-12"> <!-- offset-md-3 desloca 3 colunas para a direita  -->
			<h2>Aplicação Escola</h2>
		</div>
	</header>
	<main class="row col-md-6 offset-md-3 text-center mt-5 mb-5">
		<section class="row">
			<form action="index.php" method="post">
				<label for="name">Utilizador:</label>
				<input type="text" name="username" class="input" value="" />
				<br>
				<label for="password">Password: </label>
				<input type="password" name="password" class="input" value="" />
				<br>
				<input type="submit" class="btn btn-success" value="Iniciar sessao" class="button" />
			</form>
		</section>
		<?php
		if ($emptyUsernameOrPassword)
			echo '<p>Username ou password vazio</p>'
		?>
	</main>
	<section class="row col-md-6 offset-md-3 mt-5 text center">
		<a href="registo.php"> Novo utilizador </a>
	</section>
<?php include './components/footer.php'; ?>