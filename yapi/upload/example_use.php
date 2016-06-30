
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
include('yupload_class.php');

$upload = new yupload();
$upload->set_dir('images/');;
$upload->set_extensions(array('jpg','jpeg','png','gif'));  //allowed extensions list//
//$upload->allow_all_formats(); //allow all file formats
$upload->set_max_size(2.5); //set max file size to be allowed in MB//

if($upload->upload_file('img_upload') && isset($_POST['img_upload']))
{        
    $image = $upload->get_upload_name(); //get uploaded file name
	echo '<div class="alert alert-success" role="alert">file uploaded</div>';
	

}else
{
	//upload failed
    echo $upload->last_error;
}

?>

<!--upload form-->
<form action = "" method="POST"class="form-horizontal" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>upload example</legend>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="img_upload">upload img</label>
  <div class="col-md-4">
    <input id="img_upload" name="img_upload" class="input-file" type="file"/>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="yupload"></label>
  <div class="col-md-4">
    <input type="submit" id="yupload" name="yupload" class="btn btn-primary" value="upload"/>
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