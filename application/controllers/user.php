<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User extends CI_Controller {

	/**
	 * Achiever / user manamanet
	 
	 */ 
	 
	public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('ejmentor');
			 $this->load->model('usermodel');
			 $this->load->model('school');
			 
			 $this->load->library('email');
	   }
	
	
	function account_details()
	{
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
		
		$data['userdetail']=$this->usermodel->getuser($user_id);
		$data['secureques']=$this->usermodel->get_ques();
		$data['school']=$this->school->get_school($data['userdetail']['school']);
		
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/account_detail',$data);
	}
	
	
	function account_details_faculty_sponser()
	{
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
		
		$data['userdetail']=$this->usermodel->getuser($user_id);
		$data['secureques']=$this->usermodel->get_ques();
		
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/account_detail_faculty_sponser',$data);
	}
	
	
	function sec_ans()
	
	{
	
	$this->usermodel->update_pass();
	$this->usermodel->secure_ans();
	
	$usertype=	 $this->session->userdata('usertype');	
	
	
	if($usertype=='Faculty')
				{
				
				redirect("user/account_details_faculty_sponser/");
				
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
	
	function edit()
	
	{
	$field = $this->input->post('field');
	
	  
	
	$id=$this->session->userdata('userid');
	
	$this->usermodel->edit($field,$id);
	
	$url=$this->input->post('url');
	
	redirect($url);
	
	
	
	}
	
	
	function edit_addrss()
	
	{
	$field1 = $this->input->post('field1');
	$field2 = $this->input->post('field2');
	$field3 = $this->input->post('field3');
	$field4 = $this->input->post('field4');
	$field5 = $this->input->post('field5');
	  
	
	$id=$this->session->userdata('userid');
	
	$this->usermodel->edit_addrs($field1,$field2,$field3,$field4,$field5,$id);
	
	$url=$this->input->post('url');
	
	redirect($url);
	
	
	
	}
	
	
	
	function account_deact()
	{

	$field = $this->input->post('field');

	$id=$this->session->userdata('userid');
	
	$this->usermodel->edit($field,$id);
	
	$this->email->from($this->config->item("admin_email"), $this->config->item("admin_name"));
	$this->email->to($this->input->post('aemail'),$this->input->post('pemail'));
	$this->email->subject('Account deactivation');
	$user_message = "This is to inform you that the following account of " .$this->input->post('aname')." has been de-activated by the user.<br>To reactivate your account please log into the site and press 'request re-activation' button.";
	$this->email->message($user_message);
	$user_message .=$this->config->item("email_closing");
	$this->email->send();

	$url=$this->input->post('url');
	
	redirect($url);

	}
	
	public function reactivation()
	{
	
					$this->email->to($this->config->item("admin_email"), $this->config->item("admin_name"));
					$this->email->from($this->input->post('aemail'));
					$this->email->subject('Reactivation of account');
					$user_message = "Dear " .$this->config->item("admin_name"). "<br>Please reactivate my account.";
					$user_message .= "Reason for de-activation-".$this->input->post('reason1')."<br>";
					$user_message .= "Reason for re-activation-".$this->input->post('reason2');
					$this->email->message($user_message);
							
					$this->email->send();
		
		
		$this->load->theme('ejmentor');
		$url=$this->input->post('url');
	
		redirect($url);

	}
	
	
	
	function edit_three()
	
	{
		
	$id=$this->session->userdata('userid');
	
	$this->usermodel->edit_three($id);
	
	$url=$this->input->post('url');
	
	redirect($url);
	
	
	
	}
	
	
	
	
	
	
	function edit_availability()
	
	{
		
	$id=$this->session->userdata('userid');
	
	$this->usermodel->edit_availability($id);
	
	$url=$this->input->post('url');
	
	redirect($url);
	
	
	
	}
	
	function delete_image()
	
	{
	
	$id=$this->session->userdata('userid');
	
	$this->usermodel->delete_image($id);
	
	$usertype=	 $this->session->userdata('usertype');	
	
	if($usertype=='Mentor')
				
				{
				
				redirect("mentor/mentor_details/".$id);
				
				
				}
	
	}
	
	
	
	
	function send_message()
	
	{
	
	$id=$this->session->userdata('userid');
	$sender_detail=$this->usermodel->get_details($id);
	$receiver_detail=$this->usermodel->get_details($sender_detail['achiver_coordinator/faculty_sponser']);
	
	$sub=$this->input->post('subject');
	$msg=$this->input->post('msg');
	$msg.=$this->config->item("email_closing");
	$message=$this->_get_email_template(1,$msg);
	$from_email=$sender_detail['email'];
	$to_email=$receiver_detail['email'];
	
	$this->email->from($from_email);
	$this->email->to($to_email);
	$this->email->subject($sub);
	$this->email->message($message);
	
	
	
	$this->email->send();
	
	
	
	$url=$this->input->post('url');
	
	redirect($url);
	
	
	
	}
	
	
	
	
	private function _get_email_template($template_id,$user_message){
	
	$template=$this->usermodel->get_template($template_id);
	$output=str_replace("{content}",$user_message,$template['template_content']); 
	return $output;
	
}

function change_status()

{

$uid=$this->input->post('uid');
$stat=$this->input->post('stat');

if($stat=='Y')

{


$this->usermodel->make_inactive($uid);

}

else
{

$this->usermodel->make_active($uid);
}



$url=$this->input->post('url');
	
	redirect($url);


}

function edit_email()
	
	{
	$field = $this->input->post('field');
	
	 $url=$this->input->post('url');
	
	$id=$this->session->userdata('userid');
	
	$uname=$this->usermodel->check_duplicate($this->input->post('email'));

		if($uname>0)
		
		{
			
			$msg="Email already exists";
							
			$this->session->set_flashdata('message',$msg);
			
			$this->session->set_userdata(array('post'=>$this->input->post(NULL, TRUE)));
			
			redirect($url);
		
		}
		else
		{
			$this->usermodel->edit($field,$id);
			$this->email->from($this->config->item("admin_email"), $this->config->item("admin_name"));
			$this->email->to($this->input->post('email'));
			$this->email->subject('Email address change');
			$user_message = "This is to inform you that your email address has changed.<br>Please log into the site with your new email address";
			$this->email->message($user_message);
			$user_message .=$this->config->item("email_closing");
			$this->email->send();

			redirect($url);
		}

	
	
	}




	 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */