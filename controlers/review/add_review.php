<?php

//cahack if form sent
if(!isset($_POST['submit'])){exit();}
$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

$review_table = new ycrud($pdo,"review"); 
//print_r($_POST);

$content = $_POST['content'];
$star = $_POST['star'];
$dir_id = $_POST['dir_id'];

$new_review = array('content'=>$content,'stars'=>$star,'dir_id'=>$dir_id);

$review_table->create($new_review);
//echo $review_table->last_query;



?>