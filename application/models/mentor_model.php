<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class Mentor_model extends CI_Model {

	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->image_path = realpath(APPPATH . '../uploads');
		}
		
		function mentor_add() {
		
		
		
		
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
		 'account_type'=>'Mentor',
		 'temp_password'=>$this->input->post('temp_password'),
		 'achiver_coordinator/faculty_sponser'=>$this->input->post('achiver_coordinator/faculty_sponser'),
		 'mid_initial'=>$this->input->post('achmname'),
		 'available_days'=>'M,Tu,W,Th',
		 );
		 
		  $this->db->insert('user', $data);
		  
		  $men_id=$this->db->insert_id() ;
		  
		  
		  
		  $data2=array(
		  
		  'mentor_id'=>$men_id,
		 'faculty_id'=>$this->input->post('achiver_coordinator/faculty_sponser'),
		  
		  );
		  
		  
		  $this->db->insert('faculty_mentor_relation', $data2);
		  
		  
		  $data3=array(
		  
		  'user_id'=>$men_id,
		 
		  
		  );
		  
		  
		  $this->db->insert('availability', $data3);
		  
	}
	
	function get_mentor($limit, $start)
	 {  
	   
	 	$this->db->limit($limit, $start);
		$option=array('user.account_type' => 'Mentor');
		$this->db->join('schools', 'schools.school_id=user.school');
		$this->db->join('availability', 'user.user_id=availability.user_id');
		//$this->db->join('mentor_achiever_relation', 'mentor_achiever_relation.mentor_id=user.user_id');
		//$this->db->join('user as u2', 'u2.user_id=mentor_achiever_relation.achiever_id');
		
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
	 
	function get_achiever_relatedmentors(){
		$query=$this->db->query("SELECT a.mentor_id, a.achiever_id, b.fname, b.lname
FROM ejmentor_mentor_achiever_relation a
LEFT JOIN ejmentor_user b ON ( a.achiever_id = b.user_id )");
		
		if($query->num_rows()>0)
		{  
			$data = $query->result_array();	
				
		}
		else{
		$data="";
		}
		
		return $data;
	}
	
	
	
	 function find_mentor($school,$limit, $start)
	 { 
	 	$this->db->limit($limit, $start);
		$option=array('account_type' => 'Mentor','mentor_mentorschool_relation.mentor_school'=>$school);
		$this->db->join('schools', 'schools.school_id=user.school');
		$this->db->join('mentor_mentorschool_relation', 'mentor_mentorschool_relation.mentor_id=user.user_id');
		$this->db->where('available_days !=', "");
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
	 
	 
	 
	 	function my_mentors($limit, $start,$id)
	 { 
	 	$this->db->limit($limit, $start);
		$this->db->select('*, user.is_active as active');
		$this->db->where('account_type', 'Mentor');
		$this->db->where('faculty_id', $id);
		$this->db->where('available_days !=', "");
		$this->db->join('schools', 'schools.school_id=user.school');
		$this->db->join('faculty_mentor_relation', 'faculty_mentor_relation.mentor_id=user.user_id');
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
	 
	 
	 
	  function getuser($id, $fac_id)
	 { 
		$data = array();
		$option=array('user_id' => $id, 'announcement.added_by'=> $fac_id);
		$this->db->join('faculty_mentor_relation', 'user.user_id=faculty_mentor_relation.mentor_id');
		$this->db->join('announcement', 'announcement.added_by=faculty_mentor_relation.faculty_id');
		$query=$this->db->get_where('user',$option,1);
		if($query->num_rows()>0)
		{
			$data = $query->row_array();
			
					
		}
		$query->free_result();
		 return $data;
		 
	 }
	 
	 
 function add_mentor_school($user_id)
 {
 
 $menschool=$this->_get_mentor_school($user_id,$this->input->post('school_id'));
 
 if(!$menschool)
 
 {
 


 
 $data=array(
		
		'mentor_school'=>$this->input->post('school_id'),
		 'mentor_id'=>$user_id,
		 );
		 
		  $this->db->insert('mentor_mentorschool_relation', $data);
 
 
 }
 
 
 
 }
 
 
 function delete_mentor_school($id)
 {
 
 
  
	$this->db->where('id', $id);
    $this->db->delete('mentor_mentorschool_relation'); 
	  
 
 
 }
 
 
 private function _get_mentor_school($id,$school_id)
 
 {
 
 
 $data = array();
		$option=array('mentor_id' => $id, 'mentor_school'=> $school_id);
		
		$query=$this->db->get_where('mentor_mentorschool_relation',$option);
		if($query->num_rows()>0)
		{
			$data = $query->row_array();
			
					
		}
		$query->free_result();
		 return $data;
 
 
 
 
 }
 
 
 function list_mentor_school($id)
 
 {
 
 
 $data = array();
		$option=array('mentor_id' => $id);
		$this->db->join('schools', 'schools.school_id=mentor_mentorschool_relation.mentor_school');
		$query=$this->db->get_where('mentor_mentorschool_relation',$option);
		if($query->num_rows()>0)
		{
			
			
			foreach($query->result_array() as $row)
					{
					
						$data[] = $row;
						
					}
			//$data = $query->row_array();
			
					
		}
		$query->free_result();
		 return $data;
 
 
 
 
 }
 
 
 
	 
	 
	 
	 	 function get_details($id)
	 { 
		$option=array('user.user_id' => $id);
		$this->db->join('faculty_mentor_relation', 'user.user_id=faculty_mentor_relation.mentor_id');
		$this->db->join('availability', 'user.user_id=availability.user_id');
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
	 	$this->db->where('account_type', 'Mentor');
		$this->db->from('user');
		return $this->db->count_all_results();
    }
	 
	 
	 
	 function get_my_achievers($user_id)
	 {
	 
	 	$this->db->select('*,u2.fname as fnm,u2.email as emailco,u2.image as imageco,u1.fname as fname,u1.lname as lname,u1.email as email,u1.image as image,u1.about_me as about_me,u1.sex as sex,u1.user_id as user_id,u1.school as school,u1.fav_sub as fav_sub,u1.least_fav_sub as least_fav_sub,u1.fav_food as fav_food');
		$this->db->where('mentor_id', $user_id);
		$this->db->join('user u1', 'u1.user_id=mentor_achiever_relation.achiever_id');
		
		$this->db->join('schools', 'u1.school=schools.school_id');
		$this->db->join('ejmentor_achcoordinator_achiever_relation', 'mentor_achiever_relation.achiever_id=ejmentor_achcoordinator_achiever_relation.achiever_id');
		$this->db->join('user u2', 'u2.user_id = ejmentor_achcoordinator_achiever_relation.coordinator_id');
		$query=$this->db->get_where('mentor_achiever_relation');
		
		if($query->num_rows()>0)
		{
			
			
			foreach($query->result_array() as $row)
					{
					
						$data[] = $row;
						
					}
			
			return $data;
			
					
		}
		
		//else $data="";
		
		$query->free_result();
		
		 
	 
	 
	 
	 
	 
	 }


}