<?php
 
class ytable
{
	protected $data;//table rows data       
	protected $table_class;//table css class 
	protected $table_head;//table head html 
	protected $table_body;//table body html 
	protected $html;//holds final html 
   
    
	public function __construct($data) 
    {
       $this->data = $data;
	   $this->table_head = 0;//mark as 0
	   $this->table_body = 0;//mark as 0
    }//end __construct 
	
	public function set_table_head($arr=0)
	{
		$html = "<thead><tr>";
		
		//defult use data array keys
		if($arr == 0)
		{
			
			  
		
			$html .="<th>". implode('</th><th>', array_keys($this->data))."</th>";
		
			
		}
		else
		{//use the given array
			if(!is_array($arr)){return;}//if its not array exit
			foreach($arr as $val)
			{
				$html .= "<th>".$val."</th>";
			}
			
		}
		$html .="</tr></thead>";
		$this->table_head = $html;
	}//end set_table_head
	
	public function set_table_body()
	{
		if(!isset($this->data) || !is_array($this->data)){return;}
		
		$html = "<tbody>";
		foreach ($this->data as $row)
		{
			$html .= " <tr>";
			$html .=  "<td>".implode('</td><td>', $row)."</td>";
			$html .= " </tr>";
		}
		$html .= "</tbody>";
		$this->table_body = $html;
	}//end set_table_body
	
	public function create()
	{
		//if no table head created by user
		if($this->table_head == 0)
		{
			$this->set_table_head();
		}
		if($this->table_body == 0)
		{
			$this->set_table_body();
		}
		//create table
		$this->html .="<table class='".$this->table_class."'>";
		$this->html .= $this->table_head;
		$this->html .= $this->table_body;
		$this->html .="</table>";
	}

}//end ytable
?>