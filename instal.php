<?php
require_once('config.php');

//call db
$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

//call sql data
$ysql = file_get_contents('db.sql');

//create tables
$result = $pdo->exec($ysql) or die(print_r($pdo->errorInfo(), true));;

echo "database installed";



?>