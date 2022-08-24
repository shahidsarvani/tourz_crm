<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tourz CRM Admin Panel</title>
<meta name="keywords" content="Tourz CRM Admin Panel" />
<meta name="description" content="Tourz CRM Admin Panel">
<meta name="author" content="Tourz CRM Admin Panel">

<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="<?= asset_url(); ?>css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<link href="<?= asset_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?= asset_url(); ?>css/core.css" rel="stylesheet" type="text/css">
<link href="<?= asset_url(); ?>css/components.css" rel="stylesheet" type="text/css">
<link href="<?= asset_url(); ?>css/theme-custom.css" rel="stylesheet" type="text/css">
<link href="<?= asset_url(); ?>css/colors.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->

<!-- Core JS files -->
<script type="text/javascript" src="<?= asset_url(); ?>js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/plugins/loaders/blockui.min.js"></script>
<!-- /core JS files -->
<script type="text/javascript" src="<?= asset_url(); ?>js/plugins/forms/selects/select2.min.js"></script>
<!-- Theme JS files -->
<script type="text/javascript" src="<?= asset_url(); ?>js/plugins/visualization/echarts/echarts.js"></script>
 
<script type="text/javascript" src="<?= asset_url(); ?>js/plugins/visualization/d3/d3.min.js"></script> 
<script type="text/javascript" src="<?= asset_url(); ?>js/plugins/forms/styling/switchery.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/plugins/forms/styling/switch.min.js"></script> 
<script type="text/javascript" src="<?= asset_url(); ?>js/plugins/forms/styling/uniform.min.js"></script> 
<script type="text/javascript" src="<?= asset_url(); ?>js/plugins/notifications/bootbox.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/plugins/notifications/sweet_alert.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/core/app.js"></script>

<script type="text/javascript" src="<?= asset_url(); ?>js/pages/components_modals.js"></script>

<!--<script type="text/javascript" src="<?= asset_url(); ?>js/charts/echarts/pies_donuts_custom.js"></script>-->
 <script>
 	// Create our number formatter.
	var formatter = new Intl.NumberFormat('en-US', {
	  style: 'currency',
	  currency: 'USD',
	  minimumFractionDigits: 0,
	});
 </script>

<!-- /theme JS files -->

<style>
	#multiple_donuts1 {
		min-width:auto;
	} 
</style>
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
				 <?php 
				 	$this->load->view('widgets/content_header');
				 	$vs_role_id = $this->session->userdata('us_role_id'); ?>
				<!-- /page header -->
            
            <!-- Content area -->
            <div class="content">     
      
		<script type="text/javascript">   
				
		function operate_commission_report_list(){   
			$(document).ready(function(){   
			 
				var sel_years_id = document.getElementById("years");
				var sel_years_id_val = sel_years_id.options[sel_years_id.selectedIndex].value;
				
				var sel_months_id = document.getElementById("months");
				var sel_months_id_val = sel_months_id.options[sel_months_id.selectedIndex].value;
				
				var randNum = Math.floor(Math.random() * (25)) + 1;
				console.log(randNum);
			 
				$.ajax({
					method: "POST", 
					url: "<?php echo site_url('/commission_report/fetch_commission_report_data/'); ?>",
					data: { years: sel_years_id_val, months: sel_months_id_val},
					beforeSend: function(){
						$('.loading').show();
					},
					success: function(data){
						$('.loading').hide(); 
						operate_leads_status_echart(data); 
					}
				});    
			}); 
		}
			
		function operate_leads_status_echart(paras1){
			$(document).ready(function(){   
			
				var status_arrs = paras1.split('_');
				var in_process = status_arrs[0];
				var total_bookings = status_arrs[1];
				 
				var perc_in_process = 0;
				var remaining_in_process = 0; 
				if(total_bookings>0){  /* in_process>0 && total_bookings>0 */
					perc_in_process = (in_process/total_bookings)*100;
					perc_in_process = perc_in_process.toFixed(0);
					remaining_in_process = 100 - perc_in_process;  
				} 
				
				require.config({
					paths: {
						echarts: '<?= asset_url(); ?>js/plugins/visualization/echarts'
					} 
				}); 
				
				require(
					[
						'echarts', 
						'echarts/chart/pie'
					], 
			
					// Charts setup
					function (ec, limitless) { 
					
						var multiple_donuts = ec.init(document.getElementById('multiple_donuts1'), limitless); 
						// Data style
						var dataStyle = {
							normal: {
								label: {show: false},
								labelLine: {show: false}
							}
						};
			
						// Placeholder style
						var placeHolderStyle = {
							normal: {
								color: 'rgba(0,0,0,0)',
								label: {show: false},
								labelLine: {show: false}
							},
							emphasis: {
								color: 'rgba(0,0,0,0)'
							}
						}; 
			
						var idx = 1; 
			
						// Top text label
						var labelTop = {
							normal: {
								label: {
									show: true,
									position: 'center',
									formatter: '{b}\n',
									textStyle: {
										baseline: 'middle',
										fontWeight: 300,
										fontSize: 15
									}
								},
								labelLine: {
									show: false
								}
							}
						};
			
						// Format bottom label
						var labelFromatter = {
							normal: {
								label: {
									formatter: function (params) {
										return '\n\n' + (100 - params.value) + '%'
									}
								}
							}
						}
			
						// Bottom text label
						var labelBottom = {
							normal: {
								color: '#eee',
								label: {
									show: true,
									position: 'center',
									textStyle: {
										baseline: 'middle'
									}
								},
								labelLine: {
									show: false
								}
							},
							emphasis: {
								color: 'rgba(0,0,0,0)'
							}
						}; 
			
						// Set inner and outer radius
						var radius = [150, 180];
			
						// Add options
						multiple_donuts_options = {
			
							// Add title
							title: {
								text: 'Commission Report',
								subtext: "You have "+total_bookings+" Bookings",
								x: 'center'
							},
			
							// Add legend
							legend: {
								x: 'center',
								y: '-20%',
								data: ['Confirm']
							},
			
							// Add series
							series: [ 
								{
									type: 'pie',
									center: ['50%', '50%'],
									radius: radius,
									itemStyle: labelFromatter,
									data: [
										{name: 'other', value : remaining_in_process, itemStyle: labelBottom},
										{name: 'Confirm ('+in_process+')', value : perc_in_process, itemStyle: labelTop} 
									]
								} 
							]
						};
			 
						// Apply options 
						multiple_donuts.setOption(multiple_donuts_options);
			   
						window.onresize = function () {
							setTimeout(function (){ 
								multiple_donuts.resize();
							}, 200);
						}
					}
				);
			});
		}
        </script>
       <!-- Target Sales -->     
       <form name="datas_form1" id="datas_form1" method="post" action="" class="form-horizontal"> 
            <div class="row"> 
            <!--<div class="form-group">  -->   
                <div class="col-lg-3">  
                   <select name="years" id="years" class="form-control input-sm mb-md cstm_select2" onChange="operate_commission_report_list();">
                    <option value="">All Years </option>
                    <?php  
                    $curr_year = date('Y');
                    $lmt_year = $curr_year - 6;
                    for($yy=$curr_year; $yy>=$lmt_year; $yy--){
                        $sel_1 = '';
                        if(isset($_POST['years']) && $_POST['years']==$yy){
                            $sel_1 = 'selected="selected"';
                        } ?>
                        <option value="<?= $yy; ?>" <?php echo $sel_1; ?>>
                        <?= $yy; ?>
                        </option>
                        <?php  
                    } ?>
                      </select>
                </div>
                <div class="col-lg-3">   
                  <select name="months" id="months" class="form-control input-sm mb-md cstm_select2" onChange="operate_commission_report_list();">
                <option value=''> All Months </option>
                <option value='01' <?php if(isset($_POST['months']) && $_POST['months']==01){ echo 'selected="selected"'; } ?>>Janaury</option>
                <option value='02' <?php if(isset($_POST['months']) && $_POST['months']==02){ echo 'selected="selected"'; }?>>February</option>
                <option value='03' <?php if(isset($_POST['months']) && $_POST['months']==03){ echo 'selected="selected"'; } ?>>March</option>
                <option value='04' <?php if(isset($_POST['months']) && $_POST['months']==04){ echo 'selected="selected"'; } ?>>April</option>
                <option value='05' <?php if(isset($_POST['months']) && $_POST['months']==05){ echo 'selected="selected"'; } ?>>May</option>
                <option value='06' <?php if(isset($_POST['months']) && $_POST['months']==06){ echo 'selected="selected"'; } ?>>June</option>
                <option value='07' <?php if(isset($_POST['months']) && $_POST['months']==07){ echo 'selected="selected"'; } ?>>July</option>
                <option value='08' <?php if(isset($_POST['months']) && $_POST['months']==08){ echo 'selected="selected"'; } ?>>August</option>
                <option value='09' <?php if(isset($_POST['months']) && $_POST['months']==09){ echo 'selected="selected"'; } ?>>September</option>
                <option value='10' <?php if(isset($_POST['months']) && $_POST['months']==10){ echo 'selected="selected"'; } ?>>October</option>
                <option value='11' <?php if(isset($_POST['months']) && $_POST['months']==11){ echo 'selected="selected"'; } ?>>November</option>
                <option value='12' <?php if(isset($_POST['months']) && $_POST['months']==12){ echo 'selected="selected"'; } ?>>December</option>
              </select>
                </div>
                <div class="col-lg-1">  
                </div>
              <!--</div>-->
          </div> 
       </form>       
       <br>  
           
	 <?php   //Confirm  Delete  Reject  No Show
        $in_confirm = $this->commission_report_model->get_nos_of_bookings_by_status(array(),'1');  
        
        $total_bookings = $this->commission_report_model->get_nos_of_bookings_by_status(array(),''); 
        
		$perc_in_confirm = $remaining_in_confirm = '0';
		if($total_bookings>0){ /*$in_confirm>0 && $total_bookings>0*/
			$perc_in_confirm = ($in_confirm/$total_bookings)*100;
			$perc_in_confirm = number_format($perc_in_confirm,0);
			$remaining_in_confirm = 100 - $perc_in_confirm;  
		}  ?> 
                
		<script> 
        $(function () { 
			$('.select').select2();
			
            require.config({
                paths: {
                    echarts: '<?= asset_url(); ?>js/plugins/visualization/echarts'
                }
            });  
            require(
                [
                    'echarts', 
                    'echarts/chart/pie'
                ], 
                // Charts setup
                function (ec, limitless) { 
                
                    var multiple_donuts = ec.init(document.getElementById('multiple_donuts1'), limitless); 
                    // Data style
                    var dataStyle = {
                        normal: {
                            label: {show: false},
                            labelLine: {show: false}
                        }
                    };
        
                    // Placeholder style
                    var placeHolderStyle = {
                        normal: {
                            color: 'rgba(0,0,0,0)',
                            label: {show: false},
                            labelLine: {show: false}
                        },
                        emphasis: {
                            color: 'rgba(0,0,0,0)'
                        }
                    }; 
        
                    var idx = 1;  
                    // Top text label
                    var labelTop = {
                        normal: {
                            label: {
                                show: true,
                                position: 'center',
                                formatter: '{b}\n',
                                textStyle: {
                                    baseline: 'middle',
                                    fontWeight: 300,
                                    fontSize: 15
                                }
                            },
                            labelLine: {
                                show: false
                            }
                        }
                    };
        
                    // Format bottom label
                    var labelFromatter = {
                        normal: {
                            label: {
                                formatter: function (params) {
                                    return '\n\n' + (100 - params.value) + '%'
                                }
                            }
                        }
                    }
        
                    // Bottom text label
                    var labelBottom = {
                        normal: {
                            color: '#eee',
                            label: {
                                show: true,
                                position: 'center',
                                textStyle: {
                                    baseline: 'middle'
                                }
                            },
                            labelLine: {
                                show: false
                            }
                        },
                        emphasis: {
                            color: 'rgba(0,0,0,0)'
                        }
                    }; 
        
                    // Set inner and outer radius
                    var radius = [150, 180];
        
                    // Add options
                    multiple_donuts_options = {
        
                        // Add title
                        title: {
                            text: 'Commission Report',
                            subtext: "You have <?php echo $total_bookings; ?> Bookings",
                            x: 'center'
                        },
        
                        // Add legend
                        legend: {
                            x: 'center',
                            y: '-20%',
                            data: ['Confirm']
                        },
        
                        // Add series
                        series: [{
                                type: 'pie',
                                center: ['50%', '50%'],
                                radius: radius,
                                itemStyle: labelFromatter,
                                data: [
                                    {name:'other', value:<?php echo $remaining_in_confirm; ?>, itemStyle: labelBottom},
                                    {name:'Confirm (<?php echo $in_confirm; ?>)', value:<?php echo $perc_in_confirm; ?>, itemStyle: labelTop} 
                                ]
                            } 
                        ]
                    };
         
                    // Apply options 
                    multiple_donuts.setOption(multiple_donuts_options);
           
                    window.onresize = function () {
                        setTimeout(function (){ 
                            multiple_donuts.resize();
                        }, 200);
                    }
                }
            );
        });
        </script>        
       	 
            
        <div class="row">
          <div class="col-lg-12">  
            <div class="panel panel-flat"> 
            	<div class="loading" style="display: none;"><!--<div class="content"><img src="<?= asset_url(); ?>images/loading.gif"/></div>--></div>
                
                <div class="panel-body">
                  <div class="chart-container has-scrollsss">
                    <div class="chart has-fixed-height has-minimum-width" id="multiple_donuts1" style="height: 500px;"> </div> 
                  </div>
                </div>
              </div>  
          </div> 
        </div> 
 
        	<!-- /Target Sales  --> 

				

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
	<script> 
		$(document).ready(function(){  
			$('.cstm_select2').select2({
				minimumResultsForSearch: Infinity
			});
		});  
	</script>
</body>
</html>