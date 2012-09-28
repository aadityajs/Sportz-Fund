<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class adminorganizationmodel extends CI_Model {



	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}


//===========================================================================================================


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



	function get_org_details($org_id)
	 {
		$option=array('user_id' => $org_id);
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

	 function chngStatus($stat,$id) {

		//echo $stat;
		//echo $id;
		$stat == 'Y' ? $stat = 'N' : $stat = 'Y';
	 	$this->db->where('user_id', $id);
	 	$this->db->update('user', array('is_approved' => $stat));
		redirect('admin/organization/listOrganization');
	 }




	function deleteTeam($user_id) {
		//$this->db->delete('user', array('user_id' => $user_id));
		redirect('admin/organization/listOrganization');
	}


 	function editOrg($id)
	 {
		$data = array(
               $field => $this->input->post($field),
            );

        print_r($data);
        exit;
		$this->db->where('user_id', $id);
		$this->db->update('user', $data);
	 }



	 function edit($field,$id)

	 {


	$data = array(
               $field => $this->input->post($field),


            );

		$this->db->where('cms_id', $id);
		$this->db->update('cms', $data);



	 }

	 function add_faq()
	 {
	 $data= array(
			   'questions' =>$this->input->post('questions'),
			   'answers' => $this->input->post('answers'),
			   'is_active' => $this->input->post('is_active'),


                 );



		  $this->db->insert('faq', $data);
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