<?php
include("menu.php");
include("./utilsData.php");
include('./database/db.php');



if ($_REQUEST['action'] == "del") {

	try { 
		$id = intval($_GET['id']);
		$sql = "DELETE FROM utilizadores WHERE id=?";
		$stmt= $db->prepare($sql);
		$stmt->execute([$id]);
		echo "Utilizador apagado";
	} catch (Exception $e) {
		print_r($e);
	}

}

?>


<!DOCTYPE html>
<html lang="pt">
<head>
<title>Escola Website - Mostrar dados</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel='stylesheet' type='text/css' media='screen' href='./src/css/main.css'>
<meta charset="UTF-8">
</head>

<body>
<div class= "col-md-6 offset-md-3 text-center bg-light  border-secondary mt-5 col-sm-12">
		<h5  class=" text-secondary"> Listagem de utilizadores</h5>
		<table  id="dtBasicExample" class = "table">
			<tr>
				<th   scope="col">
					<h5> Utilizador <h2>
				</th>
				
				<th  scope="col">
					<h5> Ação #1 <h2>
				</th>
				<th  scope="col">
					<h5> Ação #2 <h2>
				</th>

				<?php
				// Implementar uma solução mais abstracta.
				$users = $db->query("SELECT * from utilizadores order by username")->fetchAll();// vai buscar tudo na base de dados

				foreach ($users  as $user) {
				
					
				?>
			<tr >
				<td> <?= $user['username'] ?></td>
				<!--<td> <?= $user['passw']  ?></td> -->
				<td> <a href='alterardados.php?id=<?= $user['id'] ?>'> alterar </a></td>
				<td> <a href='mostrardados.php?action=del&id=<?php  echo $user['id']; ?>'> Apagar </a></td>
			</tr>
			<?php
					}
			?>
		</table>
</div>

<script type="text/javascript" src="../assets/paginar_tabelas.js"></script>
				</body>
			</html>
