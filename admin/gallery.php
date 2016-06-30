<?php
	include "../header.php";
		//user validation
	if(!y_user::permission(5))
	{
		exit("your dont have permission to see this page");
	}
	$dir_id = $_GET['id'];
	$user_id = $_COOKIE['yuser_id'];
	
	$tblDemo = new ajaxCRUD("gallery", "gallery", "id", "../yapi/ajaxc/");

	//parent cat
	$tblDemo->defineRelationship("parent_id", "cat", "id",
"name");
	//display as
	//$tblDemo->displayAs("fldFName", "First");
	$tblDemo->displayAs("src", "img");
	
	//upload img
	//alowd ext
	$allowedExts = array("png", "jpg", "jpeg", "gif", "bmp"); 
	$tblDemo->setFileUpload("src", "../img/", "../img/",$allowedExts);
	
	//display img
	$tblDemo->formatFieldWithFunction('src', 'makeImg');
	
	//dir_id
	$tblDemo->setInitialAddFieldValue ("dir_id",$dir_id);
	$tblDemo->setAddPlaceholderText("dir_id", $dir_id);
	
	//where
	$tblDemo->addWhereClause("WHERE dir_id = ".$dir_id." AND use_id=".$user_id);
	
	//on insert
	$tblDemo->addValueOnInsert("use_id", $user_id); 
	$tblDemo->addValueOnInsert("dir_id", $dir_id); 
	
	//dont show fields
	$tblDemo->omitFieldCompletely("use_id");
	$tblDemo->omitFieldCompletely("dir_id");
	
	//add user id when insert
	$tblDemo->addValueOnInsert("use_id", $user_id); 
	
	//$tblDemo->turnOffAjaxADD();
	$tblDemo->showTable();

?>