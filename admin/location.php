<?php
	include "../header.php";
		//user validation
	if(!y_user::permission(1))
	{
		exit("your dont have permission to see this page");
	}
	$tblDemo = new ajaxCRUD("location", "location", "id", "../yapi/ajaxc/");


	
	
	//$tblDemo->turnOffAjaxADD();
	$tblDemo->showTable();

?>