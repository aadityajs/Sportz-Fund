<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Score extends CI_Controller {

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
			$this->load->model('adminscoremodel');
			$this->load->model('adminteammodel');
			$this->load->model('admindonationmodel');
			$this->load->model('adminorganizationmodel');
	   }

	public function showmlb() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['mlbgamedate'] = $this->adminscoremodel->listMlbGamedate();
		//print_r($data['allwinner']);
		//exit;
		$this->load->view('backend/list-mlbgamescore', $data);
		//exit;
	}

	public function shownfl() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['nflgamedate'] = $this->adminscoremodel->listNflGamedate();
		//print_r($data['allwinner']);
		//exit;
		$this->load->view('backend/list-nflgamescore', $data);
		//exit;
	}
	public function shownpts() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['playerpoints'] = $this->adminstatmodel->listPlayerPoints();
		//print_r($data['allwinner']);
		//exit;
		$this->load->view('backend/list-playerpoints', $data);
		//exit;
	}

	public function add() {
		$data['admindetail']= $this->adminmodel->showCurrentAdmin();
		$data['listallorg'] = $this->adminorganizationmodel->listAllOrg();

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

		$this->load->view('backend/add-points', $data);
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
	
	//echo $sp_id;exit;
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['editScore'] = $this->adminscoremodel->get_scoring_details($sp_id,$type);

		//print_r($data['editPlayer'][0]);

		$submit=$this->input->post('scoresubmit');

		if($submit) {

				$count = $this->input->post('count_score'); 
				$name = $this->input->post('name');
				$orgname = $this->input->post('orgname');
				$score = $this->input->post('score');
				$points = $this->input->post('points');
				
				$this->adminscoremodel->editScoring($sp_id,$type,$this->input->post());
		
			/*if(empty($type))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("admin/gamedate/add");
			}*/

			//make registration for user and store to db

			if($type=='MLB')
			{
			//$this->adminstatmodel->chngStatus('active',$sp_id,$type);
				redirect("admin/score/showmlb");
			}
			else
			{
				redirect("admin/score/shownfl");

			}

		}

		$this->load->view('backend/add-score', $data);


		//exit;
	}

	public function status($stat,$id,$type) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->adminscoremodel->chngStatus($stat,$id,$type);

	}

	public function delete($game_id,$type) {
		$$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->admingamedatemodel->deleteGamedate($game_id,$type);
		//exit;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */