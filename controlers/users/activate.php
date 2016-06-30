<?php

$_GET['code'] =$code;
$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
$activate = new y_activate($pdo);
$activate->do_activate();


?>