<?php
require 'yapi/Slim/Slim.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$app = new Slim();

//index
$app->get('/','yindex');
$app->post('/','yindex');

//dir routes
require "routes/user.php";
require "routes/dir.php";
require "routes/cat.php";

//conntact form
$app->post('/contact','contact_post');
//search form
$app->post('/search_page','ysearch_page');

$app->run();


function yindex()
{
	include "header.php";
    include "yindex.php";


}//end yindex


function contact_post()
{
	
	$message = "name: ".$_POST['name']."<br> maill: ".$_POST['email']."<br>content: ".$_POST['content'];
	echo  $message;		
	// Send
	mail($_POST['dir_mail'], 'mail from your dir', $message);

}//end contact_post

function ysearch_page()
{
	
	//print_r($_POST);
	$dir = get_dir_db();
	
	$search_result = $dir->get_where("location_id = '".$_POST['location']."' AND cats_id = '".$_POST['cat']."'"); 
	$view = new Template();
	$view->title = "search directory"; 
    $view->dirs = $search_result;

	$view->content = $view->render('templates/dir/search.ytpl') ; //login form template
	echo $view->render('templates/bootstrap_updir.ytpl'); 

	
	
}//end ysearch_page



?>
