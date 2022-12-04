<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-info-circle"></i><?= 'Report Submit'; ?></h2>

         
    </div>
     
	 
	 <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?= lang('customize_report'); ?></p>

                <div id="form">

                    <?php echo admin_form_open("reportsubmit", array('method'=>'get')); ?>
                    <div class="row">
                         
                        

                         
                         
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="type"><?= 'type'; ?></label>
                                <?php
                                $bl[""] = lang('select').' '.'Type';
								$types = array( array('id'=>'half_yearly','name'=>'half_yearly'),array('id'=>'annual','name'=>'annual'));
                                foreach ($types as $type) {
                                    $bl[$type['id']] =  $type['name'];
                                }
                                echo form_dropdown('type', $bl, (isset($_GET['type']) ? $_GET['type'] : ""), 'class="form-control" required id="type" data-placeholder="' . $this->lang->line("select") . " " . 'Type' . '"');
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="year"><?= lang("year"); ?></label>
                                <?php
                                $wh[""] = lang('select').' '.lang('year');
								$years = array();
								for($i=date('Y'); $i>=2020; $i--){
									$years[] = array('id'=>$i,'name'=>$i);
								}
								
                                foreach ($years as $year) {
                                    $wh[$year['id']] = $year['name'];
                                }
                                echo form_dropdown('year', $wh, (isset($_GET['year']) ? $_GET['year'] : ""), 'class="form-control" id="year" required data-placeholder="' . $this->lang->line("select") . " " . 'year' . '"');
                                ?>
                            </div>
                        </div>
						
						
						
						
						<div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="branch"><?= lang("branch"); ?></label>
                                <?php
                                $wh[""] = lang('select').' '.lang('branch');
                                foreach ($branches as $branch) {
                                    $wh[$branch->id] = $branch->name;
                                }
                                echo form_dropdown('branch', $wh, (isset($_GET['branch']) ? $_GET['branch'] : ""), 'class="form-control" required id="branch" data-placeholder="' . $this->lang->line("select") . " " . $this->lang->line("branch") . '"');
                                ?>
                            </div>
                        </div>
						
						 
						
						 
                    </div>
                    <div class="form-group">
                        <div
                            class="controls"> <?php echo form_submit('submit_report', $this->lang->line("submit"), 'class="btn btn-primary"'); ?> </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>
                <div class="clearfix"></div>
				
				 

                <div class="table-responsive">
                    <table   
                           class="table table-bordered table-hover table-striped table-condensed reports-table">
                        <thead>
                        <tr>
                            <th width="20%"><?= lang("department"); ?></th>
                            <th  width="10%"><?= lang("status"); ?></th>
                            <th><?= lang("comment"); ?></th>
                             
                        </tr>
                        </thead>
                        <tbody>
                       
<?php if(isset($submitinfo))  { foreach($departments as $key=>$row){  if($this->session->userdata('department_id')==$row->id  ) { 
 $value = report_submit($row->id,$submitinfo); 
 $comment = report_submit_comment($row->id,$submitinfo); 
 ?>
					   <tr>
                            <td><?= $row->name ?></td>
							<td><a href="#"  class="yes_no editable-click"  data-id="" data-idname=""   data-type="select" data-table="reportsubmit" data-pk="<?php echo $submitinfo->id ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="department_<?php echo $row->id?>" data-title="Enter"><?php echo $value==2 ? 'No' : 'Yes' ?></a></td>
							<td><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="textarea" data-table="reportsubmit" data-pk="<?php echo $submitinfo->id ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="comment_<?php echo $row->id?>" data-title="Enter"><?php echo empty($comment) ? 'Write your comment..' : nl2br($comment) ?></a></td>
							
                        </tr>
<?php }

else if( $this->Owner || $this->Admin) {
	$value = report_submit($row->id,$submitinfo); 
    $comment = report_submit_comment($row->id,$submitinfo); 
	?>
	
	 <tr>
                            <td><?= $row->name ?></td>
							<td><a href="#"  class="yes_no editable-click"  data-id="" data-idname=""   data-type="select" data-table="reportsubmit" data-pk="<?php echo $submitinfo->id ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="department_<?php echo $row->id?>" data-title="Enter"><?php echo $value==2 ? 'No' : 'Yes' ?></a></td>
							<td><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="textarea" data-table="reportsubmit" data-pk="<?php echo $submitinfo->id ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="comment_<?php echo $row->id?>" data-title="Enter"><?php echo empty($comment) ? 'Write your comment..' : nl2br($comment) ?></a></td>
							
                        </tr>
	
	<?php
	
}


}





 } ?>
						
                        </tbody>
                         
                    </table>
                </div>
            </div>
        </div>
    </div>

	 
</div>

