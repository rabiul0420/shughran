<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'EDIT Thana'; ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("organization/editthana/" . $thana->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>



            <div class="row">


                <div class="col-md-6 col-sm-6">


                    <div class="form-group">

                        <label for="thana_name">সাংগঠনিক থানার নাম</label>
                        <?php echo form_input('thana_name', $thana->thana_name, 'class="form-control" required="required" id="thana_name"'); ?>
                    </div>

                    <?php if ($this->Owner || $this->Admin) { ?>

                    <div class="form-group">
                        <?php echo lang('তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date',  $this->sma->hrsd($thana->date), 'class="form-control fixed_date_bk tmp_date" id="date" readonly required="required"'); ?>
                        </div>
                    </div>
                    <?php } ?> 

                    <div class="form-group all">
                        <?= lang('থানা কোড', 'thana_code'); ?>


                        <?php $tc = array();
                        $tc[''] =  'থানা কোড';
                        for ($i = 1; $i <= 60; $i++) {
                            $tc[$i] =  $i;
                        }

                        $tc[100] =  100;

                        echo form_dropdown('thana_code', $tc, ($thana->thana_code ? $thana->thana_code : ''), 'id="thana_code"  class="form-control select" required="required" style="width:100%;" ');
                        ?>
                    </div>



                    <div class="form-group">
                        <?= lang("সংগঠনের ধরন", "org_type"); ?>
                        <?php
                        $wrt[''] = lang('select') . ' ' . lang('organization_type');
                        foreach (['Residential' => 'আবাসিক', 'Institutional' => 'প্রাতিষ্ঠানিক', 'Departmental' => 'বিভাগীয়'] as $key => $type)
                            $wrt[$key] = $type;

                        echo form_dropdown('org_type', $wrt,  $thana->org_type, 'id="org_type"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>



                     
                    <div class="form-group">
                        <?= lang('কর্মী', 'worker_number'); ?>
                        <?= form_input('worker_number', set_value('worker_number', $thana->worker_number), 'class="form-control tip" id="worker_number" required="required" '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('সমর্থক সংখ্যা', 'supporter_number'); ?>
                        <?= form_input('supporter_number', set_value('supporter_number', $thana->supporter_number), 'class="form-control tip" id="supporter_number" required="required" '); ?>
                    </div>




                </div>

                <div class="col-md-6 col-sm-6">


                   


 

                    <div class="form-group">
                        <?= lang("শাখা", "branch"); ?>
                        <?php
                        $wh[''] = lang('select') . ' ' . lang('branch');
                        if ($this->Admin || $this->Owner)
                            $flag = 1;
                        else
                            $flag = 2;
                        foreach ($branches as $branch) {
                            if ($flag == 1)
                                $wh[$branch->id] = $branch->name;
                            elseif ($branch->id == $this->session->userdata('branch_id'))
                                $wh[$branch->id] = $branch->name;
                        }



                        echo form_dropdown('branch_id', $wh,  $thana->branch_id, 'id="branch_id" required="required" class="form-control select" style="width:100%;" ');
                        ?>
                    </div>







                </div>





            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= lang("মন্তব্য", "note"); ?>
                        <?php echo form_textarea('note', $thana->note, 'class="form-control" id="note" style="height:100px;"   '); ?>
                    </div>
                </div>
            </div>





        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_thana', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>