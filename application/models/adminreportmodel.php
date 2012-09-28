<?php
if (! defined('BASEPATH')) exit('No direct script access');

//date_default_timezone_set ("Asia/Calcutta");

class adminreportmodel extends CI_Model {



	function __construct()
    {
		// Call the Model constructor
        parent::__construct();
		$this->load->database();
		}


//===========================================================================================================


	function listOrganization(){
		$this->db->select('*');
		$this->db->order_by("don_id", "asc");
		$Q = $this->db->get('donation');
		

		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
		}
		else
		return false;
	}
	
	function listOrganizationSearch($search_fname,$search_lname){
		$this->db->select('*');
		$this->db->order_by("don_id", "asc");
		$this->db->like('fname', $search_fname); 
		$this->db->like('lname', $search_lname); 
		$Q = $this->db->get('donation');
		
		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
		}
		else
		return false;
	}
	
	function listSaleSearch($search){
	
		
		$Q = $this->db->query("SELECT SUBSTRING(date, 1, 10) as fdate,card_type,`orgname`,sum(donation) as dn from `sf_donation` where date LIKE '". $search."%' group by fdate");
		
		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
		}
		else
		return false;
	}

	function listAllWinner(){
		$this->db->select('*');
		$this->db->order_by("winner_name", "asc");
		$Q = $this->db->get('winner');

		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
		}
		else
		return false;
	}
	
	
	function listAllWinnerSearch($search_period){
	
		$this->db->select('*');
		$this->db->like('win_period', $search_period); 
		$this->db->order_by("winner_name", "asc");
		$this->db->where('is_active', 'active'); 
		$Q = $this->db->get('winner');
		
		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
		}
		else
		return false;
	}

		
		
	function listscoringperiod(){
		$this->db->select('*');
		$this->db->order_by("sp_id", "asc");
		$Q = $this->db->get('scoring_period');
		

		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
		}
		else
		return false;
	}
	
	function listInvoice(){
	
		
		//$Q = $this->db->query("SELECT SUBSTRING(invoice_date, 1, 10) as fdate,pay_type,status,invoice_id,invoice_date,invoice_from,invoice_to,`org`,sum(don) as dn from `sf_invoice`  group by fdate");
		$Q = $this->db->query("SELECT SUBSTRING(invoice_date, 1, 10) as fdate,pay_type,status,invoice_id,invoice_date,invoice_from,invoice_to,`org`,sum(don) as dn from `sf_invoice`  group by fdate");
		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
			
		}
		else
		return false;
	}
	
	function listInvoiceTotal($from,$to,$org){
	
		
		//$Q = $this->db->query("SELECT SUBSTRING(invoice_date, 1, 10) as fdate,pay_type,status,invoice_id,invoice_date,invoice_from,invoice_to,`org`,sum(don) as dn from `sf_invoice`  group by fdate");
		$Q = $this->db->query("SELECT invoice_date,pay_type,status,invoice_id,invoice_date,invoice_from,invoice_to,`org`,sum(don) as dn from `sf_invoice`  where invoice_date >'".$from."' and invoice_date< '".$to."' and org='".$org."'");
		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
			
		}
		else
		return false;
	}
	function listInvoiceLifetime($org){
	
		
		//$Q = $this->db->query("SELECT SUBSTRING(invoice_date, 1, 10) as fdate,pay_type,status,invoice_id,invoice_date,invoice_from,invoice_to,`org`,sum(don) as dn from `sf_invoice`  group by fdate");
		$Q = $this->db->query("SELECT sum(don) as ls from `sf_invoice`  where org='".$org."'");
		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
			
		}
		else
		return false;
	}
	 function chngStatus($stat,$date) {

		$stat == 'complete' ? $stat = 'due' : $stat = 'complete';
		
	 	$this->db->where('invoice_date', $date);
	 	$this->db->update('invoice', array('status' => $stat));
		
		redirect('admin/report/showinvoice');
	 }
	 function listBalanceTot(){
	
		
		$Q = $this->db->query("SELECT invoice_from,invoice_to,pay_type,org,sum(`don`) as don  FROM `sf_invoice` group by org");
		
		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
			
		}
		else
		return false;
	}
	 function listBalanceDue(){
	
		
		$Q = $this->db->query("SELECT invoice_from,invoice_to,pay_type,org,sum(`don`) as due  FROM `sf_invoice` where `status`='due' group by org");
		
		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
			
		}
		else
		return false;
	}
	 function listBalanceCom(){
	
		
		$Q = $this->db->query("SELECT invoice_from,invoice_to,pay_type,org,sum(`don`) as com  FROM `sf_invoice` where `status`='complete' group by org");
		
		if ($Q->num_rows() > 0){
			$row = $Q->result_array();
			return $row;
			
		}
		else
		return false;
	}
	
	
	/*function listMlbScoring(){
		$this->db->select('*');
		$this->db->order_by("from", "asc");
		$this->db->where('type', "mlb");
		$Q = $this->db->get('scoring_period');
		
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
         
		  $this->db->insert('scoring_period', $data);
	 }

	 function chngStatus($stat,$id,$type) {

		
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
	 }*/

}