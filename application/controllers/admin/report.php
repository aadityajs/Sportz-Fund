<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {

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
			$this->load->model('adminreportmodel');
			$this->load->model('adminteammodel');
			$this->load->model('admindonationmodel');
			$this->load->model('adminorganizationmodel');
			
	   }

	public function showdailysales() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		//$data['dailysales'] = $this->adminreportmodel->listOrganization();
		 $submit=$this->input->post('searchsalesubmit');
		if($submit) {
		
		 $search_period = $this->input->post('searchsale'); 
		$data['dailysales'] = $this->adminreportmodel->listSaleSearch($search_period);
		//print_r($data['dailysales']);
		}
		$this->load->view('backend/list-dailysales', $data);
		
	}

	public function showwinner() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['allwinner'] = $this->adminreportmodel->listAllWinner();
		 $submit=$this->input->post('searchwinnersubmit');
		if($submit) {
		
		 $search_period = $this->input->post('searchwinner'); 
		$data['allwinner'] = $this->adminreportmodel->listAllWinnerSearch($search_period);
		
		}
		//print_r($data['allwinnersearch']);
		$this->load->view('backend/list-winnerreport', $data);
		
	}
	
	public function showcustomer() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['cust'] = $this->adminreportmodel->listOrganization();
		 $submit=$this->input->post('searchnamesubmit');
		if($submit) {
		
		 $search_fname = $this->input->post('searchfname'); 
		 $search_lname = $this->input->post('searchlname'); 
		 
		$data['cust'] = $this->adminreportmodel->listOrganizationSearch($search_fname,$search_lname);
		
		}
		$this->load->view('backend/list-customerreport', $data);
		
	}
	public function showinvoice() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		
		$data['scoringperiod'] = $this->adminreportmodel->listscoringperiod();
		
		//print_r($data['scoringperiod'][0]['from']);
		//exit;
		 $data['invoice'] = $this->adminreportmodel->listInvoice();
		
		$this->load->view('backend/list-invoicereport', $data);
		
	}
	
	public function status($stat,$date) {
	
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		 $dt=str_replace('_','-',$date);
		
		$this->adminreportmodel->chngStatus($stat,$dt);

	}
	public function showbalance() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		
		
		 $data['balancedue'] = $this->adminreportmodel->listBalanceDue();
		 $data['balancecom'] = $this->adminreportmodel->listBalanceCom();
		 $data['balancetot'] = $this->adminreportmodel->listBalanceTot();
		 
		
		$this->load->view('backend/list-balance', $data);
		
	}
	public function showemail() {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['emails'] = $this->adminreportmodel->listOrganization();
		 $submit=$this->input->post('emailsubmit');
		if($submit) {
		
	    $email_con = $this->input->post('email_con'); 
		
		$sub = $this->input->post('sub'); 
		
		 $msg = $this->input->post('msg'); 
		 
		 
		 $this->load->library('email');
	     $this->email->to($email_con);
	     $this->email->from('no-reply@sportzfund.com');
	     $this->email->subject($sub);
	     $this->email->message($msg);
	     $this->email->send();
		//$data['cust'] = $this->adminreportmodel->listOrganizationSearch($search_fname,$search_lname);
		
		}
		$this->load->view('backend/list-emails', $data);
		
	}
	

	/*public function add() {
		$data['admindetail']= $this->adminmodel->showCurrentAdmin();
		$data['listallorg'] = $this->adminorganizationmodel->listAllOrg();
		$data['editScoring'] = '';
		 $submit=$this->input->post('scoringperiodsubmit');
		if($submit) {
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			$period = $this->input->post('period');
			$type = $this->input->post('type');
			$is_active = $this->input->post('is_active');

	

			if(empty($type))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("admin/scoringperiod/add");
			}

			$this->adminscoringperiodmodel->add_scoring_period();
			if($type=='MLB')
			{
				redirect("admin/scoringperiod/showmlb");
			}
			else
			{
				redirect("admin/scoringperiod/shownfl");

			}

		}

		$this->load->view('backend/add-scoringperiod', $data);
	}

 	function ajax_call() {
        if (isset($_POST) && isset($_POST['org_uname'])) {
            $org_uname = $_POST['org_uname'];
            if ($org_uname != '') {
	            $arrCoupons = $this->admindonationmodel->getCouponsById($org_uname);

	           echo '<select name="coupon"><option value="0">Select Coupon</option>';
	           foreach ($arrCoupons as $key=>$val) {
					echo '<option value="'.$val['coupon'].'|'.$val['fname'].' '.$val['lname'].'">'.$val['coupon'].'</option>';
	           }
	           echo '</select>';
            } else {
            	echo "Plase select Organization Coupons";
            }

            
        } else {
        }
 	}

	public function edit($sp_id,$type) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();

		$data['editScoring'] = $this->adminscoringperiodmodel->get_scoring_details($sp_id,$type);

		$submit=$this->input->post('scoringperiodsubmit');

		if($submit) {
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			$period = $this->input->post('period');
			$type = $this->input->post('type');




			if(empty($type))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("admin/scoringperiod/add");
			}

			$this->adminscoringperiodmodel->editScoring($sp_id,$type);
			if($type=='MLB')
			{
				redirect("admin/scoringperiod/showmlb");
			}
			else
			{
				redirect("admin/scoringperiod/shownfl");

			}

		}

		$this->load->view('backend/add-scoringperiod', $data);


		//exit;
	}

	public function status($stat,$id,$type) {
		$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->adminscoringperiodmodel->chngStatus($stat,$id,$type);

	}

	public function delete($sp_id,$type) {
		$$data['admindetail']=$this->adminmodel->showCurrentAdmin();
		$this->adminscoringperiodmodel->deletePlayer($sp_id,$type);
		
	}*/


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */?>