<?php   
	if(isset($records) && count($records)>0){
		$sr=1; 
		if(isset($page) && $page >0){
			$sr = $page+1;
		} 
		
		$vs_id = $this->session->userdata('us_id');
		
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
			}  ?>  
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
              