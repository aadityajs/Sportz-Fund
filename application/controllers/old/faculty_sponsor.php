<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faculty_sponsor extends CI_Controller {

		public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('ejmentor');
			 $this->load->model('achmodel');
			 $this->load->library('email');
			  $this->load->model('usermodel');
			   $this->load->model('facultymodel');
			  
			 $this->load->model('school');
			 $this->image_path = realpath(APPPATH . '../uploads');
			 $this->load->helper(array('form', 'url'));
			 $this->load->library("pagination");
	   }
	
	
	function faculty_sponsor_details()
	{
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
		
		$data['userdetail']=$this->facultymodel->getuser($user_id);
		$data['secureques']=$this->usermodel->get_ques();
		$data['school']=$this->school->get_school($data['userdetail']['school']);
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/account_detail',$data);
	}
	
	
	
	
	
	function annoucement()
	
	{
	
	$user_id=$this->session->userdata('userid');
	
	$data['announcement']=$this->facultymodel->get_announcement($user_id);
	
	if($data['announcement'])
	
	{
	
	$this->facultymodel->edit_announcement($user_id);
	
	$url=$this->input->post('url');
	
	redirect($url);

	
	}
	
	else
	
	{
	
	$this->facultymodel->add_announcement($user_id);
	
	$url=$this->input->post('url');
	
	redirect($url);

	
	
	}
	
	
	
	
	}
	
	
	

}
