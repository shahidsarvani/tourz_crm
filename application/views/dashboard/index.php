<!DOCTYPE html>
<html lang="en">
<head> 
<?php $this->load->view('widgets/meta_tags'); ?>
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
        
        <!-- Main charts -->
        <div class="row">
          <div class="col-lg-7"> 
            
            <!-- Traffic sources -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h6 class="panel-title">Inquiries</h6>
                <!--<div class="heading-elements">
                  <form class="heading-form" action="#">
                    <div class="form-group">
                      <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                        <input type="checkbox" class="switch" checked="checked">
                        Live update: </label>
                    </div>
                  </form>
                </div>-->
              </div>
              <div class="container-fluid">
			  	<div class="row">
              <div class="col-lg-4">  
               <?php /* $datas['nos_of_new_bookings'] = $nos_of_new_bookings;  
				$datas['total_nos_bookings'] = $total_nos_bookings;  
				$datas['existing_nos_bookings'] = $existing_nos_bookings;  
				$datas['confirm_nos_bookings'] = $confirm_nos_bookings;*/  
				$new_booking_perc = $existing_booking_perc = $confirm_booking_perc = 0;
				if($nos_of_new_bookings>0 && $total_nos_bookings>0){
					$new_booking_perc = (($nos_of_new_bookings * 100) / $total_nos_bookings);
					
					$new_booking_perc = number_format($new_booking_perc, 2); 
				
				}
				
				if($existing_nos_bookings>0 && $total_nos_bookings>0){
					$existing_booking_perc = (($existing_nos_bookings * 100) / $total_nos_bookings);
					
					$existing_booking_perc = number_format($existing_booking_perc, 2); 
				
				} 
				
				if($confirm_nos_bookings>0 && $total_nos_bookings>0){
					$confirm_booking_perc = (($confirm_nos_bookings * 100) / $total_nos_bookings);
					
					$confirm_booking_perc = number_format($confirm_booking_perc, 2); 
				
				} ?>
				 
                <div class="panel bg-pink-600">
                  <div class="panel-body">
                    <div class="heading-elements"> <span class="heading-text badge bg-pink-800"><?php echo $new_booking_perc; ?>%</span> </div>
                    <h3 class="no-margin"> <?php echo $nos_of_new_bookings; ?> </h3>
                    New Inquiries
                    <div class="text-muted text-size-small"><!--489 avg--></div>
                  </div>
                  <div class="container-fluid">
                    <div id="members-online"></div>
                  </div>
                </div>
                
                
              </div>
              <div class="col-lg-4"> 
			  	<div class="panel bg-blue-600">
                  <div class="panel-body">
                    <div class="heading-elements"> <span class="heading-text badge bg-blue-800"><?php echo $existing_booking_perc; ?>%</span> </div>
                    <h3 class="no-margin"> <?php echo $existing_nos_bookings; ?> </h3>
                    Existing Inquiries
                    <div class="text-muted text-size-small"><!--489 avg--></div>
                  </div>
                  <div class="container-fluid">
                    <div id="members-online"></div>
                  </div>
                </div> 
                
              </div>
              <div class="col-lg-4"> 
                <div class="panel bg-success-600">
                  <div class="panel-body">
                    <div class="heading-elements"> <span class="heading-text badge bg-success-800"><?php echo $confirm_booking_perc; ?>%</span> </div>
                    <h3 class="no-margin"> <?php echo $confirm_nos_bookings; ?> </h3>
                    Approved
                    <div class="text-muted text-size-small"><!--489 avg--></div>
                  </div>
                  <div class="container-fluid">
                    <div id="members-online"></div>
                  </div>
                </div>  
              </div>
            </div>
                <!--<div class="row">
                  <div class="col-lg-4">
                    <ul class="list-inline text-center">
                      <li> <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a> </li>
                      <li class="text-left">
                        <div class="text-semibold">New visitors</div>
                        <div class="text-muted">2,349 avg</div>
                      </li>
                    </ul>
                    <div class="col-lg-10 col-lg-offset-1">
                      <div class="content-group" id="new-visitors"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <ul class="list-inline text-center">
                      <li> <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a> </li>
                      <li class="text-left">
                        <div class="text-semibold">New sessions</div>
                        <div class="text-muted">08:20 avg</div>
                      </li>
                    </ul>
                    <div class="col-lg-10 col-lg-offset-1">
                      <div class="content-group" id="new-sessions"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <ul class="list-inline text-center">
                      <li> <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a> </li>
                      <li class="text-left">
                        <div class="text-semibold">Total online</div>
                        <div class="text-muted"><span class="status-mark border-success position-left"></span> 5,378 avg</div>
                      </li>
                    </ul>
                    <div class="col-lg-10 col-lg-offset-1">
                      <div class="content-group" id="total-online"></div>
                    </div>
                  </div>
                </div>-->
              </div>
              <div class="position-relative" id="traffic-sources"></div>
            </div>
            <!-- /traffic sources --> 
            
          </div>
          <div class="col-lg-5"> 
            
            <!-- Sales stats -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h6 class="panel-title">Sales statistics</h6>
                <div class="heading-elements">
                  <form class="heading-form" action="#">
                    <div class="form-group">
                      <select class="change-date select-sm" id="select_date">
                        <optgroup label="<i class='icon-watch pull-right'></i> Time period">
                        <option value="val1">June, 29 - July, 5</option>
                        <option value="val2">June, 22 - June 28</option>
                        <option value="val3" selected="selected">June, 15 - June, 21</option>
                        <option value="val4">June, 8 - June, 14</option>
                        </optgroup>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
              <div class="container-fluid">
                <div class="row text-center">
                  <div class="col-md-4">
                    <div class="content-group">
                      <h5 class="text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> 5,689</h5>
                      <span class="text-muted text-size-small">orders weekly</span> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="content-group">
                      <h5 class="text-semibold no-margin"><i class="icon-calendar52 position-left text-slate"></i> 32,568</h5>
                      <span class="text-muted text-size-small">orders monthly</span> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="content-group">
                      <h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i> $23,464</h5>
                      <span class="text-muted text-size-small">average revenue</span> </div>
                  </div>
                </div>
              </div>
              <div class="content-group-sm" id="app_sales"></div>
              <div id="monthly-sales-stats"></div>
            </div>
            <!-- /sales stats --> 
            
          </div>
        </div>
        <!-- /main charts --> 
        
        <!-- Dashboard content -->
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
	  
		 <div class="row">
          <div class="col-lg-8"> 
		  	<div class="panel panel-flat">
              <div class="panel-heading">
                <h6 class="panel-title">Recent Bookings</h6> 
              </div>
              <div class="table-responsive">
                 <table class="table text-nowrap">
				  <thead>
					<tr>
						<th width="5%">#</th>
						<th width="15%">Name </th> 
						<th width="15%" class="text-center">Package</th> 
						<th width="15%" class="text-center">Cost (AED) </th> 
						<th width="15%" class="text-center">Status</th> 
					  </tr>
				  </thead>  
				  <tbody id="dyns_list">
					<?php  
						$sr=1; 
						if(isset($records) && count($records)>0){
							foreach($records as $record){ ?>
						  <tr class="<?php echo ($sr%2==0)?'gradeX':'gradeC'; ?>">
							<td> <?php echo $sr; ?> </td> 	
							<td> <a href="javascript:void(0);" onClick="return view_booking('<?php echo $record->id; ?>');" data-toggle="modal" data-target="#modal_remote_booking_detail"><?php echo ($record->is_new==1) ? ' <span class="status-mark bg-danger"> &nbsp; </span>':''; /* && $vs_id==$record->assigned_to_id*/ ?> <?= stripslashes($record->name); ?></a>  </td> 
							<td class="text-center">
							<?php 
							 $rcs = $this->general_model->get_gen_packages_info($record->package_id); 
							 if(isset($rcs)){
								echo $rcs->name; 
							 } ?>
							</td> 
							<td class="text-center"><?= stripslashes($record->total_costs); ?></td> 
							<td class="text-center">
							<?php  
								if(isset($record) && $record->status==1){ 
									echo '<span class="label label-success"> Confirm </span>';
								} 
								if(isset($record) && $record->status==2){ 
									echo '<span class="label label-warning"> Delete </span>';
								}
								if(isset($record) && $record->status==3){
									echo '<span class="label label-danger"> Reject </span>';
								}
								if(isset($record) && $record->status==4){
									echo '<span class="label label-default"> No Show </span>';
								}  ?>
							</td> 
							</tr>
							<?php 
							$sr++;
							}  
							 
						}else{ ?>
						<tr>
						  <td colspan="5" align="center"><strong> No Record Found! </strong></td>
						</tr>
					<?php } ?>
				  </tbody>
				</table>
              	</div> 
            </div>
		  </div>
		  
  <div class="col-lg-4"> 
	 <div class="panel panel-flat">
	  <div class="panel-heading">
		<h6 class="panel-title">Confirmed Bookings</h6> 
	  </div>  
	  <!-- Tabs -->
	  <ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-indigo-400 border-top border-top-indigo-300">
		<li class="active"> <a href="#tab-today" class="text-size-small text-uppercase" data-toggle="tab"> Today </a> </li>
		<li> <a href="#tab-tomorrow" class="text-size-small text-uppercase" data-toggle="tab"> Tomorrow  </a> </li> 
	  </ul>
	  <!-- /tabs -->
	  <!-- Tabs content -->
	  <div class="tab-content">
		<div class="tab-pane active fade in has-padding" id="tab-today">
		  <ul class="media-list">
			<?php   
				$today_date = date('Y-m-d'); 
				$rows = $this->dashboard_model->get_dashboard_bookings_by_date($today_date);
				
				if(isset($rows) && count($rows)>0){
					foreach($rows as $row){ ?> 
					
						<li class="media"> 	
						  <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt="<?= stripslashes($row->name); ?>"> <?php echo ($row->is_new==1) ? ' <span class="badge bg-danger-400 media-badge"> 1 </span>':''; /* && $vs_id==$record->assigned_to_id*/ ?> 
						   </div>
						  <div class="media-body"> <a href="javascript:void(0);" onClick="return view_booking('<?php echo $row->id; ?>');" data-toggle="modal" data-target="#modal_remote_booking_detail"> <?= stripslashes($row->name); ?> <span class="media-annotation pull-right"> <?= date('d M Y',strtotime($row->booking_date)); ?> </span> </a> <span class="display-block text-muted"><?= stripslashes($row->message); ?> </span> </div>
						</li> 
			
					<?php 
					}  
					 
				}else{ ?>
						 
				<li class="media">
				  <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt=""> </div>
				  <div class="media-body"> <span class="display-block text-muted"> No Record Found! </span> </div>
				</li> 
			<?php } ?>    
			  </ul>
			</div>
			
			<div class="tab-pane fade has-padding" id="tab-tomorrow">
			  <ul class="media-list">
				<?php  
				$today_date = date('Y-m-d');
				$tomorrow_date = date('Y-m-d', strtotime($today_date .' +1 day'));
				$recs = $this->dashboard_model->get_dashboard_bookings_by_date($tomorrow_date);
				if(isset($recs) && count($recs)>0){
					foreach($recs as $rec){ ?> 
					
						<li class="media"> 	
						  <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt="<?= stripslashes($rec->name); ?>"> <?php echo ($rec->is_new==1) ? ' <span class="badge bg-danger-400 media-badge"> 1 </span>':''; /* && $vs_id==$record->assigned_to_id*/ ?>  </div>
						  <div class="media-body"> <a href="#"> <?= stripslashes($rec->name); ?> <span class="media-annotation pull-right"> <?= date('d M Y',strtotime($rec->booking_date)); ?> </span> </a> <span class="display-block text-muted"><?= stripslashes($rec->message); ?> </span> </div>
						</li> 
			
					<?php  
					}  
				}else{ ?>
						 
				<li class="media">
				  <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt=""> </div>
				  <div class="media-body"> <span class="display-block text-muted"> No Record Found! </span> </div>
				</li> 
			<?php } ?> 
			 
				  </ul>
				</div> 
			  </div>
			  <!-- /tabs content -->
			</div>
		  </div>
		  </div>   
		  
        <div class="row">
          <div class="col-lg-8">  
            
            <!-- Quick stats boxes -->
            <div class="row">
              <div class="col-lg-4"> 
                
                <!-- Members online -->
                <div class="panel bg-teal-400">
                  <div class="panel-body">
                    <div class="heading-elements"> <span class="heading-text badge bg-teal-800">+53,6%</span> </div>
                    <h3 class="no-margin">3,450</h3>
                    Members online
                    <div class="text-muted text-size-small">489 avg</div>
                  </div>
                  <div class="container-fluid">
                    <div id="members-online"></div>
                  </div>
                </div>
                <!-- /members online --> 
                
              </div>
              <div class="col-lg-4"> 
                
                <!-- Current server load -->
                <div class="panel bg-pink-400">
                  <div class="panel-body">
                    <div class="heading-elements">
                      <ul class="icons-list">
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                            <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                            <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                            <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <h3 class="no-margin">49.4%</h3>
                    Current server load
                    <div class="text-muted text-size-small">34.6% avg</div>
                  </div>
                  <div id="server-load"></div>
                </div>
                <!-- /current server load --> 
                
              </div>
              <div class="col-lg-4"> 
                
                <!-- Today's revenue -->
                <div class="panel bg-blue-400">
                  <div class="panel-body">
                    <div class="heading-elements">
                      <ul class="icons-list">
                        <li><a data-action="reload"></a></li>
                      </ul>
                    </div>
                    <h3 class="no-margin">$18,390</h3>
                    Today's revenue
                    <div class="text-muted text-size-small">$37,578 avg</div>
                  </div>
                  <div id="today-revenue"></div>
                </div>
                <!-- /today's revenue --> 
                
              </div>
            </div>
            <!-- /quick stats boxes --> 
            
            <!-- Support tickets -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h6 class="panel-title">Support tickets</h6>
                <div class="heading-elements">
                  <button type="button" class="btn btn-link daterange-ranges heading-btn text-semibold"> <i class="icon-calendar3 position-left"></i> <span></span> <b class="caret"></b> </button>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-xlg text-nowrap">
                  <tbody>
                    <tr>
                      <td class="col-md-4"><div class="media-left media-middle">
                          <div id="tickets-status"></div>
                        </div>
                        <div class="media-left">
                          <h5 class="text-semibold no-margin">14,327 <small class="text-success text-size-base"><i class="icon-arrow-up12"></i> (+2.9%)</small></h5>
                          <span class="text-muted"><span class="status-mark border-success position-left"></span> Jun 16, 10:00 am</span> </div></td>
                      <td class="col-md-3"><div class="media-left media-middle"> <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-alarm-add"></i></a> </div>
                        <div class="media-left">
                          <h5 class="text-semibold no-margin"> 1,132 <small class="display-block no-margin">total tickets</small> </h5>
                        </div></td>
                      <td class="col-md-3"><div class="media-left media-middle"> <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-spinner11"></i></a> </div>
                        <div class="media-left">
                          <h5 class="text-semibold no-margin"> 06:25:00 <small class="display-block no-margin">response time</small> </h5>
                        </div></td>
                      <td class="text-right col-md-2"><a href="#" class="btn bg-teal-400"><i class="icon-statistics position-left"></i> Report</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="table-responsive">
                <table class="table text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 50px">Due</th>
                      <th style="width: 300px;">User</th>
                      <th>Description</th>
                      <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="active border-double">
                      <td colspan="3">Active tickets</td>
                      <td class="text-right"><span class="badge bg-blue">24</span></td>
                    </tr>
                    <tr>
                      <td class="text-center"><h6 class="no-margin">12 <small class="display-block text-size-small no-margin">hours</small></h6></td>
                      <td><div class="media-left media-middle"> <a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs"> <span class="letter-icon"></span> </a> </div>
                        <div class="media-body"> <a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Annabelle Doney</a>
                          <div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
                        </div></td>
                      <td><a href="#" class="text-default display-inline-block"> <span class="text-semibold">[#1183] Workaround for OS X selects printing bug</span> <span class="display-block text-muted">Chrome fixed the bug several versions ago, thus rendering this...</span> </a></td>
                      <td class="text-center"><ul class="icons-list">
                          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                              <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
                              <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                            </ul>
                          </li>
                        </ul></td>
                    </tr>
                    <tr>
                      <td class="text-center"><h6 class="no-margin">16 <small class="display-block text-size-small no-margin">hours</small></h6></td>
                      <td><div class="media-left media-middle"> <a href="#"><img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a> </div>
                        <div class="media-body"> <a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Chris Macintyre</a>
                          <div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
                        </div></td>
                      <td><a href="#" class="text-default display-inline-block"> <span class="text-semibold">[#1249] Vertically center carousel controls</span> <span class="display-block text-muted">Try any carousel control and reduce the screen width below...</span> </a></td>
                      <td class="text-center"><ul class="icons-list">
                          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                              <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
                              <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                            </ul>
                          </li>
                        </ul></td>
                    </tr>
                    <tr>
                      <td class="text-center"><h6 class="no-margin">20 <small class="display-block text-size-small no-margin">hours</small></h6></td>
                      <td><div class="media-left media-middle"> <a href="#" class="btn bg-blue btn-rounded btn-icon btn-xs"> <span class="letter-icon"></span> </a> </div>
                        <div class="media-body"> <a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Robert Hauber</a>
                          <div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
                        </div></td>
                      <td><a href="#" class="text-default display-inline-block"> <span class="text-semibold">[#1254] Inaccurate small pagination height</span> <span class="display-block text-muted">The height of pagination elements is not consistent with...</span> </a></td>
                      <td class="text-center"><ul class="icons-list">
                          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                              <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
                              <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                            </ul>
                          </li>
                        </ul></td>
                    </tr>
                    <tr>
                      <td class="text-center"><h6 class="no-margin">40 <small class="display-block text-size-small no-margin">hours</small></h6></td>
                      <td><div class="media-left media-middle"> <a href="#" class="btn bg-warning-400 btn-rounded btn-icon btn-xs"> <span class="letter-icon"></span> </a> </div>
                        <div class="media-body"> <a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Dex Sponheim</a>
                          <div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
                        </div></td>
                      <td><a href="#" class="text-default display-inline-block"> <span class="text-semibold">[#1184] Round grid column gutter operations</span> <span class="display-block text-muted">Left rounds up, right rounds down. should keep everything...</span> </a></td>
                      <td class="text-center"><ul class="icons-list">
                          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                              <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
                              <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                            </ul>
                          </li>
                        </ul></td>
                    </tr>
                    <tr class="active border-double">
                      <td colspan="3">Resolved tickets</td>
                      <td class="text-right"><span class="badge bg-success">42</span></td>
                    </tr>
                    <tr>
                      <td class="text-center"><i class="icon-checkmark3 text-success"></i></td>
                      <td><div class="media-left media-middle"> <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs"> <span class="letter-icon"></span> </a> </div>
                        <div class="media-body"> <a href="#" class="display-inline-block text-default letter-icon-title">Alan Macedo</a>
                          <div class="text-muted text-size-small"><span class="status-mark border-success position-left"></span> Resolved</div>
                        </div></td>
                      <td><a href="#" class="text-default display-inline-block"> [#1046] Avoid some unnecessary HTML string <span class="display-block text-muted">Rather than building a string of HTML and then parsing it...</span> </a></td>
                      <td class="text-center"><ul class="icons-list">
                          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                              <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="icon-plus3 text-blue"></i> Unresolve issue</a></li>
                              <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                            </ul>
                          </li>
                        </ul></td>
                    </tr>
                    <tr>
                      <td class="text-center"><i class="icon-checkmark3 text-success"></i></td>
                      <td><div class="media-left media-middle"> <a href="#" class="btn bg-pink-400 btn-rounded btn-icon btn-xs"> <span class="letter-icon"></span> </a> </div>
                        <div class="media-body"> <a href="#" class="display-inline-block text-default letter-icon-title">Brett Castellano</a>
                          <div class="text-muted text-size-small"><span class="status-mark border-success position-left"></span> Resolved</div>
                        </div></td>
                      <td><a href="#" class="text-default display-inline-block"> [#1038] Update json configuration <span class="display-block text-muted">The <code>files</code> property is necessary to override the files property...</span> </a></td>
                      <td class="text-center"><ul class="icons-list">
                          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                              <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="icon-plus3 text-blue"></i> Unresolve issue</a></li>
                              <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                            </ul>
                          </li>
                        </ul></td>
                    </tr>
                    <tr>
                      <td class="text-center"><i class="icon-checkmark3 text-success"></i></td>
                      <td><div class="media-left media-middle"> <a href="#"><img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a> </div>
                        <div class="media-body"> <a href="#" class="display-inline-block text-default">Roxanne Forbes</a>
                          <div class="text-muted text-size-small"><span class="status-mark border-success position-left"></span> Resolved</div>
                        </div></td>
                      <td><a href="#" class="text-default display-inline-block"> [#1034] Tooltip multiple event <span class="display-block text-muted">Fix behavior when using tooltips and popovers that are...</span> </a></td>
                      <td class="text-center"><ul class="icons-list">
                          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                              <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="icon-plus3 text-blue"></i> Unresolve issue</a></li>
                              <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                            </ul>
                          </li>
                        </ul></td>
                    </tr>
                    <tr class="active border-double">
                      <td colspan="3">Closed tickets</td>
                      <td class="text-right"><span class="badge bg-danger">37</span></td>
                    </tr>
                    <tr>
                      <td class="text-center"><i class="icon-cross2 text-danger-400"></i></td>
                      <td><div class="media-left media-middle"> <a href="#"><img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a> </div>
                        <div class="media-body"> <a href="#" class="display-inline-block text-default">Mitchell Sitkin</a>
                          <div class="text-muted text-size-small"><span class="status-mark border-danger position-left"></span> Closed</div>
                        </div></td>
                      <td><a href="#" class="text-default display-inline-block"> [#1040] Account for static form controls in form group <span class="display-block text-muted">Resizes control label's font-size and account for the standard...</span> </a></td>
                      <td class="text-center"><ul class="icons-list">
                          <li class="dropup"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                              <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="icon-reload-alt text-blue"></i> Reopen issue</a></li>
                              <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                            </ul>
                          </li>
                        </ul></td>
                    </tr>
                    <tr>
                      <td class="text-center"><i class="icon-cross2 text-danger"></i></td>
                      <td><div class="media-left media-middle"> <a href="#" class="btn bg-brown-400 btn-rounded btn-icon btn-xs"> <span class="letter-icon"></span> </a> </div>
                        <div class="media-body"> <a href="#" class="display-inline-block text-default letter-icon-title">Katleen Jensen</a>
                          <div class="text-muted text-size-small"><span class="status-mark border-danger position-left"></span> Closed</div>
                        </div></td>
                      <td><a href="#" class="text-default display-inline-block"> [#1038] Proper sizing of form control feedback <span class="display-block text-muted">Feedback icon sizing inside a larger/smaller form-group...</span> </a></td>
                      <td class="text-center"><ul class="icons-list">
                          <li class="dropup"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
                              <li><a href="#"><i class="icon-history"></i> Full history</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="icon-plus3 text-blue"></i> Unresolve issue</a></li>
                              <li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
                            </ul>
                          </li>
                        </ul></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /support tickets --> 
            
            <!-- Latest posts -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h6 class="panel-title">Latest posts</h6>
                <div class="heading-elements">
                  <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">
                    <ul class="media-list content-group">
                      <li class="media stack-media-on-mobile">
                        <div class="media-left">
                          <div class="thumb"> <a href="#"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt=""> <span class="zoom-image"><i class="icon-play3"></i></span> </a> </div>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><a href="#">Up unpacked friendly</a></h6>
                          <ul class="list-inline list-inline-separate text-muted mb-5">
                            <li><i class="icon-book-play position-left"></i> Video tutorials</li>
                            <li>14 minutes ago</li>
                          </ul>
                          The him father parish looked has sooner. Attachment frequently gay terminated son... </div>
                      </li>
                      <li class="media stack-media-on-mobile">
                        <div class="media-left">
                          <div class="thumb"> <a href="#"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt=""> <span class="zoom-image"><i class="icon-play3"></i></span> </a> </div>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><a href="#">It allowance prevailed</a></h6>
                          <ul class="list-inline list-inline-separate text-muted mb-5">
                            <li><i class="icon-book-play position-left"></i> Video tutorials</li>
                            <li>12 days ago</li>
                          </ul>
                          Alteration literature to or an sympathize mr imprudence. Of is ferrars subject as enjoyed... </div>
                      </li>
                    </ul>
                  </div>
                  <div class="col-lg-6">
                    <ul class="media-list content-group">
                      <li class="media stack-media-on-mobile">
                        <div class="media-left">
                          <div class="thumb"> <a href="#"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt=""> <span class="zoom-image"><i class="icon-play3"></i></span> </a> </div>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><a href="#">Case read they must</a></h6>
                          <ul class="list-inline list-inline-separate text-muted mb-5">
                            <li><i class="icon-book-play position-left"></i> Video tutorials</li>
                            <li>20 hours ago</li>
                          </ul>
                          On it differed repeated wandered required in. Then girl neat why yet knew rose spot... </div>
                      </li>
                      <li class="media stack-media-on-mobile">
                        <div class="media-left">
                          <div class="thumb"> <a href="#"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-responsive img-rounded media-preview" alt=""> <span class="zoom-image"><i class="icon-play3"></i></span> </a> </div>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><a href="#">Too carriage attended</a></h6>
                          <ul class="list-inline list-inline-separate text-muted mb-5">
                            <li><i class="icon-book-play position-left"></i> FAQ section</li>
                            <li>2 days ago</li>
                          </ul>
                          Marianne or husbands if at stronger ye. Considered is as middletons uncommonly... </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- /latest posts --> 
            
          </div>
          <div class="col-lg-4"> 
            
            <!-- Progress counters -->
            <div class="row">
              <div class="col-md-6"> 
                
                <!-- Available hours -->
                <div class="panel text-center">
                  <div class="panel-body">
                    <div class="heading-elements">
                      <ul class="icons-list">
                        <li class="dropdown text-muted"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                            <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                            <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                            <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    
                    <!-- Progress counter -->
                    <div class="content-group-sm svg-center position-relative" id="hours-available-progress"></div>
                    <!-- /progress counter --> 
                    
                    <!-- Bars -->
                    <div id="hours-available-bars"></div>
                    <!-- /bars --> 
                    
                  </div>
                </div>
                <!-- /available hours --> 
                
              </div>
              <div class="col-md-6"> 
                
                <!-- Productivity goal -->
                <div class="panel text-center">
                  <div class="panel-body">
                    <div class="heading-elements">
                      <ul class="icons-list">
                        <li class="dropdown text-muted"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                          <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                            <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                            <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                            <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    
                    <!-- Progress counter -->
                    <div class="content-group-sm svg-center position-relative" id="goal-progress"></div>
                    <!-- /progress counter --> 
                    
                    <!-- Bars -->
                    <div id="goal-bars"></div>
                    <!-- /bars --> 
                    
                  </div>
                </div>
                <!-- /productivity goal --> 
                
              </div>
            </div>
            <!-- /progress counters --> 
            
            <!-- Daily sales -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h6 class="panel-title">Daily sales stats</h6>
                <div class="heading-elements"> <span class="heading-text">Balance: <span class="text-bold text-danger-600 position-right">$4,378</span></span>
                  <ul class="icons-list">
                    <li class="dropdown text-muted"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                        <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                        <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="panel-body">
                <div id="sales-heatmap"></div>
              </div>
              <div class="table-responsive">
                <table class="table text-nowrap">
                  <thead>
                    <tr>
                      <th>Application</th>
                      <th>Time</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><div class="media-left media-middle"> <a href="#" class="btn bg-primary-400 btn-rounded btn-icon btn-xs"> <span class="letter-icon"></span> </a> </div>
                        <div class="media-body">
                          <div class="media-heading"> <a href="#" class="letter-icon-title">Sigma application</a> </div>
                          <div class="text-muted text-size-small"><i class="icon-checkmark3 text-size-mini position-left"></i> New order</div>
                        </div></td>
                      <td><span class="text-muted text-size-small">06:28 pm</span></td>
                      <td><h6 class="text-semibold no-margin">$49.90</h6></td>
                    </tr>
                    <tr>
                      <td><div class="media-left media-middle"> <a href="#" class="btn bg-danger-400 btn-rounded btn-icon btn-xs"> <span class="letter-icon"></span> </a> </div>
                        <div class="media-body">
                          <div class="media-heading"> <a href="#" class="letter-icon-title">Alpha application</a> </div>
                          <div class="text-muted text-size-small"><i class="icon-spinner11 text-size-mini position-left"></i> Renewal</div>
                        </div></td>
                      <td><span class="text-muted text-size-small">04:52 pm</span></td>
                      <td><h6 class="text-semibold no-margin">$90.50</h6></td>
                    </tr>
                    <tr>
                      <td><div class="media-left media-middle"> <a href="#" class="btn bg-indigo-400 btn-rounded btn-icon btn-xs"> <span class="letter-icon"></span> </a> </div>
                        <div class="media-body">
                          <div class="media-heading"> <a href="#" class="letter-icon-title">Delta application</a> </div>
                          <div class="text-muted text-size-small"><i class="icon-lifebuoy text-size-mini position-left"></i> Support</div>
                        </div></td>
                      <td><span class="text-muted text-size-small">01:26 pm</span></td>
                      <td><h6 class="text-semibold no-margin">$60.00</h6></td>
                    </tr>
                    <tr>
                      <td><div class="media-left media-middle"> <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs"> <span class="letter-icon"></span> </a> </div>
                        <div class="media-body">
                          <div class="media-heading"> <a href="#" class="letter-icon-title">Omega application</a> </div>
                          <div class="text-muted text-size-small"><i class="icon-lifebuoy text-size-mini position-left"></i> Support</div>
                        </div></td>
                      <td><span class="text-muted text-size-small">11:46 am</span></td>
                      <td><h6 class="text-semibold no-margin">$55.00</h6></td>
                    </tr>
                    <tr>
                      <td><div class="media-left media-middle"> <a href="#" class="btn bg-danger-400 btn-rounded btn-icon btn-xs"> <span class="letter-icon"></span> </a> </div>
                        <div class="media-body">
                          <div class="media-heading"> <a href="#" class="letter-icon-title">Alpha application</a> </div>
                          <div class="text-muted text-size-small"><i class="icon-spinner11 text-size-mini position-left"></i> Renewal</div>
                        </div></td>
                      <td><span class="text-muted text-size-small">10:29 am</span></td>
                      <td><h6 class="text-semibold no-margin">$90.50</h6></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /daily sales --> 
            
            <!-- My messages -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h6 class="panel-title">My messages</h6>
                <div class="heading-elements"> <span class="heading-text"><i class="icon-history text-warning position-left"></i> Jul 7, 10:30</span> <span class="label bg-success heading-text">Online</span> </div>
              </div>
              
              <!-- Numbers -->
              <div class="container-fluid">
                <div class="row text-center">
                  <div class="col-md-4">
                    <div class="content-group">
                      <h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> 2,345</h6>
                      <span class="text-muted text-size-small">this week</span> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="content-group">
                      <h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> 3,568</h6>
                      <span class="text-muted text-size-small">this month</span> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="content-group">
                      <h6 class="text-semibold no-margin"><i class="icon-comments position-left text-slate"></i> 32,693</h6>
                      <span class="text-muted text-size-small">all messages</span> </div>
                  </div>
                </div>
              </div>
              <!-- /numbers --> 
              
              <!-- Area chart -->
              <div id="messages-stats"></div>
              <!-- /area chart --> 
              
              <!-- Tabs -->
              <ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-indigo-400 border-top border-top-indigo-300">
                <li class="active"> <a href="#messages-tue" class="text-size-small text-uppercase" data-toggle="tab"> Tuesday </a> </li>
                <li> <a href="#messages-mon" class="text-size-small text-uppercase" data-toggle="tab"> Monday </a> </li>
                <li> <a href="#messages-fri" class="text-size-small text-uppercase" data-toggle="tab"> Friday </a> </li>
              </ul>
              <!-- /tabs --> 
              
              <!-- Tabs content -->
              <div class="tab-content">
                <div class="tab-pane active fade in has-padding" id="messages-tue">
                  <ul class="media-list">
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt=""> <span class="badge bg-danger-400 media-badge">8</span> </div>
                      <div class="media-body"> <a href="#"> James Alexander <span class="media-annotation pull-right">14:58</span> </a> <span class="display-block text-muted">The constitutionally inventoried precariously...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt=""> <span class="badge bg-danger-400 media-badge">6</span> </div>
                      <div class="media-body"> <a href="#"> Margo Baker <span class="media-annotation pull-right">12:16</span> </a> <span class="display-block text-muted">Pinched a well more moral chose goodness...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt=""> </div>
                      <div class="media-body"> <a href="#"> Jeremy Victorino <span class="media-annotation pull-right">09:48</span> </a> <span class="display-block text-muted">Pert thickly mischievous clung frowned well...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt=""> </div>
                      <div class="media-body"> <a href="#"> Beatrix Diaz <span class="media-annotation pull-right">05:54</span> </a> <span class="display-block text-muted">Nightingale taped hello bucolic fussily cardinal...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-xs" alt=""> </div>
                      <div class="media-body"> <a href="#"> Richard Vango <span class="media-annotation pull-right">01:43</span> </a> <span class="display-block text-muted">Amidst roadrunner distantly pompously where...</span> </div>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane fade has-padding" id="messages-mon">
                  <ul class="media-list">
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""> </div>
                      <div class="media-body"> <a href="#"> Isak Temes <span class="media-annotation pull-right">Tue, 19:58</span> </a> <span class="display-block text-muted">Reasonable palpably rankly expressly grimy...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""> </div>
                      <div class="media-body"> <a href="#"> Vittorio Cosgrove <span class="media-annotation pull-right">Tue, 16:35</span> </a> <span class="display-block text-muted">Arguably therefore more unexplainable fumed...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""> </div>
                      <div class="media-body"> <a href="#"> Hilary Talaugon <span class="media-annotation pull-right">Tue, 12:16</span> </a> <span class="display-block text-muted">Nicely unlike porpoise a kookaburra past more...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""> </div>
                      <div class="media-body"> <a href="#"> Bobbie Seber <span class="media-annotation pull-right">Tue, 09:20</span> </a> <span class="display-block text-muted">Before visual vigilantly fortuitous tortoise...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""> </div>
                      <div class="media-body"> <a href="#"> Walther Laws <span class="media-annotation pull-right">Tue, 03:29</span> </a> <span class="display-block text-muted">Far affecting more leered unerringly dishonest...</span> </div>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane fade has-padding" id="messages-fri">
                  <ul class="media-list">
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""> </div>
                      <div class="media-body"> <a href="#"> Owen Stretch <span class="media-annotation pull-right">Mon, 18:12</span> </a> <span class="display-block text-muted">Tardy rattlesnake seal raptly earthworm...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""> </div>
                      <div class="media-body"> <a href="#"> Jenilee Mcnair <span class="media-annotation pull-right">Mon, 14:03</span> </a> <span class="display-block text-muted">Since hello dear pushed amid darn trite...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""> </div>
                      <div class="media-body"> <a href="#"> Alaster Jain <span class="media-annotation pull-right">Mon, 13:59</span> </a> <span class="display-block text-muted">Dachshund cardinal dear next jeepers well...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""> </div>
                      <div class="media-body"> <a href="#"> Sigfrid Thisted <span class="media-annotation pull-right">Mon, 09:26</span> </a> <span class="display-block text-muted">Lighted wolf yikes less lemur crud grunted...</span> </div>
                    </li>
                    <li class="media">
                      <div class="media-left"> <img src="<?= base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""> </div>
                      <div class="media-body"> <a href="#"> Sherilyn Mckee <span class="media-annotation pull-right">Mon, 06:38</span> </a> <span class="display-block text-muted">Less unicorn a however careless husky...</span> </div>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /tabs content --> 
              
            </div>
            <!-- /my messages --> 
            
            <!-- Daily financials -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h6 class="panel-title">Daily financials</h6>
                <div class="heading-elements">
                  <form class="heading-form" action="#">
                    <div class="form-group">
                      <label class="checkbox checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                        <input type="checkbox" class="switcher" id="realtime" checked="checked">
                        Realtime </label>
                    </div>
                  </form>
                  <span class="badge bg-danger-400 heading-text">+86</span> </div>
              </div>
              <div class="panel-body">
                <div class="content-group-xs" id="bullets"></div>
                <ul class="media-list">
                  <li class="media">
                    <div class="media-left"> <a href="#" class="btn border-pink text-pink btn-flat btn-rounded btn-icon btn-xs"><i class="icon-statistics"></i></a> </div>
                    <div class="media-body"> Stats for July, 6: 1938 orders, $4220 revenue
                      <div class="media-annotation">2 hours ago</div>
                    </div>
                    <div class="media-right media-middle">
                      <ul class="icons-list">
                        <li> <a href="#"><i class="icon-arrow-right13"></i></a> </li>
                      </ul>
                    </div>
                  </li>
                  <li class="media">
                    <div class="media-left"> <a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-xs"><i class="icon-checkmark3"></i></a> </div>
                    <div class="media-body"> Invoices <a href="#">#4732</a> and <a href="#">#4734</a> have been paid
                      <div class="media-annotation">Dec 18, 18:36</div>
                    </div>
                    <div class="media-right media-middle">
                      <ul class="icons-list">
                        <li> <a href="#"><i class="icon-arrow-right13"></i></a> </li>
                      </ul>
                    </div>
                  </li>
                  <li class="media">
                    <div class="media-left"> <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-xs"><i class="icon-alignment-unalign"></i></a> </div>
                    <div class="media-body"> Affiliate commission for June has been paid
                      <div class="media-annotation">36 minutes ago</div>
                    </div>
                    <div class="media-right media-middle">
                      <ul class="icons-list">
                        <li> <a href="#"><i class="icon-arrow-right13"></i></a> </li>
                      </ul>
                    </div>
                  </li>
                  <li class="media">
                    <div class="media-left"> <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs"><i class="icon-spinner11"></i></a> </div>
                    <div class="media-body"> Order <a href="#">#37745</a> from July, 1st has been refunded
                      <div class="media-annotation">4 minutes ago</div>
                    </div>
                    <div class="media-right media-middle">
                      <ul class="icons-list">
                        <li> <a href="#"><i class="icon-arrow-right13"></i></a> </li>
                      </ul>
                    </div>
                  </li>
                  <li class="media">
                    <div class="media-left"> <a href="#" class="btn border-teal-400 text-teal btn-flat btn-rounded btn-icon btn-xs"><i class="icon-redo2"></i></a> </div>
                    <div class="media-body"> Invoice <a href="#">#4769</a> has been sent to <a href="#">Robert Smith</a>
                      <div class="media-annotation">Dec 12, 05:46</div>
                    </div>
                    <div class="media-right media-middle">
                      <ul class="icons-list">
                        <li> <a href="#"><i class="icon-arrow-right13"></i></a> </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /daily financials --> 
            
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