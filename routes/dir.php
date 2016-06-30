<?php

//////directory////////

$app->get('/directory/:name','single_directory');
//review form
$app->post('/directory/:name','post_review');
$app->get('/add_directory','yadd_directory');
$app->post('/add_directory','yadd_directory_post');


$app->get('/edit_directory/:name','yedit_directory');

//////end directory////////

/////////directory///////////
function single_directory($name)
{
	$dir = get_dir_db();
	$gallery = get_gallery_db();
	$review =  get_review_db();
	//get the dir we need
	$this_dir = $dir->get_where("name = '".$name."'"); 
	$view = new Template();
	$view->title = $name;
	
	$view->dir = $this_dir['0'];
	$view->gallery = $gallery->get_where("dir_id = '".$view->dir['id']."'");
	$view->reviews = $review->get_where("dir_id = '".$view->dir['id']."'");
	
	$view->content = $view->render('templates/dir/single_dir.ytpl') ; //login form template
	echo $view->render('templates/bootstrap_updir.ytpl'); 
}//end single_directory

function yadd_directory()
{
	$dir = get_dir_db();
	$loc = get_location_db();
	$cat = get_cat_db();
	
	$view = new Template();
	$view->title = "add_directory"; 
	$view->locations = $loc->get_all();
	$view->cats = $cat->get_all();//get all categories 
	
	$view->select_loc_data = yform::convert_to_select_data($view->locations,"id","name");
	$view->chackbox_cat_data = yform::convert_to_chackbox_data($view->cats,"id","name",'cats_id[]');//,array(1,2,3));
	
	$view->content = $view->render('templates/dir/add_dir.ytpl') ; //add_directory form template
	echo $view->render('templates/bootstrap_updir.ytpl'); 
}//end yadd_category

function yadd_directory_post()
{
	include "header.php";
	include "controlers/dir/add_dir.php";
}//end yadd_directory_post

function yedit_directory($name)
{
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$dir = get_dir_db();
	$loc = get_location_db();
	$cat = get_cat_db();
	
	$view = new Template();
	$view->title = "add_directory"; 
	$view->locations = $loc->get_all();
	$view->cats = $cat->get_all();//get all categories 
	$view->dir = $dir->get_where("name = '".$name."'");
	$view->dir = $view->dir[0];
	$chacked = explode(".",$view->dir["cats_id"]);
	
	$view->select_loc_data = yform::convert_to_select_data($view->locations,"id","name",$view->dir["location_id"]);
	$view->chackbox_cat_data = yform::convert_to_chackbox_data($view->cats,"id","name",'cats_id[]',$chacked);//,array(1,2,3));
	
	$view->content = $view->render('templates/dir/edit_dir.ytpl') ; //add_directory form template
	echo $view->render('templates/bootstrap_updir.ytpl'); 
	
}//end yedit_directory

function post_review($name)
{
	single_directory($name);
	include "controlers/review/add_review.php";
}//end post_review

function get_dir_db()
{
	include "header.php";
	$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
	$dir =  new ycrud($pdo,"dir"); 
	return $dir;
}//end get_dir_db

function get_location_db()
{
	//include "header.php";
	$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
	$location =  new ycrud($pdo,"location"); 
	return $location;
}//end get_dir_db

function get_gallery_db()
{
	//include "header.php";
	$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
	$gallery =  new ycrud($pdo,"gallery"); 
	return $gallery;
}//end get_dir_db

function get_review_db()
{
	//include "header.php";
	$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
	$review =  new ycrud($pdo,"review"); 
	return $review;
}//end get_dir_db
/////////end directory///////////
?>