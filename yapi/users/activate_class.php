<?php
//include yoel config
//require_once('./config.php');
//example usage at the end
class y_activate
{
	protected $_email;    
 

    protected $_db;       
    protected $_user; 
    
	public function __construct(PDO $db, $email="") 
    {
       $this->_db = $db;
       $this->_email = $email;
    }//end __construct   
	

	
	/*
	name:send_activate_mail
	description:send a activation mail to the user so he will activate his account. 
	input:
	-$messge(string):messge sent to the user the user.
	-$mail_title(string):the title of the mail the user will get
	-$user_id(int):the user id that the mail will be sent to.
	-$activation_page(string):the page that will do the activation.
	output:null
	*/
	public function send_activate_mail($user_id,$activation_page,$messge="click the link to
	activate your account",$mail_title="activate_your account")
    {
		//user mail
		$mail = $this->_email;
		//create activation code
		$code = rand(1000000, 9999999);
		//put in database
		$query = "INSERT INTO activation_codes ( user_id,activation_code )
		values ( '$user_id','$code' )";
		//preper statment
		$stmt = $this->_db->prepare($query);
		//execute
		$stmt->execute();
		//create activation link
		$messge .="<br><a href='".$activation_page."?code=".$code."'>activate account</a>";
		//send to user
		mail($mail,$mail_title,$messge );
	}//end send_activate_mail

	/*
	name:do_activate
	description:takes activation code from url and activates user
	input:null
	output:true/false, if successful return true
	*/
	public function do_activate()
    {
		//if no code exit
		if(!isset($_GET['code'])){return false;}
		$code = $_GET['code'];
		//call data from sql
		$stmt = $this->_db->prepare('SELECT * FROM activation_codes WHERE activation_code=?');
        $stmt->execute(array($code));
		//activate user
		if ($stmt->rowCount() > 0) 
		{
			//get row
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			//get user_id
			$user_id = $row['user_id'];
			//delete record from table
			$this->delete_record($user_id);
			//init user class
			$user = new y_user($this->_db,"","");
			//activate
			$user->activate_account($user_id);
			return true;
			
		}
		return false;
	}
	
	public function delete_record($id) 
	{
		if(!isset($id)){return false;}
		$stmt = $this->_db->prepare('DELETE FROM activation_codes WHERE user_id = ? ');
        $stmt->execute(array($id));
		return true;
	}
	
}//end y_user

/*
//example usage----------

////////send_activate_mail (from register.php)
		//send activation code
		$activate = new y_activate($pdo,$email);
		$activate->send_activate_mail($new_user,"www.yoursite.com/activate.php");
		
/////////do_activate
require_once('user_class.php');
require_once('activate_class.php');

$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
$activate = new y_activate($pdo);
$activate->do_activate();

*/

/*
//sql tables
//activation_codes
//----user_id(int)--activation_code(int)--------------------


CREATE TABLE IF NOT EXISTS `activation_codes` (
  `user_id` int(11) NOT NULL,
  `activation_code` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

*/



?>