<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Remind_model extends CI_Model {
	
		function __construct() {
			parent::__construct();  
		}   
		
		public function chk_lead_reminder(){ 
			
			$dates = date('Y-m-d');
			$times = date('h:i A');   
			 
			$query = $this->db->query("SELECT l.* FROM `leads_tbl` l WHERE l.reminds='1' AND DATE_FORMAT(l.remind_date,'%Y-%m-%d')='$dates' AND l.remind_time='$times' AND l.id NOT IN ( SELECT r.lead_id FROM leads_reminder_tbl r ) group by l.id ORDER BY l.created_on DESC");
			return $query->result();   	 	
			 
		}  
		
		function insert_leads_reminder_data($data){ 
			return $this->db->insert('leads_reminder_tbl', $data);
		}   
			
	}  ?>