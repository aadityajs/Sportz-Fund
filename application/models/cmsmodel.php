<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class Cmsmodel extends CI_Model {



	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}


//===========================================================================================================


	 function get_page($cms_id){
		 $option=array('cms_id' => $cms_id);
		$query=$this->db->get_where('cms',$option);
		if( $query->num_rows()>0){
			return $query->row_array();

		}else{
		return false;
		}
	 }

	 function search_code($code){
	 //echo $code;
		 $option=array('winner_coupon' => $code);
		$query=$this->db->get_where('winner',$option);

		if( $query->num_rows()>0){

			return $query->row_array();

		}else{
		return false;
		}
	 }

	 function get_faq(){
		 $option=array('is_active' => 'Y');
		$query=$this->db->get_where('faq',$option);
		if( $query->num_rows()>0){
			return $query->result_array();

		}else{
		return false;
		}
	 }

	 function get_faq_in(){
		 $option=array('is_active' => 'N');
		$query=$this->db->get_where('faq',$option);
		if( $query->num_rows()>0){
			return $query->result_array();

		}else{
		return false;
		}
	 }


	 function send_contact(){

		$data= array(
			   'cont_name' =>$this->input->post('name'),
			   'cont_email' => $this->input->post('email'),
			   'cont_number' => $this->input->post('phone_no'),
               'content' => $this->input->post('content'),
			   'reason' => $this->input->post('reason'),
                 );

		  $this->db->insert('contact_email', $data);

	 }


}