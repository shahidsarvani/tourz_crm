<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings_model extends CI_Model {

	 function __construct() {
		parent::__construct();  
	}   
	
	/* bookings function starts */   
	
	function get_all_filter_bookings($params = array()){
	 
		/*if((array_key_exists("item_val",$params)) && (array_key_exists("status_val",$params)) ){
			$item_val = $params['item_val']; 
			$status_val = $params['status_val'];  
			
			$updated_on = date('Y-m-d H:i:s'); 
			$datas1 = array('status' => $status_val,'updated_on' => $updated_on); 
				 		
			$this->db->where('id',$item_val);
			$this->db->update('bookings_tbl', $datas1); 
		}  */ 
		
		$whrs =''; 
		if(array_key_exists("s_val",$params)){
			$s_val = $params['s_val']; 
			
			if(strlen($s_val)>0){
				$whrs .= " AND ( name LIKE '%$s_val%' OR email LIKE '%$s_val%' OR phone_no LIKE '%$s_val%' OR total_costs LIKE '%$s_val%' OR total_expense LIKE '%$s_val%' ) ";
			}
		} 
		
		if(array_key_exists("sort_status_val",$params)){
			$sort_status_val = $params['sort_status_val']; 
			
			if($sort_status_val >0){
				$whrs .= " AND status='$sort_status_val' ";
			}
		}      
		
		
		$ordr_by = " ORDER BY added_on DESC ";
		 
		if(array_key_exists("sort_name_val",$params)){
			$sort_name_val = $params['sort_name_val']; 
			
			if(strlen($sort_name_val)>0){
				$ordr_by = " ORDER BY name $sort_name_val ";
			}
		}
		
		if(array_key_exists("sort_booking_date_val",$params)){
			$sort_booking_date_val = $params['sort_booking_date_val']; 
			
			if(strlen($sort_booking_date_val)>0){
				$ordr_by = " ORDER BY added_on $sort_booking_date_val ";
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
		
		$query = $this->db->query("SELECT * FROM bookings_tbl WHERE id >'0' $whrs $ordr_by $limits "); 
		return $query->result(); 
	}   
	
	
	function update_booking_status_id($item_val,$status_val){ 
		if($item_val>0 && $status_val>0){
		
			$updated_on = date('Y-m-d H:i:s'); 
			$datas1 = array('status' => $status_val,'updated_on' => $updated_on); 
				 		
			$this->db->where('id',$item_val);
			$this->db->update('bookings_tbl', $datas1); 
			/* ok */
			
			$query = $this->db->get_where('bookings_tbl',array('id'=> $item_val));
			return $query->row();
		}else{
			return '';
		}
	} 
	
	function trash_booking($args2){
		if($args2 >0){
			$this->db->where('id', $args2);
			$this->db->delete('bookings_tbl');
		} 
		return true;
	}  
	
	function get_booking_by_id($args1){ 
		if($args1>0){
			$query = $this->db->get_where('bookings_tbl',array('id'=> $args1));
			return $query->row();
		}else{
			return '';
		}
	}  
	 
	function insert_booking_data($data){ 
		return $this->db->insert('bookings_tbl', $data);
	}  
	
	function update_booking_data($args1,$data){ 
		$this->db->where('id',$args1);
		return $this->db->update('bookings_tbl', $data);
	} 
	
	/* operating bookings data starts */ 
	
}  ?>