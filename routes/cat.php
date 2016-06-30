<?php

//categorys/////////
//category page
$app->get('/category/:name','single_cat');
//add
$app->get('/add_category/','yadd_category');
$app->post('/add_category/','yadd_category_post');

//edit
$app->get('/edit_category/:name','yedit_category');
$app->post('/edit_category/:id','yedit_category_post');

//delete
$app->get('/delete_category/:id','ydelete_category');

$app->get('/ytest','ytestf');
//end categorys/////////

///// category routs///////////
function single_cat($name=0)
{
	//if($name == 0){return;}//exit if no name
	$yname = $name;
	include "header.php";
	include "controlers/cat/single_cat.php";
}//end single_cat

function yadd_category()
{
	include "header.php";
	$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
	$cat =  new ycrud($pdo,"cat"); 
	$view = new Template(); 
	$view->title = "add_category"; 
    $view->cats = $cat->get_all();//get all categories  ; //login form template
	$view->content = $view->render('templates/cat/add_cat.ytpl') ; //login form template
	echo $view->render('templates/bootstrap_updir.ytpl'); 
}//end yadd_category
function yadd_category_post()
{
	include "header.php";
	include "controlers/cat/add_cat.php";
}//end yadd_category_post

function yedit_category($name)
{
	include "header.php";
	$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
	$cat =  new ycrud($pdo,"cat"); 
	$this_cat = $cat->get_where("name = '".$name."'"); 
	
	$view = new Template();
	$view->title = "edit_category"; 
    $view->cat = $this_cat['0'];
	$view->cats = $cat->get_all();//get all categories 
	$view->select_cat_data = yform::convert_to_select_data($view->cats,"id","name",$view->cat['parent_id']);
	//print_r($view->select_cat_data);
	$view->content = $view->render('templates/cat/edit_cat.ytpl') ; //login form template
	echo $view->render('templates/bootstrap_updir.ytpl'); 
	
}//end yedit_category
function yedit_category_post($id)
{
	$yid = $id;
	include "header.php";
	include "controlers/cat/edit_cat.php";
}//end yedit_category_post

function ydelete_category($id)
{
	include "header.php";
	$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
	$cat =  new ycrud($pdo,"cat"); 
	$cat->delete($id); 
	echo "<a href = '../'>back</a>";
}
function get_cat_db()
{
	include "header.php";
	$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
	$cat =  new ycrud($pdo,"cat"); 
	return $cat;
}//end get_dir_db
/////end category routs///////////

?>