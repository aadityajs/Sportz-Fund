<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Achiever_coordinator extends CI_Controller {

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
	
	
	function achiever_coordinator_details()
	{
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
		$data['myachdetail']=$this->usermodel->getuser($user_id);
		
		//$achivercoordi_id=$data['myachdetail']['achiver_coordinator/faculty_sponser'];
		if(!empty($user_id)){
				$data['userdetail']=$this->usermodel->getuser($user_id);
				//$data['achivercoordi']=$this->usermodel->getuser($achivercoordi_id);
		        $data['school']=$this->school->get_school($data['userdetail']['school']);
			}
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/achiever_coordinator_details',$data);
	}

}
