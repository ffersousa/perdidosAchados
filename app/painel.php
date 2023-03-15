<?php 
include  __DIR__ . '/components/header.php';
include __DIR__ .'/components/menu.php';
include __DIR__ . '/utils/checkLogin.php'; 
include __DIR__ . "/../database/db.php";


session_start();
		$_SESSION["username"] ; // Cria um cookie saving the username
		$_SESSION["loggedIn"] = true; // Creates a cookie saying the user is logged in
		$_SESSION["userid"] ;

        echo "Painel com coisas";
        echo $_SESSION["username"];
        echo $_SESSION["userid"] ;

		$query = "SELECT * FROM $perdidos where id=? ";
		$stmt = $db->prepare($query);
		$stmt->execute([$_SESSION["userid"] ]);
		$result = $stmt->fetch();

		//echo (count($result));
		if (count($result) > 0) {
			// Se encontrou password porque está registado
			//if($result) // Se encontrou password porque está registado
			session_start();
			$_SESSION["username"] = $username; // Cria um cookie saving the username
			$_SESSION["loggedIn"] = true; // Creates a cookie saying the user is logged in
			$_SESSION["userid"] = $result["id"];

			
		}
	



?>





<p> Painel com as coisas </p>

<?php include './components/footer.php';  ?>
