<?php
	include "../header.php";
		//user validation
	if(!y_user::permission(1))
	{
		exit("your dont have permission to see this page");
	}

	
	$tblDemo = new ajaxCRUD("users", "user", "id", "../yapi/ajaxc/");

	//display as
	//$tblDemo->displayAs("fldFName", "First");
	$tblDemo->displayAs("pas", "password");
	

	//$tblDemo->turnOffAjaxADD();
	$tblDemo->showTable();

?>