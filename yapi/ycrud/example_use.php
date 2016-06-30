<?php
//include yoel config
$ydir = str_replace("\\","/",dirname(__FILE__));
$ydir = preg_replace("/yapi\/.*/","",$ydir);//remove yapi and everything after it
require_once($ydir.'/config.php');

require_once('ycrud.php');

$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

$users_table = new ycrud($pdo,"user"); 
//set your table primary key that will be used by the class
//$users_table->set_pk("id"); 

//create example
$new_user = array('name'=>'test123567','pas'=>'123','mail'=>'bla@bla.com',
'user_level'=>'5','activated'=>0);

//$users_table->create($new_user);

//update example
$update_user = array('name'=>'update_test','pas'=>'1323','mail'=>'bla1@bla.com',
'user_level'=>'3','activated'=>0);
$id = 20;
$users_table->update($id,$update_user);

//delete example
$id = 21;
$users_table->delete($id);

//get_by_id example
$id = 23;
$singl_user = $users_table->get_by_id($id);
print_r($singl_user);
echo "<br><br>";

//get_all example
$all_users = $users_table->get_all();
print_r($all_users);

?>