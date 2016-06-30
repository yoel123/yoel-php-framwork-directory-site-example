<?php
$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
$reset = new y_reset_password($pdo);

//init template
$view = new Template(); 
$view->title = "reset password"; 

//content html
$html="";

//if form is sent
if(isset($_POST['email']))
{
	$mail = $_POST['email'];
	$reset->send_reset_mail($mail,$_SERVER['SERVER_NAME'] ."activate/");
	
	$html= '<div class="alert alert-success" role="alert">reset mail sent</div>';
		
	
}

//if get reset code
global $ycode;
if(isset($code))
{
	$_GET['code'] = $code;
	$do_reset = $reset->do_reset();
	$html= '<div class="alert alert-success" role="alert">new password sent to your email</div>';
	
	
}

$view->content = $html ; //reset response

//render_template

echo $view->render('templates/bootstrap.ytpl'); 
?>