<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('ytemplate_class.php');
 $view = new Template(); 
 $view->title = "hello, world"; 
 $view->content = "test content"; 
 echo $view->render('template_test.ytpl'); 
 
?>