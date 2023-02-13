<?php 
include './utils/db.php';
include './class.php';

$databaseName = 'artigos';
$methodo = $_SERVER['REQUEST_METHOD'];  //POST, GET, UPDATE, DELETE
$result = []; 

switch ($methodo ) {
    case 'POST':

        $categoria = $_POST['categoria']; // vai ser um id
        $tipo = $_POST['tipo']; // vai ser um id
        $descricao = $_POST['descricao']; // vai ser um txto
        $data = date("Y/m/d");
        $estado = $_POST['estado']; // vai ser uma data
        // $img = $_POST['img']; // vai ser uma data

        $sql = "INSERT INTO $databaseName (categoria, tipo, descricao, data, estado) VALUES (?,?,?,?,?)";
        $stmt = $sth->prepare($sql);
        $stmt->execute([$categoria, $tipo, $descricao, $data, $estado]);
        $response = ['sucess'];
       
        break;
    case 'DELETE':

        $id = $_GET['id'];

        $sql = "DELETE FROM $databaseName WHERE id=?";
        $stmt = $sth->prepare($sql);
        $stmt->execute([$id]);
        $response = ['success'];
        
        break;
    case 'UPDATE':

        $artigoId = $_POST['artigoId'];
        $data = $_POST['data'];
        $id = $_POST['id'];

        $sql = "UPDATE $databaseName SET id=?, data=? WHERE id=?";
        $stmt = $sth->prepare($sql);
        $stmt->execute([$computadorid, $data, $id]);
        $response = ['success'];

        break;
    default:
        if ($_GET['id']) {
           
            $id = $_GET['id'];

            $stmt = $sth->prepare("SELECT * FROM $databaseName WHERE id=?");
            $stmt->execute([$id]);
            $response = $stmt->fetch();
     
        } else {
            class temp
            {
            }
            //localhost/avarias
            // PDO -> QUERY orientadas a objectos 
            $sth = $conn->prepare("SELECT * FROM $databaseName");
            $sth->execute();
            $response = $sth->fetchAll(PDO::FETCH_CLASS, "temp");
        }
        break;
}

// Parse da resposta de php object para JSON
echo json_decode($response);

?>