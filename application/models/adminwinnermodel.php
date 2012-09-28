<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class adminwinnermodel extends CI_Model {



	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}


//===========================================================================================================


	function listAllWinner(){
		$this->db->select('*');
		$this->db->order_by("winner_name", "asc");
		$Q = $this->db->get('winner');
		//echo '++++++++++++++++++++++'.$this->db->last_query();
		//echo $Q->num_rows();
		//exit;

		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
		}
		else
		return false;
	}



	function get_scoring_details($sp_id,$type)
	 {
		$option=array('sp_id' => $sp_id);
		$query=$this->db->get_where('scoring_period',$option);
		if($query->num_rows()>0)
		{
			$data = $query->row_array();
		}
		else{
		$data="";
		}
		return $data;
	 }




	function add_winner()
	 {
	 //echo $this->input->post('period');exit;
	 $data = array(
			    'winner_name' =>end(explode('|', $this->input->post('coupon'))),
			    'winner_coupon' => reset(explode('|', $this->input->post('coupon'))),
	 			'winner_prize' => $this->input->post('prize'),
	 			'is_active' => $this->input->post('is_active'),
				'win_period' => $this->input->post('period'),
				'win_day' => $this->input->post('day')
                 );
         
		 /* $this->db->delete('donation', array('coupon' => reset(explode('|', $this->input->post('coupon')))));*/
		
		  $this->db->insert('winner', $data); $this->chngStatusDonation(reset(explode('|', $this->input->post('coupon'))));
	 }

	function chngStatusDonation($coupon) {

		
		//echo $coupon;exit;
		$stat = 'winner' ;
	 	$this->db->where('coupon', $coupon);
		$this->db->where('is_active', 'active');
	 	$this->db->update('donation', array('is_active' => $stat));
		redirect('admin/winner/show');
	 }


	 function chngStatus($stat,$id) {

		//echo $stat;
		//echo $id;
		$stat == 'active' ? $stat = 'inactive' : $stat = 'active';
	 	$this->db->where('player_id', $id);
	 	$this->db->update('players', array('is_active' => $stat));
		redirect('admin/player/show');
	 }

	function deleteDonation($player_id) {
		$this->db->delete('donation', array('coupon' => $player_id));
		//redirect('admin/player/show');
	}


	function editPlayer($player_id)
	 {
	$data = array(
                'player_name' =>$this->input->post('player_name'),
			   'is_active' => $this->input->post('player_status'),
	 			'player_group' => $this->input->post('player_group'),
	 			'player_team' => $this->input->post('player_team')
            );

		$this->db->where('player_id', $player_id);
		$this->db->update('players', $data);
		redirect('admin/player/show');
	 }



	 function edit($field,$id)
	 {
	$data = array(
               $field => $this->input->post($field),
            	);
		$this->db->where('cms_id', $id);
		$this->db->update('cms', $data);
	 }



	function edit_faq($field1,$field2,$field3,$id)

	 {


	$data = array(
               $field1 => $this->input->post($field1),
			   $field2 => $this->input->post($field2),
			   $field3 => $this->input->post($field3)


            );

		$this->db->where('faq_id', $id);
		$this->db->update('faq', $data);



	 }


	 function delete_faq($id)

	 {
		$this->db->delete('faq', array('faq_id' => $id));
	 }




	 function make_active($field1,$id)

	 {
		$data = array(
               $field1 => $this->input->post($field1),
            );

		$this->db->where('faq_id', $id);
		$this->db->update('faq', $data);
	 }

}