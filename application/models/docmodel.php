<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class Docmodel extends CI_Model {
	
	
	
	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->image_path = realpath(APPPATH . '../uploads');
		}
    

//===========================================================================================================	
	
	
	function doc_list(){
		$query=$this->db->get('docs');
		if( $query->num_rows()>0){
			return $query->result_array();
			
		}else{
		return false;
		}
	 }
	 
	 
	 function personal_doc_list(){
		$data['udetail'] = $this->usermodel->getuser($this->session->userdata('userid'));
	 	$option=array('school_id' => $data['udetail']['school']);
		$query=$this->db->get_where('docs',$option);
		if( $query->num_rows()>0){
			return $query->result_array();
			
		}else{
		return false;
		}
	 }
	 
	 
	function add_doc($id)
	 { 
	  if($_FILES['userfile']['name']!='')
   {
	   $config = array(
	   'allowed_types' => 'txt|pdf|doc|docx',
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
	  $data = array(
			   'user_id' => $id,
			   'docs' => $file_name,
			   'school_id' => $this->input->post('school'),
			    );
$this->db->insert('docs', $data);
		 
	 }
	 
	
}