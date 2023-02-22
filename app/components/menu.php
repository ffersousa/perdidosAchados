<?php
$httpProtocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https';
$base = $httpProtocol . '://' . $_SERVER['HTTP_HOST'] . '/perdidosAchados/app/';
?>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
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
            <li><a class="dropdown-item" href="<?= $base  ?>perdidos/form_perdidos.php">Inserir Perdidos</a></li>
            <li><a class="dropdown-item" href="#">Listar Perdidos</a></li>
            <li><a class="dropdown-item" href="#">Remover Perdido </a></li>
          </ul>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Utilizadores
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= $base  ?>inseredados.php">Inserir utilizador</a></li>
            <li><a class="dropdown-item" href="<?= $base  ?>mostrardados.php">Listar utilizadores</a></li>
            <li><a class="dropdown-item" href="<?= $base  ?>apagardados.php">Remover utilizadores</a></li>
          </ul>
        <li class="nav-item">
          <a class="nav-link" href="<?= $base  ?>logout.php">Logout</a>
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