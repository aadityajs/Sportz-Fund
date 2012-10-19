<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Winner extends CI_Controller {

public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			$this->load->theme('admintheme');
			$this->load->model('usermodel');
			$this->image_path = realpath(APPPATH . '../uploads');
			$this->load->helper(array('form', 'url', 'html'));
			$this->load->library("pagination");
			$this->load->model('adminmodel');
			$this->load->model('adminwinnermodel');
			$this->load->model('adminteammodel');
			$this->load->model('admindonationmodel');
			$this->load->model('adminorganizationmodel');
			$this->load->model('adminscoringperiodmodel');
	   }

	public function show() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['allwinner'] = $this->adminwinnermodel->listAllWinner();
		//print_r($data['allwinner']);
		//exit;
		$this->load->view('backend/list-winner', $data);
		//exit;
	}

	public function add() {
		$data['admindetail']= $this->adminmodel->showCurrentAdmin();
		$data['listallorg'] = $this->adminorganizationmodel->listAllOrg();
		
		$data['getscoringperiod'] = $this->adminscoringperiodmodel->get_scoring_period_details();
		$submit=$this->input->post('winnersubmit');

		if($submit) {
			$winner_name = $this->input->post('winner_name');
			$winner_coupon = $this->input->post('coupon');
			$winner_prize = $this->input->post('prize');
			$is_active = $this->input->post('is_active');
			$win_period = $this->input->post('win_period');

		if(empty($player_name))
				$err = 'Please enter winner name<br>';

			if(empty($winner_coupon))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("admin/winner/add");
			}
	//$this->admindonationmodel->chngStatusDonation($winner_coupon);
			//make registration for user and store to db
			$this->adminwinnermodel->add_winner();
			
			
			redirect("admin/winner/show");

		}

		$this->load->view('backend/add-winner', $data);
	}

 	function ajax_call() {
        //Checking so that people cannot go to the page directly.
        if (isset($_POST) && isset($_POST['org_uname'])) {
            $org_uname = $_POST['org_uname'];
            if ($org_uname != '') {
	            $arrCoupons = $this->admindonationmodel->getCouponsById($org_uname);

	            //print_r($arrCoupons);
				

	           echo '<select name="coupon" style="width:65px;"><option value="0">Select Coupon</option>';
	           foreach ($arrCoupons as $key=>$val) {
			   	$a=explode(',',$val['coupon']);
					for($i=0;$i<count($a);$i++)
					{
						echo '<option value="'.$a[$i].'|'.$val['fname'].' '.$val['lname'].'">'.$a[$i].'</option>';
					}
	           }
	           echo '</select>';
            } else {
            	echo "Plase select Organization Coupons";
            }

            //Using the form_dropdown helper function to get the new dropdown.
            //print coupon_dropdown('cities',$arrFinal);
        } else {
            //echo "Unable to fetch Coupons";
        }
 	}

	public function edit($player_id) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$data['allTeams'] = $this->adminteammodel->listAllTeam();
		$data['editPlayer'] = $this->adminwinnermodel->get_player_details($player_id);

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

			$this->adminwinnermodel->editPlayer($player_id);
			redirect("admin/player/show");

		}

		$this->load->view('backend/add-player', $data);


		//exit;
	}

	public function status($stat,$id) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->adminwinnermodel->chngStatus($stat,$id);

	}

	public function delete($winner_id) {
		$$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->adminwinnermodel->deleteWinner($winner_id);
		//exit;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */