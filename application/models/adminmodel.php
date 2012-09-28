<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class Adminmodel extends CI_Model {



	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}


//===========================================================================================================


	  function verifyAdmin($username,$password){


		$this->db->select('*');
		$this->db->where('admin_email',$username);
		$this->db->where('admin_password', $password);

		$Q = $this->db->get('admin');
		//echo $this->db->last_query();
		//exit;

		if ($Q->num_rows() > 0){

			$row = $Q->row_array();

			$this->session->set_userdata('adminid', $row['admin_id']);
			$this->session->set_userdata('adminemail', $row['admin_email']);
			return $row;
		}
		else
		return false;

	}

		 function get_details($id)
	 {
		$option=array('admin_id' => $id);
		$query=$this->db->get_where('admin',$option);
		if($query->num_rows()>0)
		{
			$data = $query->row_array();

		}
		else{
		$data="";
		}

		return $data;

	 }


	 function showCurrentAdmin() {
	 	$admin_id = $this->session->userdata('adminid');
			if(empty($admin_id)){
				redirect("/admin/index/");
			}
		$id = $this->session->userdata('adminid');
		return $admindetail = $this->get_details($id);
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