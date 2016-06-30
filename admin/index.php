<?php
   include "../header.php";
   	//user validation
	if(!y_user::permission(5))
	{
		exit("your dont have permission to see this page");
	}
?>
<link href="../yapi/ajaxc/css/default.css" rel="stylesheet" type="text/css" media="screen">
<div class="admin_squer">
	<a href="cat.php">category</a>
</div><!--endf admin_squer-->
<div class="admin_squer">
	<a href="dir.php">directories</a>
</div><!--endf admin_squer-->
<div class="admin_squer">
	<a href="featured.php">featured </a>
</div><!--endf admin_squer-->
<div class="admin_squer">
	<a href="review.php">review</a>
</div><!--endf admin_squer-->
<div class="admin_squer">
	<a href="users.php">users</a>
</div><!--endf admin_squer-->
<div class="admin_squer">
	<a href="location.php">locations</a>
</div><!--endf admin_squer-->
