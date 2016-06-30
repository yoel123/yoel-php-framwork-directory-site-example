<?php
	include "../header.php";
		//user validation
	if(!y_user::permission(5))
	{
		exit("your dont have permission to see this page");
	}
	$tblDemo = new ajaxCRUD("featured directory", "featured", "id", "../yapi/ajaxc/");

	// cat id
	$tblDemo->defineRelationship("cat_id", "cat", "id",
"name");

	//display as
	//$tblDemo->displayAs("fldFName", "First");
	$tblDemo->displayAs("cat_id", "category");
	$tblDemo->displayAs("dir_id", "featured directory");

	// dir id
	$tblDemo->defineRelationship("dir_id", "dir", "id",
"name");

	
	
	//$tblDemo->turnOffAjaxADD();
	$tblDemo->showTable();

?>