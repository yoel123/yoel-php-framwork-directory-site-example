<?php
$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

//init template
$view = new Template(); 
$view->title = "login"; 

//do login
if(isset($_POST['email']))
{
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$yuser = new y_user($pdo, $email,$pass );
	$user_id = $yuser->login();
		ob_start(); 
	if ($user_id) 
	{
		echo '<div class="alert alert-success" role="alert">loged in successfully</div>';
		$userData = $yuser->getUser();
		// do stuff
	} else {
		
		echo '<div class="alert alert-danger" role="alert">Invalid login</div>';
	
	}
}
$view->content = ob_get_clean();  ; //login response

//render_template

echo $view->render('templates/bootstrap.ytpl'); 

?>