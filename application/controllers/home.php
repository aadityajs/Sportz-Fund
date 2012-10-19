<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('sportzfund');
			 $this->load->model('usermodel');
			 $this->load->library('email');
	   }


	public function index()
	{
		//echo $this->config->item("admin_email");
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			site_url();
		}
		$data['userdetail']=$this->usermodel->getuser($user_id);
		$data['totalDonation']=$this->usermodel->totalDonation();
		$data['winnerBrodcast']=$this->usermodel->winnerBrodcast();
		//print_r($data);exit;
		$data['usertesti'] = $this->usermodel->gettesti();
		$this->load->theme('sportzfund');
		$this->load->view('frontend/home', $data);
	}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

function login() {
		if ($this->input->post('email'))
		{
			$u = $this->input->post('email');
			$pw = $this->input->post('password');

			$this->usermodel->verifyUser($u,$pw);
			$session_id = $this->session->userdata('userid');
			$usertype=	 $this->session->userdata('usertype');


			//die($usertype);

			if($session_id <> "")
			{
				$data['user']=$this->usermodel->getuser($session_id);
				$current_date=strtotime(date('Y-m-d'));

				if($usertype=='Faculty')
				{

				redirect("faculty_sponsor/faculty_sponsor_details/");

				}

				elseif($usertype=='Mentor')
				{

				redirect("mentor/mentor_home/");

				}

				else
				{

				redirect("user/account_details/");

				}



			}
			else
			{

				$msg="Sorry. Email and password do not match.";

				$this->session->set_flashdata('message',$msg);

				redirect("");

			          }

			       }

			     }



    function logout()
    {
		$this->session->unset_userdata('userid');
		$this->session->set_flashdata('error', 'You have logged out from the system.');
		redirect('','refresh');

    }






			}