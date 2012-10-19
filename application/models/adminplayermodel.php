<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class adminplayermodel extends CI_Model {



	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}


//===========================================================================================================

	function search_pts($period,$player)
	{
	//print_r($player[0]);
	//echo count($player);
	$sum=0;
	for($i=0;$i<count($player);$i++)
	{
		//echo $player[$i]['player_id'];echo '<br>';
	$Q=$this->db->query("select pt.player_pts from sf_player_pts pt,sf_game_date dt where pt.game_date_id=dt.game_id and dt.game_period='".$period."' and pt.player_id='".$player[$i]['player_id']."'");
	
	
	if ($Q->num_rows() > 0){
			$row = $Q->row_array();
			//echo $row['player_pts'];
			 $sum=$sum+$row['player_pts'];
			//return $row;
		}
		//else
		//return false;
		}
		return $sum;	
		}

	function listAllPlayer(){
		$this->db->select('*');
		$this->db->order_by("player_name", "asc");
		$Q = $this->db->get('players');
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
	function listAllGameCard($coupon){
	//echo $coupon;exit;
		/*$this->db->select('*');
		$this->db->where('coupon', $coupon);
		$this->db->order_by("player_name", "asc");
		$Q = $this->db->get('game_card');*/
		
		$Q=$this->db->query("select * from sf_game_card where coupon='".$coupon."' order by player_name");
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

	function listAllPlayerByGroup($groupName) {
		$this->db->select('*');
		$this->db->where('player_group', $groupName);
		$this->db->order_by("player_group", "asc");
		$Q = $this->db->get('players');
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




	function add_player()
	 {
	 $data= array(
			   'player_name' =>$this->input->post('player_name'),
			   'is_active' => $this->input->post('player_status'),
	 			'player_group' => $this->input->post('player_group'),
	 			'player_team' => $this->input->post('player_team')
                 );
          //print_r($data);
          //exit;
		  $this->db->insert('players', $data);
	 }

	 function chngStatus($stat,$id) {

		//echo $stat;
		//echo $id;
		$stat == 'active' ? $stat = 'inactive' : $stat = 'active';
	 	$this->db->where('player_id', $id);
	 	$this->db->update('players', array('is_active' => $stat));
		redirect('admin/player/show');
	 }

	function deletePlayer($player_id) {
		$this->db->delete('players', array('player_id' => $player_id));
		redirect('admin/player/show');
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