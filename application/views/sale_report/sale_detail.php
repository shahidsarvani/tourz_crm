<style>
	.form-horizontal .control-label[class*="col-md-"]{
		padding-top:0px;	
		font-size:11px;
		font-weight:bold;
	}
	
	.form-horizontal div.col-md-9, .form-horizontal div.col-md-8 { 	
		font-size:11px; 
	}
</style>
<div class="content">
  <!-- Dashboard content -->
  <div class="row">
    <div class="col-lg-12">
      <!-- Horizontal form -->
      <form name="datas_form" id="datas_form" method="post" action="" class="form-horizontal">
        <div class="panelsss panel-flat">
          <div class="panel-body">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="name"> Name</label>
                    <div class="col-md-9"> <?php echo (isset($record)) ? stripslashes($record->name) : set_value('name'); ?> </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="company_name"> Phone No </label>
                    <div class="col-md-9"> <?php echo (isset($record)) ? stripslashes($record->phone_no): set_value('phone_no'); ?> </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="col-md-3 control-label" for="package_id"> Package </label>
                    <div class="col-md-9">
                      <?php
					 $rcs = $this->general_model->get_gen_packages_info($record->package_id); 
					 if(isset($rcs)){
						echo $rcs->name; 
					 } ?>
                    </div>
                  </div>
				  
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="booking_date"> Booking Date </label>
                    <div class="col-md-9"> <?php echo (isset($record)) ? stripslashes($record->booking_date): set_value('booking_date'); ?> </div>
                  </div> 
				  
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="no_of_tickets"> No. of Adults </label>
                    <div class="col-md-9"> <?php echo (isset($record)) ? stripslashes($record->no_of_adults): set_value('no_of_adults'); ?> </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="col-md-3 control-label" for="no_of_childs"> No. of Childs </label>
                    <div class="col-md-9"> <?php echo (isset($record)) ? stripslashes($record->no_of_childs): set_value('no_of_childs'); ?> </div>
                  </div> 
				  
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="status"> Status </label>
                    <div class="col-md-9">
                      <?php 
					   if(isset($record) && $record->status==1){
							echo 'Confirm';  
					   }else if(isset($record) && $record->status==2){
							echo 'Reject';  
					   }else if(isset($record) && $record->status==3){
							echo 'Delete';  
					   }else if(isset($record) && $record->status==4){
							echo 'No Show';  
					   }  ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
				  <div class="form-group">
					<label class="col-md-3 control-label" for="email"> Email </label>
					<div class="col-md-9"> <?php echo (isset($record)) ? stripslashes($record->email): set_value('email'); ?> </div>
				  </div> 
				   
				  <div class="form-group">
                    <label class="col-md-3 control-label" for="total_costs"> Total Costs </label>
                    <div class="col-md-9"> <?php echo (isset($record)) ? stripslashes($record->total_costs): set_value('total_costs'); ?> </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="total_expense"> Total Expense </label>
                    <div class="col-md-9"> <?php echo (isset($record)) ? stripslashes($record->total_expense): set_value('total_expense'); ?> </div>
                  </div> 
				  
				  <div class="form-group">
                    <label class="col-md-3 control-label" for="total_income"> Total income </label>
                    <div class="col-md-9"> 
					<?php  
						$total_costs = $record->total_costs; 
						$total_expense = $record->total_expense; 
						
						echo $total_income = $total_costs - $total_expense; ?> 
					</div>
                  </div>  
				  
				   <div class="form-group">
                    <label class="col-md-3 control-label" for="discounts"> Discount </label>
                    <div class="col-md-9"> <?php echo (isset($record)) ? stripslashes($record->discounts): set_value('discounts'); ?> </div>
                  </div> 
				  <div class="form-group">
                    <label class="col-md-3 control-label" for="vats"> VAT </label>
                    <div class="col-md-9"> <?php echo (isset($record)) ? stripslashes($record->vats): set_value('vats'); ?> </div>
                  </div>   
				   
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="source_of_listing"> Cash Type </label>
                    <div class="col-md-9">
                      <?php 
				   if(isset($record) && $record->cash_type==1){
						echo 'Cash on pickup';  
				   }else if(isset($record) && $record->cash_type==2){
						echo 'Cash via Bank';  
				   }  ?>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
			
			<div class="form-group">
              <div class="row">
                <div class="col-md-12">
				 <div class="form-group">
					<label class="col-md-2 control-label" for="message" style="width:12%;"> Message</label>
					<div class="col-md-10"> <?php echo (isset($record)) ? stripslashes($record->message): set_value('message'); ?> </div>
				  </div> 
				</div>  
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- /horizotal form -->
      <!-- Theme Initialization Files -->
    </div>
  </div>
  <!-- /dashboard content -->
</div>
