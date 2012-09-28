<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organization extends CI_Controller {

public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			$this->load->theme('admintheme');
			$this->load->model('usermodel');
			$this->image_path = realpath(APPPATH . '../uploads');
			$this->load->helper(array('form', 'url'));
			$this->load->library("pagination");
			$this->load->model('adminmodel');
			$this->load->model('adminorganizationmodel');

	   }

public function listOrganization() {
	$admin_id = $this->session->userdata('adminid');
		if(empty($admin_id)){
			redirect("/admin/index/");
		}
	$id = $this->session->userdata('adminid');
	$data['admindetail'] = $this->adminmodel->get_details($id);

	$data['allorg'] = $this->adminorganizationmodel->listAllOrg();
	$this->load->view('backend/list-organization', $data);
	//exit;
}

public function edit($org_id) {
	$admin_id = $this->session->userdata('adminid');
		if(empty($admin_id)){
			redirect("/admin/index/");
		}
	$id = $this->session->userdata('adminid');
	$data['admindetail'] = $this->adminmodel->get_details($id);
	//echo $org_id;
	//exit;
	$data['edit'] = $this->adminorganizationmodel->editOrg($org_id);
	$this->load->view('backend/list-organization', $data);
	//exit;
}



	public function status($stat,$id) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->adminorganizationmodel->chngStatus($stat,$id);

	}

	public function delete($user_id) {
		$$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->adminorganizationmodel->deleteTeam($user_id);
		//exit;
	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */