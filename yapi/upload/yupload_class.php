<?php
 class yupload
 {
	private $dest_path;//the dir the file will be uploaded to
    private $ext;//file extantion allowed 
    private $allow_all;//allow all file types
    private $max_size;//max file size allowed 
    private $upload_name;//upload file name
	public $last_error;//the last error recorded  
	/*
	name:set_dir
	description:sets file upload dir (where the files will be saved)
	input:
	-$path(string): the path to upload dir
	output: null
	*/
	public function set_dir($path)
	{
   		$this->dest_path  =   $path;
        $this->allow_all =   false;
    }//end set_dir
	
	/*
	name:allow_all_formats
	description:allow upload of all file types
	input:  null
	output: null
	*/
	public function allow_all_formats()
	{
        $this->allow_all =   true;
    }//end allow_all_formats
	
	/*
	name:set_max_size
	description:set maximum upload file size in megabits
	input:  
	-$sizeMB(int): the maximum size of file uploaded in megabits
	output: null
	*/
	public function set_max_size($sizeMB)
	{   
		$this->max_size  =   $sizeMB * (1024*1024);
    }//end set_max_size
	
	/*
	name:set_extensions
	description:set allowed file types user can upload
	input:  
	-$exts(array): aray of extantion names example: array('jpg','jpeg','png','gif')
	output: null
	*/
	public function set_extensions($exts)
	{
        $this->ext = $exts;
    }//end set_extensions
	
	/*
	name:get_upload_name
	description:get uploaded file name
	input: null 
	output: null
	*/
	public function get_upload_name()
	{
        return $this->upload_name;
    }//end get_upload_name
	
	/*
	name:get_upload_name
	description:get uploaded file extension
	input: 
	-$string: full file name
	output: null
	*/
	public function get_extension($string)
	{
        $ext = "";
        try
		{
            $parts = explode(".",$string);//splite name by .
            $ext = strtolower($parts[count($parts)-1]);//the last part is the extension
        }catch(Exception $c){
            $ext    =   "";
        }
        return $ext;
    }//end get_extension
	
	/*
	name:get_full_file_path
	description:gets the full path of uploaded file
	input: 
	-$input_name(string):the name of the upload input
	output: string, new files full path or false if thers no uploaded file
	*/
	public function get_full_file_path($input_name)
	{
		//if not uploaded exit
		if(!isset($_FILES[$input_name]))
		{
			$this->last_error = 'no file uploaded';
			return false;
			
		}
		
		return $this->dest_path.$_FILES[$input_name]["name"];
	}//end get_full_file_name
	
	/*
	name:upload_file
	description:uploads the file
	input: 
	-$input_name(string):the name of the upload input
	output: true/false(if successful)
	*/
	public function upload_file($input_name)
	{
		//if not uploaded exit
		if(!isset($_FILES[$input_name]))
		{
			$this->last_error = 'no file uploaded';
			return false;
			
		}
		
		$size   =   $_FILES[$input_name]["size"];
        $name   =   $_FILES[$input_name]["name"];
		$ext    =   $this->get_extension($name);
		
		//check if target dir is folder
		if(!is_dir($this->dest_path))
		{
			$this->last_error = "path is not a directory";
			return false;
		}
		//check if target dir is writble
		if(!is_writable($this->dest_path))
		{
			$this->last_error = "path is not writable";
			return false;
		}
		//chack if uploaded file
		if(!isset($_FILES[$input_name]))
		{
			//echo $input_name;
			//print_r($_FILES);
			$this->last_error = "no file uploaded";
		    return false;
		}
		//check file size
		if($size>$this->max_size)
		{
			$this->last_error = "exceeded file size limit";
			return false;
		}
		//chack if file already exists
		//if(file_exists ()){}
		
		//check extension
		if(!$this->allow_all && !in_array($ext,$this->ext))
		{
			$this->last_error = "this file type is not allowed";
			return false;
		}

		
		//do upload
		 if(move_uploaded_file($_FILES[$input_name]["tmp_name"],$this->dest_path.$name))
		 {
			$this->upload_name = $this->dest_path.$name ;
			$this->last_error =	"";
			return true;
		 }
		 
		 $this->last_error = "couldn't upload file: ".$_FILES[$input_name]['error'];
		 return false;
                
	}//end upload_file
	
	/*
	name:yfile_exists
	description:check if uploaded fie exists
	input: 
	-$input_name(string):the name of the upload input
	output: true/false(if exists)
	*/
	public function yfile_exists($input_name)
	{
		$target_file = $this->get_full_file_path($input_name);
		if (file_exists($target_file))
		{
			return true;
		}
		return false;
	}//end yfile_exists
	 
}//end yupload class

 /*
//example usage----------
$upload = new yupload();
$upload->set_dir('images/');;
$upload->set_extensions(array('jpg','jpeg','png','gif'));  //allowed extensions list//
$upload->set_max_size(2.5); //set max file size to be allowed in MB//

if($upload->upload_file('img_upload') && isset($_POST['img_upload']))
{        
    $image  =   $upload->get_upload_name(); //get uploaded file name
	echo '<div class="alert alert-success" role="alert">file uploaded</div>';
	

}else
{
	//upload failed
    echo $upload->last_error;
}


*/
 
?>