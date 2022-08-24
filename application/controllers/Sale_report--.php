<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Sale_report extends CI_Controller{
		   
		public function __construct(){
			parent::__construct();
			 
			$this->dbs_user_id = $vs_id = $this->session->userdata('us_id');
			$this->login_vs_role_id = $this->dbs_role_id = $vs_role_id = $this->session->userdata('us_role_id');
			$this->load->model('general_model');
			if(isset($vs_id) && (isset($vs_role_id) && $vs_role_id>=1)){
				/* ok */ 
				$res_nums = $this->general_model->check_controller_permission_access('Sale_report',$vs_role_id,'1');
				if($res_nums>0){
					 /* ok */
				}else{
					redirect('/');
				}  
			}else{
				redirect('/');
			}
			 
			$this->load->model('sale_report_model'); 
			$this->load->model('admin_model'); 
			$this->load->model('users_model');  
			$perms_arrs = array('role_id'=> $vs_role_id); 
			$this->load->library('Ajax_pagination');
			$this->perPage = 25;
		}   
		
	/* Packages module starts */
	function index(){  
	
		$res_nums =  $this->general_model->check_controller_method_permission_access('Sale_report','index',$this->login_vs_role_id,'1'); 
		if($res_nums>0){
			$data['page_headings'] = "Sale Report"; 
			  
			$this->load->view('sale_report/index',$data); 
		}else{ 
			$this->load->view('no_permission_access'); 
		}	 
	}
	
	 
	function fetch_sale_status_data(){  
			
			$paras_arrs = array();	   
				
			if(isset($_POST['years'])){
				$sel_years = $this->input->post('years');  
				if($sel_years >0){
					$_SESSION['tmp_years_val'] = $sel_years;  
					
					$paras_arrs = array_merge($paras_arrs, array("years_val" => $sel_years));
				}else{
					unset($_SESSION['tmp_years_val']);
				}
				
			}else if(isset($_SESSION['tmp_years_val'])){
				$sel_years = $_SESSION['tmp_years_val']; 
				$paras_arrs = array_merge($paras_arrs, array("years_val" => $sel_years));
			} 
			
			if(isset($_POST['months'])){
				$sel_months = $this->input->post('months');  
				if($sel_months >0){
					$_SESSION['tmp_months_val'] = $sel_months;  
					
					$paras_arrs = array_merge($paras_arrs, array("months_val" => $sel_months));
				}else{
					unset($_SESSION['tmp_months_val']);
				}
				
			}else if(isset($_SESSION['tmp_months_val'])){
				$sel_months = $_SESSION['tmp_months_val']; 
				$paras_arrs = array_merge($paras_arrs, array("months_val" => $sel_months));
			} 
		   
		    $in_confirm = $this->sale_report_model->get_nos_of_bookings_by_status($paras_arrs,'1');  
			$is_deleted = $this->sale_report_model->get_nos_of_bookings_by_status($paras_arrs,'2');  
			$is_rejected = $this->sale_report_model->get_nos_of_bookings_by_status($paras_arrs,'3');  
			$is_no_show = $this->sale_report_model->get_nos_of_bookings_by_status($paras_arrs,'4');  
			$total_bookings = $this->sale_report_model->get_nos_of_bookings_by_status($paras_arrs,''); 
		   	
			echo $net_res = $in_confirm.'_'.$is_deleted.'_'.$is_rejected.'_'.$is_no_show.'_'.$total_bookings; 		      
		}    
		
		/* packages module ends */
	 		
	}
	?>