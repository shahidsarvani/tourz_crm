<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages_model extends CI_Model {

	 function __construct() {
		parent::__construct();  
	}   
	
	/* packages function starts */   
	
	function get_all_filter_packages($params = array()){
		$whrs =''; 
		if(array_key_exists("s_val",$params)){
			$s_val = $params['s_val']; 
			 
			if(strlen($s_val)>0){    
				$whrs .= " AND ( name LIKE '%$s_val%' OR adult_ticket_price LIKE '%$s_val%' OR child_ticket_price LIKE '%$s_val%' ) ";
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
		
		$query = $this->db->query("SELECT * FROM packages_tbl WHERE id >'0' $whrs $limits  "); 
		return $query->result(); 
	}   
	
	function trash_package($args2){
		if($args2 >0){
			$this->db->where('id', $args2);
			$this->db->delete('packages_tbl');
		} 
		return true;
	}  
	
	function get_package_by_id($args1){ 
		if($args1>0){
			$query = $this->db->get_where('packages_tbl',array('id'=> $args1));
			return $query->row();
		}else{
			return '';
		}
	}  
	 
	function insert_package_data($data){ 
		return $this->db->insert('packages_tbl', $data);
	}  
	
	function update_package_data($args1,$data){ 
		$this->db->where('id',$args1);
		return $this->db->update('packages_tbl', $data);
	} 
	
	/* operating packages data starts */ 
	
}  ?>