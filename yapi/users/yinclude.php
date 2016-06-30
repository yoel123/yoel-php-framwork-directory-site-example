<?php
//start session if not started
if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}
//include yoel config
$ydir = str_replace("\\","/",dirname(__FILE__));
$ydir = preg_replace("/yapi\/.*/","",$ydir);//remove yapi and everything after it
require_once($ydir.'/config.php');

?>