<?php


$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);


//category table
$cat =  new ycrud($pdo,"cat"); 

//dir table
$dir =  new ycrud($pdo,"dir");
 
$view = new Template(); 
$view->cat = $cat->get_where("name = '$name'");//get all categories 
$view->cat = $view->cat[0];
$cat_id = $view->cat['id'];
$view->cats = $cat->get_where("parent_id = '$cat_id'");//get all categories;
$view->dirs = $dir->get_where("cats_id REGEXP  '$cat_id.'");//get all directoris in this cat;
$view->title = $view->cat['name']; 

$view->content = ""; 
$view->content .= $view->render('templates/cat/single_cat.ytpl') ; //all categories template
$view->content .= $view->render('templates/cat/all_cats.ytpl') ; //all categories template
echo $view->render('templates/bootstrap_inner.ytpl'); 

 ?>

