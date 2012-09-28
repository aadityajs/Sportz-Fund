<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class Achmodel extends CI_Model {

	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->image_path = realpath(APPPATH . '../uploads');
		
				
		$this->load->database();
		}
		
		function achiever_add() {
		   if($_FILES['userfile']['name']!='')
   {
	   $config = array(
		'allowed_types' => 'jpg|jpeg|gif|png',
		'upload_path' => $this->image_path,
		'max_size' => 2000
	   );   
   		$this->load->library('upload', $config);  
	   if ( ! $this->upload->do_upload())
	   {  
	   
	  
	   
	   $image_data="";
		$this->session->set_flashdata('error',$this->upload->display_errors('',''));  
	   } 
	   else
	   { 
	   
	   
		$image_data = $this->upload->data("");
	   }
	   $file_name=$image_data['file_name'];
	   $file_size=$image_data['file_size'];
	   $file_ext=$image_data['file_ext'];    
   }   
    
  else
  {
   $image_data="";  
   $file_name='';
   $file_size='';
   $file_ext='';    
  }
		
		$data=array(
		
		'fname'=>$this->input->post('achfname'),
		 'image'=>$file_name,
		 'lname'=>$this->input->post('achlname'),
		 'email'=>$this->input->post('achemail'),
		 'school'=>$this->input->post('school'),
		 'sex'=>$this->input->post('sex'),
		 'grade'=>$this->input->post('achgrade'),
		 'account_type'=>'Achiever_student',
		 'temp_password'=>$this->input->post('temp_password'),
		 'achiver_coordinator/faculty_sponser'=>$this->input->post('achiver_coordinator/faculty_sponser'),
		 'mid_initial'=>$this->input->post('achmname'),
		 );
		 
		  $this->db->insert('user', $data);
		  
		   $ach_id=$this->db->insert_id() ;
		  
		  
		  
		  $data2=array(
		  
		  'achiever_id'=>$ach_id,
		 'coordinator_id'=>$this->input->post('achiver_coordinator/faculty_sponser')
		  
		  );
		  $this->db->insert('achcoordinator_achiever_relation', $data2);
	}
	
	function get_achiever($limit, $start)
	 { 
	 	$this->db->limit($limit, $start);
		$option=array('account_type' => 'Achiever_student');
		 $this->db->join('schools', 'schools.school_id=user.school');
		$query=$this->db->get_where('user',$option);
		if($query->num_rows()>0)
		{  
			$data = $query->result_array();	
				
		}
		else{
		$data="";
		}
		
		return $data;
		 
	 }
	 function get_ach($id)
	 { 
		$option=array('user_id' => $id);
		$query=$this->db->get_where('user',$option);
		if($query->num_rows()>0)
		{  
			$data = $query->row_array();	
				
		}
		else{
		$data="";
		}
		
		return $data;
		 
	 }
	 
	 public function record_count() {
	 	$this->db->where('account_type', 'Achiever_student');
		$this->db->from('user');
		return $this->db->count_all_results();
    }
	 
function my_achievers($limit, $start,$id)
	 { 
	 	$this->db->limit($limit, $start);
		$this->db->select('*, user.is_active as active');
		$this->db->where('account_type', 'Achiever_student');
		$this->db->where('coordinator_id', $id);
		//$this->db->where('available_days !=', "");
		$this->db->join('schools', 'schools.school_id=user.school');
		$this->db->join('achcoordinator_achiever_relation', 'achcoordinator_achiever_relation.achiever_id=user.user_id');
		$query=$this->db->get_where('user');
		
		
		if($query->num_rows()>0)
		{  
			$data = $query->result_array();	
				
		}
		else{
		$data="";
		}
		
		return $data;
		 
	 }
	 
	 
	 function achiever_add_agreement()
	{
	
	$id=$this->input->post('uid123');
	$data = array(
               'parent_fname' => $this->input->post('pfname'),
			   'parent_lname' => $this->input->post('plname'),
			   'parent_email' => $this->input->post('pemail'),
			   'return_agrmnt' => 'Y'
			   
               
            );

		$this->db->where('user_id', $id);
		$this->db->update('user', $data); 	 
	
	}
	
	
	
	function mentor_select($achiever_id)
	{
	
	
	
	$days=$this->input->post('mentoring_days');
	
	
	
	 
	     $day=implode(",",$days);
		 
		 
		 $check=$this->mentor_relation_check($achiever_id);
		 
		 if($check<1)
		 
		 
		
		 
		 {
	
	$data=array(	     
		
		'mentor_id'=>$this->input->post('mentor'),
		 'achiever_id'=>$achiever_id,
		 'mentoring_day'=>$day,
		 
		 );
		 
		 $this->db->insert('mentor_achiever_relation', $data);
		 
		 $dataf = array();
		$optionf=array('user_id' => $achiever_id);
		$this->db->join('schools', 'schools.school_id=user.school');
		$queryf=$this->db->get_where('user',$optionf,1);
		if($queryf->num_rows()>0)
		{
			$dataf = $queryf->row_array();
			
					
		}
		
		
		
		  
		  
		  
		if(in_array('M',$days))
		
		{
		
		$data = array(
               'mon' =>'Meeting with '. $dataf['fname'].'  at '.$dataf['school_name'].' school ',
			  
			   
               
            );

		$this->db->where('user_id', $this->input->post('mentor'));
		$this->db->update('availability', $data); 	 
		
		
		}
		if(in_array('Tu',$days))
		
		{
		
		$data = array(
               'tue' =>'Meeting with'.$dataf['fname'].' at '.$dataf['school_name'].' school ',
			  
			   
               
            );

		$this->db->where('user_id', $this->input->post('mentor'));
		$this->db->update('availability', $data); 	 
		
		
		}
		if(in_array('W',$days))
		
		{
		
		$data = array(
               'wed' =>'Meeting with'.$dataf['fname'].' at '.$dataf['school_name'].' school ',
			  
			   
               
            );

		$this->db->where('user_id', $this->input->post('mentor'));
		$this->db->update('availability', $data); 	 
		
		
		}
		if(in_array('Th',$days))
		
		{
		
		$data = array(
               'thu' =>'Meeting with'.$dataf['fname'].' at '.$dataf['school_name'].' school ',
			  
			   
               
            );

		$this->db->where('user_id', $this->input->post('mentor'));
		$this->db->update('availability', $data); 	 
		
		
		}
		  
		  
		  
		   $ach_id=$this->db->insert_id() ;
	
	
	}
	
	
	}
	
	
	function  mentor_relation_check($achiever_id)
	{
	
	$data = array();
		//$option=array('username' => $uname);
		
		$this->db->where('achiever_id =', $achiever_id);
		$query=$this->db->get('mentor_achiever_relation');
		
	    $data = $query->num_rows();
			
					
		
		$query->free_result();
		 return $data;
	
	
	
	
	}
	
	function get_my_mentor($user_id)
	{
		 	
		
		$this->db->where('achiever_id', $user_id);
		$this->db->join('user', 'user.user_id=mentor_achiever_relation.mentor_id');
		$this->db->join('availability', 'mentor_achiever_relation.mentor_id=availability.user_id');
		$this->db->join('faculty_mentor_relation', 'mentor_achiever_relation.mentor_id=faculty_mentor_relation.mentor_id');
		$query=$this->db->get_where('mentor_achiever_relation');
		
		if($query->num_rows()>0)
		{
			
			
			foreach($query->result_array() as $row)
					{
					
						$data = $row;
						
					}
			
			return $data;
			
					
		}
		
		//else $data="";
		
		$query->free_result();
		
		 
	
	}

}