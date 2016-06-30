<?php

include('yinclude.php');
//user class
require_once('user_class.php');
//example usage
$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

if(isset($_POST['email']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$pass = mysql_real_escape_string($_POST['password']);
	$yuser = new y_user($pdo, $email,$pass );
	$user_id = $yuser->login();

	if ($user_id) 
	{
		echo '<div class="alert alert-success" role="alert">loged in successfully</div>';
		$userData = $yuser->getUser();
		// do stuff
	} else {
		
		echo '<div class="alert alert-danger" role="alert">Invalid login</div>';
	
	}
}

?>

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


<form action="" method="POST" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">email</label>  
  <div class="col-md-4">
  <input id="name" name="email" type="email" placeholder="" class="form-control input-md" required>
    
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
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">submit</button>
  </div>
</div>

</fieldset>
</form>

<a href="reset_password.php">
forgot password
</a>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>