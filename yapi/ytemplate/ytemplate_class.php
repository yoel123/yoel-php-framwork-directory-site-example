<?php class Template 
{ 
	private $vars = array(); 
	public function __get($name) 
	{ 
		return $this->vars[$name]; 
	} 
	public function __set($name, $value) 
	{ 
		if($name == 'view_template_file') 
		{ 
			throw new Exception("Cannot bind variable named 'view_template_file'"); 
		}
		$this->vars[$name] = $value; 
	} 
	public function render($view_template_file) 
	{ 
		if(array_key_exists('view_template_file', $this->vars))
		{ 
			throw new Exception("Cannot bind variable called 'view_template_file'"); 
		} 
		extract($this->vars); 
		ob_start(); 
		include($view_template_file);
		return ob_get_clean(); 
	} 
}
/*
//main.php template:
<html> 
<head> 
<title><?php echo $title; ?></title> 
</head> 
<body>
 <h1><?php echo $title; ?></h1>
 <div> <?php echo $content; ?> 
 </div> 
 </body>
 </html> 
 //contant.php
<ul> 
<?php foreach($links as $link): ?> 
<li><?php echo $link; ?></li> 
<?php endforeach; ?> 
</ul> 
<div> 
<?php echo $body; ?>
 </div> 
 
 //controller.php
 $view = new Template(); 
 $view->title = "hello, world"; 
 $view->links = array("one", "two", "three"); 
 $view->body = "Hi, sup"; 
 $view->content = $view->render('content.php'); 
 echo $view->render('main.php'); 
 
 */
?>

