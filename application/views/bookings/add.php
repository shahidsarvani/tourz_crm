<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('widgets/meta_tags'); ?>  
<script src="<?= asset_url();?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
</head>
<body>

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
        <div class="row">
          <div class="col-lg-12">
            <?php if($this->session->flashdata('success_msg')){ ?>
            <div class="alert alert-success no-border">
              <button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
              <?php echo $this->session->flashdata('success_msg'); ?> </div>
            <?php } 
			if($this->session->flashdata('error_msg')){ ?>
            <div class="alert alert-danger no-border">
              <button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
              <?php echo $this->session->flashdata('error_msg'); ?> </div>
            <?php } ?> 
            <!-- Horizontal form -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h5 class="panel-title"> <?= $page_headings; ?> Form </h5>
              </div>
              <div class="panel-body">
	<script>  
	function operate_bookings_status(){  	  
		$(document).ready(function(){   
			var sel_package = document.getElementById("package_id");
			var sel_package_val = sel_package.options[sel_package.selectedIndex].value;
			
			var no_of_adults = document.getElementById("no_of_adults");
			var no_of_adults_val = no_of_adults.options[no_of_adults.selectedIndex].value;
			 
			var no_of_childs = document.getElementById("no_of_childs");
			var no_of_childs_val = no_of_childs.options[no_of_childs.selectedIndex].value;
			  
			if(sel_package_val>0){  
			
				$.ajax({
					method: "POST",
					url: "<?php echo site_url('/bookings/fetch_package_price/'); ?>",
					data: { sel_package_val:sel_package_val },
					beforeSend: function(){
						$('.loading').show();
					},
					success: function(data_arr){
						$('.loading').hide();
						
						var arrs = data_arr.split('__');
						var adult_ticket_price = arrs[0]; 
						var child_ticket_price = arrs[1];  
						
						document.getElementById("no_of_adults_per_price").innerHTML = adult_ticket_price;
						document.getElementById("no_of_childs_per_price").innerHTML = child_ticket_price;
						  
						
						var total_adult_ticket_price =  adult_ticket_price * no_of_adults_val;
						var total_child_ticket_price =  child_ticket_price * no_of_childs_val;
						  
						var total_package_price = total_adult_ticket_price + total_child_ticket_price; 
						 
						if(total_package_price != 0){    
							document.getElementById("total_costs").value = total_package_price;
						}
					}
				}); 
			}
		}); 
	}  
	</script>
			  
			  <?php $form_act = "bookings/add"; ?>
                <form name="datas_form" id="datas_form" method="post" action="<?php echo site_url($form_act); ?>" class="form-horizontal">
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="name">Name <span class="reds">*</span></label>
                    <div class="col-md-6">
                      <input name="name" id="name" type="text" class="form-control" value="<?php echo set_value('name'); ?>" data-error="#name1">
                      <span id="name1" class="text-danger"><?php echo form_error('name'); ?></span> </div>
                  </div> 
				  
				  <div class="form-group">
                    <label class="col-md-2 control-label" for="email">Email <span class="reds">*</span></label>
                    <div class="col-md-6">
                      <input name="email" id="email" type="text" class="form-control" value="<?php echo set_value('email'); ?>" data-error="#email1">
                      <span id="email1" class="text-danger"><?php echo form_error('email'); ?></span> </div>
                  </div> 
				  
				  <div class="form-group">
                    <label class="col-md-2 control-label" for="phone_no">Phone No <span class="reds">*</span> </label>
                    <div class="col-md-6">
                      <input name="phone_no" id="phone_no" type="text" class="form-control" value="<?php echo set_value('phone_no'); ?>" data-error="#phone_no1">
                      <span id="phone_no1" class="text-danger"><?php echo form_error('phone_no'); ?></span> </div>
                  </div>     
				  
				  <div class="form-group">
                    <label class="col-md-2 control-label" for="booking_date">Booking Date <span class="reds">*</span></label>
                    <div class="col-md-6">
                      <input name="booking_date" id="booking_date" type="text" class="form-control" value="<?php echo set_value('booking_date'); ?>" data-error="#booking_date1" readonly="ture">
                      <span id="booking_date1" class="text-danger"><?php echo form_error('booking_date'); ?></span> </div>
                  </div>  
				  
				  <div class="form-group">
                    <label class="col-md-2 control-label" for="package_id">Package <span class="reds">*</span></label>
                    <div class="col-md-6"> 
					  <select name="package_id" id="package_id" class="form-control cstm_select2" data-error="#package_id1" onChange="operate_bookings_status();">
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
                      <span id="package_id1" class="text-danger"><?php echo form_error('package_id'); ?></span> </div>
                  </div>   
					
		   <div class="form-group">
			<label class="col-md-2 control-label" for="no_of_adults">No. of Adults </label>
			<div class="col-md-6"> 
				<div class="input-group"> 
					<select name="no_of_adults" id="no_of_adults" class="form-control cstm_select2" data-error="#no_of_adults1" onChange="operate_bookings_status();">
					<option value="0"> Select No. of Adults </option> 
					<?php  
						for($a=1; $a <=10; $a++){ ?>  
							<option value="<?php echo $a; ?>" <?php echo (isset($_POST['no_of_adults']) && $_POST['no_of_adults']==$a) ? 'selected="selected"':''; ?>> <?php echo $a; ?> </option>  
						<?php  
						}  ?>  
					</select>
					<span class="input-group-addon"><i class="icon-mentions" id="no_of_adults_per_price"> </i></span>
				</div>  
				<span id="no_of_adults1" class="text-danger"><?php echo form_error('no_of_adults'); ?></span> </div>
		  </div> 
							  
		   <div class="form-group">
			<label class="col-md-2 control-label" for="no_of_childs">No. of Childs </label>
			<div class="col-md-6"> 
				<div class="input-group"> 
				 <select name="no_of_childs" id="no_of_childs" class="form-control cstm_select2" data-error="#no_of_childs1" onChange="operate_bookings_status();"> 
				<option value="0"> Select No. of Childs </option> 
				<?php  
					for($a=1; $a <=10; $a++){ ?>  
						<option value="<?php echo $a; ?>" <?php echo (isset($_POST['no_of_childs']) && $_POST['no_of_childs']==$a) ? 'selected="selected"':''; ?>> <?php echo $a; ?> </option>  
					<?php  
					}  ?>  
				</select>
			<span class="input-group-addon"><i class="icon-mentions" id="no_of_childs_per_price"> </i></span>
		</div>
		 <span id="no_of_childs1" class="text-danger"><?php echo form_error('no_of_childs'); ?></span> </div>
		</div>	  
				  
				   <div class="form-group">
                    <label class="col-md-2 control-label" for="total_costs">Total Costs</label>
                    <div class="col-md-6">
                      <input name="total_costs" id="total_costs" type="text" class="form-control" value="<?php echo set_value('total_costs'); ?>" data-error="#total_costs1">
                      <span id="total_costs1" class="text-danger"><?php echo form_error('total_costs'); ?></span> </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="col-md-2 control-label" for="total_expense">Total Expense</label>
                    <div class="col-md-6">
                      <input name="total_expense" id="total_expense" type="text" class="form-control" value="<?php echo set_value('total_expense'); ?>" data-error="#total_expense1">
                      <span id="total_expense1" class="text-danger"><?php echo form_error('total_expense'); ?></span> </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="col-md-2 control-label" for="discounts">Discount</label>
                    <div class="col-md-6">
                      <input name="discounts" id="discounts" type="text" class="form-control" value="<?php echo set_value('discounts'); ?>" data-error="#discounts1">
                      <span id="discounts1" class="text-danger"><?php echo form_error('discounts'); ?></span> </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="col-md-2 control-label" for="vats">VAT</label>
                    <div class="col-md-6">
                      <input name="vats" id="vats" type="text" class="form-control" value="<?php echo set_value('vats'); ?>" data-error="#vats1">
                      <span id="vats1" class="text-danger"><?php echo form_error('vats'); ?></span> </div>
                  </div> 
				  
				   <div class="form-group">
                    <label class="col-md-2 control-label" for="message">Message</label>
                    <div class="col-md-6">
					<textarea name="message" id="message" style="width:100%;" rows="5" class="form-control" data-error="#message1"><?php echo set_value('message'); ?></textarea> 
                      <span id="message1" class="text-danger"><?php echo form_error('message'); ?></span> </div>
                  </div>
				   
				   <div class="form-group">
                    <label class="col-md-2 control-label" for="cash_type">Cash Type</label>
                    <div class="col-md-6"> 
					  <select name="cash_type" id="cash_type" class="form-control cstm_select2" data-error="#cash_type1">
						<option value="0"> Select Cash Type </option>
						<option value="1" <?php echo (isset($_POST['cash_type']) && $_POST['cash_type']==1) ? 'selected="selected"':''; ?>> Cash on pickup </option>
						<option value="2" <?php echo (isset($_POST['cash_type']) && $_POST['cash_type']==1) ? 'selected="selected"':''; ?>> Cash via Bank </option> 
					</select>    
                      <span id="cash_type1" class="text-danger"><?php echo form_error('cash_type'); ?></span> </div>
                  </div>
				  
				   <div class="form-group">
                    <label class="col-md-2 control-label" for="status">Status</label>
                    <div class="col-md-6">
					<select name="status" id="status" class="form-control cstm_select2" data-error="#status1">
						<option value="0"> Select Status </option>
						<option value="1" <?php echo (isset($_POST['status']) && $_POST['status']==1) ? 'selected="selected"':''; ?>> Confirm </option>
						<option value="2" <?php echo (isset($_POST['status']) && $_POST['status']==2) ? 'selected="selected"':''; ?>> Delete </option>
						<option value="3" <?php echo (isset($_POST['status']) && $_POST['status']==3) ? 'selected="selected"':''; ?>> Reject </option> 
						<option value="4" <?php echo (isset($_POST['status']) && $_POST['status']==4) ? 'selected="selected"':''; ?>> No Show </option>  
					</select> 
                      <span id="status1" class="text-danger"><?php echo form_error('status'); ?></span> </div>
                  </div>    	 
                    
              <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-6"> 
				  <button class="btn border-slate text-slate-800 btn-flat" type="submit" name="saves" id="saves"><i class="glyphicon glyphicon-ok position-left"></i>Save</button>  
				  &nbsp;
				  <button class="btn border-slate text-slate-800 btn-flat" type="submit" name="saves_and_new" id="save_and_new"><i class="glyphicon glyphicon-repeat position-left"></i>Save & New</button>  
				  &nbsp;
				  <button type="reset" class="btn border-slate text-slate-800 btn-flat"><i class="glyphicon glyphicon-refresh position-left"></i>Clear</button>
	   
			  &nbsp;
			  <button type="button" class="btn border-slate text-slate-800 btn-flat" onClick="window.location='<?php echo site_url('bookings/index'); ?>';"><i class="glyphicon glyphicon-chevron-left position-left"></i>Cancel</button> 
			  
			</div>
		  </div>
    	</form>  
		  <script type="text/javascript">  
			/*name email  phone_no  booking_date  no_of_tickets package_id per_ticket_price total_costs message cash_type status */	  
			$(document).ready(function(){ 
				var validator = $('#datas_form').validate({
				rules: { 
					name: {
						required: true 
					},
					email: {
						required: false,
						email: true  
					},
					phone_no: {
						required: true 
					},
					booking_date: {
						required: true 
					},
					package_id: {
						required: true 
					}  
				},
				messages: { 
					name: {
						required: "This is required field"
					},
					email: {
						required: "This is required field",
						email: "Please enter a valid Email Address"  
					},
					phone_no: {
						required: "This is required field"
					},
					booking_date: {
						required: "This is required field"
					},
					package_id: {
						required: "This is required field"
					}    
				},
				errorPlacement: function(error, element) {
				  var placement = $(element).data('error');
				  if (placement) {
					$(placement).append(error)
				  } else {
					error.insertAfter(element);
				  }
				},  
				submitHandler: function(){ 
					document.forms["datas_form"].submit();
				}  
			  });
			  
				$('#booking_date').datepicker({
					format: "yyyy-mm-dd"
					}).on('change', function(){
						$('.datepicker').hide(); 
				}); 
			}); 
		</script>  

              </div>
            </div>
            <!-- /horizotal form --> 
            
          </div>
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
<!-- /page container -->
</body>
</html>