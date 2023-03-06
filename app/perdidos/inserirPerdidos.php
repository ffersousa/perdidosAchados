<?php
include(__DIR__ . '/../../database/db.php');
include __DIR__ . '/../components/header.php';
include __DIR__ . '/../components/menu.php';

if ($_POST) { // Se existir um post, entra!

	$descricao = $_POST['descricao'];
	$local = $_POST['localizacao'];
	$data = $_POST['data'];
	$imagem = " teste";
	$cod_utilizador = 1;

	try {

		
		$sql = "INSERT INTO perdidos (`desc`, `dataperdido`, `imagem`, `cod_utilizador`, `local`) VALUES (?,?,?,?,?)";
		$stmt = $db->prepare($sql);
		$perdido = $stmt->execute([$descricao, $data, $imagem, $cod_utilizador, $local]);
	} catch (Exception $e) {
		print_r($e);
	}

	var_dump($perdido);

	if ($perdido) {
		echo "Novo registo adicionado com sucesso!";
	} else {
		echo "Falhou ao criar!";
	}


	//header("Location: menu.php \n"); // Não existe o utilizador, redirect  para a p�gina de inicio de sess�o.
}

?>

	
	<header class="row  text-center mt-5">
		
			<h6>Inserir Perdido</h6>
		
	</header>
	<main class="row col-md-6 offset-md-3 text-center mt-5 mb-5">
		<section class=" form-group">
			<form action="inserirPerdidos.php" method="post">
				<label for="descricao">Descricao</label>
				<input type="text" name="descricao" class="input form-control form-control" placeholder="descricao "value="" />
				<label for="descricao">localização</label>
				<input type="text" name="localizacao" class="input form-control form-control" placeholder="localizacao "value="" />
				<label for="descricao">Data</label>
			    <input type="date" id="data" name="data"  class="input form-control form-control"placeholder="data" >
				
				<input type="submit" class="btn btn-success mt-3" value="Enviar" class="button" />
			</form>
		</section>
		
	</main>

<?php 

include '../components/footer.php">'; ?>