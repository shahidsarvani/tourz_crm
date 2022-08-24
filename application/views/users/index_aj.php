		
  <table class="table datatable-button-init-custom">
     <thead>
      <tr>
        <th width="6%">#</th>
        <th width="17%">Name</th>
        <th width="20%">Email</th>
        <th width="15%" class="text-center">User Type</th>
        <th width="15%" class="text-center">Assigned To </th>
        <th width="13%" class="text-center">Status</th>
        <th width="13%" class="text-center">Action </th>  
      </tr>
    </thead> 
    <tbody>
    <?php 
		$add_res_nums =  $this->general_model->check_controller_method_permission_access('Users','add',$this->dbs_role_id,'1'); 
				
		$update_res_nums =  $this->general_model->check_controller_method_permission_access('Users','update',$this->dbs_role_id,'1');   
		
		$trash_res_nums =  $this->general_model->check_controller_method_permission_access('Users','trash',$this->dbs_role_id,'1');
		
        $sr=1; 
        if(isset($records) && count($records)>0){
            foreach($records as $record){ 
                $operate_url = 'users/update/'.$record->id;
                $operate_url = site_url($operate_url);
                
                $trash_url = 'users/trash_aj/'.$record->id;
                $trash_url = site_url($trash_url);  ?>
                <tr>
                <td> <?php if($record->id>1){ ?>
                        <div class="checkbox">
                        <label for="status"> <input type="checkbox" name="multi_action_check[]" id="multi_action_check_<?php echo $record->id; ?>" value="<?php echo $record->id; ?>" class="styled"> <?php echo $sr; ?> </label>
                        </div>  
                    <?php } ?>
                </td>
                <td><?= stripslashes($record->name); ?></td>
                <td><?= stripslashes($record->email); ?></td>
                <td class="text-center"><?= stripslashes($record->role_name); ?></td>
                <td class="text-center"><?php 
                if($record->parent_id >0){
                    $dbs_parent_id = $record->parent_id;
                    $tmp_arrs = $this->general_model->get_user_info_by_id($dbs_parent_id);
                    if($tmp_arrs){
                        echo $tmp_arrs->name;
                    }
                } ?></td>
                <td class="text-center"><?php 
                    $bg_cls ='';
                    if($record->status==1){
                        $bg_cls = 'label-success';
                    }else{
                        $bg_cls = 'label-danger';
                    } ?>
                  <span class="label <?php echo $bg_cls; ?>"> <?php echo ($record->status==1) ? 'Active' : 'Inactive'; ?></span></td>
                <td class="text-center">   
               	 <ul class="icons-list">
                   <?php if($update_res_nums>0){ ?> 
                            <li class="text-primary-600"><a href="<?php echo $operate_url; ?>"><i class="icon-pencil7"></i></a></li> 
                    <?php } 
                        if($trash_res_nums>0 && $record->id>1){ ?> 
                            <li class="text-danger-600"><a href="javascript:void(0);" onClick="return operate_deletions('<?php echo $trash_url; ?>','<?php echo $record->id; ?>','dyns_list');"><i class="icon-trash"></i></a></li> 
                  <?php } ?> 
                    </ul> 
                  </td> 
                </tr>
        <?php 
            $sr++;
            }
        }else{ ?>	
            <tr class="gradeX"> 
            <td colspan="7" class="text-center"> <strong> No Record Found! </strong></td>
            </tr>
        <?php } ?>  
      </tbody>  
    </table>