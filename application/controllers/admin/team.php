<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller {

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
			$this->load->model('adminteammodel');

	   }

	public function show() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['allteam'] = $this->adminteammodel->listAllTeam();
		//print_r($data['allteam']);
		//exit;
		$this->load->view('backend/list-team', $data);
		//exit;
	}

	public function add() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$submit=$this->input->post('teamsubmit');

		if($submit) {
			$team_name = $this->input->post('teamname');
			$team_status = $this->input->post('teamstatus');

		if(empty($team_name))
				$err .= 'Please enter team name<br>';

			if(empty($team_name))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("admin/team/add");
			}

			//make registration for user and store to db
			$this->adminteammodel->add_team();
			redirect("admin/team/show");

		}

		$this->load->view('backend/add-team', $data);
	}

	public function status($stat,$id) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->adminteammodel->chngStatus($stat,$id);

	}

	public function delete($team_id) {
		$$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->adminteammodel->deleteTeam($team_id);
		//exit;
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */