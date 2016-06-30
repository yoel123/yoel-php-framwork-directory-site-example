<?php
	$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
	
	//init template
	$view = new Template(); 
	$view->title = "register"; 
	//content html
	$html="";
	
	if(isset($_POST['user_submit']))
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$name = $_POST['name'];
		$yuser = new y_user($pdo, $email,$pass );

		//createUser($name="new user",$level=3,$activated=0)
		$new_user = $yuser->createUser($name);
		if(!$new_user)
		{
			$html='<div class="alert alert-warning" role="alert">email exists</div>';
		}else
		{
			//send activation code
			$activate = new y_activate($pdo,$email);
			$activate->send_activate_mail($new_user,$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']."/");
			$html= '<div class="alert alert-success" role="alert">registered successfully</div>';
		}
	}

	$view->content = $html ; //register response

	//render_template

	echo $view->render('templates/bootstrap.ytpl');
?>