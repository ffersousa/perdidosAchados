<?php	
include  './utils/db.php';
$response = ['success' => 0]; // falso
$tabela = 'utilizadores';

$_POST = json_decode(file_get_contents('php://input'), true);


if($_POST){ // Se existir um post, entra!

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
        
        echo 'dasdsadsa';
        print_r(count($result));

		if(count($result) > 1) // Se encontrou password porque está registado
		{
			session_start() ;
			$_SESSION['username'] = $username; // Cria um cookie saving the username
			$_SESSION['loggedIn'] = true; // Creates a cookie saying the user is logged in

            $response = ['success' => 1, 'utilizador' =>  $username];
		}
    }
}


// if($response['success'] == 0){
//     header("HTTP/1.0 404 Not Found");
//     exit;
// }


echo json_encode($response);
