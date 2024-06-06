<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'EDIT uposhakha'; ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("organization/edituposhakha/" . $uposhakha->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>



            <div class="row">


                <div class="col-md-6 col-sm-6">


                    <div class="form-group">

                        <label for="thana_name">সাংগঠনিক উপশাখার নাম</label>
                        <?php echo form_input('thana_name', $uposhakha->thana_name, 'class="form-control" required="required" id="thana_name"'); ?>
                    </div>

                    <?php if ($this->Owner || $this->Admin) { ?>

                        <div class="form-group">
                            <?php echo lang('তারিখ', 'date'); ?>
                            <div class="controls">
                                <?php echo form_input('date',  $this->sma->hrsd($uposhakha->date), 'class="form-control fixed_date_bk tmp_date" id="date" readonly required="required"'); ?>
                            </div>
                        </div>
                    <?php } ?>


                    <div class="form-group">
                        <?= lang("সাংগঠনিক থানা শাখার নাম", "thana_id"); ?>
                        <?php

                        echo  'DM' . $uposhakha->org_thana_id . 'DM';
                        $dt[''] = lang('select') . ' ' . lang('থানা');
                        foreach ($thanas as $thana_item)
                            $dt[$thana_item->id] = $thana_item->thana_name;

                        echo form_dropdown('thana_id', $dt,  array($uposhakha->org_thana_id), 'id="thana_id"  class="form-control select" style="width:100%;" required="required" ');
                        ?>
                    </div>


                    <div class="form-group">
                        <?= lang("সাংগঠনিক ওয়ার্ড/ইউনিয়নের নাম", "ward_id"); ?>

                        <?php

                        echo  'DM' . $uposhakha->org_ward_id . 'DM';
                        $dtward[''] = lang('select') . ' ' . lang('সাংগঠনিক ওয়ার্ড');
                       
                       if($wards)
                        foreach ($wards as $ward_item)
                            $dtward[$ward_item->id] = $ward_item->thana_name;

                        echo form_dropdown('ward_id', $dtward,  array($uposhakha->org_ward_id), 'id="ward_id"  class="form-control select" style="width:100%;"   ');
                        ?>


                        
                    </div>




                    <div class="form-group">
                        <?= lang("সংগঠনের ধরন", "org_type"); ?>
                        <?php
                        $wrt[''] = lang('select') . ' ' . lang('organization_type');
                        foreach (['Residential' => 'আবাসিক', 'Institutional' => 'প্রাতিষ্ঠানিক', 'Departmental' => 'বিভাগীয়'] as $key => $type)
                            $wrt[$key] = $type;

                        echo form_dropdown('org_type', $wrt,  $uposhakha->org_type, 'id="org_type"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>



                    <div class="form-group">
                        <?= lang('সদস্য সংখ্যা', 'member_number'); ?>
                        <?= form_input('member_number', set_value('member_number', $uposhakha->member_number), 'class="form-control tip" id="member_number" required="required" '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('সাথী সংখ্যা', 'associate_number'); ?>
                        <?= form_input('associate_number', set_value('associate_number', $uposhakha->associate_number), 'class="form-control tip" id="associate_number"  required="required" '); ?>
                    </div>




                    <div class="form-group">
                        <?= lang('কর্মী', 'worker_number'); ?>
                        <?= form_input('worker_number', set_value('worker_number', $uposhakha->worker_number), 'class="form-control tip" id="worker_number" required="required" '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('সমর্থক সংখ্যা', 'supporter_number'); ?>
                        <?= form_input('supporter_number', set_value('supporter_number', $uposhakha->supporter_number), 'class="form-control tip" id="supporter_number" required="required" '); ?>
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



                        echo form_dropdown('branch_id', $wh,  $uposhakha->branch_id, 'id="branch_id" required="required" class="form-control select" style="width:100%;" ');
                        ?>
                    </div>







                </div>





            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= lang("মন্তব্য", "note"); ?>
                        <?php echo form_textarea('note', $uposhakha->note, 'class="form-control" id="note" style="height:100px;"   '); ?>
                    </div>
                </div>
            </div>





        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_uposhakha', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>




<script type="text/javascript">
    $(document).ready(function() {



        $('#thana_id').change(function() {
            var thana_id = $(this).val();

            if (thana_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/getWardList'); ?>",
                    method: "GET",
                    data: {
                        thana_id: thana_id,
                        branch_id: '<?= $branch_id ?>'
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>";
                        $.each(response, function(index, wards) {
                            options += "<option value='" + wards.id + "'>" + wards.thana_name + "</option>";
                        });
                        $('#ward_id').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching wards!");
                    }
                });
            } else {
                $('#ward_id').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>");
            }
        });










    });
</script>