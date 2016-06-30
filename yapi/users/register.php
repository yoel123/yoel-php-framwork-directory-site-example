<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	include('yinclude.php');
	//example register page
	require_once('user_class.php');
	require_once('activate_class.php');

	$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

	if(isset($_POST['user_submit']))
	{
		$email = mysql_real_escape_string($_POST['email']);
		$pass = mysql_real_escape_string($_POST['password']);
		$name = mysql_real_escape_string($_POST['name']);
		$yuser = new y_user($pdo, $email,$pass );

		//createUser($name="new user",$level=3,$activated=0)
		$new_user = $yuser->createUser($name);
		if(!$new_user)
		{
			exit('<div class="alert alert-warning" role="alert">email exists</div>');
		}
		//send activation code
		$activate = new y_activate($pdo,$email);
		$activate->send_activate_mail($new_user,"www.yoursite.com/activate.php");
		echo '<div class="alert alert-success" role="alert">registered successfully</div>';
	}
?>



<form action="" method="post" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>register</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">user name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="email" placeholder="" class="form-control input-md" required >
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password </label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <input type="submit" id="singlebutton" name="user_submit" class="btn btn-primary" value="submit"/>
  </div>
</div>

</fieldset>
</form>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>