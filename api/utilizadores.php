<?php 
header('Access-Control-Allow-Origin: *'); // para permitir que o pedido seja efetuado de qualquer lado
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With"); 

include './db.php';
include './class.php';

$methodo = $_SERVER['REQUEST_METHOD'];  //POST, GET, UPDATE, DELETE

if($methodo === 'POST'){ // criar uma nova avaria
    
    $computadorid = $_POST['computadorid']; 
    $data = date("Y/m/d");

    $sql = "INSERT INTO avarias (computadorid, data) VALUES (?,?)";
    $stmt= $sth->prepare($sql);
    $stmt->execute([$computadorid, $data]);
    // 3 - exercicio uma nova avaria 

}else if($methodo === 'DELETE'){ // apagar uma avaria
    $id = $_GET['id']; 

    $sql = "DELETE FROM avarias WHERE id=?";
    $stmt = $sth->prepare($sql);
    $stmt->execute([$id]);

}else if($methodo === 'UPDATE'){
    $computadorid= $_POST['computadorid'];;
    $data = $_POST['data'];;
    $id = $_POST['computadorid'];

    $sql = "UPDATE avarias SET computadorid=?, data=? WHERE id=?";
    $stmt = $sth->prepare($sql);
    $stmt->execute([$computadorid, $data, $id]);
}else{ // vamos buscar todas as avarias
    if($_GET['id']){
        // //localhost/avarias?id=(id do que queres ir buscar)
        $id = $_GET['id'];

        // fetch('//localhost/avarias?id=1', {
        //     method: 'GET',
        // })

        $stmt = $sth->prepare("SELECT * FROM avarias WHERE id=?");
        $stmt->execute([$id]);
        $avaria = $stmt->fetch();
        echo json_encode($avaria);
    }else{
        //localhost/avarias
        // PDO -> QUERY orientadas a objectos 
        $sth = $conn->prepare("SELECT * FROM avarias");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_CLASS, "Avaria");
        echo json_encode($result);
    }
}

?>