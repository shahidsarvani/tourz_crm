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
			  <?php $form_act = "packages/add"; ?>
                <form name="datas_form" id="datas_form" method="post" action="<?php echo site_url($form_act); ?>" class="form-horizontal">
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="name">Name <span class="reds">*</span></label>
                    <div class="col-md-6">
                      <input name="name" id="name" type="text" class="form-control" value="<?php echo set_value('name'); ?>" data-error="#name1">
                      <span id="name1" class="text-danger"><?php echo form_error('name'); ?></span> </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="col-md-2 control-label" for="adult_ticket_price">Adult Ticket Price <span class="reds">*</span></label>
                    <div class="col-md-6">
                      <input name="adult_ticket_price" id="adult_ticket_price" type="text" class="form-control" value="<?php echo set_value('adult_ticket_price'); ?>" data-error="#adult_ticket_price1">
                      <span id="adult_ticket_price1" class="text-danger"><?php echo form_error('adult_ticket_price'); ?></span> </div>
                  </div>   
				  
				  <div class="form-group">
                    <label class="col-md-2 control-label" for="child_ticket_price">Child Ticket Price <span class="reds">*</span></label>
                    <div class="col-md-6">
                      <input name="child_ticket_price" id="child_ticket_price" type="text" class="form-control" value="<?php echo set_value('child_ticket_price'); ?>" data-error="#child_ticket_price1">
                      <span id="child_ticket_price1" class="text-danger"><?php echo form_error('child_ticket_price'); ?></span> </div>
                  </div>     
				  
				   <div class="form-group">
                    <label class="col-md-2 control-label" for="status">Status</label>
                    <div class="col-md-6">
					<select name="status" id="status" class="form-control cstm_select2" data-error="#status1">
						<option value=""> Select Status </option>
						<option value="1" <?php echo (isset($_POST['status']) && $_POST['status']==1) ? 'selected="selected"':''; ?>> Active </option> 
						<option value="0" <?php echo (isset($_POST['status']) && $_POST['status']==0) ? 'selected="selected"':''; ?>> Inactive </option>
						
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
			  <button type="button" class="btn border-slate text-slate-800 btn-flat" onClick="window.location='<?php echo site_url('packages/index'); ?>';"><i class="glyphicon glyphicon-chevron-left position-left"></i>Cancel</button> 
			  
			</div>
		  </div>
    	</form> 
	 
	 	 <script type="text/javascript">   	  
			$(document).ready(function(){ 
				var validator = $('#datas_form').validate({
				rules: { 
					name: {
						required: true 
					},
					adult_ticket_price: {
						required: true 
					},
					child_ticket_price: {
						required: true 
					}  
				},
				messages: { 
					name: {
						required: "This is required field"
					},
					adult_ticket_price: {
						required: "This is required field"
					},
					child_ticket_price: {
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