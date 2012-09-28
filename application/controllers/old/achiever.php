<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Achiever extends CI_Controller {

		public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('ejmentor');
			 $this->load->model('achmodel');
			 $this->load->library('email');
			  $this->load->model('usermodel');
			  $this->load->model('mentor_model');
			 $this->load->model('school');
			 $this->image_path = realpath(APPPATH . '../uploads');
			 $this->load->helper(array('form', 'url'));
			 $this->load->library("pagination");
	   }
	
	
	function my_mentor()
	{
	     
		 
		 $user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}	
	    $data['my_mentor']=$this->achmodel->get_my_mentor($user_id);
		
		$data['men_schools']=$this->mentor_model->list_mentor_school($data['my_mentor']['user_id']);
		$data['faculty_coordinator']=$this->usermodel->getuser($data['my_mentor']['faculty_id']);
		$data['school']=$this->school->get_school($data['my_mentor']['school']);
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/my_mentors',$data);
	}
	
	
	function add_achiever()
	{
	
	$submit=$this->input->post('submit');
		if($submit){
	$url=$this->input->post('url');
	$uname=$this->usermodel->check_duplicate($this->input->post('achemail'));

		if($uname>0)
		
		{
			
			$msg="Email already exists";
							
			$this->session->set_flashdata('message',$msg);
			
			$this->session->set_userdata(array('post'=>$this->input->post(NULL, TRUE)));
			
			redirect($url);
		
		}
		else{		
				$this->achmodel->achiever_add(); 
				redirect("achiever/achiever_added/");
			}
			
			}
	}
	
	function add_achiever_agreement()
	{
	
	$submit=$this->input->post('submit');
		if($submit){
		
		$this->achmodel->achiever_add_agreement(); 
	redirect("achiever/my_achievers/");
			}
	}

	function achiever_added(){
			 $this->load->theme('ejmentor');
			$this->load->view('frontend/achiever_added');
	}
	
	function achiever_details()
	{   
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
	     $id=$this->uri->segment(3);
		$data['myachdetail']=$this->achmodel->get_ach($id);
		
		$achivercoordi_id=$data['myachdetail']['achiver_coordinator/faculty_sponser'];
		if(!empty($user_id)){
				$data['userdetail']=$this->usermodel->getuser($user_id);
				$data['achivercoordi']=$this->usermodel->getuser($achivercoordi_id);
		        $data['school']=$this->school->get_school($data['userdetail']['school']);
			}
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/achiever_details',$data);
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

function achiever_list()
	{
			$config = array();
	        $config["base_url"] = base_url() . "achiever/achiever_list";
	        $config["total_rows"] = $this->achmodel->record_count();
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
		$data['achieverdetail']=$this->achmodel->get_achiever($config["per_page"], $page);
	
		
		
		$user_id=$this->session->userdata('userid');
		if(!empty($user_id)){
				$data['userdetail']=$this->usermodel->getuser($user_id);
		        $data['school']=$this->school->get_school($data['userdetail']['school']);
		}
		 $data["links"] = $this->pagination->create_links();
		 $data['password']=$this->_generatePassword();
		 
		//print_r($data['userdetail']);
		 
		// die();
		 
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/list',$data);
		
	}
	
	
	function my_achievers()
	{
		
			$config = array();
	        $config["base_url"] = base_url() . "achiever/my_achievers";
	        $config["total_rows"] = $this->achmodel->record_count();
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$user_id=$this->session->userdata('userid');
		
		$data['achieverdetail']=$this->achmodel->my_achievers($config["per_page"], $page,$user_id);
		
		//print_r($data['achieverdetail']);
		
		//die();
		
		if(!empty($user_id)){
		$data['userdetail']=$this->usermodel->getuser($user_id);
		$data['school']=$this->school->get_school($data['userdetail']['school']);
		}
		 $data["links"] = $this->pagination->create_links();
		
		$data['password']=$this->_generatePassword();
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/my_achiever',$data);
	}
	
	function find_mentor()
	
	{	
			$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		} 
			$config = array();
	        $config["base_url"] = base_url() . "achiever/find_mentor";
	        $config["total_rows"] = $this->mentor_model->record_count();
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			$data['userdetail']=$this->usermodel->getuser($user_id);
			$achivercoordi_id=$data['userdetail']['achiver_coordinator/faculty_sponser'];
			
			if(!empty($user_id)){
				$data['achivercoordi']=$this->usermodel->getuser($achivercoordi_id);
				}
			
		$data['school']=$this->school->get_school($data['userdetail']['school']);
		$school_id=$data['school'][0] ['school_id'] ;
		
		
		$data['achieverdetail']=$this->mentor_model->find_mentor($school_id,$config["per_page"], $page);
		
		$data['check']=$this->achmodel->mentor_relation_check($user_id);
	    //$data['uid']=$id;
		/*foreach($data['achieverdetail'] as $data['availabledays'])
		{*/
		//$data['myachdetail']=$this->mentor_model->get_details($data['availabledays']['user_id']);
		/*}*/
		
		
		 $data["links"] = $this->pagination->create_links();
		
		$data['password']=$this->_generatePassword();
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/find_mentors',$data);
	
	
	}
	
	function send_mentor_message()
	
	{
	
	
	///echo $this->input->post('msg');
	
	            $user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		} 
	
	            $data['userdetail']=$this->usermodel->getuser($user_id);
				
				 
	
				$this->email->from($this->config->item($data['userdetail']['email']), $this->config->item($data['userdetail']['fname']));
				$this->email->to($this->input->post('mentor_mail'));
				$this->email->subject($this->input->post('subject'));
				$user_message = $this->input->post('msg');
				
				$user_message .=$this->config->item("email_closing");
				$message=$this->_get_email_template(1,$user_message);
				$this->email->message($message);
						
				$this->email->send();
				
				
				
				
	            $this->usermodel->send_message($user_id,$this->input->post('mentor_id'));
				
				
				   $flmsg="Message has been sent";
	                $this->session->set_flashdata('message',$flmsg);
					
				
					
					redirect("achiever/my-mentor/");
	
	}
	
	private function _get_email_template($template_id,$user_message){
	
	$template=$this->usermodel->get_template($template_id);
	$output=str_replace("{content}",$user_message,$template['template_content']); 
	return $output;
	
}
	
	
	
	function select_mentor()
	{
	
	
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		} 
	
	
	 //$id=$this->uri->segment(3);
	$this->achmodel->mentor_select($user_id); 
	redirect("achiever/my_mentor/");
	
	//die('ggg');
	
	
	}
	
	
	
	function is_submitted()
	
	{
	
	$submit=$this->input->post('submit');
	$id=$this->session->userdata('userid');
	if($submit){
	
			$abt_me = $this->input->post('abt_me');
			$fav_subject = $this->input->post('fav_subject');
			$lst_fav_sub = $this->input->post('lst_fav_sub');
			
			$fav_fd = $this->input->post('fav_fd');
			$fav_show = $this->input->post('fav_show');
			$err= '';
			if(trim($abt_me) == '')
			
				$err .= 'Please enter About me<br>';
			
			if(trim($fav_subject) == '')
			
				$err .= 'Please enter your favourite subject<br>';
			
			if(trim($lst_fav_sub) == '')
			
				$err .= 'Please enter your least favourite subject<br>';
			
			if(trim($fav_fd) == '')
			
				$err .= 'Please enter your favourite food<br>';
			
			if(trim($fav_show) == '')
			
				$err .= 'Please enter your favourite T.V show<br>';
				
				//echo $abt_me.'aaaaaaaaaaaaa';
				//echo $fav_subject.'aaaaaaaaaaaaa';
		
		if(trim($abt_me) == '' || trim($fav_subject) == '' || trim($lst_fav_sub) == '' || trim($fav_fd) == '' || trim($fav_show) == '' )
			{
				//die('aaaaaaaaa');
				//print_r( $this->session->set_userdata(array('errormsg'=> $err)));
				//die();
				$this->session->set_userdata(array('errormsg'=> $err));
				
				redirect("achiever/achiever_details/$id");
			}
		else {
	
	$field = $this->input->post('field');
	
	  
	
	
	
	$this->usermodel->edit($field,$id);
	
	$url=$this->input->post('url');
	
	redirect($url);
	}
	}

	}
	 

	 
}
