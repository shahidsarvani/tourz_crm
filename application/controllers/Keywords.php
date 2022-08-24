<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Keywords extends CI_Controller{
		   
		public function __construct(){
			parent::__construct();
			 
			$this->dbs_user_id = $vs_id = $this->session->userdata('us_id');
			$this->login_vs_role_id = $this->dbs_role_id = $vs_role_id = $this->session->userdata('us_role_id');
			$this->load->model('general_model');
			if(isset($vs_id) && (isset($vs_role_id) && $vs_role_id>=1)){
				/* ok */  
			}else{
				redirect('/');
			}
			 
			$this->load->model('keywords_model'); 
			$this->load->model('admin_model');  
			$perms_arrs = array('role_id'=> $vs_role_id); 
			$this->load->library('Ajax_pagination');
			$this->perPage = 25;
		}   
		
		/* Keywords module starts */
		function index(){  
		 
			$sel_module_id = $sel_user_type_id =''; 
			$paras_arrs = array();	
			 
			if($this->input->post('sel_per_page_val')){
				$per_page_val = $this->input->post('sel_per_page_val'); 
				$_SESSION['tmp_per_page_val'] = $per_page_val;  
				
			}else if(isset($_SESSION['tmp_per_page_val'])){
					unset($_SESSION['tmp_per_page_val']);
				} 
			
			if($this->input->post('s_val')){
				$s_val = $this->input->post('s_val'); 
				$_SESSION['tmp_s_val'] = $s_val;
				$paras_arrs = array_merge($paras_arrs, array("s_val" => $s_val));
				
			}else if(isset($_SESSION['tmp_s_val'])){
					unset($_SESSION['tmp_s_val']);
				}  
			
			if(isset($_SESSION['tmp_per_page_val'])){
				$show_pers_pg = $_SESSION['tmp_per_page_val'];	 
			}else{
				$show_pers_pg = $this->perPage;
			}
			 
			//total rows count
			$totalRec = count($this->keywords_model->get_all_filter_keywords($paras_arrs));
			
			//pagination configuration
			$config['target']      = '#fetch_dya_list';
			$config['base_url']    = site_url('/keywords/index2');
			$config['total_rows']  = $totalRec;
			$config['per_page']    = $show_pers_pg; //$this->perPage;
			
			$this->ajax_pagination->initialize($config); 
			
			$paras_arrs = array_merge($paras_arrs, array("limit" => $show_pers_pg));
			
			$records = $data['records'] = $this->keywords_model->get_all_filter_keywords($paras_arrs);
			 
			$data['page_headings'] = "Keywords List";
			$this->load->view('keywords/index',$data); 
			 
		}
	
	
		function index2(){
		 	$data['page_headings'] = "Keywords List";
	
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
				
			if(isset($_POST['s_val'])){
				$s_val = $this->input->post('s_val'); 
				if(strlen($s_val)>0){
					$_SESSION['tmp_s_val'] = $s_val;
					$paras_arrs = array_merge($paras_arrs, array("s_val" => $s_val)); 
				}else{
					unset($_SESSION['tmp_s_val']);
				}
				
			}else if(isset($_SESSION['tmp_s_val'])){
				$s_val = $_SESSION['tmp_s_val']; 
				$paras_arrs = array_merge($paras_arrs, array("s_val" => $s_val));
			}  
			
			
			if(isset($_SESSION['tmp_per_page_val'])){
				$show_pers_pg = $_SESSION['tmp_per_page_val'];	 
			}else{
				$show_pers_pg = $this->perPage;
			}
			 
			//total rows count
			$totalRec = count($this->keywords_model->get_all_filter_keywords($paras_arrs)); 
			
			//pagination configuration
			$config['target']      = '#fetch_dya_list';
			$config['base_url']    = site_url('/keywords/index2');
			$config['total_rows']  = $totalRec;
			$config['per_page']    = $show_pers_pg; //$this->perPage;
			
			$this->ajax_pagination->initialize($config); 
			
			$paras_arrs = array_merge($paras_arrs, array('start' => $offset, 'limit'=> $show_pers_pg));
			
		    $data['records'] = $this->keywords_model->get_all_filter_keywords($paras_arrs); 
			 
			$this->load->view('keywords/index2',$data);
		} 
		
		function trash_aj(){   
			
			 if(isset($_POST["args1"]) && $_POST["args1"]>1){
				$args1 = $this->input->post("args1"); 
				$this->keywords_model->trash_keyword($args1);
			 }  
			 
			 $this->index2();   
		} 
		
		
	 
	 function trash_multiple(){    
				
		$data['page_headings'] = "Keywords";  
			
		if(isset($_POST["multi_action_check"]) && count($_POST["multi_action_check"])>0){
			$del_checks = $_POST["multi_action_check"]; 
			foreach($del_checks as $args1){  
				if($args1>0){
					$this->keywords_model->trash_keyword($args1); 
				} 
			}
		 } 
		 $this->index2(); 
	 }  
		
		 
	function add(){   
	 
		$data['page_headings'] = 'Add Keyword';
		
		if(isset($_POST) && !empty($_POST)){
		
			// get form input
			$title = $this->input->post("title"); 
			$domain_id = $this->input->post("domain_id");  
			 
			// form validation
			$this->form_validation->set_rules("title", "Title", "trim|required|xss_clean");    
			
			if($this->form_validation->run() == FALSE){
			// validation fail
				$this->load->view('keywords/add',$data); 
			}else{ 
				$datas = array('title' => $title,'domain_id' => $domain_id); 
				$res = $this->keywords_model->insert_keyword_data($datas); 
				if(isset($res)){
					$this->session->set_flashdata('success_msg','Record inserted successfully!');
				}else{
					$this->session->set_flashdata('error_msg','Error: while inserting record!');
				}  
				
				if(isset($_POST['saves_and_new'])){
					redirect("keywords/add");
				}else{
					redirect("keywords/index");	
				} 
			} 	 
			
		}else{
			$this->load->view('keywords/add',$data);
		} 
	}  
	
	
	 function update($args1=''){  
		$data['page_headings'] = 'Update Keyword';
		if(isset($args1) && $args1!=''){ 
			$data['args1'] = $args1; 
			$data['record'] = $this->keywords_model->get_keyword_by_id($args1);
		}
		
		if(isset($_POST) && !empty($_POST)){
		
			// get form input
			$title = $this->input->post("title"); 
			$domain_id = $this->input->post("domain_id");  
			 
			// form validation
			$this->form_validation->set_rules("title", "Title", "trim|required|xss_clean");    
			
			if($this->form_validation->run() == FALSE){
			// validation fail
				$this->load->view('keywords/update',$data);
			}else if(isset($args1) && $args1!=''){
				 
				$datas = array('title' => $title,'domain_id' => $domain_id ); 
				$res = $this->keywords_model->update_keyword_data($args1,$datas); 
				if(isset($res)){
					$this->session->set_flashdata('success_msg','Record updated successfully!');
				}else{
					$this->session->set_flashdata('error_msg','Error: while updating record!');
				} 
				
				redirect("keywords/index");
			} 	 
			
		}else{
			$this->load->view('keywords/update',$data);
		} 
	}  
		
	/*function fetch_keywords_list($sel_owrid=''){
		$data['sel_owrid'] = $sel_owrid;
		$this->load->view('ajax/fetch_keywords',$data); 
	}*/
		 
		 
		/* Domains module ends */
	 		
	}
	?>