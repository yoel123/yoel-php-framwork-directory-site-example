<?php
//users/////////

//login
$app->get('/login','ylogin_form');
$app->post('/login','ylogin_post');

//reset password
$app->get('/reset_password','yreset_password');
$app->post('/reset_password','yreset_password_post');
$app->get('/reset_password/:code','yreset_password_post');

//log_out
$app->get('/logout','ylogout');

//register
$app->get('/register','yregister');
$app->post('/register','yregister_post');

//activate user
$app->get('/activate/:code','yactivate_user');

//end users/////////

/////user routs///////////
function ylogin_form()
{
	include "header.php";
	$view = new Template(); 
	$view->title = "login"; 
	$view->content = $view->render('templates/users/login.ytpl') ; //login form template
	echo $view->render('templates/bootstrap.ytpl'); 
}//end ylogin_form

function ylogin_post()
{
	include "header.php";
	include "controlers/users/login.php";
}//end ylogin_post

function ylogout()
{
	include "header.php";
	include "controlers/users/logout.php";
}//end ylogin_post

function yreset_password()
{
	include "header.php";
	$view = new Template(); 
	$view->title = "login"; 
	$view->content = $view->render('templates/users/forgot_pass.ytpl') ; //login form template
	echo $view->render('templates/bootstrap.ytpl'); 
}//emd yreset_password


function yreset_password_post($code=0)
{
	
	$ycode=$code;
	include "header.php";
	include "yapi/users/reset_password_class.php";
	include "controlers/users/forgot_pass.php";
}//emd yreset_password

function yregister()
{
	include "header.php";
	$view = new Template(); 
	$view->title = "register"; 
	$view->content = $view->render('templates/users/register.ytpl') ; //login form template
	echo $view->render('templates/bootstrap.ytpl'); 
}//end  yregister

function yregister_post()
{
	include "header.php";
	include "yapi/users/activate_class.php";
	include "controlers/users/register.php";
}//end yregister_post

function yactivate_user($code=0)
{
	$ycode=$code;
	include "header.php";
	include "yapi/users/activate_class.php";
	include "controlers/users/activate.php";
}

/////end user routs///////////
?>