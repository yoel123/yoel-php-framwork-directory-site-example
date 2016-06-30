<?php
//validate user
if(!y_user::permission(5))
{
	exit("your dont have permission to see this page
	please login <a href='/login'>login</a>
	");
}

//cahack if form sent
if(!isset($_POST['submit'])){exit('no form submitted');}
$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

$cat_table = new ycrud($pdo,"cat"); 

$name = $_POST['name'];
$desc = $_POST['desc'];
$parent_id = $_POST['parent_id'];

//upload img
$upload = new yupload();
$upload->set_dir('img/');;
$upload->set_extensions(array('jpg','jpeg','png','gif'));  //allowed extensions list//
$upload->set_max_size(2.5); //set max file size to be allowed in MB//
if($upload->upload_file('img'))
{        
    $img = $upload->get_upload_name(); //get uploaded file name
	echo '<div class="alert alert-success" role="alert">file uploaded</div>';
	

}
else
{
	//if no img keep empty
	$img="";
}
//create example
if($img=="")
{
	$new_cat = array('name'=>$name,'desc'=>$desc,'parent_id'=>$parent_id);
}else
{
	$new_cat = array('name'=>$name,'desc'=>$desc,'parent_id'=>$parent_id,
'img'=>$img );
}
//print_r($new_cat);	
//print_r($pdo ->errorInfo());
$stmt =  $cat_table->update($id,$new_cat);
//$stmt->debugDumpParams();
echo "<a href = '../'>back</a>";

?>