 <!DOCTYPE html>
<html lang="en">
<head>
<?php 
	$this->booking_page = '1'; 
	$this->load->view('widgets/meta_tags'); 
	$vs_id = $this->session->userdata('us_id');  
	/*$vs_user_role_id = $this->session->userdata('us_role_id');*/ ?>  
</head>
<body class="sidebar-xs has-detached-right"> <!-- class="sidebar-xs has-detached-left" -->

<!-- Main navbar -->
<?php $this->load->view('widgets/header'); ?>
<!-- /main navbar --> 

<!-- Page container -->
<div class="page-container"> 
  
  <!-- Page content -->
  <div class="page-content"> 
    
    <!-- Main sidebar -->
    <?php $this->load->view('widgets/left_sidebar'); ?>
    <!-- /main sidebar --> 
    
    <!-- Main content -->
    <div class="content-wrapper"> 
		
  <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?= $page_headings; ?></span></h4>
		<ul class="breadcrumb position-right">
          <?php 
			if(isset($page_headings) && $page_headings=="Dashboard"){?>
				<li class="active"><?= $page_headings; ?></li>
			<?php 
			}else{ ?>
            	<li><a href="<?= site_url();?>"><i class="icon-home2 position-left"></i> Home</a></li>
            	<li class="active"><?= $page_headings; ?></li> 
			<?php 
			} ?>  
          </ul>  
      </div>
      <div class="heading-elements"> <a href="<?= site_url('bookings/add'); ?>" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-add"></i></b> New </a>  </div>
    </div>
  </div>
  <!-- /page header -->
  <!-- Content area -->
  <div class="content">
  <?php if($this->session->flashdata('success_msg')){ ?>    
			<div class="alert alert-success no-border">
				<button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
			 <?php echo $this->session->flashdata('success_msg'); ?>
			</div> 
	<?php } 
		if($this->session->flashdata('error_msg')){ ?>  
			<div class="alert alert-danger no-border">
				<button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
			 <?php echo $this->session->flashdata('error_msg'); ?>
			</div>    
	<?php } ?> 
	
	  <script type="text/javascript"> 
		function view_booking(paras1){  
			if(paras1>0){			
				$(document).ready(function(){    
				<?php
					$booking_dtl_popup_url = 'bookings/booking_detail/';
					$booking_dtl_popup_url = site_url($booking_dtl_popup_url); ?> 
					
					document.getElementById("modals_body_areas").innerHTML = '';
					
					var cstm_urls = "<?php echo $booking_dtl_popup_url; ?>"+paras1;
					 
					$('#modal_remote_booking_detail').modal({show: false})
					.on('hide.bs.modal', function () {
						//..................
					}).on('shown.bs.modal', function (event) {
						 $(this).find('.modal-body').load(cstm_urls, function() {
			 
						 });             
					}).on('hidden.bs.modal', function () {
						$("#modal_remote_booking_detail").off();
					});
					  
				});    
			} 
		}  
	</script>
     
	  <div id="modal_remote_booking_detail" class="modal fade" data-backdrop="false"> 
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<div class="row">
						<div class="col-lg-6" align="left"> 
							 <h5 class="modal-title" id="fetch_modal_title"> </h5>
						</div>
						<div class="col-lg-6" align="right" id="fetch_action_elements"> 
						</div> 
					</div> 
				</div>
	
				<div class="modal-body" id="modals_body_areas"></div>
	
				<div class="modal-footer">
					<button id="close_users_modals" type="button" class="btn btn-link" data-dismiss="modal">Close</button> 
				</div>
			</div>
		  </div>
	   </div>
	 
    <!-- Detached content -->
    <div class="container-detached">
      <div class="content-detached">
        <!-- Tasks options -->
        <div class="navbar navbar-default navbar-xs navbar-component">
          <ul class="nav navbar-nav no-border visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
          </ul> 
		  <input name="sort_name_val" id="sort_name_val" type="hidden" value=""> 
		  <input name="sort_booking_date_val" id="sort_booking_date_val" type="hidden" value=""> 
		  <input name="sort_status_val" id="sort_status_val" type="hidden" value="0"> 
		  
          <div class="navbar-collapse collapse" id="navbar-filter">
            <p class="navbar-text">Sort:</p>
            <ul class="nav navbar-nav">  
			  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-sort-amount-desc position-left"></i> By Name <span class="caret"></span></a>
                <ul class="dropdown-menu">
				   <li id="li_sort_name_0"><a href="javascript:void(0);" onClick="return operate_booking_filter('name','');">Sort By Name</a></li>
                  <li id="li_sort_name_1"><a href="javascript:void(0);" onClick="return operate_booking_filter('name','ASC');">ASC</a></li>
                  <li id="li_sort_name_2"><a href="javascript:void(0);" onClick="return operate_booking_filter('name','DESC');">DESC</a></li> 
                </ul>
              </li>   
              <!--<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-sort-numeric-asc position-left"></i> By Status <span class="caret"></span></a>
                <ul class="dropdown-menu">  
				<li id="li_sort_status_0"><a href="javascript:void(0);" onClick="return operate_booking_filter('status','0');">Sort By Status</a></li> 
                  <li id="li_sort_status_1"><a href="javascript:void(0);" onClick="return operate_booking_filter('status','1');">Confirm</a></li>
				   <li id="li_sort_status_2"><a href="javascript:void(0);" onClick="return operate_booking_filter('status','2');">Delete</a></li>
                  <li id="li_sort_status_3"><a href="javascript:void(0);" onClick="return operate_booking_filter('status','3');">Reject</a></li> 
				  <li id="li_sort_status_4"><a href="javascript:void(0);" onClick="return operate_booking_filter('status','4');">No Show</a></li> 
                </ul>
              </li>-->
			  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-sort-time-asc position-left"></i> By Booking Date <span class="caret"></span></a>
                <ul class="dropdown-menu"> 
				  <li id="li_sort_booking_date_0"><a href="javascript:void(0);" onClick="return operate_booking_filter('booking_date','');">Sort By Booking Date</a></li>
                  <li id="li_sort_booking_date_1"><a href="javascript:void(0);" onClick="return operate_booking_filter('booking_date','ASC');">ASC</a></li>
                  <li id="li_sort_booking_date_2"><a href="javascript:void(0);" onClick="return operate_booking_filter('booking_date','DESC');">DESC</a></li> 
                </ul>
              </li>
            </ul>
            <div class="navbar-right"> 
            </div>
          </div>
        </div>
        <!-- /tasks options -->
        <!-- Tasks grid -->
		<script>  
			function operate_booking_filter(item1,item1_val){  
				if(item1 == "name" && item1_val == "ASC"){
					document.getElementById("sort_name_val").value = item1_val;
					
					document.getElementById("li_sort_name_1").className = "active";
					document.getElementById("li_sort_name_2").classList.remove("active"); 
					
					
					document.getElementById("sort_booking_date_val").value = ''; 
					document.getElementById("li_sort_booking_date_1").classList.remove("active"); 
					document.getElementById("li_sort_booking_date_2").classList.remove("active"); 
					
				}else if(item1 == "name" && item1_val == "DESC"){
					document.getElementById("sort_name_val").value = item1_val;
					 
					document.getElementById("li_sort_name_1").classList.remove("active"); 
					document.getElementById("li_sort_name_2").className = "active";  
					
					
					document.getElementById("sort_booking_date_val").value = ''; 
					document.getElementById("li_sort_booking_date_1").classList.remove("active"); 
					document.getElementById("li_sort_booking_date_2").classList.remove("active"); 
					
				}else if(item1 == "name" && item1_val == ''){
				
					document.getElementById("sort_name_val").value = '';
					document.getElementById("li_sort_name_1").classList.remove("active"); 
					document.getElementById("li_sort_name_2").classList.remove("active"); 
				}
				
				if(item1 == "booking_date" && item1_val == "ASC"){
					document.getElementById("sort_booking_date_val").value = item1_val;
					
					document.getElementById("li_sort_booking_date_1").className = "active"; 
					document.getElementById("li_sort_booking_date_2").classList.remove("active");
					
					
					document.getElementById("sort_name_val").value = '';
					document.getElementById("li_sort_name_1").classList.remove("active");  
					document.getElementById("li_sort_name_2").classList.remove("active");    
					
				}else if(item1 == "booking_date" && item1_val == "DESC"){
					document.getElementById("sort_booking_date_val").value = item1_val;
					  
					document.getElementById("li_sort_booking_date_1").classList.remove("active");  
					document.getElementById("li_sort_booking_date_2").className = "active";  
					
					
					document.getElementById("sort_name_val").value = '';
					document.getElementById("li_sort_name_1").classList.remove("active");  
					document.getElementById("li_sort_name_2").classList.remove("active");  
					
				}else if(item1 == "booking_date" && item1_val == ''){
				
					document.getElementById("sort_booking_date_val").value = '';
					document.getElementById("li_sort_booking_date_1").classList.remove("active");  
					document.getElementById("li_sort_booking_date_2").classList.remove("active");    
				}
				 
				
				/*if(item1 == "status" && item1_val == 1){
					document.getElementById("sort_status_val").value = 1; 
					
					document.getElementById("li_sort_status_1").className = "active";
					document.getElementById("li_sort_status_2").classList.remove("active"); 
					document.getElementById("li_sort_status_3").classList.remove("active");  
					 
				}else if(item1 == "status" && item1_val == 2){
					document.getElementById("sort_status_val").value = 2;
					 
					document.getElementById("li_sort_status_1").classList.remove("active"); 
					document.getElementById("li_sort_status_2").className = 'active'; 
					document.getElementById("li_sort_status_3").classList.remove("active");   
					
				}else if(item1 == "status" && item1_val == 3){
					document.getElementById("sort_status_val").value = 3;
					 
					document.getElementById("li_sort_status_1").classList.remove("active");   
					document.getElementById("li_sort_status_2").classList.remove("active");  
					document.getElementById("li_sort_status_3").className = 'active'; 
					
				}else if(item1 == "status" && item1_val == 0){
					document.getElementById("sort_status_val").value = 0;
					 
					document.getElementById("li_sort_status_1").classList.remove("active");   
					document.getElementById("li_sort_status_2").classList.remove("active");  
					document.getElementById("li_sort_status_3").classList.remove("active");  
				}*/ 
				
				operate_bookings_list();
			} 
			
        	function operate_bookings_list(){  	  
				$(document).ready(function(){ 
					var sel_per_page_val =0;   
					     
					var s_val = document.getElementById("s_val").value;
					s_val = s_val.trim();  
					
					var sort_name_val = document.getElementById("sort_name_val").value;
					sort_name_val = sort_name_val.trim(); 
					
					var sort_booking_date_val = document.getElementById("sort_booking_date_val").value;
					sort_booking_date_val = sort_booking_date_val.trim();
					
					/*var sort_status_val = document.getElementById("sort_status_val").value;
					sort_status_val = sort_status_val.trim(); */
					
					var sort_status = document.getElementById("status");
					var sort_status_val = sort_status.options[sort_status.selectedIndex].value; 
					  
					$.ajax({
						method: "POST",
						url: "<?php echo site_url('/bookings/index2/'); ?>",
						data: { page: 0, sel_per_page_val:sel_per_page_val, s_val:s_val, sort_name_val: sort_name_val, sort_booking_date_val:sort_booking_date_val, sort_status_val: sort_status_val},
						beforeSend: function(){
							$('.loading').show();
						},
						success: function(data){
							$('.loading').hide();
							$('#dyns_list').html(data);  
						}
					});
					
				}); 
			} 	
					
			function operate_bookings_status(paras1,status_val){  	  
				$(document).ready(function(){   
					if(paras1>0 && status_val>0){  
					
						$.ajax({
							method: "POST",
							url: "<?php echo site_url('/bookings/fetch_item_status/'); ?>",
							data: { sel_item_val:paras1, status_val: status_val},
							beforeSend: function(){
								$('.loading').show();
							},
							success: function(data){
								$('.loading').hide();
								var fetched_data = "#fetch_item_"+paras1; 
								$(fetched_data).html(data);  
							}
						}); 
					} 
				}); 
			} 
   	 	</script> 
		
		<input type="hidden" name="add_new_link" id="add_new_link" value="<?php echo site_url('bookings/add'); ?>">
		<input type="hidden" name="cstm_frm_name" id="cstm_frm_name" value="datas_list_forms">
		
		<form name="datas_list_forms" id="datas_list_forms" action="<?php echo site_url('bookings/trash_multiple'); ?>" method="post">  
	
        <div class="row" id="dyns_list">
		 <?php  
			$sr=1; 
			if(isset($records) && count($records)>0){
				foreach($records as $record){   
					$operate_url = 'bookings/update/'.$record->id;
					$operate_url = site_url($operate_url); 
					
					$trash_url = 'bookings/trash_aj/'.$record->id;
					$trash_url = site_url($trash_url);
					
					$detail_url = 'bookings/booking_detail/'.$record->id;
              	    $detail_url = site_url($detail_url); 
					
					$cont_cls = 'primary';
					if($record->status==1){
						$cont_cls = 'success';
					}else if($record->status==2){
						$cont_cls = 'primary';
					}else if($record->status==3){
						$cont_cls = 'danger';
					}else if($record->status==4){
						$cont_cls = 'default';
					}   ?> 
					 
					<div class="col-md-6" id="fetch_item_<?= $record->id; ?>">
						<div class="panel border-left-lg border-left-<?php echo $cont_cls; ?>">
						  <div class="panel-body">
							<div class="row">
							  <div class="col-md-7">
								<h6 class="no-margin-top"> <a href="javascript:void(0);" onClick="return view_booking('<?php echo $record->id; ?>');" data-toggle="modal" data-target="#modal_remote_booking_detail"><?php echo ($record->is_new==1) ? ' <span class="status-mark bg-danger"> &nbsp; </span>':''; /* && $vs_id==$record->assigned_to_id*/ ?>  #<?= $record->id.' - '.stripslashes($record->name); ?></a></h6>
								<p class="mb-15">  
								<?php 
								 $rcs = $this->general_model->get_gen_packages_info($record->package_id); 
								 if(isset($rcs)){
								 	echo $rcs->name; 
								 } ?> </p> </div>
							  <div class="col-md-5">
						<ul class="list task-details" style="list-style-type:none;">
						  <li><i class="icon-phone" style="font-size:11px;"> </i>  <?= stripslashes($record->phone_no); ?> </li>   	      
						  <li><i class="icon-price-tag3" style="font-size:11px;"> </i>  <?= stripslashes($record->total_costs); ?> AED </li>
						  <li><i class="icon-calendar" style="font-size:11px;"> </i>  <?= date('d F, Y',strtotime($record->booking_date)); ?> </li> 
						  <li class="dropdown">
							Status: &nbsp; 
							<a href="#" class="label label-<?php if($record->status==1){ echo 'success'; }else if($record->status==2){ echo 'primary'; }else if($record->status==3){ echo 'danger'; }else if($record->status==4){ echo 'default'; } ?> dropdown-toggle" data-toggle="dropdown"><?php if($record->status==1){ echo 'Confirm'; }else if($record->status==2){ echo 'Delete'; }else if($record->status==3){ echo 'Reject'; }else if($record->status==4){ echo 'No Show'; }  ?> <span class="caret"></span></a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li <?php echo ($record->status==1) ? 'class="active"':''; ?>><a href="javascript:void(0);" onClick="operate_bookings_status('<?php echo $record->id; ?>','1');"><span class="status-mark position-left bg-success"></span> Confirm</a></li>
								<li <?php echo ($record->status==2) ? 'class="active"':''; ?>><a href="javascript:void(0);" onClick="operate_bookings_status('<?php echo $record->id; ?>','2');"><span class="status-mark position-left bg-primary"></span> Delete </a></li> 
								<li <?php echo ($record->status==3) ? 'class="active"':''; ?>><a href="javascript:void(0);" onClick="operate_bookings_status('<?php echo $record->id; ?>','3');"><span class="status-mark position-left bg-danger"></span> Reject </a></li>
								<li <?php echo ($record->status==4) ? 'class="active"':''; ?>><a href="javascript:void(0);" onClick="operate_bookings_status('<?php echo $record->id; ?>','4');"><span class="status-mark position-left bg-default"></span> No Show </a></li>
							</ul> 
						</li>
						</ul>
							  </div>
							</div>
						  </div>
						  <div class="panel-footer panel-footer-condensed">
							<div class="heading-elements"> &nbsp;    
							<span class="heading-text"><i class="icon-mail5" style="font-size:13px;"> </i>  <span class="text-semibold"> <?= stripslashes($record->email); ?></span></span> 
							  <ul class="list-inline list-inline-condensed heading-text pull-right">  
								<li class="dropdown">  <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
								  	<ul class="dropdown-menu dropdown-menu-right"> 
									<li><a href="<?php echo $operate_url; ?>"><i class="icon-pencil7"></i> Edit </a></li> 
									<li><a href="javascript:void(0);" onClick="return operate_deletions('<?php echo $trash_url; ?>','<?php echo $record->id; ?>','dyns_list');"><i class="icon-cross2"></i> Delete </a> </li>
								  </ul>
								</li> 
							  </ul>
							</div>
						  </div>
						</div>
					  </div>  
  
				<?php 
				$sr++;
				}  
				 
			}else{ ?>
				 <strong> No Record Found! </strong> 
		<?php } ?>
		 
        </div>  
		
        <!-- /tasks grid -->
        <!-- Pagination -->
        <!--<div class="text-center content-group-lg pt-20">
          <ul class="pagination">
            <li class="disabled"><a href="#"><i class="icon-arrow-small-left"></i></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#"><i class="icon-arrow-small-right"></i></a></li>
          </ul>
        </div>-->
        <!-- /pagination -->
		</form>
      </div>
    </div>
    <!-- /detached content -->
    
	<!-- Detached sidebar -->
	<div class="sidebar-detached">
		<div class="sidebar sidebar-default">
			<div class="sidebar-content">

				<!-- Search task -->
				<div class="sidebar-category">
					<div class="category-title">
						<span>Search Booking</span>
						<ul class="icons-list">
							<li><a href="#" data-action="collapse"></a></li>
						</ul>
					</div> 

					<div class="category-content">
					
						<div class="form-group">  
							<div class="has-feedback has-feedback-left">
								<input type="text" name="s_val" id="s_val" class="form-control" placeholder="Search..." onKeyUp="operate_bookings_list();" value="<?php echo set_value('s_val'); ?>">
								<div class="form-control-feedback">
									<i class="icon-search4 text-size-base text-muted"></i>
								</div> 
							</div>
						  </div>  
            
						<div class="form-group">
						 <div class="row">
							<div class="col-xs-12">
								 <select name="status" id="status" class="form-control cstm_select2" onChange="operate_bookings_list();">
									<option value="0"> Select Status </option>
									<option value="1" <?php echo (isset($_POST['status']) && $_POST['status']==1) ? 'selected="selected"':''; ?>> Confirm </option>
									<option value="2" <?php echo (isset($_POST['status']) && $_POST['status']==2) ? 'selected="selected"':''; ?>> Delete </option>
									<option value="3" <?php echo (isset($_POST['status']) && $_POST['status']==3) ? 'selected="selected"':''; ?>> Reject </option> 
									<option value="4" <?php echo (isset($_POST['status']) && $_POST['status']==4) ? 'selected="selected"':''; ?>> No Show </option>  
								</select>
								</div> 
							</div>
						</div>  
						  
					</div>
				</div>
				<!-- /search task -->  
			</div>
		</div>
	</div>
	<!-- /detached sidebar -->
	 
    <!-- Footer -->
     <?php $this->load->view('widgets/footer'); ?>
    <!-- /footer -->
  </div>
  <!-- /content area -->
</div> 
    <!-- /main content --> 
    
  </div>
  <!-- /page content --> 
  
</div>
<script> 
	/*$(document).ready(function(){  
		$('.cstm_select2').select2({
			minimumResultsForSearch: Infinity
		});
	});*/  
</script>
<!-- /page container -->
</body>
</html>