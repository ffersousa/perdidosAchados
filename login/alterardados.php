<?php 
include("menu.php");
include  '../database/checkLogin.php';
include  './database/db.php';

$id = $_GET['id'];

if($id){ // Ver a informação.
	$stmt = $db->prepare("SELECT * FROM users WHERE id=?");
	$stmt->execute([$id]);
	$user = $stmt->fetch();

} else if($_POST) {

	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['passw'];

	if($username != '' && $password != ''){
		$sql = "UPDATE users SET username=?, passw=? WHERE id=?";
		$result = $db->prepare($sql)->execute([$username, md5($password), $id]);
		
		if($result){
			echo "Registo atualizado com sucesso";
		} else {
			echo "Erro ao atualizar registo: " . $conn->error;
		}
		
		//header("Location: menu.php \n"); // Não existe o utilizador, redirect  para a página de login.
	}
	
}else{
	// Mandar utilizador para a pagina 404 (nof found)
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<title>Escola Website - Mostrar dados</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta charset="UTF-8">
</head>

<div class= "col-md-6 offset-md-3 text-center bg-light  border-secondary mt-5 col-sm-12">
			<h6> Alterar dados do utilizador </h6>
		
			<form class= "table" action="alterardados.php" method="post">
				
				<input type="text" hidden name="id" class="input" value="<?= $user['id'] ?>" />
				<label for="name">Utilizador:</label>
				<input type="text" name="username" class="input" value="<?= $user['username'] ?>" />
				<br>
				<label for="name">Password: </label>
				<input type="password" name="passw" class="input" value="" />
				<br>
				<input class="btn btn-info" type="submit" value="Alterar" class="button" />
			</form>
</div>
