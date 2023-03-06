<?php
error_reporting(0);
session_start();

$httpProtocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https';
$base = $httpProtocol . '://' . $_SERVER['HTTP_HOST'] . '/perdidosAchados/app/';


?>
<div class="container">
  <div class="row">
    <div class="col">
      <?php 

        
          $pathImagens = $base. "../assets/imagens/";
          $file = "ESAG.jpg";
          echo '<img src="'.$pathImagens.$file.'">';
      ;?>
    </div>
    <div class="col-6">
    
    </div>
    <div class="col d-block  text-right" style="text-align: right;padding:10px">
    <?php echo " <p class='ml-1 text-success'> Seja bem vindo   {$_SESSION['username']} </p>";
        
    ?>
    </div>
  </div>



<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Início</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Perdidos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= $base  ?>perdidos/inserirPerdidos.php">Inserir Perdidos</a></li>
            <li><a class="dropdown-item" href="<?= $base  ?>perdidos/mostrar_perdidos.php">Listar Perdidos</a></li>
            <li><a class="dropdown-item" href="#">Remover Perdido </a></li>
          </ul>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Utilizadores
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= $base  ?>dados/inseredados.php">Inserir utilizador</a></li>
            <li><a class="dropdown-item" href="<?= $base  ?>dados/mostrardados.php">Listar utilizadores</a></li>
            <li><a class="dropdown-item" href="<?= $base  ?>dados/apagardados.php">Remover utilizadores</a></li>
          </ul>
        <li class="nav-item">
          <a class="nav-link" href="<?= $base  ?>utilizadores/logout.php">Logout</a>
        </li>
        </li>

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Pesquisar..." aria-label="Search" />
        <button class="btn btn-outline-success" type="submit">
          Pesquisa
        </button>
      </form>
    </div>
  </div>
</nav>