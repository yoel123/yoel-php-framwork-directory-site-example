<?php
//include yoel config
//require_once('./config.php');
//example usage at the end
class y_user
{
	protected $_email;    
    protected $_password;  

    protected $_db;       
    protected $_user; 
    
	public function __construct(PDO $db, $email, $password) 
    {
       $this->_db = $db;
       $this->_email = $email;
       $this->_password = $password;
	   if (session_status() == PHP_SESSION_NONE) 
	   {
			session_start();
	   }
    }//end __construct   
	
	/*
	name:login
	description:loges in user if mail and password are right
	input:none
	output: if successful return loged in user id,else return false
	*/
	public function login()
    {
        $user = $this->_checkCredentials();
        if ($user) {
            $this->_user = $user; // store it so it can be accessed later
            //start session 
			$this->login_session($user);
            return $user['id'];
        }
        return false;
    }//end login
	
	/*
	name:login_session
	description:creates a session vars for user
	input:$user(arr)- the user array returnd from db
	output:null
	*/
	public function login_session($user)
    {
		$_SESSION['yuser_id'] = $user['id'];
		$_SESSION['yuser_level'] = $user['user_level'];
        $_SESSION['yuser_active'] = $user['activated'];
		
		setcookie( "yuser_id", $user['id'], strtotime( '3 days' ) );
		setcookie( "yuser_level", $user['user_level'], strtotime( '3 days' ) );
		setcookie( "yuser_active", $user['activated'], strtotime( '3 days' ) );
	}//end login_session
	
	/*
	name:log_out
	description:loges current user out
	input:null
	output:null
	*/
	public static  function log_out()
    {
		$_SESSION['yuser_id'] = null;
		$_SESSION['yuser_level'] = null;
        $_SESSION['yuser_active'] = null;
		
		setcookie( "yuser_id", null, strtotime( '3 days' ) );
		setcookie( "yuser_level", null, strtotime( '3 days' ) );
		setcookie( "yuser_active", null, strtotime( '3 days' ) );
	}//end login_session
	//y_user::log_out();
	
	/*
	name:permission
	description:checks user level
	input:$level(int)-user level needed 
	output:true/false if user is eaquel or lesser then level
	*/
	public static  function permission($level)
    {
		//chack session !isset($_SESSION['yuser_id']) |||||$_SESSION['yuser_level'] <=$level 
		//chack _COOKIE
		if( !isset($_COOKIE['yuser_id']) ){return false;}
		//get user
		//chack user level
		if( $_COOKIE['yuser_level'] <=$level)
		{
			return true;
		}
		return false;
	}//end permission
	//y_user::permission(5);
	
	/*
	name:_checkCredentials
	description:checks if user exists in users table and password match to
	users password in database.
	input:none
	output:user data from database(make sure mail and password are correct).
	*/
    protected function _checkCredentials()
    {
        $stmt = $this->_db->prepare('SELECT * FROM user WHERE mail=?');
        $stmt->execute(array($this->_email));
		
        
		if ($stmt->rowCount() > 0) 
		{

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $submitted_pass = md5($this->_password);
            if ($submitted_pass == $user['pas'])//pas = password 
			{
                return $user;
            }
        }
        return false;
    }//end _checkCredentials

	/*
	name:getUser
	description:calls user data from database
	input:none
	output:user data from database(make sure mail and password are correct).
	*/
    public function getUser()
    {
		//call user from db
		$this->_user = $this->_checkCredentials();
		//return it
        return $this->_user;
    }//end getUser
	
	/*
	name:get_by_id
	description:gets a user by its id from the database
	input:users id(int)
	output:user data as array or false if not found in db.
	*/
	public function get_by_id($id)
    {
		if(!isset($id)){return;}
		$stmt = $this->_db->prepare('SELECT * FROM user WHERE id=?');
        $stmt->execute(array($id));
        if ($stmt->rowCount() > 0) 
		{
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			return $user;
		}
		return false;
	}//end get_by_id
	
	/*
	name:create user
	description:creates new user in users table
	input:
	-$name(string): the user name.
	-$level(int):the user premmition level (0 for admin,1 for subadmin etc...).
	-$activated(int):if user is activated (0=not activated,1= activcated).
	output:last inserted user id, or false if user exists
	*/
	public function createUser($name="new user",$level=3,$activated=0)
    {
		
		//convert password to md5
		$pass = md5($this->_password);
		$mail = $this->_email;
		
		//chack if exist (if exist exit and return false)
		if($this->user_exist($mail)){return false;}
		
		$query = "INSERT INTO user ( name,mail,pas,user_level,activated )
		values ( '$name','$mail','$pass','$level','$activated' )";
		//preper statment
		$stmt = $this->_db->prepare($query);
		//execute
		$stmt->execute();
		return $this->_db->lastInsertId();
		//print_r($stmt->errorInfo());
		
	}//end createUser
	
	public function user_exist($mail)
    {
		//call data from sql
		$stmt = $this->_db->prepare('SELECT * FROM user WHERE mail=?');
        $stmt->execute(array($mail));
		//activate user
		if ($stmt->rowCount() > 0) 
		{
			//get row
			//$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return true;
			
		}
		return false;
	}//end user_exist
	
	/*
	name:activate account
	description:activates account by turning activated value in db to 1
	input:
	-$id(int):the user id
	output:null
	*/
	public function activate_account($id)
    {
	
		//update user to active
		$query = "UPDATE user SET   activated =1 WHERE id=$id ";
		//preper statment
		$stmt = $this->_db->prepare($query);
		//execute
		$stmt->execute();
	}//end activate_account
	
}//end y_user

/*
//example usage----------

//////login

require_once('user_class.php');

$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

$email ="tst@bla.com";//$_POST['email']
$pass = "123";//$_POST['password']
$yuser = new y_user($pdo, $email,$pass );
$user_id = $yuser->login();

if ($user_id) 
{
    echo 'Logged it as user id: '.$user_id;
    $userData = $yuser->getUser();
    // do stuff
} else {
    echo 'Invalid login';
}

//////get user

require_once('user_class.php');

$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

$email ="tst@bla.com";//$_POST['email']
$pass = "123";//$_POST['password']
$yuser = new y_user($pdo, $email,$pass );

$user_data = $yuser->getUser();
print_r($user_data);

//////get user_by_id

require_once('user_class.php');

$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

$email ="tst@bla.com";//$_POST['email']
$pass = "123";//$_POST['password']
$yuser = new y_user($pdo, $email,$pass );

$user_data = $yuser->get_by_id(2);
print_r($user_data);

/////create_user

require_once('user_class.php');

$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

$email ="tst@bla.com";//$_POST['email']
$pass = "123";//$_POST['password']
$yuser = new y_user($pdo, $email,$pass );

$yuser->createUser("some_name",5,1);

//////activate account--
$yuser->activate_account(2);

*/

/*
//sql tables
//user
//--id(int primary key)----name(varchar)----pas(varchar)-----mail(varchar)----
//-user_level(int)---activated(int)------
//activation codes
//----user_id(int)--activation_code(int)--------------------

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pas` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `activated` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

*/



?>