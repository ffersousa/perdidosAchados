<?php
include  '../database/db.php';

include '../login/components/header.php">';
include '../login/components/menu.php">';
?>
	
	<header class="row  text-center mt-5">
		
			<h6>Inserir Perdido</h6>
		
	</header>
	<main class="row col-md-6 offset-md-3 text-center mt-5 mb-5">
		<section class="row">
			<form action="index.php" method="post">
				<label for="name">Descricao:</label>
				<input type="text" name="descricao" class="input" value="" />
				<br>
				<label for="data">Data:</label>
			    <input type="date" id="data" name="data">
				<br>
				<input type="submit" class="btn btn-success mt-3" value="Enviar" class="button" />
			</form>
		</section>
		<?php
		if ($emptyUsernameOrPassword)
			echo '<p>Username ou password vazio</p>'
		?>
	</main>

<?php include '../login/components/footer.php">'; ?>