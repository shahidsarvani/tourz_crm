<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commission_report_model extends CI_Model {

	 function __construct() {
		parent::__construct();  
	}   
	
	/* commission_report function starts */   
	
	function get_all_filter_commission($params = array()){
		$whrs ='';  
		
		if(array_key_exists("sel_package_val",$params)){
			$sel_package_val = $params['sel_package_val']; 
			 
			if($sel_package_val >0){    
				$whrs .= " AND package_id='$sel_package_val' ";
			} 	
		} 
		
		if(array_key_exists("from_date_val",$params) && array_key_exists("to_date_val",$params)){
			$from_date_val = $params['from_date_val']; 
			$to_date_val = $params['to_date_val']; 
			 
			if(strlen($from_date_val)>0 && strlen($to_date_val)>0){      
				$whrs .= " AND ( booking_date>='$from_date_val' AND booking_date<='$to_date_val' ) ";
			} 	
		}   
		
		 
		$limits ='';
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
			$tot_limit =   $params['limit'];
			$str_limit =   $params['start']; 			 
			$limits = " LIMIT $str_limit, $tot_limit ";
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
             $tot_limit =   $params['limit'];
			$limits = " LIMIT $tot_limit ";
		}   
		
		$query = $this->db->query("SELECT * FROM bookings_tbl WHERE status='1' $whrs ORDER BY added_on DESC $limits "); 
		return $query->result(); 
	}   
	
	function get_commission_by_id($args1){ 
		if($args1>0){
			$query = $this->db->get_where('bookings_tbl',array('id'=> $args1));
			return $query->row();
		}else{
			return '';
		}
	}  
	  
	
	function update_commission_data($args1,$data){ 
		$this->db->where('id',$args1);
		return $this->db->update('bookings_tbl', $data);
	} 
	
	/* operating commission_report data starts */ 
	
}  ?>