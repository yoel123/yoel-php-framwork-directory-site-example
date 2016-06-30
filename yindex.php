<?php 

$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

//category table
$cats =  new ycrud($pdo,"cat"); 
$locations =  new ycrud($pdo,"location"); 

$view = new Template(); 
$view->title = "home page"; 
$view->cats = $cats->get_where("parent_id=0");//get all categories 
$view->locations = $locations->get_all();//get all locations 
$view->select_loc_data = yform::convert_to_select_data($view->locations,"id","name");
$view->select_cat_data = yform::convert_to_select_data($view->cats,"id","name");
	
//$view->content = "hello world"; 
$view->content .= $view->render('templates/cat/all_cats.ytpl') ; //all categories template
echo $view->render('templates/bootstrap.ytpl'); 

 ?>

