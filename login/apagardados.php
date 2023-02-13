<?php 
	include '../database/mysqli.php';
	include("menu.php");

	if (($_POST['username']))
{
	$username = $_POST['username'];
	$sql = "DELETE FROM $utilizadores WHERE username = '{$username}'";
	$result = mysqli_query($conn, $sql);

	if ($result) {
		echo "Utilizador ". $username . " retirado da base e dados";	
	 }
	 // --- PDO ----
	 $sql = "DELETE FROM users WHERE id=?";
	$stmt= $pdo->prepare($sql);
	$stmt->execute([$id]);
	
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
		<h6 class="h6"> Retirar utilizador </h6>
		<form action="apagardados.php"  method="post">
			Username: <input type="text" name="username">
			<input class="btn btn-danger" type="submit" value="Retirar">
		</form>
	</div>
</body>
</html>
