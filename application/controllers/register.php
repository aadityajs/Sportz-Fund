<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Achiever / user manamanet

	 */

	public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('sportzfund');
			 $this->load->model('usermodel');
			 $this->load->model('school');
			 $this->load->library('email');
			 $this->load->helper('form');
	   }


	public function achiever()

	{
		//echo $this->config->item("admin_email");


		$submit=$this->input->post('submit');
		if($submit){

			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$email = $this->input->post('email');

			$remail = $this->input->post('remail');
			$school = $this->input->post('school');
			$address = $this->input->post('address');
			$phone_no = $this->input->post('phone_no');
			$best_time = $this->input->post('best_time');



			$password = $this->input->post('temp_password');
			$how_did = $this->input->post('how_did');
			$school_back = $this->input->post('school_back');
			$activation_code= $this->input->post('hid');
			$err= '';
			if(empty($fname))

				$err .= 'Please enter first name<br>';

			if(empty($lname))

				$err .= 'Please enter last name<br>';

			if(empty($email))

				$err .= 'Please enter email address<br>';

			if(empty($school))

				$err .= 'Please enter a school name<br>';

			if(empty($remail))

				$err .= 'Please retype the email address<br>';

			if(empty($address))

				$err .= 'Please enter the address<br>';

			if(empty($phone_no))

				$err .= 'Please enter your phone no<br>';

			if(empty($best_time))

				$err .= 'Please enter best time to call<br>';


			if(empty($how_did))

				$err .= 'Please enter how did you hear about us?<br>';

			if(empty($school_back))

				$err .= 'Please enter some background about your school<br>';

			if(empty($fname) || empty($lname) || empty($email) || empty($school) || empty($remail) || empty($address) || empty($phone_no) || empty($best_time) || empty($how_did) || empty($school_back))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));

				redirect("register/achiever");
			}
						$uname=$this->usermodel->check_duplicate($this->input->post('email'));

					if($uname>0)

					{

					$msg="Email already exists";

					$this->session->set_flashdata('message',$msg);

					$this->session->set_userdata(array('post'=>$this->input->post(NULL, TRUE)));

					redirect("register/achiever/");

					}

					else

					{
			        $template=$this->usermodel->get_template(1);
				    //make registration for user and store to db
					$this->usermodel->register_achiever();

					$this->email->from($this->config->item("admin_email"), $this->config->item("admin_name"));
					$this->email->to($this->input->post('email'));
					$this->email->subject($template['subject']);
					$user_message = "Dear " .$fname." ". $lname . "<br>";
					$user_message .= "Your account has been created successfully!<br>";

					$user_message .= "Username : " . $username ."<br>";
					$user_message .= "Password : " . $password ."<br>";
					$user_message .= "Please click the following link to activate the account or copy the link below into your browser to activate your account. <br>";
					$user_message .= site_url("register/activation/") ."/". $activation_code ."<br>";
					$user_message .=$this->config->item("email_closing");
					$message=$this->_get_email_template(1,$user_message);
					$this->email->message($message);

					$this->email->send();
					$this->session->unset_userdata('errormsg');
					$this->session->unset_userdata('post');

					redirect("register/thanks/");
					}
			}
			$data['schools']=$this->school->schoollist();
			$data['password']=$this->_generatePassword();

		$this->load->view('frontend/register_achiever',$data);
	}


	public function faculty_sponsor()

	{



		$submit=$this->input->post('submit');

		if($submit){

			    $fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$email = $this->input->post('email');

				$password = $this->input->post('temp_password');

			    $activation_code= $this->input->post('hid');

			$uname=$this->usermodel->check_duplicate($this->input->post('email'));

					if($uname>0)

					{

					$msg="Email id already exists";

					$this->session->set_flashdata('message',$msg);

					$this->session->set_userdata(array('post'=>$this->input->post(NULL, TRUE)));

					redirect("register/faculty-sponsor/");

					}


					$template=$this->usermodel->get_template(1);
						//make registration for user and store to db
						$this->usermodel->register_faculty_sponser();

							$this->email->from($this->config->item("admin_email"), $this->config->item("admin_name"));
							$this->email->to($this->input->post('email'));
							$this->email->subject($template['subject']);
					$user_message = "Dear " .$fname." ". $lname . "<br>";
					$user_message .= "Your account has been created successfully!<br>";

					$user_message .= "Username : " . $username ."<br>";
					$user_message .= "Password : " . $password ."<br>";
					$user_message .= "Please click the following link to activate the account or copy the link below into your browser to activate your account. <br>";
					$user_message .= site_url("register/activation/") ."/". $activation_code ."<br>";
					$user_message .=$this->config->item("email_closing");
					$message=$this->_get_email_template(1,$user_message);
					$this->email->message($message);
							$this->email->send();

						    redirect("register/thanks/");




	              }

	           $data['schools']=$this->school->schoollist();
			   $data['password']=$this->_generatePassword();

			   $this->load->view('frontend/register_faculty_sponser',$data);

	}





		function thanks(){
			 $this->load->theme('ejmentor');
			$this->load->view('frontend/thankyou');
	}


	function activation(){

			 $act=$this->uri->segment(3);

			$this->usermodel->activate($act);

			 $this->load->theme('ejmentor');
			$this->load->view('frontend/activation');
	}


private function _get_email_template($template_id,$user_message){

	$template=$this->usermodel->get_template($template_id);
	$output=str_replace("{content}",$user_message,$template['template_content']);
	return $output;

}


 private function _generatePassword($length=9, $strength=0) {
	$vowels = 'aeuy';
	$consonants = 'bdghjmnpqrstvz';
	if ($strength & 1) {
		$consonants .= 'BDGHJLMNPQRSTVWXZ';
	}
	if ($strength & 2) {
		$vowels .= "AEUY";
	}
	if ($strength & 4) {
		$consonants .= '23456789';
	}
	if ($strength & 8) {
		$consonants .= '@#$%';
	}

	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */