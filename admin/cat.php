<?php
	include "../header.php";
	//user validation
	if(!y_user::permission(1))
	{
		exit("your dont have permission to see this page");
	}
	
	$tblDemo = new ajaxCRUD("category", "cat", "id", "../yapi/ajaxc/");
	//initial value
	$tblDemo->omitAddField("parent_id");
	//parent cat
	$tblDemo->defineRelationship("parent_id", "cat", "id","name");
	//display as
	//$tblDemo->displayAs("fldFName", "First");
	$tblDemo->displayAs("desc", "description");
	$tblDemo->displayAs("parent_id", "parent category");
	
	//upload img
	//alowd ext
	$allowedExts = array("png", "jpg", "jpeg", "gif", "bmp"); 
	$tblDemo->setFileUpload("img", "../img/", "../img/",$allowedExts);
	
	//display img
	$tblDemo->formatFieldWithFunction('img', 'makeImg');
	//dir galery
	$tblDemo->addButtonToRow("directories", "dir.php"); 
	//textarea
	$tblDemo->setTextareaHeight('desc', 100);
	

	
	//$tblDemo->turnOffAjaxADD();
	$tblDemo->showTable();

?>