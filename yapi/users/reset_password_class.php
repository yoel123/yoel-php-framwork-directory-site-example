<?php
//example usage at the end
class y_reset_password
{
  
 

    protected $_db;       
 
    
	public function __construct(PDO $db) 
    {
       $this->_db = $db;
      
    }//end __construct 

	/*
	name:send_reset_mail
	description:send a activation mail to the user so he will activate his account. 
	input:
	-$mail(string):user mail
	-$messge(string):messge sent to the user the user.
	-$mail_title(string):the title of the mail the user will get
	-$reset_page(string):the page that will do the password reset.
	output:null
	*/
	public function send_reset_mail($mail,$reset_page,$messge="click the link to
	reset your password",$mail_title="reset your password")
    {
		//user mail
		$mail = $mail;
		//create activation code
		$code = rand(1000000, 9999999);
		$user_id = $this->get_user_by_maill($mail);
		//ifno user id exit
		if(!$user_id){echo "user dosnt exist";return;}
		//put in database
		$query = "INSERT INTO reset_pasword_codes ( user_id,reset_code )
		values ( '$user_id','$code' )";
		//preper statment
		$stmt = $this->_db->prepare($query);
		//execute
		$stmt->execute();
		//create activation link
		$messge .="<br><a href='".$reset_page."?code=".$code."'>activate account</a>";
		//send to user
		mail($mail,$mail_title,$messge );
	}
	
	public function get_user_by_maill($mail)
    {
		//call data from sql
		$stmt = $this->_db->prepare('SELECT * FROM user WHERE mail=?');
        $stmt->execute(array($mail));
		//activate user
		if ($stmt->rowCount() > 0) 
		{
			//get row
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return $row['id'];
		}
		return false;
	}
	
	/*
	name:do_reset
	description:resets password and sends it to user via email
	input:
	-$messge(string):messge sent to the user the user.
	-$mail_title(string):the title of the mail the user will get
	output:true/false, if successful return true
	*/
	public function do_reset($mail_title = "your new password",$messge = "this is your new password: ")
    {
		//if no code exit
		if(!isset($_GET['code'])){return false;}
		$code = $_GET['code'];
		//call data from sql
		$stmt = $this->_db->prepare('SELECT * FROM reset_pasword_codes WHERE reset_code=?');
        $stmt->execute(array($code));
		
		//change user password
		if ($stmt->rowCount() > 0) 
		{
			//get row
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			//get user_id
			$id = $row['user_id'];
			//delete record from table
			$this->delete_record($id);
			//get user by id
			$user = new y_user($this->_db,"","");
			$user = $user->get_by_id($id);
			//get user mail
			$mail = $user['mail'];
			//create password
			$new_pass = $this->generatePassword();
			//md5 for db
			$new_pass_db = md5($new_pass);
			//cange password
			$query = "UPDATE user SET  pas = '$new_pass_db'  WHERE id = $id ";
			//preper statment
			$stmt = $this->_db->prepare($query);
			//execute
			$stmt->execute();
			
			//add password to messge
			$messge .= $new_pass;
			//send email with new password
			mail($mail,$mail_title,$messge );
			return true;
		}
		return false;
	}//end do_reset
	
	public function generatePassword($length = 8) 
	{
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$count = mb_strlen($chars);

		for ($i = 0, $result = ''; $i < $length; $i++) 
		{
			$index = rand(0, $count - 1);
			$result .= mb_substr($chars, $index, 1);
		}

		return $result;
	}//end generatePassword
	
	public function delete_record($id) 
	{
		if(!isset($id)){return false;}
		$stmt = $this->_db->prepare('DELETE FROM reset_pasword_codes WHERE user_id = ? ');
        $stmt->execute(array($id));
		return true;
	}
	
}//endy_reset_password
/*
//example usage----------


*/

/*
//sql tables
//reset_pasword_codes
//----user_id(int)--reset_code(int)--------------------


-- --------------------------------------------------------

--
-- Table structure for table `reset_pasword_codes`
--

CREATE TABLE IF NOT EXISTS `reset_pasword_codes` (
  `user_id` int(11) NOT NULL,
  `reset_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

*/
?>