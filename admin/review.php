<?php
	include "../header.php";
		//user validation
	if(!y_user::permission(1))
	{
		exit("your dont have permission to see this page");
	}

	
	$tblDemo = new ajaxCRUD("review", "review", "id", "../yapi/ajaxc/");

	//dir select
	$tblDemo->defineRelationship("dir_id", "dir", "id",
"name");
//display as
	//$tblDemo->displayAs("fldFName", "First");

	$tblDemo->displayAs("dir_id", "directory");

	//textarea
	$tblDemo->setTextareaHeight('content', 100);

	
	//$tblDemo->turnOffAjaxADD();
	$tblDemo->showTable();

?>