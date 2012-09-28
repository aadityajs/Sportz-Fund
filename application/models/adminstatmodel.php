<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class adminstatmodel extends CI_Model {



	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}


//===========================================================================================================


	function listPlayerPoints(){
		$this->db->select('*');
		$this->db->order_by("player_id", "asc");
		//$this->db->where('type', "mlb");
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

	function listMlbGamedate(){
		$this->db->select('*');
		$this->db->order_by("game_id", "asc");
		$this->db->where('type', "mlb");
		$Q = $this->db->get('game_date');
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

	function listNflGamedate(){
		$this->db->select('*');
		$this->db->order_by("game_id", "asc");
		$this->db->where('type', "nfl");
		$Q = $this->db->get('game_date');
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
		$option=array('is_active' => 'active');
		$query=$this->db->get('players');
		if($query->num_rows()>0)
		{
			$data = $query->result();
		}
		else{
		$data="";
		}
		return $data;
	 }




	function add_gamedate()
	 {
	 $data = array(
			    'game_year' =>$this->input->post('year'),
			    'game_month' => $this->input->post('month'),
	 			'game_day' => $this->input->post('day'),
				'game_period' => $this->input->post('period'),
				'type' => $this->input->post('type'),
	 			'is_active' => $this->input->post('is_active')
                 );
          //print_r($data);
          //exit;
		  $this->db->insert('game_date', $data);
	 }

	 function chngStatus($stat,$id,$type) {

		//echo $stat;
	//	echo $id; 
		$stat == 'active' ? $stat = 'inactive' : $stat = 'active';
	 	$this->db->where('game_id', $id);
	 	$this->db->update('game_date', array('is_active' => $stat));
		if($type=='MLB')
		{
		redirect('admin/stat/showmlb');
		}
		else
		{
			redirect('admin/stat/shownfl');
		}
	 }

	function deleteGamedate($game_id,$type) {
		$this->db->delete('game_date', array('game_id' => $game_id));
			if($type=='MLB')
			{
			redirect('admin/gamedate/showmlb');
			}
			else
			{
				redirect('admin/gamedate/shownfl');
			}
	}


	function editScoring($sp_id,$type,$postdata)
	 {
	// print_r($postdata);
	   $count = $this->input->post('count'); 
				$id = $this->input->post('id');
				$points = $this->input->post('points');
				$name = $this->input->post('name');
				$this->chngStatus('inactive',$sp_id,$type);
				for ($j = 0; $j < ($count-1); $j++) {
			
				 $data = array(
				 		'player_id' =>$id[$j],
						'player_name' =>$name[$j],
						'player_pts' =>$points[$j],
						'game_date_id'=>$sp_id
					   
						 );
				//print_r($data);
				/*$this->db->where('player_id', $id[$j]);
				$this->db->update('players', $data);*/
				$this->db->insert('player_pts', $data);
		
		}
			
			if($type=='MLB')
			{
			redirect('admin/stat/showmlb');
			}
			else
			{
				redirect('admin/stat/shownfl');
			}
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