<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Docs extends CI_Controller {

	/**
	 * Achiever / user manamanet
	 
	 */ 
	 
	public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('ejmentor');
			$this->load->model('docmodel');
			$this->load->model('usermodel');
			 $this->load->library('email');
	   }
	
	function doc_list()
	{	
		$user_id=$this->session->userdata('userid');
		$data['docs']=$this->docmodel->doc_list();
		$data['docs_p']=$this->docmodel->personal_doc_list();
		$data['userdetail']=$this->usermodel->getuser($user_id);
		$this->load->theme('ejmentor');
		$this->load->view('frontend/document_list',$data);
	}
	
	
	function add_docs($id)
	{
		
	$id=$this->session->userdata('userid');
	
	$this->docmodel->add_doc($id);
	
	redirect('docs/doc_list');
	
	}
	

	 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */