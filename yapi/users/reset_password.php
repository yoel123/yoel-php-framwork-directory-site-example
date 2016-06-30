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
include('yinclude.php');
require_once('user_class.php');

require_once('reset_password_class.php');
require_once('activate_class.php');

$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
$reset = new y_reset_password($pdo);

//if form is sent
if(isset($_POST['email']))
{
	$mail = $_POST['email'];
	$reset->send_reset_mail($mail,"your_reset_page.php");
	
	echo '<div class="alert alert-success" role="alert">reset mail sent</div>';
		
	exit();
}

//if get reset code
if(isset($_GET['code']))
{
	$do_reset = $reset->do_reset();
	echo '<div class="alert alert-success" role="alert">new password sent to your email</div>';
	
	exit();
}
?>




<form action="" method="POST" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>reset password</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">email</label>  
  <div class="col-md-4">
  <input id="name" name="email" type="email" placeholder="" class="form-control input-md" required>
    
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>