<?php
session_start();

if (!$_SESSION['username'] && !$_SESSION['loggedIn']) { // Se existir um post, entra!
    header("Location: index.php \n");
}
?>
