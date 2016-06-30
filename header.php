<?php
require_once('config.php');
require_once('yapi/ajaxc/preheader.php');
include('yapi/ajaxc/ajaxCRUD.class.php');
require_once('yapi/ytemplate/ytemplate_class.php');
require_once('yapi/ycrud/ycrud.php');
require_once('yapi/users/user_class.php');
require_once('yapi/upload/yupload_class.php');
require_once('yapi/yform/yform.php');

require_once('yapi/google_map/class.MapBuilder.php');
require_once('yapi/google_map/helper_funcs.php');
if(session_status() == PHP_SESSION_NONE)
{
 session_start();
}
//print_r($_COOKIE);


		
		


?>

