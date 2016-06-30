<?php
//example usage at the end
 class ycrud
 {
	protected $_db;       
	protected $table; 
    protected $pk;//Primary Key of the Table	
	public $last_query;//Primary Key of the Table	
 
    
	public function __construct(PDO $db,$table) 
    {
       $this->_db = $db;
	   $this->table = $table;
       //default pk
	   $this->pk = 'id';
    }//end __construct 
	
	public function set_pk($pk)//set Primary Key
	{
		$this->pk = $pk;
	}//end set_pk
	
	public function create($vars) 
	{
		if(!isset($vars)){return false;}//no vars exit
		
		//get all array keys
		$cols = "`".implode('`,`',array_keys( $vars))."`";
		//get all array vals
		$vals = "'".implode("','", $vars)."'";
		
		$query = "INSERT INTO ".$this->table." (".$cols.") VALUES (".$vals.")";
		//preper statment
		$stmt = $this->_db->prepare($query);
		//echo $query;
		$this->last_query = $query;//for debug
		//execute
		$stmt->execute();
		return $stmt;
	}//end create
	
	public function update($id,$vars) 
	{
		if(!isset($vars) || !isset($id)){return false;}//no vars exit
		
		$update = "";
		$sep = '';//seprator
		foreach ($vars as $key => $value) 
		{
			$update  .= $sep."`" . $key . "` = '".$value."' ";
			$sep = ',';
		}
		//update user to active
		$query = "UPDATE  " . $this->table . " SET  $update  WHERE " . $this->pk . " =$id ";
		//preper statment
		$stmt = $this->_db->prepare($query);
		
		$this->last_query = $query;//for debug
		//execute
		$stmt->execute();
		return $stmt;
	}//end update

	public function delete($id) 
	{
		if(!isset($id)) {return false;}//no id exit
		
		$id = $id;
		
		$query = "DELETE FROM " . $this->table . " WHERE " . $this->pk . "= " . $id  ;
		
		//preper statment
		$stmt = $this->_db->prepare($query);
		$this->last_query = $query;//for debug
		//execute
		$stmt->execute();
		
		return $stmt;
		
	}//end delete
	
	public function get_by_id($id) 
	{
		if(!isset($id)) {return false;}//no id exit
		
		$id = $id;
		
		$query = "SELECT * FROM " . $this->table ." WHERE " . $this->pk . "=" . $id . " LIMIT 1";
		
		//preper statment
		$stmt = $this->_db->prepare($query);
		$this->last_query = $query;//for debug
		//execute
		$stmt->execute();
		
		if ($stmt->rowCount() > 0) 
		{
			//get row
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
		}
	}//endget_by_id
	
	public function get_all() 
	{
		$query = "SELECT * FROM " . $this->table;
		
		//preper statment
		$stmt = $this->_db->prepare($query);
		$this->last_query = $query;//for debug
		//execute
		$stmt->execute();
		
		if ($stmt->rowCount() > 0) 
		{
			//get row
			$rows = $stmt->fetchAll();
			return $rows;
		}
	}//end get_all
	public function get_where($where) 
	{
		if(!isset($where)) {return false;}//no id exit
		
		
		$query = "SELECT * FROM " . $this->table ." WHERE " .$where;
		
		//preper statment
		$stmt = $this->_db->prepare($query);
		$this->last_query = $query;//for debug
		//execute
		$stmt->execute();
		
		if ($stmt->rowCount() > 0) 
		{
			//get rows
			$rows = $stmt->fetchAll();
			return $rows;
		}
	}//end get_where
	
	public function query($q) 
	{
			$query = $q;
		
		//preper statment
		$stmt = $this->_db->prepare($query);
		$this->last_query = $query;//for debug
		//execute
		$stmt->execute();
		
		if ($stmt->rowCount() > 0) 
		{
			//get rows
			$rows = $stmt->fetchAll();
			return $rows;
		}
	}//end query
}//end ycrud
 

 
?>