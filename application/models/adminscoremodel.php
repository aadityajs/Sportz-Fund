<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class adminscoremodel extends CI_Model {



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
		//$option=array('game_id' => $sp_id);
		$query=$this->db->get('donation');
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
		//echo $id; exit;
		$stat == 'active' ? $stat = 'inactive' : $stat = 'active';
	 	$this->db->where('game_id', $id);
	 	$this->db->update('game_date', array('is_active' => $stat));
		if($type=='MLB')
		{
		redirect('admin/score/showmlb');
		}
		else
		{
			redirect('admin/score/shownfl');
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
	 //echo $sp_id;exit;
	// print_r($postdata);
	  			$count = $this->input->post('count_score'); 
				$name = $this->input->post('name');
				$orgname = $this->input->post('orgname');
				$score = $this->input->post('score');
				$points = $this->input->post('points');
				$this->chngStatus('inactive',$sp_id,$type);
				for ($j = 0; $j < ($count-1); $j++) {
				
			
				$data = array(
				 		'cust_name' =>$name[$j],
						'org_name' =>$orgname[$j],
						'fan_points' =>$score[$j],
						'per_score' =>$points[$j],
						'game_date_id' =>$sp_id
					   
						 );
				//print_r($data); echo "<br>";
				$this->db->insert('game_score', $data);
		
		}//exit;
			
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