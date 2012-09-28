<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class admincmsmodel extends CI_Model {



	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}


//===========================================================================================================


	function listAllPages(){
		$this->db->select('*');
		$this->db->order_by("page_title", "asc");
		$Q = $this->db->get('cms');
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



	function get_cms_page($cms_id)
	 {
		$option=array('cms_id' => $cms_id);
		$query=$this->db->get_where('cms',$option);
		if($query->num_rows()>0)
		{
			$data = $query->row_array();
		}
		else{
		$data="";
		}
		return $data;
	 }




	function add_page()
	 {
	 $data= array(
			   'page_title' =>$this->input->post('page_title'),
	 		   'content' => $this->input->post('content'),
			   'is_active' => $this->input->post('is_active')
                 );
          //print_r($data);
          //exit;
		  $this->db->insert('cms', $data);
	 }

	 function chngStatus($stat,$cms_id) {

		//echo $stat;
		//echo '++++++++++++++'.$id;
		$stat == 'active' ? $stat = 'inactive' : $stat = 'active';
	 	$this->db->where('cms_id', $cms_id);
	 	$this->db->update('cms', array('is_active' => $stat));
		redirect('admin/cms/show');
	 }

	function deletePage($cms_id) {
		$this->db->delete('cms', array('cms_id' => $cms_id));
		redirect('admin/cms/show');
	}


	function editPage($cms_id)
	 {
	$data = array(
               'page_title' =>$this->input->post('page_title'),
	 		   'content' => $this->input->post('content'),
			   'is_active' => $this->input->post('is_active')
            );

		$this->db->where('cms_id', $cms_id);
		$this->db->update('cms', $data);
		redirect('admin/cms/show');
	 }



}