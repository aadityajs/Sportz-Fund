<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donation extends CI_Controller {

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
			$this->load->model('admindonationmodel');
			$this->load->model('adminteammodel');

	   }

	public function show() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['alldonation'] = $this->admindonationmodel->listAllDonation();
		//print_r($data['allplayer']);
		//exit;
		$this->load->view('backend/list-donation', $data);
		//exit;
	}
	public function showCashPaying() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['alldonation'] = $this->admindonationmodel->listAllCash();
		//print_r($data['allplayer']);
		//exit;
		$this->load->view('backend/list-cashpaying', $data);
		//exit;
	}
	public function add() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$data['allTeams'] = $this->adminteammodel->listAllTeam();

		$submit=$this->input->post('playerubmit');

		if($submit) {
			$player_name = $this->input->post('player_name');
			$player_status = $this->input->post('player_status');
			$player_group = $this->input->post('player_group');
			$player_team = $this->input->post('player_team');

		if(empty($player_name))
				$err .= 'Please enter player name<br>';

			if(empty($player_name))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("admin/player/add");
			}

			//make registration for user and store to db
			$this->admindonationmodel->add_player();
			redirect("admin/player/show");

		}

		$this->load->view('backend/add-player', $data);
	}

	public function edit($player_id) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$data['allTeams'] = $this->adminteammodel->listAllTeam();
		$data['editPlayer'] = $this->admindonationmodel->get_player_details($player_id);

		$submit=$this->input->post('playerubmit');

		if($submit) {
			$player_name = $this->input->post('player_name');
			$player_status = $this->input->post('player_status');
			$player_group = $this->input->post('player_group');
			$player_team = $this->input->post('player_team');

		if(empty($player_name))
				$err .= 'Please enter player name<br>';

			if(empty($player_name))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("admin/player/add");
			}

			$this->admindonationmodel->editPlayer($player_id);
			redirect("admin/player/show");

		}

		$this->load->view('backend/add-player', $data);


		//exit;
	}

	public function status($stat,$id,$type) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->admindonationmodel->chngStatus($stat,$id,$type);

	}

	public function delete($don_id,$type) {
		$$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->admindonationmodel->deleteDonation($don_id);
		//exit;
	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */