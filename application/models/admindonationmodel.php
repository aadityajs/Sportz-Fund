<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class admindonationmodel extends CI_Model {



	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}


//===========================================================================================================


	function listAllDonation(){
		$this->db->select('*');
		$this->db->order_by("orgname", "asc");
		$Q = $this->db->get('donation');
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


	function listAllDonation1(){
		$this->db->distinct('coupon');
		$this->db->select('orgname');
		$this->db->select('coupon');
		$this->db->order_by("orgname", "asc");
		$this->db->count_all('donation');
		
		$Q = $this->db->get('donation');
		
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



	function get_player_details($player_id)
	 {
		$option=array('player_id' => $player_id);
		$query=$this->db->get_where('players',$option);
		if($query->num_rows()>0)
		{
			$data = $query->row_array();
		}
		else{
		$data="";
		}
		return $data;
	 }

	

	 function chngStatus($stat,$id) {

		//echo $stat;
		//echo $id;
		$stat == 'active' ? $stat = 'inactive' : $stat = 'active';
	 	$this->db->where('don_id', $id);
	 	$this->db->update('donation', array('is_active' => $stat));
		redirect('admin/donation/show');
	 }

	function deletePlayer($don_id) {
		$this->db->delete('donation', array('don_id' => $don_id));
		redirect('admin/donation/show');
	}


	function getCouponsById($org_uname) {
	    $this->db->select('*');
		
	    $this->db->where('orgname', $org_uname);
		$this->db->where('is_active', 'active'); 
		$Q = $this->db->get('donation');
		//echo '++++++++++++++++++++++'.$this->db->last_query();
		//exit;

		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
		}
		else
		return false;
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