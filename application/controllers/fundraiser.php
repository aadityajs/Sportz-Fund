<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fundraiser extends CI_Controller {

	/**
	 * Achiever / user manamanet
		// Aditya's API Credentils
		Credential		API Signature
		API Username	aditya_1325656136_biz_api1.gmail.com
		API Password	6GH39NJ44GEXLM4Y
		Signature		An5ns1Kso7MWUdW4ErQKJJJ4qi4-A6Ee3rJwZJbAwMZ3q58aoGULlnAT
		Request Date	4 Jan 2012 06:14:50 GMT
	 */

	public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			$this->load->theme('sportzfund');
			$this->load->helper('form');
			$this->load->library('upload');
			$this->load->model('usermodel');
			$this->load->library('email');

			//$this->load->library('paypal_lib');		//For PayPal IPN
			$this->load->library('paypal');				//For PayPal Pro
			$this->paypal->setup('aditya_1325656136_biz_api1.gmail.com', '6GH39NJ44GEXLM4Y', 'An5ns1Kso7MWUdW4ErQKJJJ4qi4-A6Ee3rJwZJbAwMZ3q58aoGULlnAT');
	   }

	public function index() {
		$data['allOrgList'] = $this->usermodel->listAllOrg();

		$this->load->view('frontend/list_fundraiser', $data);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */