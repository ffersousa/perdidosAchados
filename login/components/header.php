<!DOCTYPE html>
<html lang="pt">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='./src/css/main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
    <title>Perdidos&Achados Menu</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <meta charset="UTF-8">
</head>
<html>

<body>
    <header class="row">
        <div class="col-md-6 offset-md-3 text-center bg-light border border-secondary  col-sm-12"> <!-- offset-md-3 desloca 3 colunas para a direita  -->
            <h6>ESAG - Perdidos & Achados</h6>
        </div>
    </header>
    <?php
    error_reporting(0); // Não mostra  avisos.
    session_start();

    if($_SESSION['username']){
        echo "<a class= 'ml-3 text-success ' >Olá {$_SESSION['username']}!</a>";
    }
    ?>