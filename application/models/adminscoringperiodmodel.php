<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class adminscoringperiodmodel extends CI_Model {



	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}


//===========================================================================================================


	function listMlbScoring(){
		$this->db->select('*');
		$this->db->order_by("from", "asc");
		$this->db->where('type', "mlb");
		$Q = $this->db->get('scoring_period');
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

	function listNflScoring(){
		$this->db->select('*');
		$this->db->order_by("from", "asc");
		$this->db->where('type', "nfl");
		$Q = $this->db->get('scoring_period');
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
			$data = $query->row_result();
		}
		else{
		$data="";
		}
		return $data;
	 }

	function get_scoring_period_details()
	 {
		//$option=array('sp_id' => $sp_id);
		$query=$this->db->get('scoring_period');
		if($query->num_rows()>0)
		{
			$data = $query->result();
		}
		else{
		$data="";
		}
		return $data;
	 }


	function add_scoring_period()
	 {
	 $data = array(
			    'from' =>$this->input->post('from_date'),
			    'to' => $this->input->post('to_date'),
	 			'period' => $this->input->post('period'),
				'type' => $this->input->post('type'),
	 			'is_active' => $this->input->post('is_active')
                 );
          //print_r($data);
          //exit;
		  $this->db->insert('scoring_period', $data);
	 }

	 function chngStatus($stat,$id,$type) {

		//echo $stat;
		//echo $id;
		$stat == 'active' ? $stat = 'inactive' : $stat = 'active';
	 	$this->db->where('sp_id', $id);
	 	$this->db->update('scoring_period', array('is_active' => $stat));
		if($type=='MLB')
		{
		redirect('admin/scoringperiod/showmlb');
		}
		else
		{
			redirect('admin/scoringperiod/shownfl');
		}
	 }

	function deletePlayer($sp_id,$type) {
		$this->db->delete('scoring_period', array('sp_id' => $sp_id));
			if($type=='MLB')
			{
			redirect('admin/scoringperiod/showmlb');
			}
			else
			{
				redirect('admin/scoringperiod/shownfl');
			}
	}


	function editScoring($sp_id,$type)
	 {
	$data = array(
                'from' =>$this->input->post('from_date'),
			   'to' => $this->input->post('to_date'),
	 			'period' => $this->input->post('period'),
	 			'type' => $this->input->post('type')
            );
		//	print_r($data); exit;

		$this->db->where('sp_id', $sp_id);
		$this->db->update('scoring_period', $data);
			if($type=='MLB')
			{
			redirect('admin/scoringperiod/showmlb');
			}
			else
			{
				redirect('admin/scoringperiod/shownfl');
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