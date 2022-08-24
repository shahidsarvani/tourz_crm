<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	 function __construct() {
		parent::__construct();  
	} 
	
	public function get_nos_of_new_booking(){  
		 
		$query = $this->db->query("SELECT count(id) AS NUMS FROM bookings_tbl WHERE is_new='1' "); 
		$row_nums = $query->row()->NUMS;
		return $row_nums; 
		
	} 
	
	public function get_nos_of_booking_by_status($params = array(),$status1){ 
		$whrs = '';      
		
		/*if(array_key_exists("years_val",$params)){
			$years_val = $params['years_val']; 
			if($years_val>0){  
				if(isset($status1) && $status1==4){
					$whrs .=" AND DATE_FORMAT(owned_on,'%Y')='$years_val' ";
				}else{
					$whrs .=" AND DATE_FORMAT(created_on,'%Y')='$years_val' ";
				}
			}
		}else{
			$years_val = date('Y');
			//$whrs .=" AND DATE_FORMAT(created_on,'%Y')='$years_val' ";
		} 
		
		if(array_key_exists("months_val",$params)){
			$months_val = $params['months_val']; 
			if($months_val>0){
				if(isset($status1) && $status1==4){
					$whrs .=" AND DATE_FORMAT(owned_on,'%m')='$months_val' ";
				}else{
					$whrs .=" AND DATE_FORMAT(created_on,'%m')='$months_val' ";
				}  	
			}
		}else{
			$months_val = date('m');
			//$whrs .=" AND DATE_FORMAT(created_on,'%m')='$months_val' ";
		}*/
		  
		if(isset($status1) && $status1>0){
			$whrs .=" AND status='$status1' ";
		}    	
		//echo $whrs;	 
		$query = $this->db->query("SELECT count(id) AS NUMS FROM bookings_tbl WHERE id>0 $whrs "); 
		$row_nums = $query->row()->NUMS;
		return $row_nums; 
	}
	
	function get_dashboard_recent_limited_bookings(){ 
		$query = $this->db->query("SELECT * FROM bookings_tbl ORDER BY added_on DESC LIMIT 0,10 "); 
		return $query->result(); 
	}  
	
	
	function get_dashboard_bookings_by_date($sel_date){ 
		if(strlen($sel_date)>0){
			$query = $this->db->query("SELECT * FROM bookings_tbl WHERE status='1' AND booking_date='$sel_date' ORDER BY added_on DESC "); 
			return $query->result(); 
		}else{
			return '';
		} 
	}
	
  
 	 
	
}  ?>