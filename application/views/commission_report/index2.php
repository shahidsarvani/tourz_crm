<?php
	if(isset($records) && count($records)>0){
	$sr=1; 
	if(isset($page) && $page >0){
		$sr = $page+1;
	} 
	
	foreach($records as $record){ ?>  
        
	   <tr class="<?php echo ($sr%2==0)?'gradeX':'gradeC'; ?>">
			<td> <?php echo $sr; ?> </td> 	
			<td> <a href="javascript:void(0);" onClick="return view_commission_detail('<?php echo $record->id; ?>');" data-toggle="modal" data-target="#modal_remote_commission_detail"><?php echo ($record->is_new==1) ? ' <span class="status-mark bg-danger"> &nbsp; </span>':''; /* && $vs_id==$record->assigned_to_id*/ ?>  #<?= $record->id.' - '.stripslashes($record->name); ?></a> </td>
			<td><?php 
				 $rcs = $this->general_model->get_gen_packages_info($record->package_id); 
				 if(isset($rcs)){
					echo $rcs->name; 
				 } ?>
			</td> 
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
			   <div style="float:left;"> <select name="per_page" id="per_page" class="form-control input-sm mb-md cstm_select2" onChange="operate_commission_report_list();">
			  <option value="25"> Pages</option>
			  <option value="25" <?php echo (isset($_SESSION['tmp_per_page_val']) && $_SESSION['tmp_per_page_val']==25) ? 'selected="selected"':''; ?>> 25 </option>
			  <option value="50" <?php echo (isset($_SESSION['tmp_per_page_val']) && $_SESSION['tmp_per_page_val']==50) ? 'selected="selected"':''; ?>> 50 </option>
			  <option value="100" <?php echo (isset($_SESSION['tmp_per_page_val']) && $_SESSION['tmp_per_page_val']==100) ? 'selected="selected"':''; ?>> 100 </option> 
			</select>  </div>
			<div style="float:right;"> <?php echo $this->ajax_pagination->create_links();?></div></td>  
		  </tr> 
		<?php  
		}else{ ?> 
          <tr>
           <td colspan="6" align="text-center" style="text-align:center;">
           <!--<div style="float:left;"> <select name="per_page" id="per_page" class="form-control input-sm mb-md cstm_select2" onChange="operate_commission_report_list();">
              <option value="25"> Pages</option>
              <option value="25"> 25 </option>
              <option value="50"> 50 </option>
              <option value="100"> 100 </option> 
            </select>  </div>-->
            <div>  <strong> No Record Found! </strong></div>  </td>  
          </tr>
              
    <?php } ?>
              