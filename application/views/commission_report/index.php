<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	$this->load->view('widgets/meta_tags');  ?>
	<script src="<?= asset_url();?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
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
        	function operate_commission_report_list(){  	   
				$(document).ready(function(){ 
					var sel_per_page_val =0;   
					
					var sel_per_page = document.getElementById("per_page");
					sel_per_page_val = sel_per_page.options[sel_per_page.selectedIndex].value;
					
					var sel_package_id = document.getElementById("package_id");
					var sel_package_val = sel_package_id.options[sel_package_id.selectedIndex].value;
					 
					var from_date_val = document.getElementById("from_date").value;
					from_date_val = from_date_val.trim();
					
					var to_date_val = document.getElementById("to_date").value;
					to_date_val = to_date_val.trim();
					 
					$.ajax({ 
						method: "POST",
						url: "<?php echo site_url('/commission_report/index2/'); ?>",
						data: { page: 0, sel_per_page_val:sel_per_page_val, sel_package_val:sel_package_val, from_date_val:from_date_val, to_date_val:to_date_val },
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
   	 	 
			function view_commission_detail(paras1){  
				if(paras1>0){			
					$(document).ready(function(){    
					<?php
						$booking_dtl_popup_url = 'commission_report/commission_detail/';
						$booking_dtl_popup_url = site_url($booking_dtl_popup_url); ?> 
						
						document.getElementById("modals_body_areas").innerHTML = '';
						
						var cstm_urls = "<?php echo $booking_dtl_popup_url; ?>"+paras1;
						 
						$('#modal_remote_commission_detail').modal({show: false})
						.on('hide.bs.modal', function () {
							//..................
						}).on('shown.bs.modal', function (event) {
							 $(this).find('.modal-body').load(cstm_urls, function() {
				 
							 });             
						}).on('hidden.bs.modal', function () {
							$("#modal_remote_commission_detail").off();
						});
						  
					});    
				} 
			}  
		</script>
     
	  <div id="modal_remote_commission_detail" class="modal fade" data-backdrop="false"> 
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
	   
          
        <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><?php echo $page_headings; ?></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload" onClick="window.location='<?php echo site_url('commission_report/index'); ?>'"></a></li>
                    <!--<li><a data-action="close"></a></li>-->
                </ul>
            </div>
        </div>   
      <div class="panel-body">  
   <!--  <form name="datas_form" id="datas_form" action="" method="post">-->
     
    <input type="hidden" name="add_new_link" id="add_new_link" value="">
    <input type="hidden" name="cstm_frm_name" id="cstm_frm_name" value="datas_list_forms">
    
    <form name="datas_list_forms" id="datas_list_forms" action="" method="post">  
     	<div class="row">
            <div class="col-md-12"> 
             
            	<div class="form-group mb-md">   
                  <div class="col-md-1" style="width:11%;">    
				  <select name="per_page" id="per_page" class="form-control input-sm mb-md cstm_select2" onChange="operate_commission_report_list();">
					  <option value="25"> Pages</option>
					  <option value="25"> 25 </option>
					  <option value="50"> 50 </option>
					  <option value="100"> 100 </option> 
				  </select> 
                  </div> 
				  
				   <div class="col-md-3">  
				   <select name="package_id" id="package_id" class="form-control cstm_select2" data-error="#package_id1" onChange="operate_commission_report_list();">
					<option value="0"> Select Package </option> 
					<?php  
						$package_arrs = $this->general_model->get_gen_all_packages_list(); 
						if(isset($package_arrs) && count($package_arrs)>0){ 
							foreach($package_arrs as $package_arr){ ?>  
								 <option value="<?php echo $package_arr->id; ?>" <?php echo (isset($_POST['package_id']) && $_POST['package_id']==$package_arr->id) ? 'selected="selected"':''; ?>> <?php echo $package_arr->name; ?> </option>  
						<?php 
							}
						} ?>  
					</select> 
                   </div> 
				   
                  <div class="col-md-3">  
                  <input name="from_date" id="from_date" onKeyUp="operate_commission_report_list();" placeholder="From Date..." type="text" class="form-control input-sm mb-md" readonly="true" style="text-align:center;">   
            	  </div> 
				  
				  
                  <div class="col-md-3">  
                  <input name="to_date" id="to_date" onKeyUp="operate_commission_report_list();" placeholder="To Date..." type="text" class="form-control input-sm mb-md" readonly="true" style="text-align:center;">   
            	  </div>   
                    
                  <div class="col-md-1 pull-right"> 
                     <div class="dt-buttons">      
                        <a style="visibility:hidden;" class="dt-button btn border-slate text-slate-800 btn-flat mrglft5" tabindex="0" aria-controls="DataTables_Table_1" href="#"><span><i class="glyphicon glyphicon-plus position-left"></i>New</span></a>
                     
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
                    <th width="6%">#</th>
                    <th width="18%">Booking #</th>
                    <th width="16%" class="text-center">Package</th>
                    <th width="16%" class="text-center">Total Cost</th>
                    <th width="12%" class="text-center">Total Expenses</th>
                    <th width="12%" class="text-center">Commission</th>   
                  </tr>
              </thead>  
              <tbody id="dyns_list">  
                <?php  
                    $sr=1; 
                    if(isset($records) && count($records)>0){
                        foreach($records as $record){  ?>
						  <tr class="<?php echo ($sr%2==0)?'gradeX':'gradeC'; ?>">
							<td> <?php echo $sr; ?> </td> 	
							<td> <a href="javascript:void(0);" onClick="return view_commission_detail('<?php echo $record->id; ?>');" data-toggle="modal" data-target="#modal_remote_commission_detail"><?php echo ($record->is_new==1) ? ' <span class="status-mark bg-danger"> &nbsp; </span>':''; /* && $vs_id==$record->assigned_to_id*/ ?>  #<?= $record->id.' - '.stripslashes($record->name); ?></a> </td>
							<td><?php 
								 $rcs = $this->general_model->get_gen_packages_info($record->package_id); 
								 if(isset($rcs)){
									echo $rcs->name; 
								 } ?> </td>  
							<td class="text-center"> 
							<?php 	
								$total_costs = $record->total_costs;   
								echo ($total_costs>0) ? number_format($total_costs, 2) : '0'; ?> 
							</td>
							<td class="text-center"> 
							<?php 	
								$total_expense = $record->total_expense;  
								echo ($total_expense>0) ? number_format($total_expense, 2) : '0'; ?> </td> 
							<td class="text-center">
							<?php    
								$total_income = $total_costs - $total_expense;
								
								$commission = $total_income * 0.06;
								echo ($commission>0) ? number_format($commission, 2) : '0'; ?> 
							  </td>  
							</tr>
                        <?php 
                        $sr++;
                        } ?> 
                       <tr>
                       <td colspan="6">
                       <div style="float:left;">  <select name="per_page" id="per_page" class="form-control input-sm mb-md cstm_select2" onChange="operate_commission_report_list();">
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
                  <td colspan="6" align="center"><strong> No Record Found! </strong></td>
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
		$('#from_date').datepicker({
			format: "yyyy-mm-dd"
			}).on('change', function(){
				$('.datepicker').hide(); 
				operate_commission_report_list();
		});
		
		$('#to_date').datepicker({
			format: "yyyy-mm-dd"
			}).on('change', function(){
				$('.datepicker').hide(); 
				operate_commission_report_list();
		}); 
		     
		$('.cstm_select2').select2({
			minimumResultsForSearch: Infinity
		});
	});  
</script>
<!-- /page container -->
</body>
</html>