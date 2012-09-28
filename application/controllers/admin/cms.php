<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller {

public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			$this->load->theme('admintheme');
			$this->load->model('usermodel');
			$this->image_path = realpath(APPPATH . '../uploads');
			$this->load->helper(array('form', 'url', 'ckeditor'));
			$this->load->library("pagination");
			$this->load->model('adminmodel');
			$this->load->model('admincmsmodel');

			$this->data['ckeditor'] = array(

			//ID of the textarea that will be replaced
			'id' 	=> 	'content_1',
			'path'	=>	'pluggable/ckeditor',

			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"600px",	//Setting a custom width
				'height' 	=> 	'200px',	//Setting a custom height

			),

			//Replacing styles from the "Styles tool"
			'styles' => array(

				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),

				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)
			)
		);

	   }

	public function show() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['allpages'] = $this->admincmsmodel->listAllPages();
		//print_r($data['allplayer']);
		//exit;
		$this->load->view('backend/list-pages', $data);
		//exit;
	}

	public function add() {

		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$data['ckeditor'] = $this->data['ckeditor'];
		$submit=$this->input->post('pagesubmit');

		if($submit) {
			$page_title = $this->input->post('page_title');
			$content = $this->input->post('content');
			$is_active = $this->input->post('is_active');

		if(empty($page_title))
				$err .= 'Please enter page name<br>';

			if(empty($page_title))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("admin/cms/add");
			}

			//make registration for user and store to db
			$this->admincmsmodel->add_page();
			redirect("admin/cms/show");

		}

		$this->load->view('backend/add-page', $data);
	}

	public function edit($cms_id) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$data['editPage'] = $this->admincmsmodel->get_cms_page($cms_id);
		$data['ckeditor'] = $this->data['ckeditor'];

		$submit=$this->input->post('pagesubmit');

		if($submit) {
			$page_title = $this->input->post('page_title');
			$content = $this->input->post('content');
			$is_active = $this->input->post('is_active');

		if(empty($page_title))
				$err .= 'Please enter page name<br>';

			if(empty($page_title))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("admin/cms/add");
			}

			$this->admincmsmodel->editPage($cms_id);
			redirect("admin/cms/show");

		}

		$this->load->view('backend/add-page', $data);
		//exit;
	}

	public function status($stat,$cms_id) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->admincmsmodel->chngStatus($stat,$cms_id);

	}

	public function delete($cms_id) {
		$$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->admincmsmodel->deletePage($cms_id);
		//exit;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */