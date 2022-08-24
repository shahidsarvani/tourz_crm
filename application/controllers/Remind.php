<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Remind extends CI_Controller{
	
		public function __construct(){
			parent::__construct();  
			$this->load->helper(array('url','security','utility'));
			$this->load->library('email'); 
			///$this->load->model('remind_model'); 
			$this->load->model('general_model');  
		}  
		  

		public function index(){ }
		
		function pick_bookings_data(){   
		
			$data['page_headings'] = 'Add Bookings';
			
			if(isset($_POST) && !empty($_POST)){  
				$this->load->model('bookings_model'); 
				
				$data['record'] = $this->bookings_model->get_booking_by_id($args1);
				
				$name = $this->input->post("name", TRUE);
				$email = $this->input->post("email", TRUE);
				$phone_no = $this->input->post("phone_no", TRUE);
				$booking_date = $this->input->post("booking_date", TRUE);
				$no_of_tickets = $this->input->post("no_of_tickets", TRUE);
				$package_id = $this->input->post("package_id", TRUE);
				$per_ticket_price = $this->input->post("per_ticket_price", TRUE);
				$total_costs = $this->input->post("total_costs", TRUE);
				$discounts = $this->input->post("discounts", TRUE);
				$vats = $this->input->post("vats", TRUE);
				$message = $this->input->post("message", TRUE);
				$cash_type = $this->input->post("cash_type", TRUE);
				$status = $this->input->post("status", TRUE);
				$added_on = date('Y-m-d H:i:s');
				$ip_address = $_SERVER['REMOTE_ADDR']; 
				
				
				/*$package_id = 0; 
				$res = $this->general_model->get_gen_packages_info_by_name($datas); 
				if(isset($res)){ 
					$package_id = $res->id; 
				}*/
				 
				$datas = array('name' => $name,'email' => $email,'phone_no' => $phone_no,'booking_date' => $booking_date,'no_of_tickets' => $no_of_tickets,'package_id' => $package_id,'per_ticket_price' => $per_ticket_price,'total_costs' => $total_costs,'message' => $message,'cash_type' => $cash_type,'status' => $status,'discounts' => $discounts,'vats' => $vats,'ip_address' => $ip_address,'is_new' => '1','added_on' => $added_on); 
				$res = $this->bookings_model->insert_booking_data($datas); 
				if(isset($res)){
					/*
					$last_lead_id = $this->db->insert_id();
					
					$datas2 = array('contact_no' => $contact_no,'contact_type' => '1','lead_id' => $last_lead_id);   
					$this->leads_model->insert_leads_contact_data($datas2); 
					 
					$datas3 = array('email' => $email,'email_type' => '1','lead_id' => $last_lead_id);   
					$this->leads_model->insert_leads_email_data($datas3);  
					 
					$this->load->library('email'); 
						  
					//$cstm_links = $this->cstms_base_urls."leads/index/";
					$res1 = $this->users_model->get_user_by_id($assigned_to_id);
					if(isset($res1)>0){
					  $vs_name = $res1->name; 
					  $vs_email = $res1->email;  
					  $vs_parent_id = $res1->parent_id;  
							  
					  if($res1->role_id==3){ 
							$res2 = $this->general_model->get_user_info_by_id($vs_parent_id);
							
							$vssub_domain_name = $res2->sub_domain_name; 
							if(strlen($vssub_domain_name)>0){
								$cstm_links = "http://{$vssub_domain_name}.leadstraker.com/leads/index/";
							}else{
								$cstm_links = "http://leadstraker.com/leads/index/";
							}
							
					  }else{
							
							$vssub_domain_name = $res1->sub_domain_name;  
							if(strlen($vssub_domain_name)>0){
								$cstm_links = "http://{$vssub_domain_name}.leadstraker.com/leads/index/";
							}else{
								$cstm_links = "http://leadstraker.com/leads/index/";
							}	
					  }
							  
						  $from_email = $config_arrs->email;  
						  $mailtext = stripslashes($config_arrs->lead_assignment_email_template);
	
						  $mailtext = str_replace("{{name}}","$vs_name",$mailtext);
						  $mailtext = str_replace("{{link}}","$cstm_links",$mailtext);
						   
						  $config['mailtype'] = 'html';  
						  $this->email->initialize($config); 
						  $this->email->to($vs_email);   
						  $this->email->from($from_email, 'LeadsTraker');
						  $this->email->subject("New Lead Assignment Info");
						  $this->email->message($mailtext);  
					   
						  if($this->email->send()){
							//$this->session->set_flashdata('success_msg', 'Please check your Email-ID, We have sent your account info!'); 
						  } 
					}  
				*/
				}     
			}  
		} 
	
	
		function pick_leads_data_old(){  
			
			$this->load->model('leads_model');  
			$this->load->model('users_model');    
			
			$config_arrs = $this->general_model->get_configuration();
			$conf_lead_inititals = stripslashes($config_arrs->lead_inititals); 
			$data['conf_lead_inititals']  = $conf_lead_inititals;  
			 
			/*$max_property_id_val = $this->admin_model->get_max_property_id();*/
			 
			$max_lead_id_val = $this->leads_model->get_max_lead_ref_no_val();
			$max_lead_id_val = $max_lead_id_val+1; 
			$max_lead_id_val = str_pad($max_lead_id_val, 4, '0', STR_PAD_LEFT); 
			$max_lead_id_val = $max_lead_id_val;
			
			/*$max_property_id_val = $conf_company_inititals.$max_property_id_val;*/
			$data['auto_ref_no'] = $ref_no = $max_lead_id_val; 
		
			$data['page_headings'] = "Add Lead";	   
			 
			if(isset($_POST['email']) && !empty($_POST['email'])){ 
			
			
				$date_times = date('Y-m-d H:i:s');
				$ip_address = $_SERVER['REMOTE_ADDR'];
				
				
				$name = $this->input->post('name', TRUE);
				$email = $this->input->post('email', TRUE);
				$contact_no = $this->input->post('contact_no', TRUE);
				$budget = $this->input->post('budget', TRUE);
				$requirements = $message = $this->input->post('message', TRUE);
				  
				$status = 1;  
				  
				$source_of_listing = '';   
				 
				$vs_id = 1;
				$assigned_to_id = 5; 	
				  
				// form validation	/* 'email' => $email,'contact_no' => $contact_no, */
				$ref_no = $conf_lead_inititals.$ref_no;
					   
				$datas = array('ref_no' => $ref_no,'name' => $name,'budget' => $budget,'requirements' => $requirements,'source_of_listing' => 'Website','status' => $status,'created_by' => $vs_id,'assigned_to_id' => $assigned_to_id,'ip_address' => $ip_address,'created_on' => $date_times,'modified_on' => $date_times,'is_new' => '1');  
				   
				//$datas = array('ref_no' => $ref_no,'name' => $name,'company_name' => $company_name,'web_site' => $web_site,'requirements' => $requirements,'source_of_listing' => $source_of_listing,'name_of_reference' => $name_of_reference,'other' => $other,'address' => $address,'status' => $status,'expected_revenue' => $expected_revenue,'owned_on' => $is_owned_on,'reminds' => $reminds,'remind_date' => $is_remind_date,'remind_time' => $remind_time,'created_by' => $vs_id,'assigned_to_id' => $assigned_to_id,'ip_address' => $ip_address,'created_on' => $date_times,'modified_on' => $date_times,'is_new' => '1' ); 
				/*'contact_no' => $contact_no,'email' => $email*/	 
								
			$res = $this->leads_model->insert_leads_data($datas); 
			if(isset($res)){
				$last_lead_id = $this->db->insert_id();
				
				$datas2 = array('contact_no' => $contact_no,'contact_type' => '1','lead_id' => $last_lead_id);   
				$this->leads_model->insert_leads_contact_data($datas2); 
				 
				$datas3 = array('email' => $email,'email_type' => '1','lead_id' => $last_lead_id);   
				$this->leads_model->insert_leads_email_data($datas3);  
				 
				$this->load->library('email'); 
					  
				/*$cstm_links = $this->cstms_base_urls."leads/index/";*/
				$res1 = $this->users_model->get_user_by_id($assigned_to_id);
				if(isset($res1)>0){
				  $vs_name = $res1->name; 
				  $vs_email = $res1->email;  
				  $vs_parent_id = $res1->parent_id;  
						  
				  if($res1->role_id==3){ 
						$res2 = $this->general_model->get_user_info_by_id($vs_parent_id);
						
						$vssub_domain_name = $res2->sub_domain_name; 
						if(strlen($vssub_domain_name)>0){
							$cstm_links = "http://{$vssub_domain_name}.leadstraker.com/leads/index/";
						}else{
							$cstm_links = "http://leadstraker.com/leads/index/";
						}
						
				  }else{
						
						$vssub_domain_name = $res1->sub_domain_name;  
						if(strlen($vssub_domain_name)>0){
							$cstm_links = "http://{$vssub_domain_name}.leadstraker.com/leads/index/";
						}else{
							$cstm_links = "http://leadstraker.com/leads/index/";
						}	
				  }
						  
					  $from_email = $config_arrs->email;  
					  $mailtext = stripslashes($config_arrs->lead_assignment_email_template);

					  $mailtext = str_replace("{{name}}","$vs_name",$mailtext);
					  $mailtext = str_replace("{{link}}","$cstm_links",$mailtext);
					   
					  $config['mailtype'] = 'html';  
					  $this->email->initialize($config); 
					  $this->email->to($vs_email);   
					  $this->email->from($from_email, 'LeadsTraker');
					  $this->email->subject("New Lead Assignment Info");
					  $this->email->message($mailtext);  
				   
					  if($this->email->send()){
						//$this->session->set_flashdata('success_msg', 'Please check your Email-ID, We have sent your account info!'); 
					  }else{
						//$this->session->set_flashdata('error_msg', 'Unable to sent mail, please check configuration!');
					  }  
					}  
					 
						//$this->session->set_flashdata('success_msg','Record inserted successfully!');
					}else{
				//$this->session->set_flashdata('error_msg','Error: while inserting record!');
			}  	
		}  
	} 
	
	  
	 
	  
	}
	?>
