<?php
include( __DIR__ . '/../../database/db.php');
include __DIR__ .'/../components/header.php';  
include __DIR__ .'/../components/menu.php';  


if ($_REQUEST && $_REQUEST['action'] == "del") {

	try {
		$id = intval($_GET['id']);
		$sql = "DELETE FROM utilizadores WHERE id=?";
		$stmt = $db->prepare($sql);
		$stmt->execute([$id]);
		echo "Utilizador apagado";
	} catch (Exception $e) {
		print_r($e);
	}
}

?>



<div class="col-md-6 offset-md-3 text-center bg-light  border-secondary mt-5 col-sm-12">
	<h5 class=" text-secondary"> Listagem de Perdidos</h5>
	<table id="dtBasicExample" class="table">
		<tr>
			<th scope="col">
				<h5> Perdido <h2>
			</th>

			<th scope="col">
				<h5> Ação #1 <h2>
			</th>
			<th scope="col">
				<h5> Ação #2 <h2>
			</th>

			<?php
			// Implementar uma solução mais abstracta.
			$perdidos = $db->query("SELECT * from perdidos order by data")->fetchAll(); // vai buscar tudo na base de dados
			//var_dump($perdidos);

			foreach ($perdidos  as $perdido) {

			?>
		<tr>
			<td> <?= $perdido['desc'] ?></td>
			<!--<td> <?= $perdido['passw']  ?></td> -->
			<td> <a href='alterardados.php?id=<?= $perdido['id'] ?>'> alterar </a></td>
			<td> <a href='mostrardados.php?action=del&id=<?php echo $perdido['id']; ?>'> Apagar </a></td>
		</tr>
	<?php
			}
	?>
	</table>
</div>

<script type="text/javascript" src="../assets/paginar_tabelas.js"></script>


<?php include __DIR__ . '/../components/footer.php'; ?>