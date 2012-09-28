<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_faculty_sponser extends CI_Controller {

	/**
	 * Achiever / user manamanet
	 
	 */
	/*function __construct()
    {
        parent::CI_Controller();
    } */
	
	public function index()
	{
		
		$this->load->theme('ejmentor');
		$this->load->model('registrationmodel');
		$submit=$this->input->post('submit');
		if($submit){
			//make registration for user and store to db
			
			
			$this->registrationmodel->register_faculty_sponser();
			$this->load->library('email');
$this->email->from('admin@ejmentor.com', 'Admin');
$this->email->to($this->input->post('email'));
$this->email->subject('EJ Mentor User confirmation');
$this->email->message('Activation code:'.$this->input->post('hid'));
$this->email->send();
			}
		$this->load->view('frontend/register_faculty_sponser');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */