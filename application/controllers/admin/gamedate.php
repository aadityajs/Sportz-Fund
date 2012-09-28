<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gamedate extends CI_Controller {

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
			$this->load->model('admingamedatemodel');
			$this->load->model('adminscoringperiodmodel');
			$this->load->model('adminteammodel');
			$this->load->model('admindonationmodel');
			$this->load->model('adminorganizationmodel');
	   }

	public function showmlb() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['mlbgamedate'] = $this->admingamedatemodel->listMlbGamedate();
		//print_r($data['allwinner']);
		//exit;
		$this->load->view('backend/list-mlbgamedate', $data);
		//exit;
	}

	public function shownfl() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['nflgamedate'] = $this->admingamedatemodel->listNflGamedate();
		//print_r($data['allwinner']);
		//exit;
		$this->load->view('backend/list-nflgamedate', $data);
		//exit;
	}

	public function add() {
		$data['admindetail']= $this->adminmodel->showCurrentAdmin();
		$data['listallorg'] = $this->adminorganizationmodel->listAllOrg();
		$data['editGamedate'] = '';
		$data['getscoringperiod'] = $this->adminscoringperiodmodel->get_scoring_period_details();
		//print_r($data['getscoringperiod']);exit;
		 $submit=$this->input->post('gamedatesubmit');
		if($submit) {
			$year = $this->input->post('year');
			$month = $this->input->post('month');
			$day = $this->input->post('day');
			$period = $this->input->post('period');
			$type = $this->input->post('type');
			$is_active = $this->input->post('is_active');

		/*if(empty($player_name))
				$err = 'Please enter winner name<br>';*/

			if(empty($type))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("admin/gamedate/add");
			}

			//make registration for user and store to db
			$this->admingamedatemodel->add_gamedate();
			if($type=='MLB')
			{
				redirect("admin/gamedate/showmlb");
			}
			else
			{
				redirect("admin/gamedate/shownfl");

			}

		}

		$this->load->view('backend/add-gamedate', $data);
	}

 	function ajax_call() {
        //Checking so that people cannot go to the page directly.
        if (isset($_POST) && isset($_POST['org_uname'])) {
            $org_uname = $_POST['org_uname'];
            if ($org_uname != '') {
	            $arrCoupons = $this->admindonationmodel->getCouponsById($org_uname);

	            //print_r($arrCoupons);


	           echo '<select name="coupon"><option value="0">Select Coupon</option>';
	           foreach ($arrCoupons as $key=>$val) {
					echo '<option value="'.$val['coupon'].'|'.$val['fname'].' '.$val['lname'].'">'.$val['coupon'].'</option>';
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

	public function edit($sp_id,$type) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['editGamedate'] = $this->admingamedatemodel->get_scoring_details($sp_id,$type);
		$data['getscoringperiod'] = $this->adminscoringperiodmodel->get_scoring_period_details();
		
		$submit=$this->input->post('gamedatesubmit');

		if($submit) {
			$year = $this->input->post('year');
			$month = $this->input->post('month');
			$day = $this->input->post('day');
			$period = $this->input->post('period');
			$type = $this->input->post('type');
			$is_active = $this->input->post('is_active');



			if(empty($type))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("admin/gamedate/add");
			}

			//make registration for user and store to db
			$this->admingamedatemodel->editScoring($sp_id,$type);
			if($type=='MLB')
			{
				redirect("admin/scoringperiod/showmlb");
			}
			else
			{
				redirect("admin/scoringperiod/shownfl");

			}

		}

		$this->load->view('backend/add-gamedate', $data);


		//exit;
	}

	public function status($stat,$id,$type) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->admingamedatemodel->chngStatus($stat,$id,$type);

	}

	public function delete($game_id,$type) {
		$$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->admingamedatemodel->deleteGamedate($game_id,$type);
		//exit;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */