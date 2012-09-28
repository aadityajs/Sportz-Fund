<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class Facultymodel extends CI_Model {
	
	
	
	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->helper('date');
		}
    

//===========================================================================================================	
	
	
	 function get_announcement($id)
	 { 
		$option=array('added_by' => $id);
		
		$query=$this->db->get_where('announcement',$option);
		if($query->num_rows()>0)
		{
			$data = $query->result_array();	
			
					
		}
		
		else
		
		{
		
		
		$data ="";
		
		}
		$query->free_result();
		 return $data;
		 
	 }
	 
	 
	 
	 function add_announcement($id)
	 
	 {
	 
	  $data = array(
			   'added_by' => $id,
			   'announcement' => $this->input->post('announcement'),
			  
			 
                 );

	
		 $this->db->insert('announcement', $data);
		
		
		}
	
	 
	function edit_announcement($id)
	 
	 {
	 
	// $datestring = "%Y-%m-%d";
$dt = time();

//$dt= mdate($datestring, $time);


	 
	  $data = array(
			   
			   'announcement' => $this->input->post('announcement'),
			  'announce_date' => $dt,
			 
                 );

	    $this->db->where('added_by', $id);
		 $this->db->update('announcement', $data);
		
		
		}
		
		
	 function getuser($id)
	 { 
		$data = array();
		$option=array('user_id' => $id, 'announcement.added_by'=> $id);
		$this->db->join('announcement', 'announcement.added_by=user.user_id');
		$query=$this->db->get_where('user',$option,1);
		if($query->num_rows()>0)
		{
			$data = $query->row_array();
			
					
		}
		$query->free_result();
		 return $data;
		 
	 }
	
	
}