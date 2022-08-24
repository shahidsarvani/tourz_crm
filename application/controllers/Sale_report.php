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
			$perms_arrs = array('role_id'=> $vs_role_id); 
			$this->load->library('Ajax_pagination');
			$this->perPage = 25;
		}   
		
	/* Sale_report module starts */
	function index(){  
	
		$res_nums =  $this->general_model->check_controller_method_permission_access('Sale_report','index',$this->login_vs_role_id,'1'); 
		if($res_nums>0){
		
			$sel_module_id = $sel_user_type_id =''; 
			$paras_arrs = array();	
			$data['page_headings'] = "Sale Report";
			 
			if($this->input->post('sel_per_page_val')){
				$per_page_val = $this->input->post('sel_per_page_val'); 
				$_SESSION['tmp_per_page_val'] = $per_page_val;  
				
			}else if(isset($_SESSION['tmp_per_page_val'])){
					unset($_SESSION['tmp_per_page_val']);
				}  
			
			if($this->input->post('sel_package_val')){
				$sel_package_val = $this->input->post('sel_package_val'); 
				$_SESSION['tmp_sel_package_val'] = $sel_package_val;  
				
			}else if(isset($_SESSION['tmp_sel_package_val'])){
					unset($_SESSION['tmp_sel_package_val']);
				}  
			
			if($this->input->post('from_date_val')){
				$from_date_val = $this->input->post('from_date_val'); 
				$_SESSION['tmp_from_date_val'] = $from_date_val;
				$paras_arrs = array_merge($paras_arrs, array("from_date_val" => $from_date_val));
				
			}else if(isset($_SESSION['tmp_from_date_val'])){
					unset($_SESSION['tmp_from_date_val']);
				} 
				
			if($this->input->post('to_date_val')){
				$to_date_val = $this->input->post('to_date_val'); 
				$_SESSION['tmp_to_date_val'] = $to_date_val;
				$paras_arrs = array_merge($paras_arrs, array("to_date_val" => $to_date_val));
				
			}else if(isset($_SESSION['tmp_to_date_val'])){
					unset($_SESSION['tmp_to_date_val']);
				}    
				
				
			if(isset($_SESSION['tmp_per_page_val'])){
				$show_pers_pg = $_SESSION['tmp_per_page_val'];	 
			}else{
				$show_pers_pg = $this->perPage;
			}
			 
			//total rows count
			$totalRec = count($this->sale_report_model->get_all_filter_sales($paras_arrs));
			
			//pagination configuration
			$config['target']      = '#dyns_list';
			$config['base_url']    = site_url('/sale_report/index2');
			$config['total_rows']  = $totalRec;
			$config['per_page']    = $show_pers_pg; //$this->perPage;
			
			$this->ajax_pagination->initialize($config); 
			
			$paras_arrs = array_merge($paras_arrs, array("limit" => $show_pers_pg));
			
			$records = $data['records'] = $this->sale_report_model->get_all_filter_sales($paras_arrs);
			  
			$this->load->view('sale_report/index',$data); 
		}else{ 
			$this->load->view('no_permission_access'); 
		}	 
	}
	
	
	function index2(){
		$res_nums =  $this->general_model->check_controller_method_permission_access('Sale_report','index',$this->login_vs_role_id,'1'); 
		if($res_nums>0){
		
			$data['page_headings'] = "Sale Report";
	
			$paras_arrs = array();	
			$page = $this->input->post('page');
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			} 
			
			$data['page'] = $page; 
			
				
			if($this->input->post('sel_per_page_val')){
				$per_page_val = $this->input->post('sel_per_page_val'); 
				$_SESSION['tmp_per_page_val'] = $per_page_val;  
				
			}else if(isset($_SESSION['tmp_per_page_val'])){
					$per_page_val = $_SESSION['tmp_per_page_val'];
				}  
			 
			
			if(isset($_POST["sel_package_val"])){  
				$sel_package_val = $this->input->post('sel_package_val'); 
				if($sel_package_val >0){
					$_SESSION['tmp_sel_package_val'] = $sel_package_val;
					$paras_arrs = array_merge($paras_arrs, array("sel_package_val" => $sel_package_val)); 
				}else{
					unset($_SESSION['tmp_sel_package_val']);
				}
				
			}else if(isset($_SESSION['tmp_sel_package_val'])){
				$sel_package_val = $_SESSION['tmp_sel_package_val']; 
				$paras_arrs = array_merge($paras_arrs, array("sel_package_val" => $sel_package_val));
			}	
				
			 
			if(isset($_POST["from_date_val"])){  
				$from_date_val = $this->input->post('from_date_val'); 
				if(strlen($from_date_val)>0){
					$_SESSION['tmp_from_date_val'] = $from_date_val;
					$paras_arrs = array_merge($paras_arrs, array("from_date_val" => $from_date_val)); 
				}else{
					unset($_SESSION['tmp_from_date_val']);
				}
				
			}else if(isset($_SESSION['tmp_from_date_val'])){
				$from_date_val = $_SESSION['tmp_from_date_val']; 
				$paras_arrs = array_merge($paras_arrs, array("from_date_val" => $from_date_val));
			}  
			 
			  
			if(isset($_POST["to_date_val"])){  
				$to_date_val = $this->input->post('to_date_val'); 
				if(strlen($to_date_val)>0){
					$_SESSION['tmp_to_date_val'] = $to_date_val;
					$paras_arrs = array_merge($paras_arrs, array("to_date_val" => $to_date_val)); 
				}else{
					unset($_SESSION['tmp_to_date_val']);
				}
				
			}else if(isset($_SESSION['tmp_to_date_val'])){
				$to_date_val = $_SESSION['tmp_to_date_val']; 
				$paras_arrs = array_merge($paras_arrs, array("to_date_val" => $to_date_val));
			}
			 
			
			if(isset($_SESSION['tmp_per_page_val'])){
				$show_pers_pg = $_SESSION['tmp_per_page_val'];	 
			}else{
				$show_pers_pg = $this->perPage;
			}
			 
			//total rows count
			$totalRec = count($this->sale_report_model->get_all_filter_sales($paras_arrs)); 
			
			//pagination configuration
			$config['target']      = '#dyns_list';
			$config['base_url']    = site_url('/sale_report/index2');
			$config['total_rows']  = $totalRec;
			$config['per_page']    = $show_pers_pg; //$this->perPage;
			
			$this->ajax_pagination->initialize($config); 
			
			$paras_arrs = array_merge($paras_arrs, array('start' => $offset, 'limit'=> $show_pers_pg));
			
		   $data['records'] = $this->sale_report_model->get_all_filter_sales($paras_arrs); 
			 
			$this->load->view('sale_report/index2',$data); 
		}else{ 
			$this->load->view('no_permission_access'); 
		}
	} 
		  
		
	function sale_detail($args1=''){  
		if($args1>0){ 
		
			$data['page_headings'] = "Sale Detail";	 
			$data['args1'] = $args1; 
			$temp_recs = $data['record'] = $this->sale_report_model->get_sale_by_id($args1);
			  
			/*if(isset($temp_recs) && $temp_recs->assigned_to_id==$vs_id && $temp_recs->is_new==1){ */
			if(isset($temp_recs) && $temp_recs->is_new==1){
				$datass = array('is_new' => '0'); 
				$this->sale_report_model->update_sale_data($args1,$datass);  	 	
			}
			
			$this->load->view('sale_report/sale_detail',$data); 
			
		}else{
			$this->load->view('no_permission_access'); 
		}  
	} 
	  
		/* Sale_report module ends */
	 		
	}
	?>