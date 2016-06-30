<?php
include('yinclude.php');

require_once('user_class.php');
require_once('activate_class.php');

$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
$activate = new y_activate($pdo);
$activate->do_activate();


?>