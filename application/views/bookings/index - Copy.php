<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	$this->load->view('widgets/meta_tags');  ?>
</head>
<body> <!-- class="sidebar-xs has-detached-left" -->

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
      <?php $this->load->view('widgets/content_header'); ?>
      <!-- /page header --> 
      
      <!-- Content area -->
      <div class="content"> 
        <!-- Dashboard content -->
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
        <script>
        	function operate_bookings_list(){  	  
				$(document).ready(function(){ 
					var sel_per_page_val =0;   
					
					var sel_per_page = document.getElementById("per_page");
					sel_per_page_val = sel_per_page.options[sel_per_page.selectedIndex].value;
					  
					var s_val = document.getElementById("s_val").value;
					s_val = s_val.trim();
					 
					$.ajax({
						method: "POST",
						url: "<?php echo site_url('/bookings/index2/'); ?>",
						data: { page: 0, sel_per_page_val:sel_per_page_val, s_val: s_val},
						beforeSend: function(){
							$('.loading').show();
						},
						success: function(data){
							$('.loading').hide();
							$('#dyns_list').html(data); 
							
							$('.cstm_select2').select2({
								minimumResultsForSearch: Infinity
							});
						}
					});
				}); 
			}
    	  
			function view_domain_keywords(paras1){  
				if(paras1>0){			
					$(document).ready(function(){    
					<?php
						$domn_dtl_popup_url = 'bookings/domain_keywords_detail/';
						$domn_dtl_popup_url = site_url($domn_dtl_popup_url); ?> 
						
						document.getElementById("modals_body_areas").innerHTML = '';
						
						var cstm_urls = "<?php echo $domn_dtl_popup_url; ?>"+paras1;
						 
						$('#modal_remote_domain_keywords_detail').modal({show: false})
						.on('hide.bs.modal', function () {
							//..................
						}).on('shown.bs.modal', function (event) {
							 $(this).find('.modal-body').load(cstm_urls, function() {
				 
							 });             
						}).on('hidden.bs.modal', function () {
							$("#modal_remote_domain_keywords_detail").off();
						});
						  
					});    
				} 
			} 
   	 	</script> 
      
	  <div id="modal_remote_domain_keywords_detail" class="modal fade" data-backdrop="false"> 
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Booking </h5>
				</div>

				<div class="modal-body" id="modals_body_areas">Loading...</div>

				<div class="modal-footer">
					<button id="close_users_modals" type="button" class="btn btn-link" data-dismiss="modal">Close</button> 
				</div>
			</div>
		</div>
	</div>
          
        <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><?php echo $page_headings; ?></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <!--<li><a data-action="close"></a></li>-->
                </ul>
            </div>
        </div>   
      <div class="panel-body">    
	  
   <!--  <form name="datas_form" id="datas_form" action="" method="post">-->
     
    <input type="hidden" name="add_new_link" id="add_new_link" value="<?php echo site_url('bookings/add'); ?>">
    <input type="hidden" name="cstm_frm_name" id="cstm_frm_name" value="datas_list_forms">
    
    <form name="datas_list_forms" id="datas_list_forms" action="<?php echo site_url('bookings/trash_multiple'); ?>" method="post">  
     
        <div class="row">
            <div class="col-md-12"> 
             
            	<div class="form-group mb-md">   
                  <div class="col-md-1">    
                  <select name="per_page" id="per_page" class="form-control input-sm mb-md cstm_select2" onChange="operate_bookings_list();">
                  <option value="25"> Pages</option>
                  <option value="25"> 25 </option>
                  <option value="50"> 50 </option>
                  <option value="100"> 100 </option> 
                </select> 
                  </div> 
                  
                  <div class="col-md-3">  
                  <input name="s_val" id="s_val" onKeyUp="operate_bookings_list();" placeholder="Search..." type="text" class="form-control input-sm mb-md">   
            	  </div> 
                  <div class="col-md-3">   
                  </div>    
                    
                  <div class="col-md-3 pull-right"> 
                    <div class="dt-buttons">  
                     	<a class="dt-button btn border-slate text-slate-800 btn-flat mrglft5" tabindex="0" aria-controls="DataTables_Table_1" href="javascript:void(0);" onClick="return operate_multi_deletions('datas_list_forms');"> <span><i class="glyphicon glyphicon-remove-circle position-left"></i>Delete</span></a>   
                        <a class="dt-button btn border-slate text-slate-800 btn-flat mrglft5" tabindex="0" aria-controls="DataTables_Table_1" href="<?= site_url('bookings/add'); ?>"><span><i class="glyphicon glyphicon-plus position-left"></i>New</span></a>
                     
                      </div>
                    </div> 
                </div> 
                
            </div>
        </div>
		 
		 <style>
			 #datatable-default_filter{
				display:none !important;
			 }
		 </style> 
            <table class="table table-bordered table-striped table-hover">
              <thead>
               	<tr>
                    <th width="5%">#</th>
                    <th width="15%">Name</th>
                    <th width="30%">Email  </th>
                    <th width="15%" class="text-center">Phone # </th>
                    <th width="15%" class="text-center">Package</th>
                    <th width="15%" class="text-center">No. of Tickets</th>
                    <th width="15%" class="text-center">Booking Date</th>
                    <th width="15%" class="text-center">Added On </th>
                    <th width="15%" class="text-center">Action </th>  
                  </tr>
              </thead>
			  <!-- 
				$per_ticket_price = $this->input->post("per_ticket_price"); 
				$total_costs = $this->input->post("total_costs"); 
				$message = $this->input->post("message");
				$cash_type = $this->input->post("cash_type"); 
				$status = $this->input->post("status"); -->
				
              <tbody id="dyns_list">
                <?php  
                    $sr=1; 
                    if(isset($records) && count($records)>0){
                        foreach($records as $record){   
                            $operate_url = 'bookings/update/'.$record->id;
                            $operate_url = site_url($operate_url); 
							
							$trash_url = 'bookings/trash_aj/'.$record->id;
                            $trash_url = site_url($trash_url); ?>
                      <tr class="<?php echo ($sr%2==0)?'gradeX':'gradeC'; ?>">
                        <td>  
                          	<div class="checkbox"> <label for="status"> <input type="checkbox" name="multi_action_check[]" id="multi_action_check_<?php echo $record->id; ?>" value="<?php echo $record->id; ?>" class="styled"> <?php echo $sr; ?> </label> </div> </td> 	
						<td><?= stripslashes($record->name); ?></td>
						<td><?= stripslashes($record->email); ?></td>
						<td class="text-center"><?= stripslashes($record->phone_no); ?></td>
						<td class="text-center"><?= stripslashes($record->package_id); ?></td>
						<td class="text-center"><?= stripslashes($record->no_of_tickets); ?></td>
						<td class="text-center"><?= date('d-M-Y',strtotime($record->booking_date)); ?></td>
						<td class="text-center"><?= date('d-M-Y H:i:s',strtotime($record->added_on)); ?></td>
						<td class="text-center"> 
                           <ul class="icons-list"> <li class="text-primary-600"><a href="<?php echo $operate_url; ?>"><i class="icon-pencil7"></i></a></li> <li class="text-danger-600"><a href="javascript:void(0);" onClick="return operate_deletions('<?php echo $trash_url; ?>','<?php echo $record->id; ?>','dyns_list');"><i class="icon-trash"></i></a></li> </ul>                          
						  </td> 
                        </tr>
                        <?php 
                        $sr++;
                        } ?> 
                       <tr>
                       <td colspan="12">
                       <div style="float:left;">  <select name="per_page" id="per_page" class="form-control input-sm mb-md cstm_select2" onChange="operate_bookings_list();">
                          <option value="25"> Pages</option>
                          <option value="25"> 25 </option>
                          <option value="50"> 50 </option>
                          <option value="100"> 100 </option> 
                        </select>  </div>
                        <div style="float:right;">  <?php echo $this->ajax_pagination->create_links(); ?>  </div> </td>  
                      </tr> 
                  <?php 
                    }else{ ?>
                <tr>
                  <td colspan="12" align="center"><strong> No Record Found! </strong></td>
                </tr>
                <?php } ?>
              </tbody>
            </table> 
     	</form>
     
      </div>
       <div class="loading" style="display: none;"><div class="content"><img src="<?php echo base_url().'assets/images/loading.gif'; ?>"/></div></div>
        </form>
        </div>
         
        <!-- /dashboard content --> 
        
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
	$(document).ready(function(){  
		$('.cstm_select2').select2({
			minimumResultsForSearch: Infinity
		});
	});  
</script>
<!-- /page container -->
</body>
</html>