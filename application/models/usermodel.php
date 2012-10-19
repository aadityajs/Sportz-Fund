<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class Usermodel extends CI_Model {
	var $fname;
	var $lname;


	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->helper('date');
		$this->image_path = realpath(APPPATH . '../uploads');
		}


//===========================================================================================================
	function listAllDon($orgname)
	{
		 $Q = $this->db->query("select sum(donation) sm from sf_donation where orgname='".$orgname."' order by orgname");

		if ($Q->num_rows() > 0){
			$row = $Q->row_array();
			return $row;
		}
		else
		return false;
	}
	function gettesti()
	{

		 $Q = $this->db->query("SELECT * FROM `sf_testimonial` WHERE `is_active`='active' order by rand() limit 1");

		if ($Q->num_rows() > 0){
			$row = $Q->row_array();
			return $row;
		}
		else
		return false;
	}


	function register_organization() {

		$img = $this->upload->data();
		$imgName = $img['file_name'];

		$orgRegDetails = array(
				    'orgname' => $this->input->post('orgname'),
					'ein' => $this->input->post('ein'),
					'namecont' => $this->input->post('namecont'),
					'address' => $this->input->post('address'),
					'citystatezip' => $this->input->post('citystatezip'),
					'phemail' => $this->input->post('phemail'),
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'contactaddress' => $this->input->post('contactaddress'),
					'contcitystatezip' => $this->input->post('contcitystatezip'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					//'confemail' => $this->input->post('confemail'),
					'orgusername' => $this->input->post('orgusername'),
					'password' => $this->input->post('password'),
					//'confpassword' => $this->input->post('confpassword'),
					'userimage' => $imgName,
					'game' => $this->input->post('game'),
					'how_did_u_hear' => $this->input->post('hearaboutus'),
					'how_did_u_find_out' => $this->input->post('hearaboutusdetails')
                );

			 //echo '<pre>'.print_r($orgRegDetails, true).'</pre>';
			 //exit;

		  $this->db->insert('user', $orgRegDetails);
	}

   function editPro($id) {


		$img = $this->upload->data();
		 $imgName = $img['file_name'];
	
		$orgRegDetails = array(

					'ein' => $this->input->post('ein'),
					'namecont' => $this->input->post('namecont'),
					'address' => $this->input->post('address'),
					'citystatezip' => $this->input->post('citystatezip'),
					'phemail' => $this->input->post('phemail'),
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'contactaddress' => $this->input->post('contactaddress'),
					'contcitystatezip' => $this->input->post('contcitystatezip'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),

					'password' => $this->input->post('password'),
					//'confpassword' => $this->input->post('confpassword'),
					'userimage' => $imgName

                );

			// echo '<pre>'.print_r($orgRegDetails, true).'</pre>';
			// exit;

		$this->db->where('user_id', $id);
		$this->db->update('user', $orgRegDetails);
		// $this->db->insert('user', $orgRegDetails);
	}

	function forget_password($pass)
	{
		 $Q = $this->db->query("SELECT * FROM `sf_user` WHERE `email`='".$this->input->post('email')."' ");

		if ($Q->num_rows() > 0){
			$row = $Q->row_array();
			 $temp_password =  $pass;
			$forgetpass = array(
				    'uid' => $row['user_id'],
					'email' =>  $this->input->post('email'),
					'temp_pass' => $temp_password,
			   );
			    $this->db->insert('temp_password', $forgetpass);
			return true;
		}
		else
		return false;
	}
	function change($pass)
	{
		$Q = $this->db->query("SELECT * FROM `sf_temp_password` WHERE `temp_pass`='".$pass."' ");
		if ($Q->num_rows() > 0){
			$row = $Q->row_array();
			$pass= $this->input->post('pass2');
			$resetpass = array(
				    'password' => $this->input->post('pass2')

			   );
			   $this->db->where('user_id', $row['uid']);
			   $this->db->update('user', $resetpass);
			   $this->db->delete('temp_password', array('id' => $row['id']));
			   return true;
			}
			else
			return false;

	}
	function insertTesti($id) {


		$testiDetails = array(
				    'user_id' => $id,
					'user_name' =>  $this->input->post('name'),
					'msg' => $this->input->post('msg'),
					'is_active' => 'active'
			   );

			 //echo '<pre>'.print_r($orgRegDetails, true).'</pre>';
			 //exit;

		  $this->db->insert('testimonial', $testiDetails);
	}
	function insertHardcopy($coupon) {


		$hardcopyDetails = array(

					'fname' =>  $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'add' => $this->input->post('add'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'zip' => $this->input->post('zip'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'support' => $this->input->post('support'),
					'code' => $this->input->post('code'),
					'is_active' => 'active'
			   );

			$data = array(
               'is_active' => 'active'


            );

		$this->db->where('coupon', $coupon);
		$this->db->update('donation', $data);
			// echo '<pre>'.print_r($hardcopyDetails, true).'</pre>';
			 //exit;

		 // $this->db->insert('testimonial', $testiDetails);
	}


	function update_pass()
	{

	$id=$this->session->userdata('userid');
	$data = array(
               'password' => $this->input->post('password'),
			   'temp_password'=>""

            );

		$this->db->where('user_id', $id);
		$this->db->update('user', $data);

	}


	 function check_duplicate($email)
	 {
		$data = array();
		//$option=array('username' => $uname);

		$this->db->where('email =', $email);
		$query=$this->db->get('user');

	    $data = $query->num_rows();



		$query->free_result();
		 return $data;

	 }


	function getuser($id)
	 {
		$data = array();
		$option=array('user_id' => $id);
		$query=$this->db->get_where('user',$option,1);
		if($query->num_rows()>0)
		{
			$data = $query->row_array();
		}
		$query->free_result();
		 return $data;
	 }


	 function verifyUser($username,$password){
		$this->db->select('*');
		$this->db->where('email',$username);
		$this->db->where('password', $password);
		$this->db->or_where('temp_password', $password);
		$this->db->where('is_active', 'Y');
		$this->db->where('is_approved', 'Y');

		$Q = $this->db->get('user');


		if ($Q->num_rows() > 0){
			$row = $Q->row_array();

			$this->session->set_userdata('userid', $row['user_id']);
			$this->session->set_userdata('orgname', $row['orgname']);
			$this->session->set_userdata('useremail', $row['email']);
			$this->session->set_userdata('usertype', $row['account_type']);
			return $row;
		}

	}//verifyUser

	function totalDonation() {
		//totalDonation;
		$this->db->select_sum('donation');
		$this->db->where('status', 'Success');
		$Q = $this->db->get('donation');
		//echo '++++++++++++++++++++++'.$this->db->last_query();
		//exit;

		if ($Q->num_rows() > 0){
			$row = $Q->row_array();
			return $row;
		}
		else
		return false;
	}


	function activate($id)

	{

	$data = array(
               'is_active' => 'Y'
            );
		$this->db->where('activation_code', $id);
		$this->db->update('user', $data);

	}



	function listAllOrg(){
		$this->db->select('*');
		$this->db->order_by("orgname", "asc");
		$Q = $this->db->get('user');
		//echo '++++++++++++++++++++++'.$this->db->last_query();
		//exit;

		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
		}
		else
		return false;
	}

	function winnerBrodcast(){
		$this->db->select('*');
		$this->db->order_by("winner_name", "asc");
		$Q = $this->db->get('winner');
		//echo '++++++++++++++++++++++'.$this->db->last_query();
		//exit;

		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
		}
		else
		return false;
	}


	function order_card($proResponse) {
		$cardOrderDetails = array(
				   'orgnization' => $this->input->post('org'),
					'tickets' => $this->input->post('ticket'),
					'delivery' => $this->input->post('ship_method'),
					'payment' => $this->input->post('payment_method'),
					'card_type' => $this->input->post('cardType'),
					'card_no' => $this->input->post('cardNo'),
					'exp_mnt' => $this->input->post('expMnt'),
					'exp_year' => $this->input->post('expYear'),
					'cvv' => $this->input->post('cvv'),
					'ship_fname' => $this->input->post('ship_fname'),
					'ship_lname' => $this->input->post('ship_lname'),
					'ship_address' => $this->input->post('ship_add'),
					'ship_citystatezip' => $this->input->post('ship_citystatezip'),
					'ship_ph' => $this->input->post('ship_ph'),
					'ship_email' => $this->input->post('ship_email'),
					'date' => $proResponse['TIMESTAMP'],
					'status' => 'pending',
					'payment_status' => $proResponse['ACK'],
					'amount' => $proResponse['AMT'],
					'tran_id' => $proResponse['TRANSACTIONID']
                );

             $this->session->set_userdata(array('cardorder' =>
             									array('ticket' => $cardOrderDetails['tickets'],
             									'delivery' => $cardOrderDetails['delivery'],
             									'orgnization' => $cardOrderDetails['orgnization'],
									            'ship_name' => $cardOrderDetails['ship_fname'].' '.$cardOrderDetails['ship_fname'],
									            'ship_address' => $cardOrderDetails['ship_address'],
									            'ship_citystatezip' => $cardOrderDetails['ship_citystatezip'],
									            'ship_ph' => $cardOrderDetails['ship_ph'],
									            'amount' => $cardOrderDetails['amount'],
									            'tran_id' => $cardOrderDetails['tran_id'])
             									));

			 //echo '<pre>'.print_r($cardOrderDetails, true).'</pre>';
			 //echo '<pre>'.print_r($proResponse, true).'</pre>';
			 //exit;

		  $this->db->insert('card_orders', $cardOrderDetails);
	}
function donation($proResponse,$playerdetails) {


					$amt= ($proResponse['AMT']/10);
					$coupon='';
					for($r=0;$r<$amt;$r++)
					{
					$coupon.=strtoupper($this->str_rand()).',';
					}
	          $this->session->set_userdata('coupon', $coupon);

		$donationDetails = array(
				    'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'contactaddress' => $this->input->post('contactaddress'),
					'contcitystatezip' => $this->input->post('contcitystatezip'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'supportedname' => $this->input->post('supportedname'),
					'orgname' => $this->uri->segment(3),
					'donation' => $proResponse['AMT'],
					'coupon' => $coupon,

					'payment' => $this->input->post('payment_method'),
					'card_type' => $this->input->post('cardType'),
					'card_no' => $this->input->post('cardNo'),
					'exp_mnt' => $this->input->post('expMnt'),
					'exp_year' => $this->input->post('expYear'),
					'cvv' => $this->input->post('cvv'),
					'bill_fname' => $this->input->post('bill_fname'),
					'bill_lname' => $this->input->post('bill_lname'),
					'bill_address' => $this->input->post('bill_add'),
					'bill_citystatezip' => $this->input->post('bill_citystatezip'),
					'date' => $proResponse['TIMESTAMP'],
					'status' => $proResponse['ACK'],
					'is_Active' => 'inactive',
					'tran_id' => $proResponse['TRANSACTIONID']
                );
				$this->db->insert('donation', $donationDetails);
				$don_id=$this->db->insert_id() ;
				 //$this->session->set_userdata('don_id', $don_id);

				 $Q = $this->db->query('select * from sf_scoring_period');


				if ($Q->num_rows() > 0){
					$row = $Q->result_array();
							foreach($row as $r)
							{

								$from = $r['from'];
								$to = $r['to'];

							 $string=$to;
							 $mnt=substr($string,3,2);
							 $cur_mnt=date('m');
									 if($mnt==$cur_mnt)
									 {
										$from = $r['from'];
										$to = $r['to'];
										$invoice=array(
												'invoice_from' =>$from,
												'invoice_to'=>$to,
												'invoice_date'=>date('Y-m-d'),
												'org'=>$this->uri->segment(3),

												'don'=> $proResponse['AMT'],
												'pay_type'=>$this->input->post('payment_method'),
												'status'=>'due'

												);
									$this->db->insert('invoice', $invoice);	
									break;

									 }
									 

							 }


				}


			/* if ($this->session->userdata('coupon')) {
				 $coup=$this->session->userdata('coupon').','.$coupon;
				 $this->session->set_userdata('coupon', $coup);
			 }
			 else
			 {
				$this->session->set_userdata('coupon', $coupon);
			 }*/
				//echo $this->session->userdata('coupon');
				/*for($m=0;$m<count($playerdetails);$m++)
				{
					$player=array(
					'player_id' =>$playerdetails[$m]['player_id'],
					'player_name'=>$playerdetails[$m]['player_name'],
					'add_date'=>$proResponse['TIMESTAMP'],
					'coupon'=>$coupon,

					'org_name'=>$this->uri->segment(3),
					'cust_name'=>$this->input->post('fname')

					);
					 $this->db->insert('game_card', $player);
				}*/

				/*$coupDetails = array(
				'coupon' => $this->session->userdata('coupon')

				 );
				$this->db->where('don_id',  $this->session->userdata('don_id'));
				$this->db->update('donation', $coupDetails);*/

			$this->updatePlayers($don_id);



	}
	function updatePlayers($id)
	{
		 $Q = $this->db->query("SELECT * FROM `sf_donation` WHERE don_id='".$id."'");

		if ($Q->num_rows() > 0){
			$row = $Q->row_array();
			$arr=explode(',',$row['coupon']);

			for($k=0;$k<count($arr)-1;$k++)
			{
			$playerdetails[$k]=$this->listPlayerByGroupRand();
			//echo '<pre>';print_r($playerdetails[$k]);
			for($m=0;$m<count($playerdetails[$k]);$m++)
				{
				
					$player[$k]=array(
					'player_id' =>$playerdetails[$k][$m]['player_id'],
					'player_name'=>$playerdetails[$k][$m]['player_name'],
					'add_date'=>date('Y-m-d'),
					'coupon'=>$arr[$k],

					'org_name'=>$row['orgname'],
					'cust_name'=>$row['fname']

					);
					//echo '<pre>';print_r($player[$k]);
					 $this->db->insert('game_card', $player[$k]);
				}
			//echo $arr[$k];
			}

			return true;
		}
		else
		return false;
	}

	function listPlayerByGroupRand() {
		$this->db->select('*');
		//$this->db->group_by("player_group");


		$Q = $this->db->query('
						SELECT tmp.player_name,tmp.player_id, tmp.player_team,tmp.player_group
						FROM sf_players
						LEFT JOIN (SELECT * FROM sf_players ORDER BY RAND()) tmp ON (sf_players.player_group= tmp.player_group)
						GROUP BY tmp.player_group
						ORDER BY RAND();');
		//echo '++++++++++++++++++++++'.$this->db->last_query();
		//echo $Q->num_rows();
		//exit;

		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;

			//echo '<pre>'.print_r($row, true).'</pre>';
			//exit;
		}
		else
		return false;
	}

	function insertCashpaying($id,$playerdetails) {

		$contcitystatezip=$this->input->post('city').','.$this->input->post('state').','.$this->input->post('zip');
		$this->session->unset_userdata('coupon');
		$coupon=strtoupper($this->str_rand());
		$dt=date('Y-m-d');

		$user=$this->getuser($id);
		//echo $user['orgname'];exit;
		$amt= ($this->input->post('donate')/10);
					$coupon='';
					for($r=0;$r<$amt;$r++)
					{
					$coupon.=strtoupper($this->str_rand()).',';
					}
	          $this->session->set_userdata('coupon', $coupon);
		$cashpayingDetails = array(

					'fname' =>  $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'contactaddress' => $this->input->post('add'),
					'contcitystatezip' => $contcitystatezip,

					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'supportedname' => $this->input->post('support'),
					'orgname' => $user['orgname'],
					'donation' => $this->input->post('donate'),
					'coupon' => $coupon,
					'payment' => 'cash',
					'date' => $dt,
					'status' => 'Success',
					'is_Active' => 'inactive',
			   );
				//$this->session->set_userdata('coupon', $coupon);
			$this->db->insert('donation', $cashpayingDetails);
			$don_id=$this->db->insert_id();
			
			/*for($m=0;$m<count($playerdetails);$m++)
				{
					$player=array(
					'player_id' =>$playerdetails[$m]['player_id'],
					'player_name'=>$playerdetails[$m]['player_name'],
					'add_date'=>$dt,
					'coupon'=>$coupon,

					'org_name'=>$user['orgname'],
					'cust_name'=>$this->input->post('fname')

					);
					 $this->db->insert('game_card', $player);
				}*/

				$Q = $this->db->query('select * from sf_scoring_period');


				if ($Q->num_rows() > 0){
					$row = $Q->result_array();
							foreach($row as $r)
							{

								$from = $r['from'];
								$to = $r['to'];

							 $string=$to;
							 $mnt=substr($string,3,2);
							 $cur_mnt=date('m');
									 if($mnt==$cur_mnt)
									 {
										$from = $r['from'];
										$to = $r['to'];
										 $invoice=array(
												'invoice_from' =>$from,
												'invoice_to'=>$to,
												'invoice_date'=>$dt,
												'org'=>$user['orgname'],

												'don'=> $this->input->post('donate'),
												'pay_type'=>'cash',
												'status'=>'due'

												);
									$this->db->insert('invoice', $invoice);
										break;

									 }
									

							 }


				}


		$this->updatePlayers($don_id);
		
	}




	 function get_template($template_id){
	 //echo '-------';
		 //$option=array('template_id' => $template_id);
	//$this->db->select('jj');
	// $this->db->where('template_id', $template_id);
		$query=$this->db->query("select * from sf_email_template where template_id='".$template_id."'");
		if( $query->num_rows()>0){
			return $query->row_array();
			// echo $this->db->last_query();echo '++++++++++++++';exit;
		}else{
		//echo '-------';
			return false;
		}
	 }


	 function get_ques()
	 {
		$option=array('is_active' => 'Y');
		//$this->db->order_by("ques_id", "desc");
		$query=$this->db->get_where('security_ques',$option);
		if($query->num_rows()>0)
		{
			$data = $query->result_array();
			return $data;
		}
		else{
		return false;
		}

	 }


	  function get_details($id)
	 {
		$option=array('user_id' => $id);
		//$this->db->order_by("ques_id", "desc");
		$query=$this->db->get_where('user',$option);
		if($query->num_rows()>0)
		{
			$data = $query->row_array();

		}
		else{
		$data="";
		}

		return $data;

	 }


	/**
	 * Generates a random charecter code.
	 * @param $length
	 * @param $seeds
	 */
	function str_rand($length = 16, $seeds = 'alphanum')
	{
		// Possible seeds
		$seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyz';
		$seedings['numeric'] = '0123456789';
		$seedings['alphanum'] = 'abcdefghijklmnopqrstuvwqyz0123456789';
		$seedings['hexidec'] = '0123456789abcdef';

		// Choose seed
		if (isset($seedings[$seeds]))
		{
			$seeds = $seedings[$seeds];
		}

		// Seed generator
		list($usec, $sec) = explode(' ', microtime());
		$seed = (float) $sec + ((float) $usec * 100000);
		mt_srand($seed);

		// Generate
		$str = '';
		$seeds_count = strlen($seeds);

		for ($i = 0; $length > $i; $i++)
		{
			$str .= $seeds{mt_rand(0, $seeds_count - 1)};
		}

		return $str;
	}












	 function secure_ans()

	 {

	 $ans=$this->input->post('secure_ans');
	 $ques=$this->input->post('ques_id');


	/* for($i=0;$i<count($ans);$i++);

	 {
	  $data = array(
			   'user_id' => $this->session->userdata('userid'),
			   'ques_id' => $this->input->post('school_add'),
			   'answers' => $ans[$i]


                 );


		 $this->db->insert('security_answers', $data);

		}*/
		$i = 0;
		while($i<count($ans))
		{
			 $data = array(
			   'user_id' => $this->session->userdata('userid'),
			   'ques_id' => $ques[$i],
			   'answers' => $ans[$i]


                 );

				 $this->db->insert('security_answers', $data);

				$i++;
		}


	 }

	 function edit($field,$id)

	 {


	$data = array(
               $field => $this->input->post($field),


            );

		$this->db->where('user_id', $id);
		$this->db->update('user', $data);



	 }


	 function edit_addrs($field1,$field2,$field3,$field4,$field5,$id)

	 {


	$data = array(
               $field1 => $this->input->post($field1),
			   $field2 => $this->input->post($field2),
			   $field3 => $this->input->post($field3),
			   $field4 => $this->input->post($field4),
			   $field5 => $this->input->post($field5),


            );

		$this->db->where('user_id', $id);
		$this->db->update('user', $data);



	 }


	 function edit_three($id)

	 {

	  if($_FILES['userfile']['name']!='')
   {
	   $config = array(
		'allowed_types' => 'jpg|jpeg|gif|png',
		'upload_path' => $this->image_path,
		'max_size' => 2000
	   );
   		$this->load->library('upload', $config);
	   if ( ! $this->upload->do_upload())
	   {



	   $image_data="";
		$this->session->set_flashdata('error',$this->upload->display_errors('',''));
	   }
	   else
	   {


		$image_data = $this->upload->data("");
	   }
	   $file_name=$image_data['file_name'];
	   $file_size=$image_data['file_size'];
	   $file_ext=$image_data['file_ext'];
   }

  else
  {
   $image_data="";
   $file_name='';
   $file_size='';
   $file_ext='';
  }

	 if($file_name)
	 {


	$data = array(

               image => $file_name,
			   fname => $this->input->post('fname'),
			   sex => $this->input->post('sex'),


            );

			}


			else

			{


			$data = array(


			   fname => $this->input->post('fname'),
			   sex => $this->input->post('sex'),


            );


			}

		$this->db->where('user_id', $id);
		$this->db->update('user', $data);



	 }

	  function edit_availability($id)

	 {


	 //print_r($this->input->post('available_days'));

	// die();

	 $days=$this->input->post('available_days');

	if(in_array('M',$days))
	{

	$mon='Y';


		$data = array(
               'mon' => $mon,



            );

		$this->db->where('user_id', $id);
		$this->db->update('availability', $data);


	}



	if(in_array('Tu',$days))
	{

	$tue='Y';

			$data = array(
               'tue' => $mon,



            );

		$this->db->where('user_id', $id);
		$this->db->update('availability', $data);


	}



	if(in_array('W',$days))
	{

	$wed='Y';
			$data = array(
               'wed' => $wed,



            );

		$this->db->where('user_id', $id);
		$this->db->update('availability', $data);


	}

	if(in_array('Th',$days))
	{

	$thu='Y';


	$data = array(
               'thu' => $thu,



            );

		$this->db->where('user_id', $id);
		$this->db->update('availability', $data);



	}


	//die($mon);


	/*$data = array(
               'mon' => $mon,
			    'tue' => $tue,
				 'wed' => $wed,
				  'thu' => $thu,


            );

		$this->db->where('user_id', $id);
		$this->db->update('availability', $data); 	 */



	 }



	  function delete_image($id)

	 {





	$data = array(
               'image' => "",


            );

		$this->db->where('user_id', $id);
		$this->db->update('user', $data);



	 }

	 function make_inactive($id)


	 {


	$data = array(
               'is_active' => 'N',


            );

		$this->db->where('user_id', $id);
		$this->db->update('user', $data);




		 $data2 = array(
			   'user_id' => $id,
			   'reason' => $this->input->post('reason'),
			   'explaination' => $this->input->post('explain'),
               'change_date' => time(),
			   'changed_to'=>'N',

                 );


		 $this->db->insert('status_history', $data2);



	 }



	  function make_active($id)


	 {


	$data = array(
               'is_active' => 'Y',


            );

		$this->db->where('user_id', $id);
		$this->db->update('user', $data);




		 $data2 = array(
			   'user_id' => $id,


               'change_date' => time(),
			   'changed_to'=>'Y',

                 );


		 $this->db->insert('status_history', $data2);










	 }

	 function send_message($from_id,$to_id)

	 {


	  $datam = array(
			   'to_id' => $to_id,
			    'from_id' => $from_id,
			 'subject' =>$this->input->post('subject'),
               'message' =>$this->input->post('msg'),


                 );


		 $this->db->insert('message', $datam);





	 }








}