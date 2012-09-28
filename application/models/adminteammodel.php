<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class adminteammodel extends CI_Model {



	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}


//===========================================================================================================


	function listAllTeam(){
		$this->db->select('*');
		$this->db->order_by('team_name', 'asc');
		$Q = $this->db->get('team');
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

	 function chngStatus($stat,$id) {

		//echo $stat;
		//echo $id;
		$stat == 'active' ? $stat = 'inactive' : $stat = 'active';
	 	$this->db->where('team_id', $id);
	 	$this->db->update('team', array('is_active' => $stat));
		redirect('admin/team/show');
	 }

	function deleteTeam($team_id) {
		$this->db->delete('team', array('team_id' => $team_id));
		redirect('admin/team/show');
	}



	function get_team_details($team_id)
	 {
		$option=array('team_id' => $team_id);
		$query=$this->db->get_where('team',$option);
		if($query->num_rows()>0)
		{
			$data = $query->row_array();
		}
		else{
		$data="";
		}
		return $data;
	 }


	function add_team()
	 {
	 $data= array(
			   'team_name' =>$this->input->post('teamname'),
			   'is_active' => $this->input->post('teamstatus')
                 );
          //print_r($data);
          //exit;
		  $this->db->insert('team', $data);
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