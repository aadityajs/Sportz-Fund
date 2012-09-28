<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('admintheme');
			 $this->load->model('achmodel');
			 $this->load->library('email');
			  $this->load->model('usermodel');
			  $this->load->model('mentor_model');
			 $this->load->model('school');
			 $this->image_path = realpath(APPPATH . '../uploads');
			 $this->load->helper(array('form', 'url'));
			 $this->load->library("pagination");
			  $this->load->model('adminmodel');

	   }
	   public function index()
	{

		$this->load->view('backend/login');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */