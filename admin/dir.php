<?php
	include "../header.php";
		//user validation
	if(!y_user::permission(5))
	{
		exit("your dont have permission to see this page");
	}
	$cat_id = $_GET['id'];
	$user_id = $_COOKIE['yuser_id'];

	$tblDemo = new ajaxCRUD("directory", "dir", "id", "../yapi/ajaxc/");

	$tblDemo->addTableBorder();
	//$tblDemo->actionText = "Do Something";
	
	//display as
	//$tblDemo->displayAs("fldFName", "First");
	$tblDemo->displayAs("desc", "description");
	$tblDemo->displayAs("opening_h", "opening hours");
	$tblDemo->displayAs("main_img", "main img");
	$tblDemo->displayAs("location_id", "location");
	$tblDemo->displayAs("cats_id", "category");
	
	//upload img
	//alowd ext
	$allowedExts = array("png", "jpg", "jpeg", "gif", "bmp"); 
	$tblDemo->setFileUpload("main_img", "../img/", "../img/",$allowedExts);
	
	//display img
	$tblDemo->formatFieldWithFunction('main_img', 'makeImg');

	//cat  select
	$tblDemo->defineRelationship("cats_id", "cat", "id",
"name");
	
	//location select
	$tblDemo->defineRelationship("location_id", "location", "id",
"name");

	//validate email
	$tblDemo->modifyFieldWithClass("email", "email");
	
	//textarea
	$tblDemo->setTextareaHeight('desc', 100);
	$tblDemo->setTextareaHeight('opening_h', 100);
	
	//dir galery
	$tblDemo->addButtonToRow("gallery", "gallery.php"); 
	
	//if isset category id
	if(isset($cat_id))
	{
		//chack if not admin
		if($_COOKIE['yuser_level']>3)
		{
			$tblDemo->addWhereClause("WHERE cats_id = ".$cat_id." AND user_id=".$user_id);
		}
		else
		{
			$tblDemo->addWhereClause("WHERE cats_id = ".$cat_id." ");
		
		}
	}
	else
	{
		//chack if not admin
		if($_COOKIE['yuser_level']>3)
		{
			$tblDemo->addWhereClause("WHERE  user_id=".$user_id);
		}
	}
	
	//$tblDemo->turnOffAjaxADD();
	$tblDemo->showTable();

?>