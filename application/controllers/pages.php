<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {


	public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('sportzfund');
			$this->load->model('cmsmodel');
			 $this->load->library('email');
			 // $this->load->model('usermodel');
			 //$this->load->model('school');
			 //$this->image_path = realpath(APPPATH . '../uploads');
			// $this->load->helper(array('form', 'url'));
			 //$this->load->library("pagination");
	   }

	   function testimonial()
	{

		$this->load->theme('sportzfund');
		$this->load->view('frontend/testimonial');
	}
	 function contact_us()
	{

		//$this->load->theme('sportzfund');
		$submit=$this->input->post('contactsubmit');
		if($submit) {
			$cont_name = $this->input->post('cont_name');
			$email = $this->input->post('email');
			$phone_no = $this->input->post('phone_no');
			$content = $this->input->post('content');
			$reason = $this->input->post('reason');


			$this->cmsmodel->send_contact();


		}
		$this->load->view('frontend/contact_us');
	}
	 function why_sportzfund()
	{
		$cms_id =5;
		$data['cms']=$this->cmsmodel->get_page($cms_id);

		$this->load->theme('sportzfund');
		$this->load->view('frontend/cms',$data);
	}
	  function how_it_works()
	{
		$cms_id =6;
		$data['cms']=$this->cmsmodel->get_page($cms_id);

		$this->load->theme('sportzfund');
		$this->load->view('frontend/cms',$data);
	}
	 function program_highlights()
	{
		$cms_id =7;
		$data['cms']=$this->cmsmodel->get_page($cms_id);

		$this->load->theme('sportzfund');
		$this->load->view('frontend/cms',$data);
	}
	 function faq()
	{
		$cms_id =12;
		$data['cms']=$this->cmsmodel->get_page($cms_id);

		$this->load->theme('sportzfund');
		$this->load->view('frontend/cms',$data);
		
	}
	function did_i_win()
	{
		//$cms_id =11;
		//$data['cms']=$this->cmsmodel->get_page($cms_id);

		$submit=$this->input->post('searchsubmit');
		if($submit) {
			 $code = $this->input->post('code');

			$data['searchWin'] = $this->cmsmodel->search_code($code);
			
		}

		$this->load->theme('sportzfund');
		if($submit)
		{
		$this->load->view('frontend/did_i_win',$data);
		}
		else
		{
		$this->load->view('frontend/did_i_win');
		}
		//$this->load->view('frontend/cms',$data);
	}
	function tips_tricks()
	{
		$cms_id =13;
		$data['cms']=$this->cmsmodel->get_page($cms_id);

		$this->load->theme('sportzfund');
		$this->load->view('frontend/cms',$data);
	}
	public function about_us()
	{
		$cms_id = 1;
		$data['cms']=$this->cmsmodel->get_page($cms_id);
		$this->load->theme('sportzfund');
		$this->load->view('frontend/cms',$data);
	}
public function privacy_policy()
	{
		$cms_id = 4;
		$data['cms']=$this->cmsmodel->get_page($cms_id);
		$this->load->theme('sportzfund');
		$this->load->view('frontend/cms',$data);
	}
	 function help()
	{
		$cms_id = 14;
		$data['cms']=$this->cmsmodel->get_page($cms_id);
		$this->load->theme('sportzfund');
		$this->load->view('frontend/cms',$data);
	}

	 function site_rules()
	{
		$cms_id = 15;
		$data['cms']=$this->cmsmodel->get_page($cms_id);
		$this->load->theme('sportzfund');
		$this->load->view('frontend/cms',$data);
	}
	 function terms_conditions()
	{
		$cms_id = 16;
		$data['cms']=$this->cmsmodel->get_page($cms_id);
		$this->load->theme('sportzfund');
		$this->load->view('frontend/cms',$data);
	}
	 function customer_support()
	{
		$cms_id = 17;
		$data['cms']=$this->cmsmodel->get_page($cms_id);
		$this->load->theme('sportzfund');
		$this->load->view('frontend/cms',$data);
	}

	/*private function _get_email_template($template_id,$user_message){

	$template=$this->usermodel->get_template($template_id);
	$output=str_replace("{content}",$user_message,$template['template_content']);
	return $output;

}*/





	/*public function contact_us()
	{
	$submit=$this->input->post('submit');
		if($submit){
					$this->email->to($this->config->item("admin_email"), $this->config->item("admin_name"));
					$this->email->from($this->input->post('email'));
					$this->email->subject('Contact');
					$user_message = "Dear " .$this->config->item("admin_name"). "<br>";
					$this->email->message($user_message);

					$this->email->send();
		$this->cmsmodel->send_contact();

		}


		$this->load->theme('ejmentor');
		$this->load->view('frontend/contact_us');

	}public function faq()
	{
		$data['faq']=$this->cmsmodel->get_faq();
		$data['faq_in']=$this->cmsmodel->get_faq_in();
		$this->load->theme('ejmentor');
		$this->load->view('frontend/faq',$data);

	}*/

	public function contribute()
	{

		$cms_id = 3;
		$data['contribute']=$this->cmsmodel->get_page($cms_id);
		$this->load->theme('ejmentor');
		$this->load->view('frontend/contribute',$data);

	}





}