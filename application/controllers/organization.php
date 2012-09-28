<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organization extends CI_Controller {

	/**
	 * Achiever / user manamanet
		// Aditya's API Credentils
		Credential		API Signature
		API Username	aditya_1325656136_biz_api1.gmail.com
		API Password	6GH39NJ44GEXLM4Y
		Signature		An5ns1Kso7MWUdW4ErQKJJJ4qi4-A6Ee3rJwZJbAwMZ3q58aoGULlnAT
		Request Date	4 Jan 2012 06:14:50 GMT
	 */

	public function __construct()
	   {
			parent::__construct();
			// Your own constructor code
			$this->config->load_db_items();
			$this->load->theme('sportzfund');
			$this->load->helper('form');
			$this->load->library('upload');
			$this->load->model('usermodel');
			$this->load->model('adminplayermodel');
			$this->load->model('adminreportmodel');
			$this->load->model('adminscoringperiodmodel');
			$this->load->library('email');

			//$this->load->library('paypal_lib');		//For PayPal IPN
			$this->load->library('paypal');				//For PayPal Pro
			$this->paypal->setup('aditya_1325656136_biz_api1.gmail.com', '6GH39NJ44GEXLM4Y', 'An5ns1Kso7MWUdW4ErQKJJJ4qi4-A6Ee3rJwZJbAwMZ3q58aoGULlnAT');
	   }


	public function register()

	{
		//echo $this->config->item("admin_email");


		$submit=$this->input->post('submitReg');
		if($submit){

			$image_path=realpath(APPPATH . '../uploads');
			 $config=array(
                'allowed_types'=>'jpeg|png|gif|jpg',
                'upload_path'=>$image_path,
                'max_size'=>2097152,
                'overwrite'=>TRUE,
                'file_name'=>''
            );

            /* Initialize the uploader lib either using any one statement below. */

            // Used when loading the upload lib at __constructor()
            //$this->load->library('upload', $config);

            // Used when loading the upload lib in your native method
            $this->upload->initialize($config);

	        $this->upload->do_upload('userimage');
	        $imgdata = array('image' => $this->upload->data());
	        //echo '<pre>'.print_r($imgdata, true).'</pre>';



			//echo '<pre>'.print_r($this->input->post(), true).'</pre>';
			//print_r($_FILES);

			$orgname = $this->input->post('orgname');
			$ein = $this->input->post('ein');
			$namecont = $this->input->post('namecont');
			$address = $this->input->post('address');
			$citystatezip = $this->input->post('citystatezip');
			$phemail = $this->input->post('phemail');

			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$contactaddress = $this->input->post('contactaddress');
			$contcitystatezip = $this->input->post('contcitystatezip');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$confemail = $this->input->post('confemail');
			$orgusername = $this->input->post('orgusername');
			$password = $this->input->post('password');
			$confpassword = $this->input->post('confpassword');
			$data2 = $imgdata['image']['file_name'];

			$game = $this->input->post('game');
			$hearaboutus = $this->input->post('hearaboutus');
			$hearaboutusdetails = $this->input->post('hearaboutusdetails');


			$err= '';
			if(empty($fname))
				$err .= 'Please enter first name<br>';
			if(empty($lname))
				$err .= 'Please enter last name<br>';
			if(empty($email))
				$err .= 'Please enter email address<br>';
			if(empty($orgname))
				$err .= 'Please enter your organization name<br>';
			if(empty($confemail))
				$err .= 'Please retype the email address<br>';
			if(empty($address))
				$err .= 'Please enter the address<br>';
			if(empty($phone))
				$err .= 'Please enter your phone no<br>';
			if(empty($citystatezip))
				$err .= 'Please enter your city, state and zip<br>';
			if(empty($orgusername))
				$err .= 'Please enter your organization user name<br>';
			if(empty($password))
				$err .= 'Please enter password<br>';

			if(empty($fname) || empty($lname) || empty($email) || empty($orgname) || empty($confemail) || empty($address) || empty($phone) || empty($citystatezip) || empty($orgusername) || empty($password))
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				redirect("organization/register");
			}
					$uname=$this->usermodel->check_duplicate($this->input->post('email'));
					if($uname>0)
					{
					$msg="Email already exists";
					$this->session->set_flashdata('message',$msg);
					$this->session->set_userdata(array('post'=>$this->input->post(NULL, TRUE)));
					redirect("organization/register");
					}
					else
					{
			        $template=$this->usermodel->get_template(1);

			        //make registration for user and store to db
					$this->usermodel->register_organization();
					//exit;

					$this->email->from($this->config->item("admin_email"), $this->config->item("admin_name"));
					$this->email->to($this->input->post('email'));
					$this->email->subject($template['subject']);
					$user_message = "Dear " .$fname." ". $lname . "<br>";
					$user_message .= "Your account has been created successfully!<br>";

					$user_message .= "Username : " . $orgusername ."<br>";
					$user_message .= "Password : " . $password ."<br>";
					$user_message .= "Please click the following link to activate the account or copy the link below into your browser to activate your account. <br>";
					$user_message .= site_url("register/activation/") ."/". $activation_code ."<br>";
					$user_message .=$this->config->item("email_closing");
					$message=$this->_get_email_template(1,$user_message);
					$this->email->message($message);

					$this->email->send();
					$this->session->unset_userdata('errormsg');
					$this->session->unset_userdata('post');

					redirect("organization/thanks/");
					}
			}

		$this->load->view('frontend/register');
	}



	function login() {
		if ($this->input->post('email'))
		{
			$u = $this->input->post('email');
			$pw = $this->input->post('password');

			$this->usermodel->verifyUser($u,$pw);
			$session_id = $this->session->userdata('userid');
			$usertype = $this->session->userdata('usertype');
			$orgname = $this->session->userdata('orgname');

			//die($usertype);
			if($session_id <> "")
			{
				$data['user']=$this->usermodel->getuser($session_id);
				$current_date=strtotime(date('Y-m-d'));
				redirect("organization/account/");
			}
			else
			{
				$msg="Sorry. Email and password does not match.";
				$this->session->set_userdata('message',$msg);
				redirect("");
			}
		}
		$this->load->view('frontend/login');

	}

	function logout()
	    {
		$this->session->unset_userdata('userid');
		$this->session->set_flashdata('error', 'You have successfully logged out.');
		redirect('','refresh');

	    }

	function account()
	{
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}

		$data['userdetail']=$this->usermodel->getuser($user_id);
		$data['secureques']=$this->usermodel->get_ques();
		//$data['school']=$this->school->get_school($data['userdetail']['school']);

	    $this->load->theme('sportzfund');
		$this->load->view('frontend/account',$data);
	}


	function ordercard()

	{
		$data['allOrgList'] = $this->usermodel->listAllOrg();
		//echo $this->config->item("admin_email");
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
		$data['userdetail']=$this->usermodel->getuser($user_id);

		$submit = $this->input->post('submitCardOrder');
		if($submit == 'submitCardOrder'){
			//echo '<pre>'.print_r($this->input->post(), true).'</pre>';
			//exit;

			$orgnization = $this->input->post('org');
			$tickets = $this->input->post('ticket');
			$delivery = $this->input->post('shiping_method');
			$payment = $this->input->post('payment_method');
			$card_type = $this->input->post('cardType');
			$card_no = $this->input->post('cardNo');
			$exp_mnt = $this->input->post('expMnt');
			$exp_year = $this->input->post('expYear');
			$cvv = $this->input->post('cvv');
			$ship_fname = $this->input->post('ship_fname');
			$ship_lname = $this->input->post('ship_lname');
			$ship_address = $this->input->post('ship_add');
			$ship_citystatezip = $this->input->post('ship_citystatezip');
			$ship_ph = $this->input->post('ship_ph');
			$ship_email = $this->input->post('ship_email');
			$date = date('d/m/Y');
			$totalCost = $this->input->post('totalCost');


			$err= '';
			if(empty($orgnization))
				$err .= 'Please select organization for your fundriser<br>';
			if(empty($tickets))
				$err .= 'Please select number of tickets<br>';
			if(empty($delivery))
				$err .= 'Please select delivary method<br>';
			if(empty($payment))
				$err .= 'Please select payment method<br>';
			if(empty($card_type))
				$err .= 'Please enter your card types<br>';
			if(empty($card_no))
				$err .= 'Please enter your card number<br>';
			if(empty($exp_mnt))
				$err .= 'Please enter your card expiry month<br>';
			if(empty($exp_year))
				$err .= 'Please enter your card expiry year<br>';
			if(empty($cvv))
				$err .= 'Please enter your card security code/CVV nummber<br>';

			if(empty($orgnization) || empty($tickets) || empty($delivery) || empty($payment) || empty($card_type) || empty($card_no) || empty($exp_mnt) || empty($exp_year) || empty($cvv) )
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				//redirect("organization/ordercard");
			}

			        $template=$this->usermodel->get_template(1);

			    /*
	             * PayPal Pro Call Procedure
	             */
	              $request = array(
						'PAYMENTACTION' 	=> 'Sale',
						'IPADDRESS'			=> $_SERVER['REMOTE_ADDR']
					);

					$card = array(
						'CREDITCARDTYPE'	=> $card_type,
						'ACCT'				=> $card_no,
						'EXPDATE'			=> $exp_mnt.$exp_year,
						'CVV2'				=> $cvv
					);

					$address = array(
						'STREET'			=> $ship_address,
						'CITY'				=> $ship_citystatezip,
						'STATE'				=> 'CA',
						'COUNTRYCODE'		=> 'US',
						'ZIP'				=> '95131'
					);

					$details = array(
						'AMT'				=> $totalCost,
						'CURRENCYCODE'		=> 'USD'
					);

					$proResponse = $this->paypal->do_direct_payment($request, $card, $address, $details);

					//echo '<pre>'.print_r($proResponse, true).'</pre>';
					//echo '<pre>'.print_r($this->input->post(), true).'</pre>';
					//exit;

			        //make registration for user and store to db
					$this->usermodel->order_card($proResponse);
					//exit;

					$this->email->from($this->config->item("admin_email"), $this->config->item("admin_name"));
					$this->email->to($this->input->post('email'));
					$this->email->subject($template['subject']);
					$user_message = "Dear " .$fname." ". $lname . "<br>";
					$user_message .= "Your order has been placed successfully!<br>";

					$user_message .= " Fundriser: ".$orgnization."<br>";
					$user_message .= " No. of Tickets: ".$tickets."<br>";
					$user_message .= " Delivary Charges: $".$delivery."<br>";
					$user_message .= " Payment type: ".$payment."<br>";
					$user_message .= " Card type: ".$card_type."<br>";
					$user_message .= " Order date: ".$date."<br>";

					$user_message .=$this->config->item("email_closing");
					$message=$this->_get_email_template(1,$user_message);
					$this->email->message($message);

					$this->email->send();
					$this->session->unset_userdata('errormsg');
					$this->session->unset_userdata('post');

					redirect("organization/ordersuccess/");

			}
		$this->load->view('frontend/ordercard', $data);
	}


	function thanks(){
		 $this->load->theme('sportzfund');
		 $this->load->view('frontend/thankyou');
	}

	function ordersuccess(){
		$data['allOrgList'] = $this->usermodel->listAllOrg();
		//echo $this->config->item("admin_email");
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}
		$data['userdetail']=$this->usermodel->getuser($user_id);

		 $this->load->theme('sportzfund');
		 $this->load->view('frontend/ordersuccess', $data);
	}

	function donate($orgUsername) {

	$url = $this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
	$url = empty($url) ? base_url() : $url;

	$data['player_details'] = $this->adminplayermodel->listPlayerByGroupRand();
	/*echo '<pre>'.print_r($data['player_details'][0]).'</pre>';
			exit;*/
	$submit = $this->input->post('makeDonation');
		if($submit == 'Donate'){
			//echo '<pre>'.print_r($this->input->post(), true).'</pre>';
			//exit;

			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$contactaddress = $this->input->post('contactaddress');
			$contcitystatezip = $this->input->post('contcitystatezip');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$confemail = $this->input->post('confemail');
			$supportedname = $this->input->post('supportedname');
			$orgname = $this->uri->segment(3);
			$donation = $this->input->post('donation');

			$payment = $this->input->post('payment_method');
			$card_type = $this->input->post('cardType');
			$card_no = $this->input->post('cardNo');
			$exp_mnt = $this->input->post('expMnt');
			$exp_year = $this->input->post('expYear');
			$cvv = $this->input->post('cvv');

			$ship_fname = $this->input->post('bill_fname');
			$ship_lname = $this->input->post('bill_lname');
			$ship_address = $this->input->post('bill_add');
			$ship_citystatezip = $this->input->post('bill_citystatezip');
			$date = date('d/m/Y');

			$donationDetails = array(
				    'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'contactaddress' => $this->input->post('contactaddress'),
					'contcitystatezip' => $this->input->post('contcitystatezip'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'supportedname' => $this->input->post('supportedname'),
					'orgname' => $this->uri->segment(3),
					'donation' => $this->input->post('donation'),

					'payment' => $this->input->post('payment_method'),
					'card_type' => $this->input->post('cardType'),
					'card_no' => $this->input->post('cardNo'),
					'exp_mnt' => $this->input->post('expMnt'),
					'exp_year' => $this->input->post('expYear'),
					'cvv' => $this->input->post('cvv'),
					'ship_fname' => $this->input->post('bill_fname'),
					'ship_lname' => $this->input->post('bill_lname'),
					'ship_address' => $this->input->post('bill_add'),
					'ship_citystatezip' => $this->input->post('bill_citystatezip'),
					'date' => date('d/m/Y'),
					'status' => 'pending'
                );

			/* PayPal IPN Call Procedure
			$this->paypal_lib->add_field('business', 'logson_1338447905_biz@gmail.com'); //Money going to admin first time through paypal
		    $this->paypal_lib->add_field('return', site_url('organization/donationsuccess'));
		    $this->paypal_lib->add_field('cancel_return', site_url('organization/donationcancel'));
		    $this->paypal_lib->add_field('notify_url', site_url('organization/ipn')); // <-- IPN url // <-- Verify return

		    $this->paypal_lib->add_field("item_name", 'Donation to '.$orgname);
			//$this->paypal_lib->add_field("quantity", $or_qty);
			$this->paypal_lib->add_field("amount", $donation);
		    $this->paypal_lib->add_field('custom', 'customval');
		    //$donationDetails

		    $this->paypal_lib->paypal_auto_form();
			*/

            /*
             * PayPal Pro Call Procedure
             */
              $request = array(
					'PAYMENTACTION' 	=> 'Sale',
					'IPADDRESS'			=> $_SERVER['REMOTE_ADDR']
				);

				$card = array(
					'CREDITCARDTYPE'	=> $card_type,
					'ACCT'				=> $card_no,
					'EXPDATE'			=> $exp_mnt.$exp_year,
					'CVV2'				=> $cvv
				);

				$address = array(
					'STREET'			=> $contactaddress,
					'CITY'				=> $contcitystatezip,
					'STATE'				=> 'CA',
					'COUNTRYCODE'		=> 'US',
					'ZIP'				=> '95131'
				);

				$details = array(
					'AMT'				=> $donation,
					'CURRENCYCODE'		=> 'USD'
				);

				$proResponse = $this->paypal->do_direct_payment($request, $card, $address, $details);

  			//echo '<pre>'.print_r($response['ACK'], true).'</pre>';
			//exit;

			$err= '';
			if(empty($fname))
				$err .= 'Please enter first name<br>';
			if(empty($lname))
				$err .= 'Please enter last name<br>';
			if(empty($email))
				$err .= 'Please enter email address<br>';

			if(empty($donation))
				$err .= 'Please select donation amount<br>';

			if(empty($payment))
				$err .= 'Please select payment method<br>';
			if(empty($card_type))
				$err .= 'Please enter your card types<br>';
			if(empty($card_no))
				$err .= 'Please enter your card number<br>';
			if(empty($exp_mnt))
				$err .= 'Please enter your card expiry month<br>';
			if(empty($exp_year))
				$err .= 'Please enter your card expiry year<br>';
			if(empty($cvv))
				$err .= 'Please enter your card security code/CVV nummber<br>';

			if(empty($fname) || empty($lname) || empty($email) || empty($donation) || empty($payment) || empty($card_type) || empty($card_no) || empty($exp_mnt) || empty($exp_year) || empty($cvv) )
			{
				$this->session->set_userdata(array('errormsg'=> $err,'post'=>$this->input->post(NULL, TRUE)));
				//redirect("organization/ordercard");
			}

			        //$template=$this->usermodel->get_template(1);

			        //make registration for user and store to db
			        if ($proResponse['ACK'] == 'Success') {
					$this->usermodel->donation($proResponse,$data['player_details']);

			        $template=$this->usermodel->get_template(1);
					$this->email->from($this->config->item("admin_email"), $this->config->item("admin_name"));
					$this->email->to($this->input->post('email'));
					$this->email->subject($template['subject']);

					$user_message = "Dear " .$fname." ". $lname . "<br>";

					$user_message .= '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="registration">
									    <tr>
									      <td style="padding: 15px 0 5px 0;">Thank you for donating money to support Lower Dauphin Baseball League.  Attached is your free, customized and unique Sportzfund game card with the players you hope score lots of fantasy points!</td>
									    </tr>
									    <tr>
									      <td><h1>Your players are:</h1></td>
									    </tr>
									    <tr>
									      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="players">
									  <tr>
									    <td width=" 20">1.</td>
									    <td>J. Bruce - Cin</td>
									  </tr>
									  <tr>
									    <td>2.</td>
									    <td>D. Ortiz - Bos</td>
									  </tr>
									  <tr>
									    <td>3.</td>
									    <td>C. Beltran - Stl</td>
									  </tr>
									  <tr>
									    <td>4.</td>
									    <td>M. Moreland - Tex</td>
									  </tr>
									  <tr>
									    <td>5.</td>
									    <td>C. Rasmus - Tor</td>
									  </tr>
									  <tr>
									    <td>6.</td>
									    <td> A. Escobar - KC</td>
									  </tr>
									</table>
										  </td>
									    </tr>
										<tr>
									      <td>Your game card will be active from: (Game is active daily except for Monday’s and Thursday’s)</td>
									    </tr>
									    <tr>
									      <td style="padding: 8px 0;">4/1 – 4/30.  </td>
									    </tr>
									    <tr>
									      <td>Once your scoring period is active, you can check to see if your card is a winner anytime by going to http://www.sportzfund.com/didiwin.  From there, simply type in the unique access code on your game card and we will tell you whether your card was a winner.  If you win, your money will automatically be sent to you within 10-14 business days so if you never check your game card rest assured you will get paid anyway! </td>
									    </tr>
										<tr>
									      <td>For official baseball rules, please visit </td>
									    </tr>
										<tr>
									      <td style="padding: 8px 0;"><a href="#">http://www.sportzfund.com/fundraisers/baseball.</a></td>
									    </tr>
										<tr>
									      <td>If you have any questions, please contact us anytime at info@sportzfund.com.</td>
									    </tr>
										<tr>
									      <td style="padding: 8px 0;">Best of luck with your game card!</td>
									    </tr>
										<tr>
									      <td>Sportzfund, Inc.</td>
									    </tr>
									    <tr>
									      <td><img src="images/spacer.gif" alt="" width="1" height="23" /></td>
									    </tr>
									  </table>';

					$user_message .=$this->config->item("email_closing");
					$message=$this->_get_email_template(1,$user_message);
					$this->email->message($message);

					$this->email->send();
					//exit;
			        }	// ACK success ends
					$this->session->unset_userdata('errormsg');
					$this->session->unset_userdata('post');

					redirect("organization/donationsuccess/");

			}

		$this->load->view('frontend/donate');
	}

	function donationsuccess() {
		$this->load->theme('sportzfund');
		$data['getscoringperiod'] = $this->adminscoringperiodmodel->get_scoring_period_details();

		$data['player_details'] = $this->adminplayermodel->listPlayerByGroupRand();

					//print_r($data);exit;
		$this->load->view('frontend/donationsuccess',$data);
	}


	function finance() {
		$user_id=$this->session->userdata('userid');
		if(empty($user_id)){
			redirect("/");
		}

		$data['userdetail']=$this->usermodel->getuser($user_id);
		//print_r($data['userdetail']['orgname']);
		$data['scoringperiod'] = $this->adminreportmodel->listscoringperiod();
		for($k=0;$k<count($data['scoringperiod']);$k++)
		{
			        $from=$data['scoringperiod'][$k]['from'];
					$to=$data['scoringperiod'][$k]['to'];
			         $string=$to;
					 $mnt=substr($string,3,2);
					 $cur_mnt=date('m');
					 if($mnt==$cur_mnt)
					 {
					$data['sale']=$this->adminreportmodel->listInvoiceTotal($from,$to,$data['userdetail']['orgname']);
					 
					 }
		}
		$data['lifetimesale']=$this->adminreportmodel->listInvoiceLifetime($data['userdetail']['orgname']);
		//print_r($data['sale']['0']);
		//echo $data['sale']['0']['dn'];
		//exit;
		//$data['sale']=$this->adminreportmodel->getuser($data['userdetail']['orgname']);
		
		$this->load->view('frontend/orgfinance', $data);
	}




	function ipn(){
		echo 'IPN Page!!!';
	     print_r($_REQUEST);
	     exit;
	   $to    = 'unified.aditya@gmail.com';
	   if ($this->paypal_lib->validate_ipn()) {
	      $body  = 'An instant payment notification was successfully received from ';
	      $body .= $this->paypal_lib->ipn_data['payer_email'] .
	       ' on '.date('m/d/Y') . ' at ' . date('g:i A') . "\n\n";
	      $body .= " Details:\n";
	      foreach ($this->paypal_lib->ipn_data as $key=>$value)
	            $body .= "\n$key: $value";

	     // load email lib and email results
	     $this->load->library('email');
	     $this->email->to($to);
	     $this->email->from($this->paypal_lib->ipn_data['payer_email'], $this->paypal_lib->ipn_data['payer_name']);
	     $this->email->subject('Received Payment');
	     $this->email->message($body);
	     $this->email->send();


	   }
}






	/***************************************************/



	function activation(){

			 $act=$this->uri->segment(3);

			$this->usermodel->activate($act);

			 $this->load->theme('sportzfund');
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