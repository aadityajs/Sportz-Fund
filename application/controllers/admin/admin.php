<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('ejmentor');
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
	
	function login()

{

		if ($this->input->post('email') && $this->input->post('password'))
		{
			$u = $this->input->post('email');
			$pw = $this->input->post('password');
			
			$stat=$this->adminmodel->verifyAdmin($u,$pw);
			$session_id = $this->session->userdata('adminid');
			//$usertype=	 $this->session->userdata('usertype');	
			
			
			//die($usertype);	
			
			if($session_id != '')
			{
				//$data['user']=$this->usermodel->getuser($session_id);
				$current_date=strtotime(date('Y-m-d'));
				
				
				redirect("admin/admin_home");
					
			}
			else
			{
				
				$msg="Sorry. Email and password do not match.";
									
				$this->session->set_flashdata('message',$msg);
				
				redirect("admin/index/");
			
			          }
			
			       }
				   
		else {
		
		$msg="Sorry. Please type password and email";
									
				$this->session->set_flashdata('message',$msg);
				
				redirect("admin/index/");
		
		}
			
			     }
				 
				 
				 
    	function logout()
	    {
		
		$this->session->unset_userdata('adminid');
		 
		$this->session->set_flashdata('error', 'You have been logged out from the system.'); 
		
		redirect('admin/index/','refresh');	
	
	    }
		function admin_home()
		{
			$this->load->view('backend/admin_details');
		}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */