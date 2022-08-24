<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Packages extends CI_Controller{
		   
		public function __construct(){
			parent::__construct();
			 
			$this->dbs_user_id = $vs_id = $this->session->userdata('us_id');
			$this->login_vs_role_id = $this->dbs_role_id = $vs_role_id = $this->session->userdata('us_role_id');
			$this->load->model('general_model');
			if(isset($vs_id) && (isset($vs_role_id) && $vs_role_id>=1)){
				/* ok */ 
				$res_nums = $this->general_model->check_controller_permission_access('Packages',$vs_role_id,'1');
				if($res_nums>0){
					 /* ok */
				}else{
					redirect('/');
				}  
			}else{
				redirect('/');
			}
			 
			$this->load->model('packages_model'); 
			$this->load->model('admin_model');  
			$perms_arrs = array('role_id'=> $vs_role_id); 
			$this->load->library('Ajax_pagination');
			$this->perPage = 25;
		}   
		
	/* Packages module starts */
	function index(){  
	
		$res_nums =  $this->general_model->check_controller_method_permission_access('Packages','index',$this->login_vs_role_id,'1'); 
		if($res_nums>0){
		
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
			$totalRec = count($this->packages_model->get_all_filter_packages($paras_arrs));
			
			//pagination configuration
			$config['target']      = '#fetch_dya_list';
			$config['base_url']    = site_url('/packages/index2');
			$config['total_rows']  = $totalRec;
			$config['per_page']    = $show_pers_pg; //$this->perPage;
			
			$this->ajax_pagination->initialize($config); 
			
			$paras_arrs = array_merge($paras_arrs, array("limit" => $show_pers_pg));
			
			$records = $data['records'] = $this->packages_model->get_all_filter_packages($paras_arrs);
			 
			$data['page_headings'] = "Packages List";
			$this->load->view('packages/index',$data); 
		}else{ 
			$this->load->view('no_permission_access'); 
		}	 
	}
	
	
	function index2(){
		$res_nums =  $this->general_model->check_controller_method_permission_access('Packages','index',$this->login_vs_role_id,'1'); 
		if($res_nums>0){
		
			$data['page_headings'] = "Packages List";
	
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
			$totalRec = count($this->packages_model->get_all_filter_packages($paras_arrs)); 
			
			//pagination configuration
			$config['target']      = '#fetch_dya_list';
			$config['base_url']    = site_url('/packages/index2');
			$config['total_rows']  = $totalRec;
			$config['per_page']    = $show_pers_pg; //$this->perPage;
			
			$this->ajax_pagination->initialize($config); 
			
			$paras_arrs = array_merge($paras_arrs, array('start' => $offset, 'limit'=> $show_pers_pg));
			
		   $data['records'] = $this->packages_model->get_all_filter_packages($paras_arrs); 
			 
			$this->load->view('packages/index2',$data); 
		}else{ 
			$this->load->view('no_permission_access'); 
		}
	} 
		
	function trash_aj(){ 
		
		$res_nums =  $this->general_model->check_controller_method_permission_access('Packages','trash',$this->login_vs_role_id,'1');
		if($res_nums>0){  
		
			 if(isset($_POST["args1"]) && $_POST["args1"]>0){
				$args1 = $this->input->post("args1"); 
				$this->packages_model->trash_package($args1);  
			 }  
			 
			 $this->index2(); 
		 }else{ 
			$this->load->view('no_permission_access'); 
		}   
	}  	
		
	 
	 function trash_multiple(){   
	 	$res_nums =  $this->general_model->check_controller_method_permission_access('Packages','trash',$this->login_vs_role_id,'1');
		if($res_nums>0){  
			
			$data['page_headings']="Package";  
				
			if(isset($_POST["multi_action_check"]) && count($_POST["multi_action_check"])>0){
				$del_checks = $_POST["multi_action_check"]; 
				foreach($del_checks as $args1){  
					if($args1>0){
						$this->packages_model->trash_package($args1); 
					} 
				}
			 } 
			 $this->index2(); 
		 
		 }else{ 
			$this->load->view('no_permission_access'); 
		}
	 }  
		 
	function add(){   
	 	$res_nums =  $this->general_model->check_controller_method_permission_access('Packages','add',$this->login_vs_role_id,'1');  
		if($res_nums>0){
		
			$data['page_headings'] = 'Add Package';
			
			if(isset($_POST) && !empty($_POST)){
			
				// get form input 
				$name = $this->input->post("name"); 
				$adult_ticket_price = $this->input->post("adult_ticket_price"); 
				$child_ticket_price = $this->input->post("child_ticket_price");   
				$status = $this->input->post("status"); 
				$added_on = date('Y-m-d H:i:s');  
			
				// form validation
				$this->form_validation->set_rules("name", "Name", "trim|required|xss_clean"); 
				$this->form_validation->set_rules("adult_ticket_price","Adult Ticket Price","trim|required|xss_clean");       			
				$this->form_validation->set_rules("child_ticket_price","Child Ticket Price","trim|required|xss_clean");
				
				if($this->form_validation->run() == FALSE){
				// validation fail
					$this->load->view('packages/add',$data); 
				}else{   
				 
					$datas = array('name' => $name,'adult_ticket_price' => $adult_ticket_price,'child_ticket_price' => $child_ticket_price,'status' => $status,'added_on' => $added_on); 
					$res = $this->packages_model->insert_package_data($datas); 
					if(isset($res)){  
						$this->session->set_flashdata('success_msg','Record inserted successfully!');
					}else{
						$this->session->set_flashdata('error_msg','Error: while inserting record!');
					}  
					
					if(isset($_POST['saves_and_new'])){
						redirect("packages/add");
					}else{
						redirect("packages/index");	
					} 
				} 	 
				
			}else{
				$this->load->view('packages/add',$data);
			} 
		
		 }else{ 
			$this->load->view('no_permission_access'); 
		}
	}  
	
	
	 function update($args1=''){  
	 	$res_nums =  $this->general_model->check_controller_method_permission_access('Packages','update',$this->login_vs_role_id,'1');
		if($res_nums>0){ 
		
			$data['page_headings'] = 'Update Package';
			if(isset($args1) && $args1!=''){ 
				$data['args1'] = $args1; 
				$data['record'] = $this->packages_model->get_package_by_id($args1);
			 
				if(isset($_POST) && !empty($_POST)){
					$name = $this->input->post("name"); 
					$adult_ticket_price = $this->input->post("adult_ticket_price"); 
					$child_ticket_price = $this->input->post("child_ticket_price");   
					$status = $this->input->post("status");  
					// form validation
					$this->form_validation->set_rules("name", "Name", "trim|required|xss_clean"); 
					$this->form_validation->set_rules("adult_ticket_price","Adult Ticket Price","trim|required|xss_clean");       			
					$this->form_validation->set_rules("child_ticket_price","Child Ticket Price","trim|required|xss_clean");
					   
					if($this->form_validation->run() == FALSE){ 
					// validation fail
						$this->load->view('packages/update',$data);
					}else if(isset($args1) && $args1!=''){ 
						$datas = array('name' => $name,'adult_ticket_price' => $adult_ticket_price,'child_ticket_price' => $child_ticket_price,'status' => $status); 
						$res = $this->packages_model->update_package_data($args1,$datas); 
						if(isset($res)){ 
							$this->session->set_flashdata('success_msg','Record updated successfully!');
						}else{
							$this->session->set_flashdata('error_msg','Error: while updating record!');
						} 
						
						redirect("packages/index");
					} 	 
					
				}else{
					$this->load->view('packages/update',$data);
				} 
			}
			
			
		}else{ 
			$this->load->view('no_permission_access'); 
		}
	} 
		
	/*function fetch_packages_list($sel_owrid=''){
		$data['sel_owrid'] = $sel_owrid;
		$this->load->view('ajax/fetch_packages',$data); 
	}*/
		 
		 
		/* packages module ends */
	 		
	}
	?>