<?php	
include  './database/db.php';
$emptyUsernameOrPassword = '';

//print_r($_POST);

if($_POST){ // Se existir um post, entra!

	$tabela = 'users';

	$username = $_POST['username'];  // Get do username
	$password = $_POST['password'];  // Get da password

	//print_r($_POST['password']);
	//echo $_POST['password'];
	if ($username && $password){ // Validar se ambos os campos têm valor.	
		$password = md5($password);
		
		$query = "SELECT * FROM $tabela WHERE username=? AND passw=?";			
		$stmt = $db->prepare($query);
        $stmt->execute([$username, $password]);
		$result = $stmt->fetch();
		
		// remover tudo isto para o ficheiro a parte (como api/)
							
		//echo (count($result));
		if(count($result) > 0) // Se encontrou password porque está registado
							//if($result) // Se encontrou password porque está registado
		{
			session_start() ;
			echo "utilizador encontrado";
			$_SESSION['username'] = $username; // Cria um cookie saving the username
			$_SESSION['loggedIn'] = true; // Creates a cookie saying the user is logged in


			header("Location: menu.php \n"); // redireciona para pagina protegida.
		}
		else
		{ 		
			echo "Utilizador não encontrado";
			//header("Location: index.php \n"); // Não existe o utilizador, redirect  para a pagina de login.
		}
		}else{
				$emptyUsernameOrPassword = true; 
		}
	}
?>