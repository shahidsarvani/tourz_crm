<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_report_model extends CI_Model {

	 function __construct() {
		parent::__construct();  
	} 
  	/* $userid1,$years1,$month1,$status1 */
 	public function get_nos_of_bookings_by_status($params = array(),$status1){ 
		$whrs = '';
		
		$vs_id = $this->session->userdata('us_id');
		$vs_role_id = $this->session->userdata('us_role_id');  
		
		$temp_agents_ids = '';     
		
		if(array_key_exists("years_val",$params)){
			$years_val = $params['years_val']; 
			if($years_val>0){   
				$whrs .=" AND DATE_FORMAT(booking_date,'%Y')='$years_val' "; 
			}
		}else{
			$years_val = date('Y');
			//$whrs .=" AND DATE_FORMAT(created_on,'%Y')='$years_val' ";
		} 
		
		if(array_key_exists("months_val",$params)){ 
			$months_val = $params['months_val']; 
			if($months_val>0){
				$whrs .=" AND DATE_FORMAT(booking_date,'%m')='$months_val' ";		  	
			}
		}else{
			$months_val = date('m');
			//$whrs .=" AND DATE_FORMAT(created_on,'%m')='$months_val' ";
		}
		  
		if(isset($status1) && $status1>0){
			$whrs .=" AND status='$status1' ";
		}  
		//echo $whrs;	 
		$query = $this->db->query("SELECT count(id) AS NUMS FROM bookings_tbl WHERE id>0 $whrs "); 
		$row_nums = $query->row()->NUMS;
		return $row_nums; 
	} 
	
}  ?>