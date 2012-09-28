<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mentor extends CI_Controller {

		public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			 $this->load->theme('ejmentor');
			 $this->load->model('mentor_model');
			  $this->load->model('achmodel');
			 $this->load->model('usermodel');
			 $this->load->model('school');
			 $this->load->library('email');
	   }
	
	
	/*function show()
	{
	    //$this->load->theme('ejmentor');
		$this->load->view('frontend/list');
	}
	*/
	
	function add_mentor()
	{
	
	$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
	
	
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
		
	$this->mentor_model->mentor_add();
	redirect("achiever_back/achiever_added/");
	}
			}
	}
	
	
	function mentor_list()
	{
		
			$config = array();
	        $config["base_url"] = base_url() . "mentor/mentor_list";
	        $config["total_rows"] = $this->mentor_model->record_count();
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['mentordetail']=$this->mentor_model->get_mentor($config["per_page"], $page);
		
		$data['achieverdetail']=$this->mentor_model->get_achiever_relatedmentors();
		//print_r($data['achieverdetail']);
		//exit;
		foreach($data['mentordetail'] as $data['availabledays'])
		{
		$data['myachdetail']=$this->mentor_model->get_details($data['availabledays']['user_id']);
		}
		$user_id=$this->session->userdata('userid');
		
		if(!empty($user_id)){
		$data['userdetail']=$this->usermodel->getuser($user_id);
		$data['school']=$this->school->get_school($data['userdetail']['school']);
		}
		 $data["links"] = $this->pagination->create_links();
		
		$data['password']=$this->_generatePassword();
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/mentor_list',$data);
	}
	
	
	
	function mentor_home()
	{
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
		
		
		
		$data['userdetail_fac']=$this->mentor_model->get_details($user_id);
	   $data['faculty_coordinator']=$this->usermodel->getuser($data['userdetail_fac']['faculty_id']);
		
		//print_r($data['faculty_coordinator']['user_id']);
		
		//die();
		
		$data['userdetail']=$this->mentor_model->getuser($user_id,$data['faculty_coordinator']['user_id']);
		$data['secureques']=$this->usermodel->get_ques();
		$data['school']=$this->school->get_school($data['userdetail']['school']);
		
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/account_detail',$data);
	}
	
	
	
		function fetch_schools()
	{
	       $querystring=$this->input->post('queryString');
		   
		   $data['schools']=$this->school->school_list($querystring);
		  
		 
		
	       // echo count($data['schools']);
			
			// print_r( $data['schools'][0]);
			
			
			
			for($i=0;$i<count($data['schools']); $i++)
			
			{
			
			if($data['schools'][$i]['school_name'])
			{
			
			
			echo '<div class="bub_bg">
			<ul>
			<li class="font14" onClick="fill2(\''.$data['schools'][$i]['school_name'].'__'.$data['schools'][$i]['school_id'].'\');">'.$data['schools'][$i]['school_name'].'</li>
			</ul>
			</div>';
			
			}
			
			
			}
			
			
			
	}	

	
	function add_mentor_school()
	
	{
	
	$user_id=$this->session->userdata('userid');
	
	$this->mentor_model->add_mentor_school($user_id);
	
	$url=$this->input->post('url');
	
	redirect($url);

	
	
	}
	
	
	
	function remove_mentor_school()
	
	{
	
	$id=$this->uri->segment(3);
	
	$user_id=$this->session->userdata('userid');
	
	$this->mentor_model->delete_mentor_school($id);
	
	redirect("mentor/mentor_details/".$user_id);
	
	
	}
	
	
	
	function my_mentors()
	{
		
			$config = array();
	        $config["base_url"] = base_url() . "mentor/my_mentor";
	        $config["total_rows"] = $this->mentor_model->record_count();
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$user_id=$this->session->userdata('userid');
		
		$data['achieverdetail']=$this->mentor_model->my_mentors($config["per_page"], $page,$user_id);
		foreach($data['achieverdetail'] as $data['availabledays'])
		{
		$data['myachdetail']=$this->mentor_model->get_details($data['availabledays']['user_id']);
		}
		//print_r($data['achieverdetail']);
		
		//die();
		
		if(!empty($user_id)){
		$data['userdetail']=$this->usermodel->getuser($user_id);
		$data['school']=$this->school->get_school($data['userdetail']['school']);
		}
		 $data["links"] = $this->pagination->create_links();
		
		$data['password']=$this->_generatePassword();
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/my_mentor',$data);
	}
	
	
	
	
	
	
	function mentor_added(){
			 $this->load->theme('ejmentor');
			$this->load->view('frontend/achiever_added');
	}
	 
	 
	 
	 function mentor_details()
	{   
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
	   $id=$this->uri->segment(3);
	   $data['val']=$this->uri->segment(4);
	   
	   $data['check']=$this->achmodel->mentor_relation_check($user_id);
	   $data['uid']=$id;
	   
	   
	   
		$data['myachdetail']=$this->mentor_model->get_details($id);
		$data['men_schools']=$this->mentor_model->list_mentor_school($id);
		
		
	//	print_r($data['men_schools']);
		
		//die();
		
		
		$faculty_cordinator_id=$data['myachdetail']['achiver_coordinator/faculty_sponser'];
		
		
		
		if(!empty($user_id)){
				$data['userdetail']=$this->usermodel->getuser($user_id);
				$data['faculty_coordinator']=$this->usermodel->getuser($data['myachdetail']['faculty_id']);
		        $data['school']=$this->school->get_school($data['userdetail']['school']);
			}
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/mentor_details',$data);
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
	
	
	function my_sponser()
	
	{
	
	$id=$this->session->userdata('userid');
	$mentor_id=$this->mentor_model->get_details($id);
	$data['mentor_detail']=$this->mentor_model->get_details($mentor_id['achiver_coordinator/faculty_sponser']);
	$data['school']=$this->school->get_school($data['mentor_detail']['school']);
	
	
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/my_sponser',$data);
	
	
	
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
			$image = $this->input->post('image');
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
				
			if(trim($image) == '')
			
				$err .= 'Please enter your image<br>';
				
				//echo $abt_me.'aaaaaaaaaaaaa';
				//echo $fav_subject.'aaaaaaaaaaaaa';
		
		if(trim($abt_me) == '' || trim($fav_subject) == '' || trim($lst_fav_sub) == '' || trim($fav_fd) == '' || trim($fav_show) == '' || trim($image) == '')
			{
				//die('aaaaaaaaa');
				//print_r( $this->session->set_userdata(array('errormsg'=> $err)));
				//die();
				$this->session->set_userdata(array('errormsg'=> $err));
				
				redirect("mentor/mentor_details/$id");
			}
		else {
	
			$field = $this->input->post('field');
			
			  
			
			
			
			$this->usermodel->edit($field,$id);
			
			$url=$this->input->post('url');
			
			redirect($url);
			}
		}

	}
	
	
	
	
	
	function my_achievers()
	{
	     
		 
		 $user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}	
	    $data['my_achievers']=$this->mentor_model->get_my_achievers($user_id);
		
		
		
		//$data['men_schools']=$this->mentor_model->list_mentor_school($data['my_achievers']['user_id']);
		//$data['achiever_coordinator']=$this->usermodel->getuser($data['my_achievers']['coordinator_id']);
		//$data['school']=$this->school->get_school($data['my_achievers']['school']);
	    $this->load->theme('ejmentor');
		$this->load->view('frontend/my_achievers',$data);
	}
	
	function send_achiever_message()
	
	{
	
	
	///echo $this->input->post('msg');
	
	            $user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		} 
	
	            $data['userdetail']=$this->usermodel->getuser($user_id);
				
				 
	
				$this->email->from($this->config->item($data['userdetail']['email']), $this->config->item($data['userdetail']['fname']));
				$this->email->to($this->input->post('achiever_mail'));
				$this->email->subject($this->input->post('subject'));
				$user_message = $this->input->post('msg');
				
				$user_message .=$this->config->item("email_closing");
				$message=$this->_get_email_template(1,$user_message);
				$this->email->message($message);
						
				$this->email->send();
				
				
				
				
	            $this->usermodel->send_message($user_id,$this->input->post('achiever_id'));
				
				
				   $flmsg="Message has been sent";
	                $this->session->set_flashdata('message',$flmsg);
					
				
					
					redirect("mentor/my_achievers/");
	
	}
	
	
	private function _get_email_template($template_id,$user_message){
	
	$template=$this->usermodel->get_template($template_id);
	$output=str_replace("{content}",$user_message,$template['template_content']); 
	return $output;
	
}
	 
	 
}
