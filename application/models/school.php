<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class School extends CI_Model {
	
	
	
	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}
    

//===========================================================================================================	
	
	
	 function schoollist()
	 { 
		$data = array();
		
		$query=$this->db->get('schools');
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $row)
					{
					
						$data[$row['school_id']] = $row['school_name'];
						
					}
			
					
		}
		$query->free_result();
		 return $data;
		 
	 }
	 
	 	 function school_list($zip)
	 { 
		$data = array();
		
		
		$option=array('zip' => $zip);
		$query=$this->db->get_where('schools',$option);
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $row)
					{
					
						$data[] = $row;
						
					}
			
					
		}
		
		
		$query->free_result();
		 return $data;
		 
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	function  get_school($id)
	 
	 { 
	 
	 //die($id);
	 
	 $option=array('school_id' => $id);
		
		$query=$this->db->get_where('schools',$option);
		if($query->num_rows()>0)
		{  
			$data = $query->result_array();	
				
		}
		else{
		$data="";
		}
		
		return $data;
		 
	 }
	 
	 
	 
	 
	
	
	
}