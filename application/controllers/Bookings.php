<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Bookings extends CI_Controller{
		   
		public function __construct(){
			parent::__construct();
			 
			$this->dbs_user_id = $vs_id = $this->session->userdata('us_id');
			$this->login_vs_role_id = $this->dbs_role_id = $vs_role_id = $this->session->userdata('us_role_id');
			$this->load->model('general_model');
			if(isset($vs_id) && (isset($vs_role_id) && $vs_role_id>=1)){
				/* ok */ 
				$res_nums = $this->general_model->check_controller_permission_access('Bookings',$vs_role_id,'1');
				if($res_nums>0){
					 /* ok */
				}else{
					redirect('/');
				}  
			}else{
				redirect('/');
			}
			 
			$this->load->model('bookings_model'); 
			$this->load->model('admin_model');  
			$perms_arrs = array('role_id'=> $vs_role_id); 
			$this->load->library('Ajax_pagination');
			$this->perPage = 25;
		}   
		
	/* Bookings module starts */
	function index(){  
	
		$res_nums =  $this->general_model->check_controller_method_permission_access('Bookings','index',$this->login_vs_role_id,'1'); 
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
				
			if($this->input->post('sort_name_val')){
				$sort_name_val = $this->input->post('sort_name_val'); 
				$_SESSION['tmp_sort_name_val'] = $sort_name_val;
				$paras_arrs = array_merge($paras_arrs, array("sort_name_val" => $sort_name_val));
				
			}else if(isset($_SESSION['tmp_sort_name_val'])){
					unset($_SESSION['tmp_sort_name_val']);
				} 
				
			if($this->input->post('sort_booking_date_val')){
				$sort_booking_date_val = $this->input->post('sort_booking_date_val'); 
				$_SESSION['tmp_sort_booking_date_val'] = $sort_booking_date_val;
				$paras_arrs = array_merge($paras_arrs, array("sort_booking_date_val" => $sort_booking_date_val));
				
			}else if(isset($_SESSION['tmp_sort_booking_date_val'])){
					unset($_SESSION['tmp_sort_booking_date_val']);
				}
				
			if($this->input->post('sort_status_val')){
				$sort_status_val = $this->input->post('sort_status_val'); 
				$_SESSION['tmp_sort_status_val'] = $sort_status_val;
				$paras_arrs = array_merge($paras_arrs, array("sort_status_val" => $sort_status_val));
				
			}else if(isset($_SESSION['tmp_sort_status_val'])){
					unset($_SESSION['tmp_sort_status_val']);
				}   		
				  
			
			if(isset($_SESSION['tmp_per_page_val'])){
				$show_pers_pg = $_SESSION['tmp_per_page_val'];	 
			}else{
				$show_pers_pg = $this->perPage;
			}
			 
			//total rows count
			$totalRec = count($this->bookings_model->get_all_filter_bookings($paras_arrs));
			
			//pagination configuration
			$config['target']      = '#fetch_dya_list';
			$config['base_url']    = site_url('/bookings/index2');
			$config['total_rows']  = $totalRec;
			$config['per_page']    = $show_pers_pg; //$this->perPage;
			
			$this->ajax_pagination->initialize($config); 
			
			$paras_arrs = array_merge($paras_arrs, array("limit" => $show_pers_pg));
			
			$records = $data['records'] = $this->bookings_model->get_all_filter_bookings($paras_arrs);
			 
			$data['page_headings'] = "Bookings List";
			$this->load->view('bookings/index',$data); 
		}else{ 
			$this->load->view('no_permission_access'); 
		}	 
	} 
	
	function index2(){
		$res_nums =  $this->general_model->check_controller_method_permission_access('Bookings','index',$this->login_vs_role_id,'1'); 
		if($res_nums>0){
		
			$data['page_headings'] = "Bookings List";
	
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
			
			
			if(isset($_POST['sort_name_val'])){
				$sort_name_val = $this->input->post('sort_name_val'); 
				if(strlen($sort_name_val)>0){
					$_SESSION['tmp_sort_name_val'] = $sort_name_val;
					$paras_arrs = array_merge($paras_arrs, array("sort_name_val" => $sort_name_val)); 
				}else{
					unset($_SESSION['tmp_sort_name_val']);
				}
				
			}else if(isset($_SESSION['tmp_sort_name_val'])){
				$sort_name_val = $_SESSION['tmp_sort_name_val']; 
				$paras_arrs = array_merge($paras_arrs, array("sort_name_val" => $sort_name_val));
			} 
			
			
			if(isset($_POST['sort_booking_date_val'])){
				$sort_booking_date_val = $this->input->post('sort_booking_date_val'); 
				if(strlen($sort_booking_date_val)>0){
					$_SESSION['tmp_sort_booking_date_val'] = $sort_booking_date_val;
					$paras_arrs = array_merge($paras_arrs, array("sort_booking_date_val" => $sort_booking_date_val)); 
				}else{
					unset($_SESSION['tmp_sort_booking_date_val']);
				}
				
			}else if(isset($_SESSION['tmp_sort_booking_date_val'])){
				$sort_booking_date_val = $_SESSION['tmp_sort_booking_date_val']; 
				$paras_arrs = array_merge($paras_arrs, array("sort_booking_date_val" => $sort_booking_date_val));
			}  
			
			
			if(isset($_POST['sort_status_val'])){
				$sort_status_val = $this->input->post('sort_status_val'); 
				if($sort_status_val >0){
					$_SESSION['tmp_sort_status_val'] = $sort_status_val;
					$paras_arrs = array_merge($paras_arrs, array("sort_status_val" => $sort_status_val)); 
				}else{
					unset($_SESSION['tmp_sort_status_val']);
				}
				
			}else if(isset($_SESSION['tmp_sort_status_val'])){
				$sort_status_val = $_SESSION['tmp_sort_status_val']; 
				$paras_arrs = array_merge($paras_arrs, array("sort_status_val" => $sort_status_val));
			}   
			
			if(isset($_SESSION['tmp_per_page_val'])){
				$show_pers_pg = $_SESSION['tmp_per_page_val'];	 
			}else{
				$show_pers_pg = $this->perPage;
			}
			 
			//total rows count
			$totalRec = count($this->bookings_model->get_all_filter_bookings($paras_arrs)); 
			
			//pagination configuration
			$config['target']      = '#fetch_dya_list';
			$config['base_url']    = site_url('/bookings/index2');
			$config['total_rows']  = $totalRec;
			$config['per_page']    = $show_pers_pg; //$this->perPage;
			
			$this->ajax_pagination->initialize($config); 
			
			$paras_arrs = array_merge($paras_arrs, array('start' => $offset, 'limit'=> $show_pers_pg));
			
		   $data['records'] = $this->bookings_model->get_all_filter_bookings($paras_arrs); 
			 
			$this->load->view('bookings/index2',$data); 
		}else{ 
			$this->load->view('no_permission_access'); 
		}
	} 
	
	
	function fetch_item_status(){
		$res_nums =  $this->general_model->check_controller_method_permission_access('Bookings','index',$this->login_vs_role_id,'1'); 
		if($res_nums>0){  
			$sel_item_id_vals = 0;
			if(isset($_POST['sel_item_val'])){
				$sel_item_id_vals = $this->input->post('sel_item_val');  
			} 
			$status_vals = 0;
			if(isset($_POST['status_val'])){
				$status_vals = $this->input->post('status_val');  
			} 
			
		   $data['record'] = $this->bookings_model->update_booking_status_id($sel_item_id_vals,$status_vals); 
			 
			$this->load->view('bookings/fetch_item_status',$data); 
		}else{ 
			$this->load->view('no_permission_access'); 
		}
	}
	
	
	function fetch_package_price(){
		$res_nums =  $this->general_model->check_controller_method_permission_access('Bookings','index',$this->login_vs_role_id,'1'); 
		if($res_nums>0){  
			$sel_package_vals = 0;
			if(isset($_POST['sel_package_val'])){
				$sel_package_vals = $this->input->post('sel_package_val');  
			}   	
			
		    $recs = $this->general_model->get_gen_packages_info($sel_package_vals); 
			if(isset($recs)){
				echo $recs->adult_ticket_price.'__'.$recs->child_ticket_price; 
			}else{
				echo '0';
			}  
		}else{
			echo '0';
		} 
	}  
	
		
	function trash_aj(){ 
		
		$res_nums =  $this->general_model->check_controller_method_permission_access('Bookings','trash',$this->login_vs_role_id,'1');
		if($res_nums>0){  
		
			 if(isset($_POST["args1"]) && $_POST["args1"]>0){
				$args1 = $this->input->post("args1"); 
				$this->bookings_model->trash_booking($args1);  
			 }  
			 
			 $this->index2(); 
		 }else{ 
			$this->load->view('no_permission_access'); 
		}   
	} 
		
		
	 
	 function trash_multiple(){   
	 	$res_nums =  $this->general_model->check_controller_method_permission_access('Bookings','trash',$this->login_vs_role_id,'1');
		if($res_nums>0){  
			
			$data['page_headings']="Bookings";  
				
			if(isset($_POST["multi_action_check"]) && count($_POST["multi_action_check"])>0){
				$del_checks = $_POST["multi_action_check"]; 
				foreach($del_checks as $args1){  
					if($args1>0){
						$this->bookings_model->trash_booking($args1); 
					} 
				}
			 } 
			 $this->index2(); 
		 
		 }else{ 
			$this->load->view('no_permission_access'); 
		}
	 }  
		 
	function add(){   
	 	$res_nums =  $this->general_model->check_controller_method_permission_access('Bookings','add',$this->login_vs_role_id,'1');  
		if($res_nums>0){
		
			$data['page_headings'] = 'Add Bookings';
			
			if(isset($_POST) && !empty($_POST)){
			
				// get form input 
				$name = $this->input->post("name"); 
				$email = $this->input->post("email"); 
				$phone_no = $this->input->post("phone_no");  
				$booking_date = $this->input->post("booking_date"); 
				$no_of_adults = $this->input->post("no_of_adults");     
				$no_of_childs = $this->input->post("no_of_childs");  
				$package_id = $this->input->post("package_id");
				$total_expense = $this->input->post("total_expense"); 
				$total_costs = $this->input->post("total_costs"); 
				$discounts = $this->input->post("discounts"); 
				$vats = $this->input->post("vats");
				$message = $this->input->post("message");
				$cash_type = $this->input->post("cash_type"); 
				$status = $this->input->post("status"); 
				$added_on = date('Y-m-d H:i:s');
				$ip_address = $_SERVER['REMOTE_ADDR']; 
				// form validation
				$this->form_validation->set_rules("name", "Name", "trim|required|xss_clean"); 
				$this->form_validation->set_rules("email", "Email", "trim|required|xss_clean");       
				
				if($this->form_validation->run() == FALSE){
				// validation fail
					$this->load->view('bookings/add',$data); 
				}else{   
					$datas = array('name' => $name,'email' => $email,'phone_no' => $phone_no,'booking_date' => $booking_date,'no_of_adults' => $no_of_adults,'no_of_childs' => $no_of_childs,'package_id' => $package_id,'total_costs' => $total_costs,'total_expense' => $total_expense,'message' => $message,'cash_type' => $cash_type,'status' => $status,'discounts' => $discounts,'vats' => $vats,'ip_address' => $ip_address,'is_new' => '1','added_on' => $added_on); 
					$res = $this->bookings_model->insert_booking_data($datas); 
					if(isset($res)){  
						$this->session->set_flashdata('success_msg','Record inserted successfully!');
					}else{
						$this->session->set_flashdata('error_msg','Error: while inserting record!');
					}  
					
					if(isset($_POST['saves_and_new'])){
						redirect("bookings/add");
					}else{
						redirect("bookings/index");	
					} 
				} 	 
				
			}else{
				$this->load->view('bookings/add',$data);
			} 
		
		 }else{ 
			$this->load->view('no_permission_access'); 
		}
	}  
	
	
	 function update($args1=''){  
	 	$res_nums =  $this->general_model->check_controller_method_permission_access('Bookings','update',$this->login_vs_role_id,'1');
		if($res_nums>0){ 
		
			$data['page_headings'] = 'Update Booking';
			if(isset($args1) && $args1!=''){ 
				$data['args1'] = $args1; 
				$data['record'] = $this->bookings_model->get_booking_by_id($args1);
			 
				if(isset($_POST) && !empty($_POST)){
					$name = $this->input->post("name"); 
					$email = $this->input->post("email"); 
					$phone_no = $this->input->post("phone_no");  
					$booking_date = $this->input->post("booking_date"); 
					$no_of_adults = $this->input->post("no_of_adults");     
					$no_of_childs = $this->input->post("no_of_childs");  
					$package_id = $this->input->post("package_id");
					$total_expense = $this->input->post("total_expense"); 
					$total_costs = $this->input->post("total_costs");  
					$discounts = $this->input->post("discounts"); 
					$vats = $this->input->post("vats");  
					$message = $this->input->post("message");
					$cash_type = $this->input->post("cash_type"); 
					$status = $this->input->post("status"); 
					$updated_on = date('Y-m-d H:i:s');
					$ip_address = $_SERVER['REMOTE_ADDR']; 
					// form validation
					$this->form_validation->set_rules("name", "Name", "trim|required|xss_clean"); 
					$this->form_validation->set_rules("email", "Email", "trim|required|xss_clean");    
					
					if($this->form_validation->run() == FALSE){ 
					// validation fail
						$this->load->view('bookings/update',$data);
					}else if(isset($args1) && $args1!=''){ 
						$datas = array('name' => $name,'email' => $email,'phone_no' => $phone_no,'booking_date' => $booking_date,'no_of_adults' => $no_of_adults,'no_of_childs' => $no_of_childs,'package_id' => $package_id,'total_costs' => $total_costs,'total_expense' => $total_expense,'message' => $message,'cash_type' => $cash_type,'status' => $status,'discounts' => $discounts,'vats' => $vats,'ip_address' => $ip_address,'updated_on' => $updated_on); 
						$res = $this->bookings_model->update_booking_data($args1,$datas); 
						if(isset($res)){ 
							$this->session->set_flashdata('success_msg','Record updated successfully!');
						}else{
							$this->session->set_flashdata('error_msg','Error: while updating record!');
						} 
						
						redirect("bookings/index");
					} 	 
					
				}else{
					$this->load->view('bookings/update',$data);
				} 
			}
			
			
		}else{ 
			$this->load->view('no_permission_access'); 
		}
	} 
	
	
	 function booking_detail($args1=''){  
		if($args1>0){ 
		
			$data['page_headings'] = "Booking Detail";	 
			$data['args1'] = $args1; 
			$temp_recs = $data['record'] = $this->bookings_model->get_booking_by_id($args1);
			  
			/*if(isset($temp_recs) && $temp_recs->assigned_to_id==$vs_id && $temp_recs->is_new==1){ */
			if(isset($temp_recs) && $temp_recs->is_new==1){
				$datass = array('is_new' => '0'); 
				$this->bookings_model->update_booking_data($args1,$datass);  	 	
			}
			
			$this->load->view('bookings/booking_detail',$data); 
			
		}else{
			$this->load->view('no_permission_access'); 
		}  
	} 
		
	/*function fetch_bookings_list($sel_owrid=''){
		$data['sel_owrid'] = $sel_owrid;
		$this->load->view('ajax/fetch_bookings',$data); 
	}*/
		 
		 
		/* bookings module ends */
	 		
	}
	?>