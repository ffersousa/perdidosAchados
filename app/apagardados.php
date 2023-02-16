<?php
include('../database/db.php');

if ($_POST && $_POST['username']) {
	$username = $_POST['username'];
	$sql = "DELETE FROM $utilizadores WHERE username = '{$username}'";
	$result = mysqli_query($conn, $sql);

	if ($result) {
		echo "Utilizador " . $username . " retirado da base e dados";
	}
	// --- PDO ----
	$sql = "DELETE FROM users WHERE id=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);
}

?>
<?php include("./components/header.php"); ?>
<?php include("./components/menu.php"); ?>

<div class="col-md-6 offset-md-3 text-center bg-light  border-secondary mt-5 col-sm-12">
	<h6 class="h6"> Retirar utilizador </h6>
	<form action="apagardados.php" method="post">
		Username: <input type="text" name="username">
		<input class="btn btn-danger" type="submit" value="Retirar">
	</form>
</div>

<?php include("./components/footer.php"); ?>