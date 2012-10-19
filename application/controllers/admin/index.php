<?php

class index extends CI_Controller {



	//php 5 constructor
	function __construct()
	{
		parent::__construct();
		$this->load->theme('admintheme');
		$this->load->model('adminmodel');
		$this->load->model('adminorganizationmodel');
		$this->load->model('admindonationmodel');
		$this->load->model('adminteammodel');
		$this->load->model('adminplayermodel');
		$this->load->model('adminwinnermodel');

	}


	function index()
	{

		$session_id = $this->session->userdata('adminid');
		if($session_id <> ""){
			redirect('/admin/index/home','refresh');
			exit;
		}

		$this->load->view('backend/login');
	}


	function home(){

	 $admin_id=$this->session->userdata('adminid');
		if(empty($admin_id)){
			redirect("/admin/index/");
		}
	$id = $this->session->userdata('adminid');
	$data['admindetail']= $this->adminmodel->get_details($id);
	$data['allorg'] = $this->adminorganizationmodel->listAllOrg();
	$data['alldonation'] = $this->admindonationmodel->listAllDonation();
	$data['alldonationcash'] = $this->admindonationmodel->listAllCash();
	$data['allteam'] = $this->adminteammodel->listAllTeam();
	$data['allplayer'] = $this->adminplayermodel->listAllPlayer();
	$data['allwinner'] = $this->adminwinnermodel->listAllWinner();
	
	$this->load->view('backend/admin_details',$data);
	}

	function login(){
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
				redirect("/admin/index/home");
			}
			else
			{
				$msg="Username and password does not match.";
				$this->session->set_userdata(array('message'=>$msg));
				redirect('/admin/index/','refresh');
			          }
			       }
		else {
				$msg="Please type username and password";
				$this->session->set_userdata(array('message'=>$msg));
				redirect('/admin/index/','refresh');
		}
	}


	 function logout()
	 {
		$this->session->unset_userdata('adminid');

		$this->session->set_flashdata('error', 'You have been logged out from the system.');

		redirect('/admin/index/','refresh');

 	}

	function change(){

		$field = $this->input->post('field');

		$id = $this->input->post('cms_id');

		$this->adminmodel->edit($field,$id);

		$url=$this->input->post('url');

		redirect($url);
	}

	function add_faq()
	{
	$submit = $this->input->post('sub');
	 if($submit)
	 	{
	 	$this->adminmodel->add_faq();
		$url=$this->input->post('url');
		redirect($url);
	 	}


	}


		function edit_faq(){

		$field1 = $this->input->post('field1');
		$field2 = $this->input->post('field2');
		$field3 = $this->input->post('field3');

		$id = $this->input->post('field4');

		$this->adminmodel->edit_faq($field1,$field2,$field3,$id);

		$url=$this->input->post('url');

		redirect($url);
	}


	function delete_faq(){

		$id = $this->input->post('field');

		$this->adminmodel->delete_faq($id);

		$url=$this->input->post('url');

		redirect($url);
	}


	function make_active(){

		$field1 = $this->input->post('field1');

		$id = $this->input->post('field');

		$this->adminmodel->make_active($field1,$id);

		$url=$this->input->post('url');

		redirect($url);
	}



}