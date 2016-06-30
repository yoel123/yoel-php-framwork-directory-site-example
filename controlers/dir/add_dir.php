<?php

//cahack if form sent
if(!isset($_POST['submit'])){exit();}
$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

$cat_table = new ycrud($pdo,"dir"); 

$name = $_POST['name'];
$desc = $_POST['desc'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$googleplus = $_POST['googleplus'];
$opening_h = $_POST['opening_h'];//opening hours
//$main_img = $_POST['main_img'];
$location_id = $_POST['location'];
$cats_id = $_POST['cats_id'];

//handle chackbox
if(is_array($cats_id))
{
	//print_r($cats_id);
	$cats_id = implode(".",$cats_id);
	//echo $cats_id;
}

//main img
$main_img = new yupload();
$main_img->set_dir('img/');;
$main_img->set_extensions(array('jpg','jpeg','png','gif'));  //allowed extensions list//
$main_img->set_max_size(2.5); //set max file size to be allowed in MB//

if($main_img->upload_file('main_img'))
{        
    $main_img_str = $main_img->get_upload_name(); //get uploaded file name
	echo '<div class="alert alert-success" role="alert">file uploaded</div>';
	

}
else
{
	//if no img keep empty
	$main_img_str="";
}
//create example
$new_cat = array('name'=>$name,'desc'=>$desc,
'email'=>$email ,'address'=>$address ,'phone'=>$phone ,'website'=>$website,
'facebook'=>$facebook,'twitter'=>$twitter,'googleplus'=>$googleplus
,'opening_h'=>$opening_h,'main_img'=>$main_img,'main_img'=>$main_img
,'location_id'=>$location_id,'main_img'=>$main_img_str,'cats_id'=>$cats_id
 );
$cat_table->create($new_cat);


?>