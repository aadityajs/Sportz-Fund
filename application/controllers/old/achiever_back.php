<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Achiever_back extends CI_Controller {

		public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('ejmentor');
			 $this->load->model('achmodel');
			 $this->load->library('email');
			  $this->load->model('usermodel');
			 $this->load->model('school');
			 $this->image_path = realpath(APPPATH . '../uploads');
			 $this->load->helper(array('form', 'url'));
			 $this->load->library("pagination");
	   }
	
	
	/*function show()
	{
	    //$this->load->theme('ejmentor');
		$this->load->view('frontend/list');
	}
	*/
	
	function add_achiever()
	{
	
	$submit=$this->input->post('submit');
		if($submit){
		
		$this->achmodel->achiever_add(); 
	redirect("achiever_back/achiever_added/");
			}
	}
	function achiever_details()
	{
			$config = array();
	        $config["base_url"] = base_url() . "achiever/achiever_details";
	        $config["total_rows"] = $this->achmodel->record_count();
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
		$data['achieverdetail']=$this->achmodel->get_achiever($config["per_page"], $page);
	
		
		
		$user_id=$this->session->userdata('userid');
		if(!empty($user_id)){
				$data['userdetail']=$this->usermodel->getuser($user_id);
		        $data['school']=$this->school->get_school($data['userdetail']['school']);
		}
		 $data["links"] = $this->pagination->create_links();
		 $data['password']=$this->_generatePassword();
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/list',$data);
		
	}
	function achiever_added(){
			 $this->load->theme('ejmentor');
			$this->load->view('frontend/achiever_added');
	}
	
	function my_achiever()
	{   
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
	     $id=$this->uri->segment(3);
		$data['myachdetail']=$this->achmodel->get_ach($id);
		
		$achivercoordi_id=$data['myachdetail']['achiver_coordinator/faculty_sponser'];
		if(!empty($user_id)){
				$data['userdetail']=$this->usermodel->getuser($user_id);
				$data['achivercoordi']=$this->usermodel->getuser($achivercoordi_id);
		        $data['school']=$this->school->get_school($data['userdetail']['school']);
			}
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/my_achiever',$data);
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
