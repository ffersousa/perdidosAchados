<?php 

$httpProtocol =  'https';

if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
    $httpProtocol = 'http';
}


// httpProtocol = htttp || https
// $_SERVER['HTTP_HOST'] = 'localhost/perdidosAchado/app'
$baseHref = $httpProtocol . '://' . $_SERVER['HTTP_HOST'] . '/';


?>