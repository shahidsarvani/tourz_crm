<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Commission_report extends CI_Controller{
		   
		public function __construct(){
			parent::__construct();
			 
			$this->dbs_user_id = $vs_id = $this->session->userdata('us_id');
			$this->login_vs_role_id = $this->dbs_role_id = $vs_role_id = $this->session->userdata('us_role_id');
			$this->load->model('general_model');
			if(isset($vs_id) && (isset($vs_role_id) && $vs_role_id>=1)){
				/* ok */ 
				$res_nums = $this->general_model->check_controller_permission_access('Commission_report',$vs_role_id,'1');
				if($res_nums>0){
					 /* ok */
				}else{
					redirect('/');
				}  
			}else{
				redirect('/');
			}
			 
			$this->load->model('commission_report_model'); 
			$this->load->model('admin_model'); 
			$this->load->model('users_model');  
			$perms_arrs = array('role_id'=> $vs_role_id); 
			$this->load->library('Ajax_pagination');
			$this->perPage = 25;
		}   
		
	/* Packages module starts */
	function index(){  
	
		$res_nums =  $this->general_model->check_controller_method_permission_access('Commission_report','index',$this->login_vs_role_id,'1'); 
		if($res_nums>0){
			$data['page_headings'] = "Commission Report"; 
			  
			$this->load->view('commission_report/index',$data); 
		}else{ 
			$this->load->view('no_permission_access'); 
		}	 
	}
	
	 
	function fetch_commission_report_data(){  
			
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
		   
		    $in_confirm = $this->commission_report_model->get_nos_of_bookings_by_status($paras_arrs,'1');   
			$total_bookings = $this->commission_report_model->get_nos_of_bookings_by_status($paras_arrs,''); 
		   	
			echo $net_res = $in_confirm.'_'.$total_bookings; 		      
		}    
		
		/* packages module ends */
	 		
	}
	?>