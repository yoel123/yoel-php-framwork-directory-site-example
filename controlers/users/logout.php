<?php

y_user::log_out();
//init template
$view = new Template(); 
$view->title = "log out";
//logout alert 
$view->content = '<div class="alert alert-success" role="alert">loged out</div>'; 

//render_template
echo $view->render('templates/bootstrap.ytpl'); 

?>