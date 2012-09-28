<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faculty_coordinator_back extends CI_Controller {

		public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('ejmentor');
			 $this->load->model('mentor_model');
			 $this->load->model('usermodel');
			 $this->load->model('school');
			 $this->load->library('email');
	   }
	
	
	/*function show()
	{
	    //$this->load->theme('ejmentor');
		$this->load->view('frontend/list');
	}
	*/
	
	function add_mentor()
	{
	
	$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
	
	
	$submit=$this->input->post('submit');
		if($submit){
	$this->mentor_model->mentor_add();
	redirect("achiever_back/achiever_added/");
			}
	}
	function mentor_list()
	{
		
			$config = array();
	        $config["base_url"] = base_url() . "faculty_coordinator_back/mentor_list";
	        $config["total_rows"] = $this->mentor_model->record_count();
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['achieverdetail']=$this->mentor_model->get_mentor($config["per_page"], $page);
		
		$user_id=$this->session->userdata('userid');
		
		if(!empty($user_id)){
		$data['userdetail']=$this->usermodel->getuser($user_id);
		$data['school']=$this->school->get_school($data['userdetail']['school']);
		}
		 $data["links"] = $this->pagination->create_links();
		
		$data['password']=$this->_generatePassword();
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/mentor_list',$data);
	}
	function mentor_added(){
			 $this->load->theme('ejmentor');
			$this->load->view('frontend/achiever_added');
	}
	 
	 
	 
	 function mentor_details()
	{   
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
	   $id=$this->uri->segment(3);
	   
	   
		$data['myachdetail']=$this->mentor_model->get_details($id);
		$faculty_cordinator_id=$data['myachdetail']['achiver_coordinator/faculty_sponser'];
		
		
		
		if(!empty($user_id)){
				$data['userdetail']=$this->usermodel->getuser($user_id);
				$data['faculty_coordinator']=$this->usermodel->getuser($faculty_cordinator_id);
		        $data['school']=$this->school->get_school($data['userdetail']['school']);
			}
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/mentor_details',$data);
	}
	
	 
	  private function _generatePassword($length=9, $strength=0) {
	$vowels = 'aeuy';
	$consonants = 'bdghjmnpqrstvz';
	if ($strength & 1) {
		$consonants .= 'BDGHJLMNPQRSTVWXZ';
	}
	if ($strength & 2) {
		$vowels .= "AEUY";
	}
	if ($strength & 4) {
		$consonants .= '23456789';
	}
	if ($strength & 8) {
		$consonants .= '@#$%';
	}
 
	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}
	
	 
	 
	 
}
